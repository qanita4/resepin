# Multi-stage Dockerfile for Laravel (PHP-FPM)
# - composer stage installs PHP dependencies
# - node_builder stage builds frontend assets (Vite)
# - final stage runs php-fpm and contains built assets + vendor

########################
# Composer stage
########################
FROM composer:2 AS composer
WORKDIR /app
# Copy composer manifests first to leverage Docker layer cache
COPY composer.json composer.lock ./
# Install PHP dependencies (no dev for smaller image)
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-scripts

########################
# Node (Vite) build stage
########################
FROM node:18-bullseye AS node_builder
WORKDIR /app
# Copy package manifests and vite config
COPY package.json package-lock.json vite.config.ts ./
# Copy frontend sources used by your build (adjust if your project structure differs)
COPY resources resources
COPY resources/css resources/css
COPY resources/js resources/js

RUN npm ci --silent
RUN npm run build

########################
# Final PHP-FPM image
########################
FROM php:8.2-fpm-bullseye

# Install system dependencies and PHP extensions commonly needed by Laravel
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
       git \
       unzip \
       libzip-dev \
       libpng-dev \
       libjpeg-dev \
       libfreetype6-dev \
       libonig-dev \
       libxml2-dev \
       zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) pdo_mysql mbstring exif pcntl bcmath gd zip xml \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Set working dir
WORKDIR /var/www/html

# Copy application source
COPY . .

# Copy vendor from composer stage
COPY --from=composer /app/vendor ./vendor

# Copy built frontend assets from node stage (vite output typically in public/build)
COPY --from=node_builder /app/public ./public

# Ensure correct permissions for runtime writable directories
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache || true

EXPOSE 9000
CMD ["php-fpm"]
