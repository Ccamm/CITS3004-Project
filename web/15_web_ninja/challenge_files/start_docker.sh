#!/bin/bash

docker build -t web-ninja . && \
docker run -it -p 1337:1337 --rm --name web-ninja-container web-ninja
