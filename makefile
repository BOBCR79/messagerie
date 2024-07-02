start:
	symfony server:start -d
	php bin/console tailwind:build --watch

stop:
	symfony server:stop