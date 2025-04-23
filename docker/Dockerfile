FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    libpq-dev \
    git \
    unzip \
    && docker-php-ext-install pdo pdo_pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY . /var/www/html

RUN composer install

RUN mkdir -p /var/www/html/temp /var/www/html/log \
    && chmod -R 775 /var/www/html/temp /var/www/html/log

USER www-data


CMD ["php-fpm"]
