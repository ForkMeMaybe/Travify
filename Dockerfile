FROM php:8.2-apache

RUN docker-php-ext-install pgsql

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html/

EXPOSE 80

