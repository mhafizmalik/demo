FROM php:apache

# system packages needed to build the extensions
RUN apt-get update && apt-get install -y zip libzip-dev

# install PHP extensions into the image
RUN docker-php-ext-install pdo_mysql zip

COPY index.php /var/www/html/

ENTRYPOINT ["apache2-foreground"]
