#!/bin/bash

docker build -t i-want-to-join-working-1003 . && \
docker run -it -p 1003:1003 --rm --name i-want-to-join-container i-want-to-join-working-1003
