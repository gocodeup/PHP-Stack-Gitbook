# Query the DB

We can use the PDO API to construct and execute queries on our database.

## Using PDO to Execute Queries

The two simplest ways to run queries are [`$dbc->exec()`](http://www.php.net/manual/en/pdo.exec.php) and [`$db->query()`](http://www.php.net/manual/en/pdo.query.php).  The difference between these two methods are what they return; we will use `$dbc->query()` in a later lesson.

The method `$dbc->exec()` will return the number of rows affected by a query.  Because of this, we will typically use this method for `INSERT`, `UPDATE`, or `DELETE` queries, although we can use it to run any query we want.

In our last exercise we created a new database named `codeup_pdo_test_db`.  If we wanted to add a new table to this database using PDO, we could connect to the database and then execute a new query.

In this example, we will add a users table that will hold user information.

~~~php
// Get new instance of PDO object
$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_pdo_test_db', 'codeup', 'password');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Create the query and assign to var
$query = 'CREATE TABLE users (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    email VARCHAR(240) NOT NULL,
    name VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
)';

// Run query, if there are errors they will be thrown as PDOExceptions
$dbc->exec($query);
~~~

In the beginning of this script, we are using PDO to connect to the `codeup_pdo_test_db` database.  Next, we create our query as a string and assign it to `$query`.  While we could simply pass the query directly into `$pdo->exec()`, it is much cleaner to assign it to a variable first.

Next, we use `$dbc->exec($query)` to execute the `$query`.  If that query fails, PDO will throw a `PDOException` letting us know something went wrong.

Now, if we check our MySQL server, we can see that the `users` table exists in our database.

    mysql> USE codeup_pdo_test_db;
    Database changed
    mysql> SHOW TABLES;
    +------------------------------+
    | Tables_in_codeup_pdo_test_db |
    +------------------------------+
    | users                        |
    +------------------------------+
    1 row in set (0.00 sec)

This table is empty. To add a user we can also use the `$dbc->exec()` method.

~~~php
// Create INSERT query
$query = "INSERT INTO users (email, name) VALUES ('ben@codeup.com', 'Ben Batschelet')";

// Execute Query
$numRows = $dbc->exec($query);
echo "Inserted $numRows row." . PHP_EOL;
~~~

Like above, we created a new variable with the query as a string and passed the variable to the `exec()` method.

We can use the `exec()` method to pass any valid MySQL statement, including `INSERT`, `UPDATE`, and `DELETE`.  When using one of these queries, `exec()` will return the number of rows affected, so we expect the above code to output `Inserted 1 row.`  The `exec()` method doesn't work well for `SELECT` queries, so for now we can use the MySQL client to check that our row was inserted.

    mysql> SELECT * FROM users;
    +----+----------------+----------------+
    | id | email          | name           |
    +----+----------------+----------------+
    |  1 | ben@codeup.com | Ben Batschelet |
    +----+----------------+----------------+
    1 row in set (0.00 sec)

Here, we see our row was added successfully, and the `id` column auto-incremented as expected.

### Last Insert ID

Often times when we insert new records into the database, we want to know what ID MySQL assigned to that record. In order to do so, we use the `lastInsertId()` method. This method will return the auto-generated ID of the previous insert command. We will use this function in particular when constructing relations between records.

If we wanted to insert multiple rows and get the ID for them, we can use an `array` and a `foreach` loop:

~~~php
$users = [
    ['email' => 'jason@codeup.com',   'name' => 'Jason Straughan'],
    ['email' => 'chris@codeup.com',   'name' => 'Chris Turner'],
    ['email' => 'michael@codeup.com', 'name' => 'Michael Girdley']
];

foreach ($users as $user) {
    $query = "INSERT INTO users (email, name) VALUES ('{$user['email']}', '{$user['name']}')";

    $dbc->exec($query);

    echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
}
~~~

As output we would expect to see:

    Inserted ID: 2
    Inserted ID: 3
    Inserted ID: 4

After executing this code, we can view our table again and see the results:

    mysql> SELECT * FROM users;
    +----+--------------------+-----------------+
    | id | email              | name            |
    +----+--------------------+-----------------+
    |  1 | ben@codeup.com     | Ben Batschelet  |
    |  2 | jason@codeup.com   | Jason Straughan |
    |  3 | chris@codeup.com   | Chris Turner    |
    |  4 | michael@codeup.com | Michael Girdley |
    +----+--------------------+-----------------+
    4 rows in set (0.00 sec)

## Exercises

For these exercises, we will be creating a database that contains national parks from this page on [WikiPedia](http://en.wikipedia.org/wiki/List_of_national_parks_of_the_United_States)

1. Use Sequel Pro to:

  - Create a new database called `parks_db`.

  - Create a new user called `parks_user`.

  - Grant that user full control over the `parks_db`.

  - *Hint: All of the above can be done using a single `ansible` command.*

1. Do all of the following inside of `~/vagrant-lamp/sites/codeup.dev`. After each step, commit and push your changes to GitHub.

1. Create a new file called `park_migration.php`. In that file:

  - Set up the connection parameters for `parks_db` and `parks_user`.

  - Require `db_connect.php`

  - Use `exec()` to delete a table named `national_parks` using `DROP TABLE IF EXISTS`.

  - After the `DROP TABLE` command, add another `exec()` to create the table `national_parks` with the following fields:
    - id (primary key, auto increment)

    - name

    - location

    - date_established (date)

    - area_in_acres (double)

  - Run this file using `php park_migration.php`.

1. Create a new file called `park_seeder.php`. In that file use PDO to connect to your `parks_db`. First, add a query to delete all the records from `national_parks`. Next, insert information for ten different national parks into your new `national_parks` table. Run it in the same manner as the `park_seeder.php` script. *Hint: An array of data may be useful here.*
