# The php image to extend from: see https://hub.docker.com/_/php for complete listings.
ARG PHP_IMAGE="php:7.4-cli"

FROM ${PHP_IMAGE}

# Working directory

ARG WORK_DIR="/google-ads-php"
ENV WORK_DIR=$WORK_DIR

# Update the system.

RUN apt-get -qq update && apt-get -qq install -y libxml2 zlib1g-dev git unzip

# Install PHP extension(s) required for development.
RUN docker-php-ext-install bcmath

# Install and configure Composer.
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

# Create empty credentials for the unit tests.
RUN echo '{"type": "authorized_user","client_id": "","client_secret": "","refresh_token": ""}' >> /emptycredentials.json
ENV GOOGLE_APPLICATION_CREDENTIALS /emptycredentials.json

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

# Copy the scripts.
COPY scripts /scripts
RUN chmod -R 755 /scripts

# Build, install and configure the protobuf and gRPC PHP extensions.
RUN bash /scripts/image/install_php_extensions.sh "$@"

# Setup the project.
RUN bash /scripts/image/setup_project.sh "$@"

WORKDIR "$WORK_DIR"

CMD sleep infinity
