#!/bin/bash

# Run this script whenever changes are made to tester.proto to regenerate the
# PHP protobuf message classes.

rm -r ../Google/Ads/GoogleAds/Util/FieldMasks/Proto
rm -r ../metadata
protoc --php_out ../ Google/Ads/GoogleAds/Util/FieldMasks/Proto/tester.proto --experimental_allow_proto3_optional
mv ../GPBMetadata ../metadata
