1. Клонируйте репозиторий
2. Скопируйте файл .env.example в .env
3. Установите зависимости

`composer install --ignore-platform-reqs --no-scripts
`
4. Выполните:

`./vendor/bin/sail up -d`


5. Накатите миграции:

`./vendor/bin/sail php artisan migrate`
6. Загрузите начальные данные:

`./vendor/bin/sail php artisan db:seed`
7. Создайте символическую ссылку на хранилище:

`./vendor/bin/sail php artisan storage:link`

8. сгенерируйте ключ:

`./vendor/bin/sail php artisan key:generate`
8. Установите модули node:

`./vendor/bin/sail npm install`

8. Выполните:

`./vendor/bin/sail npm run dev`
