#!/usr/bin/env bash

set -euo pipefail
IFS=$'\n\t'

if which docker &> /dev/null; then
   docker build -t faecie/bouquets:latest . &>/dev/null && \
   docker run -it --rm faecie/bouquets:latest && \
   docker rmi faecie/bouquets:latest --force &>/dev/null ; \
else echo "This helper command needs a Docker to run this program. Please install docker and try again https://docs.docker.com/get-started/#download-and-install-docker-desktop" ; \
fi
