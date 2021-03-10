FROM php:8.0-apache

ARG USE_C_PROTOBUF=true

RUN apt-get update && apt-get install -y libxml2 zlib1g-dev git unzip

# Install PHP extension(s) required for development.
RUN docker-php-ext-install bcmath

# Install and configure Composer.
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

# Install and configure the gRPC extension.
RUN pecl install grpc
RUN echo 'extension=grpc.so' >> $PHP_INI_DIR/conf.d/grpc.ini

# Install and configure the C implementation of Protobuf extension if needed.
RUN if [ "$USE_C_PROTOBUF" = "false" ]; then echo 'Using PHP implementation of Protobuf'; else echo 'Using C implementation of Protobuf'; pecl install protobuf; echo 'extension=protobuf.so' >> $PHP_INI_DIR/conf.d/protobuf.ini; fi

# Create empty credentials to make sure the unit tests run successfully.
RUN echo '{"type": "authorized_user","client_id": "","client_secret": "","refresh_token": ""}' >> /root/emptycredentials.json
ENV GOOGLE_APPLICATION_CREDENTIALS /root/emptycredentials.json

WORKDIR "/google-ads-php"
