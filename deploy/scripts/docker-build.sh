#!/bin/sh

CWD=$(pwd)
VERSION=$(date +"%Y%m%d")

# Change to top directory
cd ../../"${0%/*}"


docker build -t registry.gitlab.com/strang3quark/simple_cv/site:$VERSION -f ./deploy/docker/Dockerfile .

docker push registry.gitlab.com/strang3quark/simple_cv/site:$VERSION
