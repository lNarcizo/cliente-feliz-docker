FROM php:7.4-fpm-alpine

ADD ./PHP/www.conf /usr/local/etc/php-fpm.d/www.conf

RUN mkdir -p /var/www/html

RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel

RUN chown -R laravel:laravel /var/www/html

WORKDIR /var/www/html

RUN apk add --no-cache \
    freetype \
    libpng \
    libpq-dev \
    libjpeg-turbo \
    freetype-dev \
    libpng-dev \
    libjpeg-turbo-dev

RUN docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg

RUN docker-php-ext-install pdo pdo_mysql mysqli