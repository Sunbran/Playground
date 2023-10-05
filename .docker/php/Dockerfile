FROM php:8.2-fpm

RUN apt-get update && \
    apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    redis \
    unzip \
    curl \
    bash \
    nodejs \
    npm \
    vim  \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd mysqli pdo pdo_mysql zip opcache

COPY php.ini /usr/local/etc/php/conf.d/app.ini

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

ARG HOST_UID
RUN adduser --disabled-password --gecos "" --uid $HOST_UID web

USER web