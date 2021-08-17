#!/bin/bash

docker build -t cssubmit-v2-1005 . && \
docker run -it -p 1005:1005 --rm --name cssubmit-v2-container cssubmit-v2-1005
