#!/usr/bin/env bash

# This script is used at Docker image build time.

set -exou pipefail;

# Upgrade the system.

apt-get -qq install -y libxml2-dev zlib1g-dev git unzip autoconf automake libtool curl make g++

# Initialize variables
GRPC_SOURCE_PATH="/grpc"
PROTOBUF_SOURCE_PATH="/protobuf"
PHP_INI_DIR=${PHP_INI_DIR:-}

PROTOBUF_USE_PHP_EXTENSION=${PROTOBUF_USE_PHP_EXTENSION:-}
PROTOBUF_VERSION=${PROTOBUF_VERSION:-}
PROTOBUF_SRC_REPO=${PROTOBUF_SRC_REPO:-}
PROTOBUF_SRC_BRANCH=${PROTOBUF_SRC_BRANCH:-}

GRPC_USE_PHP_EXTENSION=${GRPC_USE_PHP_EXTENSION:-}
GRPC_VERSION=${GRPC_VERSION:-}
GRPC_SRC_REPO=${GRPC_SRC_REPO:-}
GRPC_SRC_BRANCH=${GRPC_SRC_BRANCH:-}

# Build, install and configure gRPC.

if [ "$GRPC_USE_PHP_EXTENSION" = "true" ]; then
    if [ -z "$GRPC_SRC_REPO" -o -z "$GRPC_SRC_BRANCH" ]; then
        echo "Building and installing the gRPC PHP extension from PECL";
        if [ -z "$GRPC_VERSION" ]; then
            pecl -q install grpc;
        else
            pecl -q install "grpc-$GRPC_VERSION";
        fi;
        GRPC_LIB_EXE="grpc.so";
    else
        echo "Building and installing the gRPC PHP extension from sources";
        git clone -b "$GRPC_SRC_BRANCH" "$GRPC_SRC_REPO" "$GRPC_SOURCE_PATH"
        pushd "$GRPC_SOURCE_PATH";
        git submodule update --init;
        make;
        make install;
        popd;
        pushd "$GRPC_SOURCE_PATH/src/php/ext/grpc";
        phpize && ./configure && make;
        make install;
        popd;
        chmod -R 755 "$GRPC_SOURCE_PATH";
        GRPC_LIB_EXE="$GRPC_SOURCE_PATH/src/php/ext/grpc/modules/grpc.so";
    fi;
    echo "Configuring the gRPC PHP extension using $GRPC_LIB_EXE";
    echo "extension=$GRPC_LIB_EXE" >> "$PHP_INI_DIR/conf.d/grpc.ini";
fi;

# Build, install and configure protobuf.

if [ "$PROTOBUF_USE_PHP_EXTENSION" = "true" ]; then
    if [ -z "$PROTOBUF_SRC_REPO" -o -z "$PROTOBUF_SRC_BRANCH" ]; then
        echo "Building and installing the protobuf PHP extension from PECL";
        if [ -z "$PROTOBUF_VERSION" ]; then
            pecl -q install protobuf;
        else
            pecl -q install "protobuf-$PROTOBUF_VERSION";
        fi;
        PROTOBUF_LIB_EXE="protobuf.so";
    else
        echo "Building and installing the protobuf PHP extension from sources";
        git clone -b "$PROTOBUF_SRC_BRANCH" "$PROTOBUF_SRC_REPO" "$PROTOBUF_SOURCE_PATH"
        pushd "$PROTOBUF_SOURCE_PATH/php/ext/google/protobuf";
        make clean || true;
        phpize && ./configure && make;
        popd;
        chmod -R 755 "$PROTOBUF_SOURCE_PATH";
        PROTOBUF_LIB_EXE="$PROTOBUF_SOURCE_PATH/php/ext/google/protobuf/modules/protobuf.so";
    fi;
    echo "Configuring the protobuf PHP extension using $PROTOBUF_LIB_EXE";
    echo "extension=$PROTOBUF_LIB_EXE" >> "$PHP_INI_DIR/conf.d/protobuf.ini";
fi;
