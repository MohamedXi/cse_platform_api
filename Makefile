# HELP
# This will output the help for each task
.PHONY: help

help: ## This is the help task
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

.DEFAULT_GOAL := help

ifndef APP_ENV
	include .env
	# Determine if .env.local file exist
	ifneq ("$(wildcard .env.local)", "")
		include .env.local
	endif
endif

ifndef INSIDE_DOCKER_CONTAINER
	INSIDE_DOCKER_CONTAINER = 0
endif

HOST_UID := $(shell id -u)
HOST_GID := $(shell id -g)
PHP_USER := -u www-data
PROJECT_NAME := -p ${COMPOSE_PROJECT_NAME}
OPENSSL_BIN := $(shell which openssl)
INTERACTIVE := $(shell [ -t 0 ] && echo 1)
ERROR_ONLY_FOR_HOST = @printf "\033[33mThis command for host machine\033[39m\n"
ifneq ($(INTERACTIVE), 1)
	OPTION_T := -T
endif
ifeq ($(GITLAB_CI), 1)
	# Determine additional params for phpunit in order to generate coverage badge on GitLabCI side
	PHPUNIT_OPTIONS := --coverage-text --colors=never
endif

build: ## Build the development environment
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose -f docker-compose.yml build
else
	$(ERROR_ONLY_FOR_HOST)
endif

build-test: ## Build the test environment
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose -f docker-compose-test-ci.yml build
else
	$(ERROR_ONLY_FOR_HOST)
endif

build-staging: ## Build the staging environment
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose -f docker-compose-staging.yml build
else
	$(ERROR_ONLY_FOR_HOST)
endif

build-prod: ## Build the production environment
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose -f docker-compose-prod.yml build
else
	$(ERROR_ONLY_FOR_HOST)
endif

start: ## Start the development environment
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose -f docker-compose.yml $(PROJECT_NAME) up -d
else
	$(ERROR_ONLY_FOR_HOST)
endif

start-test: ## Start the test environment
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose -f docker-compose-test-ci.yml $(PROJECT_NAME) up -d
else
	$(ERROR_ONLY_FOR_HOST)
endif

start-staging: ## Start the staging environment
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose -f docker-compose-staging.yml $(PROJECT_NAME) up -d
else
	$(ERROR_ONLY_FOR_HOST)
endif

start-prod: ## Start the production environment
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose -f docker-compose-prod.yml $(PROJECT_NAME) up -d
else
	$(ERROR_ONLY_FOR_HOST)
endif

stop: ## Stop the development environment
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose -f docker-compose.yml $(PROJECT_NAME) stop
else
	$(ERROR_ONLY_FOR_HOST)
endif

stop-test: ## Stop the test environment
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose -f docker-compose-test-ci.yml $(PROJECT_NAME) stop
else
	$(ERROR_ONLY_FOR_HOST)
endif

stop-staging: ## Stop the staging environment
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose -f docker-compose-staging.yml $(PROJECT_NAME) stop
else
	$(ERROR_ONLY_FOR_HOST)
endif

stop-prod: ## Stop the production environment
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose -f docker-compose-prod.yml $(PROJECT_NAME) stop
else
	$(ERROR_ONLY_FOR_HOST)
endif

ps: ## Show the containers list of the development environment
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose -f docker-compose.yml ps

ps-test: ## Show the containers list for test environment
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose -f docker-compose-test-ci.yml ps

ps-staging: ## Show the containers list for staging environment
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose -f docker-compose-staging.yml ps

ps-prod: ## Show the containers list for production environment
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose -f docker-compose-prod.yml ps

down: ## Stop and remove all containers of the development environment
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose -f docker-compose.yml down -v
else
	$(ERROR_ONLY_FOR_HOST)
endif

down-v: ## Stop and remove all containers with volumes of the development environment
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose -f docker-compose.yml down -v
else
	$(ERROR_ONLY_FOR_HOST)
endif

down-test: ## Stop and remove all containers of the test environment
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose -f docker-compose-test-ci.yml down -v
else
	$(ERROR_ONLY_FOR_HOST)
endif

down-v-test: ## Stop and remove all containers with volumes of the test environment
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose -f docker-compose-test-ci.yml down -v
else
	$(ERROR_ONLY_FOR_HOST)
endif

down-staging: ## Stop and remove all containers of the staging environment
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose -f docker-compose-staging.yml down -v
else
	$(ERROR_ONLY_FOR_HOST)
endif

down-v-staging: ## Stop and remove all containers with volumes of the staging environment
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose -f docker-compose-staging.yml down -v
else
	$(ERROR_ONLY_FOR_HOST)
endif

down-prod: ## Stop and remove all containers of the production environment
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose -f docker-compose-prod.yml down -v
else
	$(ERROR_ONLY_FOR_HOST)
endif

restart: ## Restart the development environment
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose -f docker-compose.yml $(PROJECT_NAME) restart
else
	$(ERROR_ONLY_FOR_HOST)
endif

restart-test: ## Restart the test environment
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose -f docker-compose-test-ci.yml $(PROJECT_NAME) restart
else
	$(ERROR_ONLY_FOR_HOST)
endif

restart-staging: ## Restart the staging environment
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose -f docker-compose-staging.yml $(PROJECT_NAME) restart
else
	$(ERROR_ONLY_FOR_HOST)
endif

restart-prod: ## Restart the production environment
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose -f docker-compose-prod.yml $(PROJECT_NAME) restart
else
	$(ERROR_ONLY_FOR_HOST)
endif

env-prod: ## Show the environment variables for the production environment
	@make exec cmd="composer dump-env prod"

env-staging: ## Show the environment variables for the staging environment
	@make exec cmd="composer dump-env staging"

ssh: ## SSH to the development environment
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose $(PROJECT_NAME) exec $(OPTION_T) $(PHP_USER) symfony bash
else
	$(ERROR_ONLY_FOR_HOST)
endif

ssh-root: ## SSH to the development environment as root
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose $(PROJECT_NAME) exec $(OPTION_T) symfony bash
else
	$(ERROR_ONLY_FOR_HOST)
endif

ssh-nginx: ## SSH to the nginx container
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose $(PROJECT_NAME) exec nginx /bin/sh
else
	$(ERROR_ONLY_FOR_HOST)
endif

ssh-supervisord: ## SSH to the supervisord container
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose $(PROJECT_NAME) exec supervisord bash
else
	$(ERROR_ONLY_FOR_HOST)
endif

ssh-mysql: ## SSH to the mysql container
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose $(PROJECT_NAME) exec mysql bash
else
	$(ERROR_ONLY_FOR_HOST)
endif

exec: ## Execute a command in the development environment
ifeq ($(INSIDE_DOCKER_CONTAINER), 1)
	@$$cmd
else
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose $(PROJECT_NAME) exec $(OPTION_T) $(PHP_USER) symfony $$cmd
endif

exec-bash:
ifeq ($(INSIDE_DOCKER_CONTAINER), 1)
	@bash -c "$(cmd)"
else
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose $(PROJECT_NAME) exec $(OPTION_T) $(PHP_USER) symfony bash -c "$(cmd)"
endif

exec-by-root: ## Execute a command in the development environment as root
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker-compose $(PROJECT_NAME) exec $(OPTION_T) symfony $$cmd
else
	$(ERROR_ONLY_FOR_HOST)
endif

composer-install-no-dev: ## Install the dependencies without dev dependencies
	@make exec-bash cmd="COMPOSER_MEMORY_LIMIT=-1 composer install --optimize-autoloader --no-dev"

composer-install: ## Install the dependencies
	@make exec-bash cmd="COMPOSER_MEMORY_LIMIT=-1 composer install --optimize-autoloader"

composer-update: ## Update the dependencies
	@make exec-bash cmd="COMPOSER_MEMORY_LIMIT=-1 composer update"

info: ## Show the project information
	@make exec cmd="php --version"
	@make exec-bash cmd="php bin/console about"

logs: ## Show the logs Symfony
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@docker logs -f ${COMPOSE_PROJECT_NAME}_symfony
else
	$(ERROR_ONLY_FOR_HOST)
endif

logs-nginx: ## Show the logs nginx
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@docker logs -f ${COMPOSE_PROJECT_NAME}_nginx
else
	$(ERROR_ONLY_FOR_HOST)
endif

logs-mysql: ## Show the logs mysql
ifeq ($(INSIDE_DOCKER_CONTAINER), 0)
	@docker logs -f ${COMPOSE_PROJECT_NAME}_mysql
else
	$(ERROR_ONLY_FOR_HOST)
endif

drop-migrate: ## Drop and migrate the database
	@make exec cmd="php bin/console doctrine:schema:drop --full-database --force"
	@make exec cmd="php bin/console doctrine:schema:drop --full-database --force --env=test"
	@make migrate

migrate-no-test: ## Migrate the database without the test environment
	@make exec cmd="php bin/console doctrine:migrations:migrate --no-interaction --all-or-nothing"

migrate: ## Migrate the database
	@make exec cmd="php bin/console doctrine:migrations:migrate --no-interaction --all-or-nothing"
	@make exec cmd="php bin/console doctrine:migrations:migrate --no-interaction --all-or-nothing --env=test"

fixtures: ## Load the fixtures
	@make exec cmd="php bin/console doctrine:fixtures:load --env=test"

phpcs: ## Runs PHP CodeSniffer
	@make exec-bash cmd="./vendor/bin/phpcs --version && ./vendor/bin/phpcs --standard=PSR12 --colors -p src tests"

ecs: ## Runs Easy Coding Standard
	@make exec-bash cmd="./vendor/bin/ecs --version && ./vendor/bin/ecs --clear-cache check src tests"

ecs-fix: ## Run The Easy Coding Standard to fix issues
	@make exec-bash cmd="./vendor/bin/ecs --version && ./vendor/bin/ecs --clear-cache --fix check src tests"

phpmetrics: ## Runs phpmetrics
ifeq ($(INSIDE_DOCKER_CONTAINER), 1)
	@mkdir -p reports/phpmetrics
	@if [ ! -f reports/junit.xml ] ; then \
		printf "\033[32;49mjunit.xml not found, running tests...\033[39m\n" ; \
		./vendor/bin/phpunit -c phpunit.xml.dist --coverage-html reports/coverage --coverage-clover reports/clover.xml --log-junit reports/junit.xml ; \
	fi;
	@echo "\033[32mRunning PhpMetrics\033[39m"
	@php ./vendor/bin/phpmetrics --version
	@php ./vendor/bin/phpmetrics --junit=reports/junit.xml --report-html=reports/phpmetrics .
else
	@make exec-by-root cmd="make phpmetrics"
endif

phpcpd: ## Runs php copy/paste detector
	@make exec cmd="php phpcpd.phar --fuzzy src tests"

phpmd: ## Runs php mess detector
	@make exec cmd="php ./vendor/bin/phpmd src text phpmd_ruleset.xml --suffixes php"

phpstan: ## Runs PHPStan static analysis tool
ifeq ($(INSIDE_DOCKER_CONTAINER), 1)
	@echo "\033[32mRunning PHPStan - PHP Static Analysis Tool\033[39m"
	@bin/console cache:clear --env=test
	@./vendor/bin/phpstan --version
	@./vendor/bin/phpstan analyze src tests
else
	@make exec cmd="make phpstan"
endif

phpinsights: ## Runs Php Insights PHP quality checks
ifeq ($(INSIDE_DOCKER_CONTAINER), 1)
	@echo "\033[32mRunning PHP Insights\033[39m"
	@php -d error_reporting=0 ./vendor/bin/phpinsights analyse --no-interaction --min-quality=100 --min-complexity=84 --min-architecture=100 --min-style=100
else
	@make exec cmd="make phpinsights"
endif
