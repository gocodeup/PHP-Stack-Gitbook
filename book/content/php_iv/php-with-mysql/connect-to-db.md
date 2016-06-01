# Connect to MySQL

We can use PHP to connect to a MySQL server.  Database driven web applications are commonly built using this combination of the LAMP stack.

## Using PDO

We will be using the [PHP Data Object (PDO)](http://www.php.net/manual/en/intro.pdo.php) extension to connect to our database.  PHP has other extensions for connecting to MySQL; however the original MySQL API has been deprecated&mdash;the replacement, MySQL Improved (MySQLi), is still under active development.  PDO is generally preferred as it is more flexible and feature rich.

### Connecting to MySQL via PDO

We connect to our MySQL database using PDO by creating a new `PDO` object.  This object will serve as our connection to the database.

~~~php
// Get new instance of PDO object
$dbc = new PDO('mysql:host=127.0.0.1;dbname=database_name', 'USERNAME', 'PASSWORD');
~~~

Here we are creating a new instance of the `PDO` object. The first parameter is called the Data Source Name (DSN) and tells PDO what kind of database we are connecting to and where it is.  The first portion, `mysql:`, defines what kind of database we are using.  After that is a series of key value pairs separated by `;`. The first, `host=127.0.0.1`, is the IP address of the MySQL server. After that, `dbname=database_name` is an optional parameter that would be the equivalent of running `USE database_name;` in MySQL immediately after connecting.  The final two parameters we pass to `PDO` are the username and password for connecting to MySQL.

We can expand on this to make sure we get more useful errors back from PDO.

~~~php
// Get new instance of PDO object
$dbc = new PDO('mysql:host=127.0.0.1;dbname=database_name', 'USERNAME', 'PASSWORD');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
~~~

PDO can do various things if it encounters an error.  We want to make sure that if there are any problems they are sent back to us in a manner we can work with, so we instruct PDO to throw an exception on error.  This way, when an error occurs PDO will throw a `PDOException` instance and we can catch it and give back a friendly error message to our user.

We can update our script to use real credentials and connect to our `employees` database.

~~~php
// Get new instance of PDO object
$dbc = new PDO('mysql:host=127.0.0.1;dbname=employees', 'codeup', 'password');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";
~~~

Running this script with good user credentials will result in this output:

    127.0.0.1 via TCP/IP

## Exercises

1. Do all the following inside your `~/vagrant-lamp/sites/codeup.dev` directory. Commit all changes to GitHub.

1. Create a new file named `db_connect.php`. In that file you will:

   - Create a `PDO` instance and assign it to the variable `$dbc`.

   - Make sure that instance will use exceptions rather than failing silently.

   - Configure your connection to point to the `employees` database.

1. Create a second file called `pdo_test.php`. This file will:

  - Use `require` to include `db_connect.php`.

  - Echo the PDO connection status

1. Test your connection by running `php pdo_test.php` from the command line.

1. Update your `db_connect.php`. Rather than having the connection parameters hard coded, use the following constants:

  - `DB_HOST` &mdash; The IP address to connect to

  - `DB_NAME` &mdash; The database to connect to

  - `DB_USER` &mdash; The MySQL user to use

  - `DB_PASS` &mdash; Password for the MySQL user

1. Update `pdo_test.php` to define your constants before requiring `db_connect.php`. Your connection should still point to the `employees` database. Test your changes from the command line.
