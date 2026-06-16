# Sets the PHP image to extend from dynamically for local testing.
ARG PHP_IMAGE="8.1-apache"
FROM php:${PHP_IMAGE}

RUN apt-get update && apt-get install -y libxml2 zlib1g-dev git unzip

# Install standard PHP extensions required for development.
RUN docker-php-ext-install bcmath

# Install and configure Composer.
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

# NOTE: gRPC and Protobuf compilation steps are removed from this file 
# because they are pulled pre-compiled via the Kokoro Bakery image layers.

WORKDIR "/google-ads-php"