.PHONY: coverage cs infection it stan test

it: cs stan test

coverage: vendor
	vendor/bin/phpunit --configuration=test/Integration/phpunit.xml --coverage-text

cs: vendor
	vendor/bin/php-cs-fixer fix --config=.php_cs --diff --verbose

infection: vendor
	vendor/bin/infection --min-covered-msi=77 --min-msi=77

stan: vendor
	vendor/bin/phpstan analyse --configuration=phpstan.neon --level=max src

test: vendor
	vendor/bin/phpunit --configuration=test/AutoReview/phpunit.xml
	vendor/bin/phpunit --configuration=test/Integration/phpunit.xml

vendor: composer.json composer.lock
	composer self-update
	composer validate
	composer install
	composer normalize
