# Sets the PHP image to extend from.
# See https://hub.docker.com/_/php.
ARG PHP_IMAGE="apache"
FROM php:${PHP_IMAGE}

ARG USE_C_PROTOBUF=true

# Install system dependencies
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    libxml2-dev \
    zlib1g-dev \
    git \
    unzip \
    build-essential \
    autoconf \
    pkg-config \
    php$(echo ${PHP_IMAGE} | cut -d'-' -f1)-dev \
    php-pear && \
    rm -rf /var/lib/apt/lists/*


# Install PHP extension(s) required for development.
RUN docker-php-ext-install bcmath

# Install and configure Composer.
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

# Install and configure the gRPC extension.
RUN pecl install grpc-1.80.0
RUN echo 'extension=grpc.so' >> $PHP_INI_DIR/conf.d/grpc.ini

# Install and configure the C implementation of Protobuf extension if needed.
RUN if [ "$USE_C_PROTOBUF" = "false" ]; then echo 'Using PHP implementation of Protobuf'; else echo 'Using C implementation of Protobuf'; pecl install protobuf-3.25.3; echo 'extension=protobuf.so' >> $PHP_INI_DIR/conf.d/protobuf.ini; fi

WORKDIR "/google-ads-php"
