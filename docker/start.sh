#!/bin/sh
set -e

cd /app

echo "Starting Laravel deployment..."

php artisan config:clear

echo "Running database migrations..."
php artisan migrate --force

if [ "${RUN_SEEDERS:-false}" = "true" ]; then
    echo "Running database seeders..."
    php artisan db:seed --force
fi

php artisan config:cache

echo "Starting FrankenPHP..."

exec frankenphp run \
    --config /etc/caddy/Caddyfile \
    --adapter caddyfile