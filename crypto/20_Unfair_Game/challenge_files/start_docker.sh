#!/bin/bash

docker build -t unfair-game . && \
docker run -it -p 1337:1337 --rm --name unfair-game-container unfair-game
