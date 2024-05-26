##Laravel Simple To-do List Application

I can provide you with a guide on how to install a Laravel project from a Git repository. Please follow the instructions below:

1. Clone the repository:
   ```
   git clone https://github.com/Sohelrana-dev/Todo-List-Laravel.git
   ```
   Change 'username' and 'repository' to the actual values of the repository that you want to clone.
   
2. Install Composer:
   If you don't have composer installed in your system then install composer from here: [https://getcomposer.org](https://getcomposer.org/)

7. Open the repository code editor andreate a copy of the .env file:
   ```
   cp .env.example .env
   ```
   This will create a new file named `.env` based on the example file.    
   
4. Go to .env file and past this :
   ```
   DB_CONNECTION=sqlite
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=C:\Users\SC\OneDrive\Desktop\Todo-List-Laravel-master\database\database.sqlite
   DB_USERNAME=null
   DB_PASSWORD=null
   ```

4. Go to .env file and change "DB_DATABASE" folder path on your device up to third bracket:
   ```
   DB_CONNECTION=sqlite
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=[C:\Users\SC\OneDrive\Desktop\Todo-List-Laravel-master\]database\database.sqlite
   DB_USERNAME=null
   DB_PASSWORD=null
   ```   

5. Go to the project directory:
   ```
   cd repository
   ```
   Now you should see the files and folders of your Laravel project in the terminal.

6. Install dependencies:
   ```
   composer install or composer update
   ```

8. Generate an application key:
   ```
   php artisan key:generate
   ```

9. Install Node.js dependencies:
   ```
   npm install
   ```
   This will install all the necessary Node.js libraries, including Tailwind CSS.

10. Compile assets:
   ```
   npm run dev
   ```
11. Run migrations:
   ```
   php artisan migrate
   ```
   This step may fail due to permission issues. If this is the case, you can run `php artisan migrate --pretend` to see the SQL statements that would be executed and manually execute them in your database client.

11. Start the server:
   ```
   php artisan serve
   ```
   This will start the development server at http://localhost:8000.

That's it! You have successfully installed a Laravel project from a Git repository. Let me know if you need any further assistance.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
