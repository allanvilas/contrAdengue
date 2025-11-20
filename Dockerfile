FROM php:8.4.7-fpm

RUN apt-get update && \
    apt-get install -y \
        libzip-dev \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        libpq-dev \
        libxml2-dev \
        libonig-dev \
        libcurl4-openssl-dev \
        libssl-dev \
        git \
        unzip \
        cron \
        curl \
        zip \
        wget && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install -j$(nproc) gd zip pdo pdo_mysql pdo_pgsql xml opcache curl && \
    pecl install xdebug-3.4.0 && \
    docker-php-ext-enable xdebug

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www