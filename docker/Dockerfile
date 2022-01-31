FROM php:8.0-fpm-alpine

RUN apk update \
    && apk upgrade \
    && apk add --no-cache bash \
    && apk add --no-cache git \
    && apk add --no-cache build-base \
    && apk add --no-cache php8-dev \
    && apk add --no-cache zlib-dev \
    && rm -rf /var/cache/apk/*

# Build php-spx
RUN git clone https://github.com/NoiseByNorthwest/php-spx.git \
    && cd php-spx \
    && git checkout release/latest \
    && phpize \
    && ./configure \
    && make \
    && make install \
    && mv modules/spx.so $(php -r "echo ini_get('extension_dir');")/spx.so \
    && printf "extension=spx.so\nspx.data_dir=/var/www/html\n" > $PHP_INI_DIR/conf.d/spx.ini

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

ENV PHP_MEMORY_LIMIT=4G

CMD composer install;  php-fpm

EXPOSE 9000
