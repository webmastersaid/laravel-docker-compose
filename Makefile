dc_up:
	docker-compose up -d
stop:
	docker-compose stop
start:
	docker-compose start
down:
	docker-compose down
sh:
	docker exec -it laravel-docker-compose-laravel.test-1 sh