FROM php:8.0.13
RUN apt-get update -y && apt-get install -y openssl zip libzip-dev unzip git libonig-dev libpng-dev sqlite3 libsqlite3-dev
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo mbstring gd zip

# datu iekopēšana konteinerī
WORKDIR /app
COPY . /app

# db sagatavošana
#RUN cp .env.testing .env
#RUN php -v
#RUN touch database/database.sqlite

# pakotņu uzstādīšana
#RUN composer install

# laravel atslēgas ģenerēšana un migrācija
#RUN php artisan key:generate
#RUN php artisan migrate --seed

#RUN php artisan test
# servera startēšanai lokāli
#CMD php artisan serve --host=0.0.0.0 --port=8181
#EXPOSE 8181


## helperi
## docker build . --no-cache
## docker image list
## docker stop CONTAINER_ID
## docker run --rm -p 8181:8181 CONTAINER_ID
