#!/bin/sh

CWD=$(pwd)

# Change to top directory
cd ../../"${0%/*}"


docker build -t registry.gitlab.com/strang3quark/simple_cv/site:latest -f ./deploy/docker/Dockerfile .