## Laravel Role Permission Template

Starter Laravel template with roles and permissions.

### Installation

Let's get started

1. Clone the repository
    ```
    git clone https://github.com/miftahfd/laravel-role-permission-template.git
    ```

2. Install dependencies
    ```
    cd role-permission-template
    composer install
    npm install
    npm run dev
    ```

3. Copy .env.example to .env
    ```
    cp .env.example .env
    ```

4. Generate key application
    ```
    php artisan key:generate
    ```

5. Configure your database in .env
    ```
    DB_CONNECTION=mysql
    DB_HOST=database_host
    DB_PORT=database_port
    DB_DATABASE=database_name
    DB_USERNAME=database_user
    DB_PASSWORD=database_password
    ```

6. Run migrations and initial seeder
    ```
    php artisan migrate:fresh --seed
    ```

7. Run web server
    ```
    php artisan serve
    ```