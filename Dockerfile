ARG PHP_IMAGE="php:7.4-cli"
FROM ${PHP_IMAGE}

# Working directory

ARG WORK_DIR="/google-ads-php"

# Update the system.

RUN apt-get update && apt-get install -y libxml2 zlib1g-dev git unzip

# Install PHP extension(s) required for development.
RUN docker-php-ext-install bcmath

# Install and configure Composer.
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

# Create empty credentials for the unit tests.
RUN echo '{"type": "authorized_user","client_id": "","client_secret": "","refresh_token": ""}' >> /root/emptycredentials.json
ENV GOOGLE_APPLICATION_CREDENTIALS /root/emptycredentials.json

# Protobuf

# Whether to use the PHP extension or not, true by default.
# See complete documentation for more information: https://developers.google.com/google-ads/api/docs/client-libs/php/protobuf
ARG PROTOBUF_USE_PHP_EXTENSION=true

# Protobuf - PHP Extension

# Option #1 (default): build and install from PECL.
# You can specify the version, the latest release is used by default.
# All the versions that are accesssible are listed here: https://pecl.php.net/package/protobuf
ARG PROTOBUF_VERSION

# Option #2 (alternative): build and install from sources. It is only used when all the arguments are provided.
# The Git repository to use, by default the official one is used.
ARG PROTOBUF_SRC_REPO="https://github.com/protocolbuffers/protobuf"
# The Git repository branch to use, e.g., master or v3.12.2.
ARG PROTOBUF_SRC_BRANCH

# gRPC

# Whether to use the PHP extension or not, true by default.
# See complete documentation for more information: https://developers.google.com/google-ads/api/docs/client-libs/php/transport
ARG GRPC_USE_PHP_EXTENSION=true

# gRPC - PHP Extension

# Option #1 (default): build and install from PECL.
# You can specify the version, the latest release is used by default.
# All the versions that are accesssible are listed here: https://pecl.php.net/package/grpc
ARG GRPC_VERSION

# Option #2 (alternative): build and install from sources. It is only used when all the arguments are provided.
# The Git repository to use, by default the official one is used.
ARG GRPC_SRC_REPO="https://github.com/grpc/grpc"
# The Git repository branch to use, e.g., master or v1.29.1.
ARG GRPC_SRC_BRANCH

# Make flags
ARG MAKEFLAGS=-j8

# Google Ads Client Library for PHP

# Build and install from sources. It is only used when all the arguments are provided.
# The Git repository to use, by default the official one is used.
ARG SRC_REPO="https://github.com/googleads/google-ads-php"
# The Git repository branch to use, e.g., master or v3.2.0.
ARG SRC_BRANCH

# Build, install and configure the protobuf and gRPC PHP extensions.
ADD scripts/install_php_extensions.sh /scripts/install_php_extensions.sh
RUN bash /scripts/install_php_extensions.sh "$@"

# Setup the google-ads-php project.
ADD scripts/setup_project.sh /scripts/setup_project.sh
RUN bash /scripts/setup_project.sh "$@"

WORKDIR "$WORK_DIR"

CMD sleep infinity
