FROM composer:2 AS composer
FROM php:8.5.2-fpm-bookworm

RUN apt-get update && apt-get install -y \
    nano \
    zip \
    unzip

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

CMD ["php-fpm"]