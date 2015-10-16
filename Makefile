#!/usr/bin/make -f

.PHONY: force-update lint

all: vendor/autoload.php
	vendor/bin/bench run -i src/common.php src

lint:
	find src -name '*.php' -exec php -l {} \;

check: lint

composer.phar:
	curl -sS https://getcomposer.org/installer | php

vendor/autoload.php: composer.lock
	./composer.phar dumpautoload

composer.lock: composer.json composer.phar
	./composer.phar update

update: composer.phar
	./composer.phar install

force-update: composer.phar
	./composer.phar selfupdate
	./composer.phar update
