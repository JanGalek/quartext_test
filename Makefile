.PHONY: build start stop restart

build:
	chmod -R 777 ./temp ./log && docker compose up --build

start:
	docker compose up -d

stop:
	docker compose stop

restart:
	docker compose stop && docker compose up -d