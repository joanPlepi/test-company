## Test application in Laravel 5.3

The application uses Laravel 5.3 to create a web page of a test company to have access on its employees. 
As environment to execute the programm I have used XAMPP which provides both the Apache server and Mysql database.
The administrator has full rights in the webpage. Below are some of the functions he can do:
1. View and edit his profile.
2. View,add, edit and remove employee. 
3. View,add, edit and remove departments. 

I use datatables and pagination to organize the view of the employees.

A simple user can only:
1. View and edit his profile. 

A user cannot access URL links in which must have access only the administrator. 
For example a user cannot access http://127.0.0.1:8000/add/worker. 

## Running: 
php artisan serve 
To load the database with the specifications in .env file, that first it is needed to create an empty database with name test. If a database is created with a different name in the .env should change DB_DATABASE=different name.  
After that the following commands should be runned:
- `php artisan migrate` 
- `php db:seed`

To log in as administrator: 
- Username: `admin@example.com`
- Password: `admin12`


