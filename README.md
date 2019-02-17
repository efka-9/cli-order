## Task description
Create a command line (PHP CLI) app for ordering a meal. The order management should be
done via terminal. All the data needs to be persisted to an SQL database or a file.

Order format: <bold>email, meal, comment, date</bold>

Required features:
* Place an order
* Update an order
* Delete an order

#### Installation guide
1. cp .env.example .env
2. Add mysql connection credentials to .env file
3. Composer install
4. run php console.php migrate from your command line. This will create table in mysql database. 

#### How to start application
path/to/php console.php command:name

#### Possible commands
* php console.php migrate
* php console.php order:create
* php console.php order:list
* php console.php order:delete
* php console.php order:update
