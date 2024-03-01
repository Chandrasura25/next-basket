FROM php:7.4-fpm-alpine

# Install dependencies
RUN apk update && apk add --no-cache \
    openssl \
    rabbitmq-c \
    rabbitmq-c-dev \
    autoconf \
    g++ \
    make \
    && pecl install amqp \
    && docker-php-ext-enable amqp \
    && docker-php-ext-install pdo pdo_mysql sockets \
    && apk del rabbitmq-c-dev autoconf g++ make

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin --filename=composer

WORKDIR /app
COPY . .
RUN composer install
