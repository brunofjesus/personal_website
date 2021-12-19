#!/bin/bash
set -euo pipefail

CWD=$(pwd)

# shellcheck disable=SC2164
cd "${0%/*}" # go to script dir

# shellcheck disable=SC2164
cd ../helm/simple-cv

helm dependency update

helm upgrade --install simple-cv . \
 --atomic \
 --namespace "simple-cv-${NAMESPACE}" \
 --create-namespace \
 --set host="${HOST}" \
 --set protocol="${PROTOCOL}" \
 --set ingress.hosts[0].host="${HOST}" \
 --set ingress.tls[0].secretName="simple-cv-${NAMESPACE}-ssl" \
 --set ingress.tls[0].hosts[0]="${HOST}" \
 --values values.yaml

cd $CWD