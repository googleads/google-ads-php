## Conformance Test Protobuf Definition

This directory contains the `tester.proto` file, which defines the message
types used for running conformance tests for the FieldMasks class. It also
contains `generate.sh`, which is used to execute the protobuf compiler
(`protoc`) to generate PHP classes for the messages defined in `tester.proto`
To run this script, you need to install `protoc` via
[these instructions](https://github.com/google/protobuf#protocol-compiler-installation).

The `generate.sh` script should be invoked whenever a change is made to the
`tester.proto` file, and the generated PHP classes need to be updated.
