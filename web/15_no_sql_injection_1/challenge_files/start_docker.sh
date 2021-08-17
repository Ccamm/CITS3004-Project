#!/bin/bash

docker build -t no-sql-injection-1007 . && \
docker run -it -p 1007:1007 --rm --name no-sql-injection-container no-sql-injection-1007
