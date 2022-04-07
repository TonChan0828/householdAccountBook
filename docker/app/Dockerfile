FROM php:8.0-apache

RUN apt-get update \
    && apt-get install -y \
    zlib1g-dev libpq-dev unzip zip\
    nodejs npm \
    && docker-php-ext-install pdo_mysql mysqli \
    && docker-php-ext-enable mysqli

COPY ./app/php.ini /usr/local/etc/php
COPY ./app/*.conf /etc/apache2/sites-enabled/

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

WORKDIR /var/www/html
RUN composer global require "laravel/installer" \
    && cd /etc/apache2/mods-enabled \
    && ln -s ../mods-available/rewrite.load \
    && composer require --dev squizlabs/php_codesniffer
# && laravel new householdAccountBook \
# && cd householdAccountBook \
# && composer require laravel/ui \
# && php artisan ui bootstrap --auth
# && npm install && npm run dev
