#!/bin/bash

DOCKER_APP_CONTAINER="petstore-swagger-app"

docker compose -f docker-compose.local.yml -p petstore-swagger up -d

docker exec $DOCKER_APP_CONTAINER composer install

docker exec $DOCKER_APP_CONTAINER ./up.sh

docker exec $DOCKER_APP_CONTAINER php artisan clear
docker exec $DOCKER_APP_CONTAINER php artisan key:generate