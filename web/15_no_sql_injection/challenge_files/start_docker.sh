#!/bin/bash

docker build -t no-sql-injection . && \
docker run -it -p 1337:1337 --rm --name no-sql-injection-container no-sql-injection
