#!/bin/sh
set -e

cd /app

echo "Starting Laravel deployment..."

# Clear cached configuration
php artisan config:clear

# Run migrations
echo "Running database migrations..."
php artisan migrate --force

# Run seeders only when explicitly enabled
if [ "${RUN_SEEDERS:-false}" = "true" ]; then
    echo "Running database seeders..."
    php artisan db:seed --force
fi

# Cache Laravel configuration
php artisan config:cache

echo "Starting FrankenPHP..."

exec frankenphp php-server \
    --root /app/public \
    --listen ":${PORT:-10000}"