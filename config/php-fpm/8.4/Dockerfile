# Dockerfile para PHP 8.4 (baseado no 8.1)
FROM php:8.4-fpm

# Set Environment Variables
ENV DEBIAN_FRONTEND=noninteractive

# Instala ferramentas e extensões PHP
RUN set -eux; \
    apt-get update; \
    apt-get upgrade -y; \
    apt-get install -y --no-install-recommends \
            curl \
            libmemcached-dev \
            libz-dev \
            libpq-dev \
            libjpeg-dev \
            libjpeg62-turbo-dev \
            libpng-dev \
            libfreetype6-dev \
            libssl-dev \
            libwebp-dev \
            libxpm-dev \
            libmcrypt-dev \
            libonig-dev; \
    rm -rf /var/lib/apt/lists/*

RUN set -eux; \
    docker-php-ext-install pdo_mysql; \
    docker-php-ext-install pdo_pgsql; \
    docker-php-ext-configure gd \
            --prefix=/usr \
            --with-jpeg \
            --with-webp \
            --with-xpm \
            --with-freetype; \
    docker-php-ext-install gd; \
    php -r 'var_dump(gd_info());'

RUN apt-get update -y  \
    && apt-get install -y libicu-dev libxslt-dev libmagickwand-dev libzip-dev \
    && docker-php-ext-install intl calendar bcmath xsl soap zip

RUN apt-get install && docker-php-ext-configure opcache --enable-opcache \
    && docker-php-ext-install opcache

RUN pecl install imagick \
    && docker-php-ext-enable imagick

RUN apt update && apt install -y libkrb5-dev && rm -r /var/lib/apt/


RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN apt-get update && \
    apt-get install -y \
    zlib1g-dev

RUN sed -ie 's/pm.max_children = 5/pm.max_children = 15/' /usr/local/etc/php-fpm.d/www.conf \
    && sed -ie 's/pm.max_spare_servers = 3/pm.max_spare_servers = 15/' /usr/local/etc/php-fpm.d/www.conf \
    && sed -ie 's/pm.start_servers = 2/pm.start_servers = 10/' /usr/local/etc/php-fpm.d/www.conf

# Copia arquivos de configuração customizados
COPY php.ini /usr/local/etc/php/php.ini
COPY error_reporting.ini /usr/local/etc/php/conf.d/
COPY xdebug.ini /usr/local/etc/php/conf.d/

WORKDIR /var/www/html
