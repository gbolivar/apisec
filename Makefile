#!/bin/bash

UID = $(shell id -u)
MH_BA = apisec-web-ba
MH_PROXY = apisec-web-proxy
MH_DB = apisec-web-db
MH_RD = apisec-web-rd
DOCKER-COMPOSE-COMMAND := docker compose

help: ## Show this help message
	@echo 'usage: make [target]'
	@echo
	@echo 'targets:'
	@egrep '^(.+)\:\ ##\ (.+)' ${MAKEFILE_LIST} | column -t -c 2 -s ':#'

start: ## Start the containers
	@docker compose up -d

stop: ## Stop the containers
	@docker compose stop

down: ## Stop the containers
	@docker compose down --volumes --rmi all

restart: ## Restart the containers
	$(MAKE) stop && $(MAKE) start

build: ## Rebuilds all the containers
	@docker compose build

migrate: ## Runs backend commands
	@docker exec ${MH_BA} php artisan migrate:fresh --seed

app-run: ## Installs composer dependencies
	@docker exec ${MH_BA} composer install --no-interaction
	@docker exec ${MH_BA} php artisan jwt:secret
	@docker exec ${MH_BA} php artisan key:generate
	@docker exec ${MH_BA} chown -R :81 storage/app
	@docker exec ${MH_BA} chmod -R 775 storage/app
	$(MAKE) migrate

app-test: ## Runs backend tests
	@docker exec ${MH_BA} php artisan test
	@docker exec ${MH_BA} vendor/bin/phpunit

logs: ## Rebuilds all the containers
	@docker compose logs -f

ssh-ba: ## bash into the backend container
	@docker exec -it ${MH_BA} bash

ssh-proxy: ## bash into the proxy container
	@docker exec -it ${MH_PROXY} bash

ssh-db: ## bash into the db container
	@docker exec -it ${MH_DB} bash

ssh-rd: ## bash into the redis container
	@docker exec -it ${MH_RD} bash