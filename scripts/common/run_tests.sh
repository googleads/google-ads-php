#!/usr/bin/env bash

# This script is used at container runtime.

set -exou pipefail;

# Initialize variables
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd )"
WORK_DIR=${WORK_DIR:-$(dirname $(dirname $DIR))}

# Rebuild

pushd "$DIR"
./rebuild.sh
popd

# Tests

pushd "$WORK_DIR"
# Create empty credentials for the unit tests and set the environment variable.
if [ ! -f ./emptycredentials.json ]; then
    echo '{"type": "authorized_user","client_id": "","client_secret": "","refresh_token": ""}' >> ./emptycredentials.json
    GOOGLE_APPLICATION_CREDENTIALS=./emptycredentials.json
fi;

# Run unit tests.
./vendor/bin/phpunit -d memory_limit=-1 tests/
echo "Finished running unit tests."

# Run code style tests.
./vendor/bin/phpcs --standard=phpcs_ruleset.xml -np
echo "Finished running code style tests."
popd