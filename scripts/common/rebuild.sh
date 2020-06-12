#!/usr/bin/env bash

# This script is used at container runtime.

set -exou pipefail;

# Initialize variables
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd )"
WORK_DIR=${WORK_DIR:-$(dirname $(dirname $DIR))}

COMPOSER_INSTALL_UPDATE_ARGS=${COMPOSER_INSTALL_UPDATE_ARGS:-}

# Update the composer dependencies for the project.
pushd "$WORK_DIR"
composer update $COMPOSER_INSTALL_UPDATE_ARGS
popd
