## Ручное развертывание
1. Создайте `.env` файл на основе `.env.example`;
2. Заполните `.env` файл;
3. Установите `composer` зависимости: `composer install`;
4. Выполните миграции базы данных: `php artisan migrate`;
5. Установите `npm` зависимости: `npm install`;
6. Выполните сборку `JS` и `CSS` файлов: `npm run build`;

## Ручное развертывание через Docker Compose
1. Создайте `.env` файл на основе `.env.example`;
2. Заполните `.env` файл;
   1. По желанию можете заменить переменную `APP_NAME` (она используется для именования Docker Compose контейнеров);
   2. Установите переменную `APP_URL`, включая порт NGINX'a из Docker Compose контейнера (например `http://localhost:8000`);
   3. Установите переменную `DB_DRIVER` в значение `mysql`;
   4. Раскомментируйте переменные `DB_*`;
   5. Установите переменную `DB_HOST` в соответствии с названием Docker Compose контейнера с базой данных (например `db`);
   6. По желанию можете заменить переменную `DB_DATABASE` (она используется для именования базы данных);
   7. Установите переменную `DB_PASSWORD` (например `zaryad`);
   8. Установите переменную `DB_ROOT_PASSWORD` (например `root`);
3. Запустите приложение: `docker compose up --build -d nginx`;
4. Установите `composer` зависимости: `docker compose exec -it php composer install`;
5. Выполните миграции базы данных: `docker compose exec -it php php artisan migrate`;
6. Выполните генерацию ключа приложения: `docker compose exec -it php php artisan key:generate`;
7. Установите `npm` зависимости: `docker compose run --rm npm install`;
8. Выполните сборку `JS` и `CSS` файлов: `docker compose run --rm npm run build`;

## Автоматическое развертывание (Makefile)
1. Выполните шаги 1 и 2 из раздела: `Ручное развертывание через Docker Compose`;
2. Запустите приложение: `make install`;

### Дополнительно
1. Запуск приложения через Docker Compose: `docker compose up --build -d nginx`;
2. Запуск приложения используя Makefile: `make up`;
3. Остановка приложения через Docker Compose: `docker compose down`;
4. Остановка приложения используя Makefile: `make down`;
5. Очистка временных файлов через Docker Compose: `docker compose exec -it php php artisan cache:clear && docker compose exec -it php php artisan optimize:clear`;
6. Очистка временных файлов использую Makefile: `make clear`;
7. Сборка `JS` и `CSS` файлов через Docker Compose: `docker compose run --rm npm run build`;
8. Сборка `JS` и `CSS` файлов используя Makefile: `make build`;
