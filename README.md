# Book Directory

Book Directory - введення каталогу книг.

## Розгортання

1. **Клонувати репозиторій:**

    ```bash
    git clone https://github.com/chk68/books-laravel.git
    ```

2. **Перейти в папку проекту:**

    ```bash
    cd project-name
    ```

3. **Встановити залежності:**

    ```bash
    Налаштувати composer, якщо налаштувань не було до цього.
    ```
    
4. **Перейти в папку проекту:**
    
    ```bash
    composer create-project laravel/laravel project-name
    	
    cd project-name

    composer require laravel/sail --dev
    	
    php artisan sail:install --devcontainer (базово 2,3,5,7)
    ```
 
5. **Створити файл налаштувань:**

    ```bash
    Налаштування .env:
    APP_SERVICE=web
    APP_PORT=50000 
    FORWARD_DB_PORT=50001
    FORWARD_REDIS_PORT=50002
    FORWARD_MEILISEARCH_PORT=50003
    FORWARD_MAILHOG_PORT=50004
    FORWARD_MAILHOG_DASHBOARD_PORT=50005
    VITE_PORT=50006	
    ```

6. **Створити alias:**

    ```bash
    alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
    ```

7. **Налаштування docker + container:**
 
    ```bash

     у файлі docker-compose.yml міняємо laravel.test на web

     у файлі .devcontainer/devcontainer.json змінюємо service: “project-name”

     sail up -d

    ```

8. **Налаштування sail**

    ```bash
    далі використовуємо всі команди laravel через sail і надалі так і запускаємо    через нього
    sail artisan key:generate
    sail artisan storage:link
    sail artisan migrate
    sail artisan db:seed
   ```



## Вимоги

- PHP 7.4 або новіший
- Laravel 10.x
- Composer
- MySQL


