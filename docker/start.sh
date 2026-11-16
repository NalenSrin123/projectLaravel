#!/bin/sh
set -e

cd /app

echo "Starting Laravel deployment..."

php artisan config:clear

echo "Running migrations..."
php artisan migrate --force

if [ "${RUN_SEEDERS:-false}" = "true" ]; then
    echo "Running seeders..."
    php artisan db:seed --force
fi

php artisan config:cache

echo "Starting Laravel HTTP server..."

exec php artisan serve \
    --host=0.0.0.0 \
    --port="${PORT:-10000}"