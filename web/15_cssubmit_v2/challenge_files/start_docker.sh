#!/bin/bash

docker build -t cssubmit-v2 . && \
docker run -it -p 1337:1337 --rm --name cssubmit-v2-container cssubmit-v2
