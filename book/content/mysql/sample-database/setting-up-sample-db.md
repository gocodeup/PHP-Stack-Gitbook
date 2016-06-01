# Sample Database

We will be using a sample database of employees that is provided by Oracle, the current owners of MySQL.  This database contains fictitious data, but it has been structured to allow us to perform queries that utilize all of the database actions we will need to know.

## Using Sample Database

### Installation

1. To download the sample database click [https://launchpad.net/test-db/employees-db-1/1.0.6/+download/employees_db-full-1.0.6.tar.bz2](https://launchpad.net/test-db/employees-db-1/1.0.6/+download/employees_db-full-1.0.6.tar.bz2) and save to your `Downloads` directory.

1. Open your terminal and change directory to your `vagrant-lamp` directory.

1. Untar the database using this command: `tar -xjf $HOME/Downloads/employees_db-full-1.0.6.tar.bz2`.

1. SSH into your vagrant box and `cd /vagrant`

1. Change directory to `employees_db` using `cd employees_db`.

1. Import the database to MySQL using this command `mysql -u USERNAME -p -t < employees.sql`.  Enter your password when prompted.

### Purpose

This database contains several related tables that we can use to form queries to test our knowledge and try new things.  Having a database with many tables, records, and relationships allows us to see how a more mature database may look in the wild.

## Exercises

1. Login to MySQL using your username and password.

1. Verify the `employees` database is present by showing all databases.

1. Use the new `employees` database.

1. Show all the tables in the database.  The result should look like this:

    ~~~
    +---------------------+
    | Tables_in_employees |
    +---------------------+
    | departments         |
    | dept_emp            |
    | dept_manager        |
    | employees           |
    | salaries            |
    | titles              |
    +---------------------+
    ~~~

1. Select all from the employees tables.   You should see 300,024 results returned.
