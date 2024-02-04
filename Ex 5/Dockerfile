# Use the official PHP Apache image
FROM php:apache

# Changes in apt packages
RUN apt-get update && apt-get -y install zip libzip-dev

# Install additional PHP extensions
RUN docker-php-ext-install pdo_mysql zip pdo_pgsql

# Copy the index.php file into the container
COPY index.php /var/www/html/

# entrypoint start apache
ENTRYPOINT [“apache2-foreground”]