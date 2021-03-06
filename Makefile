# vim: ts=4:sw=4:noexpandtab!:

PROJECT_BASEDIR = `if [ -d ../../../vendor ]; then echo $$(cd ../../../ && pwd); else echo $$(pwd); fi`

help:
	@echo "Project base directory is: $(PROJECT_BASEDIR)"
	@echo "---------------------------------------------"
	@echo "List of available targets:"
	@echo "  install - Installs composer and all dependencies."
	@echo "  update - Updates composer and all dependencies."
	@echo "  test - Runs all test suites and publishes an code coverage report in xml and html."
	@echo "  help - Shows this dialog."
	@exit 0

install: install-deps

install-deps: install-composer
	@php -d date.timezone="Europe/Berlin" ./bin/composer.phar -- install

install-composer:
	@if [ ! -d ./bin ]; then mkdir bin; fi
	@if [ ! -f ./bin/composer.phar ]; then curl -s http://getcomposer.org/installer | php -d date.timezone="Europe/Berlin" -- --install-dir=./bin/; fi

update: update-composer update-deps

update-deps: update-composer
	@php -d date.timezone="Europe/Berlin" ./bin/composer.phar -- update

update-composer: install-composer
	@php -d date.timezone="Europe/Berlin" ./bin/composer.phar -- self-update

test:
	@if [ ! -d ./test/reports ]; then mkdir ./test/reports; fi
	@$(PROJECT_BASEDIR)/vendor/bin/phpunit -c ./test/phpunit.xml

.PHONY: test help install update
