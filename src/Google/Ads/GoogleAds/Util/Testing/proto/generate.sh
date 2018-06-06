#!/bin/bash

# Run this script whenever changes are made to tester.proto to regenerate the
# PHP protobuf message classes.

protoc --php_out ../ Google/Ads/GoogleAds/Util/Testing/tester.proto
cp -r ../GPBMetadata/* ../metadata/
rm -r ../GPBMetadata
