## Installation
1. Download .zip file.
2. Open phpMyAdmin and create new database named `blog`. You can change this name but don't forget to change the database name in `.env` file.
3. Go to Docs directory, there is a file named blog.sql.
4. Import `blog.sql` file in your database(the database you've created in the step 2).([How to import MySQL database and tables using phpMyAdmin? .
5. Open the project using any code editor and run `php artisan serve` in the terminal.
6. Open localhost:8000.
7. You need to login as a superadmin. Go to `localhost:8000/login` and login using this informations:
    E-mail: admin@example.com
    Password: 123456.
8. Now, there are three articles and three users and three categories in the database, run `php artisan migrate:refresh` in the terminal to refresh your database.


