# syntax=docker/dockerfile:1

FROM composer:lts
WORKDIR /app
RUN --mount=type=bind,source=./composer.json,target=composer.json \
    --mount=type=bind,source=./composer.lock,target=composer.lock \
    --mount=type=cache,target=/tmp/cache \
    composer install --no-interaction

FROM php:8.4-fpm

# Install Composer and dependencies
RUN apt-get update && apt-get install -y \
    curl \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_mysql

# Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
