FROM php:8.2-fpm-alpine

ENV PHP_UID=1000
ENV PHP_GID=1000

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN docker-php-ext-install pdo pdo_mysql
RUN mkdir -p /var/www/storage/framework/{sessions,views,cache} \
    && mkdir -p /var/www/bootstrap/cache \
    && mkdir -p /var/www/storage/logs \
    && mkdir -p /var/www/storage/clockwork \
    && mkdir -p /var/www/.config/psysh \
    && addgroup -g ${PHP_UID} www \
    && adduser -H -D -u ${PHP_GID} -G www www \
    && chown -R www:www /var/www
WORKDIR /var/www/html
USER www

# RUN addgroup -g 1000 user
# RUN adduser -D -u 1000 user -G user

# RUN docker-php-ext-install pdo pdo_mysql

# RUN docker-php-ext-configure pcntl --enable-pcntl \
#   && docker-php-ext-install \
#     pcntl