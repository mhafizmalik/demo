FROM php:apache
COPY index.php /var/www/html/
# switch Apache from port 80 to 5000
RUN sed -i 's/80/5000/g' \
    /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf
EXPOSE 5000
