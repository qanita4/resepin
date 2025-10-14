Quick Docker guide for this project

Build and run with docker-compose:

```bash
# Build images and start containers
docker compose up --build -d

# View logs
docker compose logs -f app

# Run migrations (example)
docker compose exec app php artisan migrate

# Stop and remove containers
docker compose down
```

Notes:

- Replace APP_KEY in docker-compose.yml or set it at runtime (php artisan key:generate).
- If you need node dev server, run `npm run dev` locally or adjust container to run Vite.
