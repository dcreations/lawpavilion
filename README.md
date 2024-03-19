# lawpavilion Setup

How to Setup the Project:

Clone the repo for this project locally. ...

Navigate into the directory of the project.

Create a file named ".env" and copy the content of the file ".env.example" into it.

Create an empty database for the project

In the ".env" file, add the database information to allow Laravel connect to the database

Migrate the database using the command "php artisan migrate" on your command line. Optionally, you can import the sql file located in the "/database/export/" into your database created.

You can now run the project. Use "php artisan serve" on your localhost to start the server.

