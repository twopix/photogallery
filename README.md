# photogallery

### Требования
* PHP >= 5.5.9
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension
* MYSQL

### Установка

1. Клонируем репозиторий: **_git clone https://github.com/twopix/photogallery.git photogallery_**
2. Переходим в папку с репозиторием: **_cd photogallery_**
3. Устанавливаем зависимости (composer должен быть установлен, либо скачайте его с [официального сайта](https://getcomposer.org/): **_composer install_**
4. Переименовываем файл **_.env.example_** в **_.env_** и настриваем подключение к базе данных, как показано на *примере* ниже:

```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=photogallery
DB_USERNAME=username
DB_PASSWORD=password
```

5. Создаем базу данных в MySQL с названием аналогичным в *DB_DATABASE*
6. Заполняем базу данных таблицами: **_php artisan migrate_**
7. Генерируем ключ для laravel: **_ php artisan key:generate_**

На этом установка будет успешно завершена. Для тестирования работоспособности проекта Вы можете запустить 
локальный сервер: **_php -S localhost:8888 -t public_**.


### Инструкция по сборщику
1. npm i gulpjs/gulp-cli -g  // устанавливаем последний gulp глобально
2. npm i // устанавливаем зависимости
3. отредактировать в файле gulp/config.js пути
4. запуск команды "gulp"