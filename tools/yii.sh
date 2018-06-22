#!/usr/bin/env bash

docker-compose exec --user www-data app sh -c  "cd /app && php yii $*"