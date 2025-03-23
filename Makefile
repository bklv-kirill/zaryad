install:
	docker compose up --build -d nginx
	docker compose exec -it php composer install
	docker compose exec -it php php artisan migrate --seed
	docker compose exec -it php php artisan key:generate
	docker compose run --rm npm install
	docker compose run --rm npm run build
	docker compose exec -it php php artisan cache:clear
	docker compose exec -it php php artisan optimize:clear

refresh:
	docker compose exec -it php php artisan migrate:refresh --seed

up:
	docker compose up --build -d nginx
	make build

down:
	make clear
	docker compose down

build:
	docker compose run --rm npm run build
	make clear

clear:
	docker compose exec -it php php artisan cache:clear
	docker compose exec -it php php artisan optimize:clear
