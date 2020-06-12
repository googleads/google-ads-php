#!/usr/bin/env bash

# This script is used at Docker image build time.

set -exou pipefail;

# Upgrade the system.

apt-get -qq install -y libxml2-dev zlib1g-dev git unzip

# Initialize variables
WORK_DIR=${WORK_DIR:-}

SRC_REPO=${SRC_REPO:-}
SRC_BRANCH=${SRC_BRANCH:-}

COMPOSER_INSTALL_UPDATE_ARGS=${COMPOSER_INSTALL_UPDATE_ARGS:-}

# Setup the google-ads-php project.

if [ ! -z "$SRC_REPO" -a ! -z "$SRC_BRANCH" ]; then
    echo "Building and installing the project from sources";
    git clone -b "$SRC_BRANCH" "$SRC_REPO" "$WORK_DIR"

    pushd "$WORK_DIR";
    composer install $COMPOSER_INSTALL_UPDATE_ARGS
    popd;
fi;
