FROM composer:2 AS composer

FROM php:8.2-fpm

RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    curl \
    unzip \
    libzip-dev \
    libpq-dev \
    zip \
    npm \
    libonig-dev \
    libxml2-dev \
    build-essential \
    && docker-php-ext-install \
        pdo \
        pdo_pgsql \
        bcmath \
        ctype \
        fileinfo \
        mbstring \
        tokenizer \
        xml \
        zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy Composer binary from composer image
COPY --from=composer /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

RUN npm install && npm run build

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
