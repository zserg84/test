# build.sh

# Путь к корню вашего проекта
PROJ_ROOT=/home/sz/www/test

# Строим образ контейнера приложения
docker build -t alg-test-app-image -f "Dockerfile-app" "$PROJ_ROOT"

# Строим образ контейнера БД
docker build -t alg-test-db-image -f "Dockerfile-db" "$PROJ_ROOT"