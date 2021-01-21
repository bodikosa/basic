init: dc-up migrate fixtures

dc-up:
	cd config; sudo docker-compose up -d postgres php-fpm nginx

dc-down:
	cd config; sudo docker-compose down

bash:
	cd config; sudo docker-compose exec php-fpm sh

fixtures:
	cd config; sudo docker-compose exec php-fpm sh -c "cd backend; php bin/console doctrine:fixtures:load --no-interaction"

migrate:
	cd config; sudo docker-compose exec php-fpm sh -c "cd backend; php bin/console doctrine:migrations:migrate --no-interaction"
