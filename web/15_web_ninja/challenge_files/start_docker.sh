#!/bin/bash

docker build -t web-ninja-1008 . && \
docker run -it -p 1008:1008 --rm --name web-ninja-container web-ninja-1008
