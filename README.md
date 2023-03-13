1. Клонируйте репозиторий
2. Запустите докер и выполните:

`./vendor/bin/sail docker-compose up -d`

3. Установите зависимости:

`./vendor/bin/sail composer install`
4. Накатите миграции:

`./vendor/bin/sail php artisan migrate`
5. Загрузите начальные данные:

`./vendor/bin/sail php artisan db:seed`
6. Создайте символическую ссылку на хранилище:

`./vendor/bin/sail php artisan storage:link`
7. Установите модули node:

`./vendor/bin/sail npm install`

8. Выполните:

`./vendor/bin/sail npm run dev`
