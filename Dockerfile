FROM laravelsail/php80-composer AS laravel_builder

RUN apt-get update

# Install composer deps
COPY --from=composer /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html
COPY . .
RUN composer i -o

# Build production image
FROM php:8.0.3-apache

# Mod_rewrite
RUN a2enmod rewrite

# PHP extensions
RUN docker-php-ext-install \
    mysqli \
    pdo \
    pdo_mysql

COPY --from=laravel_builder /var/www/html /var/www/html

WORKDIR /var/www/html

# File permissions
RUN chown -R www-data:www-data ./storage
