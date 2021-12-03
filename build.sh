#!/usr/bin/env sh

image_tag=${IMAGE_TAG:-"8.1"}
architecture=$(arch)
image=docker-repository.intern.neusta.de:18443/php/kata:${image_tag}

if [ "$architecture" = "arm64" ] || [ "$CI" = true ]; then
    docker buildx build \
        --platform linux/arm64/v8,linux/amd64 \
        --no-cache --pull \
        -t "${image}" \
        --push .
else
    docker build --no-cache --pull -t "${image}" .
    docker push "${image}"
fi
