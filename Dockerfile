FROM php:8.2-fpm
WORKDIR /app
COPY . /app
# RUN apt-get update && apt-get install git -y
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# RUN composer update
# RUN php artisan key:generate
CMD php artisan serve --host=0.0.0.0 --port=8000
EXPOSE 8000