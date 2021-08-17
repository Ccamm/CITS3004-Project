#!/bin/bash

docker build -t unfair-game-1001 . && \
docker run -it -p 1001:1001 --rm --name unfair-game-container unfair-game-1001
