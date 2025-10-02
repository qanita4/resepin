<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

// Mock data
const searchQuery = ref('');
const activeMenu = ref('home');

const recipes = [
    {
        id: 1,
        title: 'Nasi Goreng Seafood Spesial',
        image: 'https://images.unsplash.com/photo-1512058564366-18510be2db19?w=400&h=300&fit=crop',
        rating: 4.8,
        author: 'Chef Budi',
    },
    {
        id: 2,
        title: 'Rendang Daging Sapi Padang',
        image: 'https://images.unsplash.com/photo-1565299624946-b28f40a0ca4b?w=400&h=300&fit=crop',
        rating: 4.9,
        author: 'Ibu Sari',
    },
    {
        id: 3,
        title: 'Gado-Gado Jakarta Asli',
        image: 'https://images.unsplash.com/photo-1546833999-b9f581a1996d?w=400&h=300&fit=crop',
        rating: 4.7,
        author: 'Chef Andi',
    },
    {
        id: 4,
        title: 'Soto Ayam Lamongan',
        image: 'https://images.unsplash.com/photo-1569718212165-3a8278d5f624?w=400&h=300&fit=crop',
        rating: 4.6,
        author: 'Bu Ratna',
    },
    {
        id: 5,
        title: 'Bakso Malang Original',
        image: 'https://images.unsplash.com/photo-1582878826629-29b7ad1cdc43?w=400&h=300&fit=crop',
        rating: 4.5,
        author: 'Pak Joko',
    },
    {
        id: 6,
        title: 'Gudeg Yogya Manis',
        image: 'https://images.unsplash.com/photo-1512058564366-18510be2db19?w=400&h=300&fit=crop',
        rating: 4.8,
        author: 'Bu Tuti',
    },
];
</script>

<template>
    <Head title="Resepin - Dashboard" />

    <div class="min-h-screen bg-orange-50">
        <!-- Header -->
        <header class="border-b border-gray-200 bg-white shadow-sm">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <!-- Logo -->
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-lg bg-red-500 text-xl font-bold text-white"
                        >
                            R
                        </div>
                        <h1 class="text-xl font-bold text-gray-900">Resepin</h1>
                    </div>

                    <!-- Navigation Menu -->
                    <nav class="hidden space-x-8 md:flex">
                        <a
                            href="#"
                            class="rounded-md bg-red-500 px-3 py-2 text-sm font-medium text-white"
                            @click="activeMenu = 'home'"
                        >
                            Home
                        </a>
                        <a
                            href="#"
                            class="rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:text-gray-900"
                            @click="activeMenu = 'community'"
                        >
                            Komunitas
                        </a>
                    </nav>

                    <!-- User Profile -->
                    <div class="flex items-center gap-4">
                        <button
                            class="rounded-full p-2 transition-colors hover:bg-gray-100"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1494790108755-2616b612b647?w=100&h=100&fit=crop&crop=face"
                                alt="User"
                                class="h-8 w-8 rounded-full object-cover"
                            />
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <!-- Search Section -->
            <div class="mb-8">
                <div class="relative mx-auto max-w-2xl">
                    <div
                        class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
                    >
                        <svg
                            class="h-5 w-5 text-gray-400"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                            />
                        </svg>
                    </div>
                    <input
                        v-model="searchQuery"
                        type="text"
                        placeholder="Cari resep favorit kamu..."
                        class="block w-full rounded-xl border border-gray-300 py-3 pr-4 pl-10 text-gray-900 placeholder-gray-500 focus:border-transparent focus:ring-2 focus:ring-red-500"
                    />
                </div>
            </div>

            <!-- Welcome Section -->
            <div class="mb-8">
                <h1 class="mb-2 text-3xl font-bold text-gray-900">
                    Selamat Datang di Resepin! 👋
                </h1>
                <p class="text-lg text-gray-600">
                    Temukan resep-resep terbaik dari chef berpengalaman
                </p>
            </div>

            <!-- Recipes Grid -->
            <div class="mb-8">
                <div class="mb-6 flex items-center justify-between">
                    <h2 class="text-2xl font-bold text-gray-900">
                        Resep Populer
                    </h2>
                    <button
                        class="rounded-lg border-2 border-green-600 px-4 py-2 font-medium text-green-600 transition-colors hover:bg-green-50"
                    >
                        Lihat Semua
                    </button>
                </div>

                <div
                    class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3"
                >
                    <div
                        v-for="recipe in recipes"
                        :key="recipe.id"
                        class="overflow-hidden rounded-xl bg-white shadow-md transition-shadow duration-300 hover:shadow-lg"
                    >
                        <!-- Recipe Image -->
                        <div class="relative aspect-[4/3] overflow-hidden">
                            <img
                                :src="recipe.image"
                                :alt="recipe.title"
                                class="h-full w-full object-cover transition-transform duration-300 hover:scale-105"
                            />
                        </div>

                        <!-- Recipe Info -->
                        <div class="p-4">
                            <h3
                                class="mb-2 text-lg font-semibold text-gray-900"
                            >
                                {{ recipe.title }}
                            </h3>

                            <div class="mb-4 flex items-center justify-between">
                                <span class="text-sm text-gray-600">{{
                                    recipe.author
                                }}</span>
                                <div
                                    class="flex items-center gap-1 text-yellow-500"
                                >
                                    <svg
                                        class="h-4 w-4 fill-current"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        />
                                    </svg>
                                    <span
                                        class="text-sm font-medium text-gray-700"
                                        >{{ recipe.rating }}</span
                                    >
                                </div>
                            </div>

                            <!-- Action Button -->
                            <button
                                class="w-full rounded-lg bg-red-500 px-4 py-2 font-medium text-white transition-colors duration-200 hover:bg-red-600"
                            >
                                Lihat
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>
