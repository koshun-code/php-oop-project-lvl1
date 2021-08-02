test:
	composer exec --verbose phpunit tests

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src