#!/usr/bin/env bash

# This script is used at container runtime.

set -exou pipefail;

# Initialize variables
WORK_DIR=${WORK_DIR:-}

# Update the composer dependencies for the project.
pushd "$WORK_DIR"
composer update
popd
