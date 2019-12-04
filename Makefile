up: docker-up
down: docker-down
build: docker-build

unit: docker-unit-tests



### Docker init
docker-up:
	docker-compose up -d
docker-down:
	docker-compose down --remove-orphans
docker-build:
	docker-compose build

### Run unit tests
docker-unit-tests:
	docker-compose run --rm task-php-fpm php bin/phpunit

### Build css, js resources
yarn-compile:
	yarn encore dev
yarn-watch:
	yarn encore dev --watch


### docker-compose run --rm task-php-fpm