
FROM dunglas/frankenphp:1-php8.3

# Install Laravel PHP extensions
RUN install-php-extensions \
    pdo_mysql \
    pdo_pgsql \
    bcmath \
    intl \
    zip \
    opcache

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy Composer files first
COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --no-scripts \
    --no-autoloader

# Copy Laravel application, including public assets
COPY . .

# Generate optimized autoload
RUN composer dump-autoload \
    --no-dev \
    --optimize

# Prepare Laravel directories
RUN mkdir -p \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R ug+rwX storage bootstrap/cache

# Verify static CSS files exist during build
RUN test -f public/backend/vendor/css/core.css \
    && test -f public/backend/vendor/css/theme-default.css \
    && test -f public/backend/css/demo.css

# Configure FrankenPHP
COPY docker/Caddyfile /etc/caddy/Caddyfile
COPY docker/start.sh /usr/local/bin/start.sh

RUN chmod +x /usr/local/bin/start.sh

ENV PORT=10000
ENV SERVER_NAME=:10000

EXPOSE 10000

CMD ["/usr/local/bin/start.sh"]
