#!/usr/bin/env sh

image_name=${IMAGE_NAME:-"docker-repository.intern.neusta.de:18443/php/kata"}
image_tag=${IMAGE_TAG:-"8.2"}
architecture=$(arch)
image=${image_name}:${image_tag}

if [ "$architecture" = "arm64" ] || [ "$CI" = true ]; then
    docker buildx build \
        --platform linux/arm64/v8,linux/amd64 \
        --no-cache --pull \
        -t "${image}" \
        -t "${image_name}:latest" \
        --push .
else
    docker build --no-cache --pull -t "${image}" -t "${image_name}:latest" .
    docker push "${image}"
    docker push -t "${image_name}:latest"
fi
