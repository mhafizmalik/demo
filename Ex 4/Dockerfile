# Use the official PHP Apache image
FROM php:apache

# Copy the index.php file into the container
COPY index.php /var/www/html/

# Change Apache port to 5000
RUN sed -i 's/80/5000/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# Expose port 5000 for Apache
EXPOSE 5000