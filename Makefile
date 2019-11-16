.PHONY: test

COMPOSE_PROJECT_NAME=cookbook_app

COMPOSE_FILE?=docker-compose.yml

COMPOSE=docker-compose -f $(COMPOSE_FILE)

build:
	$(COMPOSE) build

up:
	$(COMPOSE) pull
	$(COMPOSE) up -d

down:
	$(COMPOSE) down

clean:
	$(COMPOSE) kill
	$(COMPOSE) rm --force

shell:
	docker exec -it $(COMPOSE_PROJECT_NAME) sh

init: build up

logs:
	docker logs -f $(COMPOSE_PROJECT_NAME)

test:
	docker exec $(COMPOSE_PROJECT_NAME) vendor/bin/phpunit

ps:
	$(COMPOSE) ps