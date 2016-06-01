# MySQL Databases

### Lesson Goals

- Understand how to create, show, use, and delete databases
- Understand application specific databases
- Understand how to use ansible to create a application specific user and database

-------------------------------------

The main organization structure of MySQL is a *database*. One MySQL server can have many different databases. In fact, our MySQL server came with three system databases already defined, one of which we have already been working with (`mysql`). Databases are where MySQL stores virtually all of its data (the notable exception being users & their privileges).

## Creating a Database

We can create a new database using the [`CREATE` command](http://dev.mysql.com/doc/refman/5.5/en/create-database.html).

```sql
CREATE DATABASE database_name;
```

Database names should be all lower case, with underscores used to separate words in their name. Often times we will end a database name with `_db`.

Sometimes we may be creating a database in an automated script. In this case, if we try to create a database that already exists MySQL will give us an error. We can avoid this problem by adding the condition `IF NOT EXISTS`. That way, if the database has already been created, the `CREATE` query will be skipped.

```sql
CREATE DATABASE IF NOT EXISTS database_name;
```

## Listing Databases

To see a list of the databases in the MySQL server we use [`SHOW DATABASES`](http://dev.mysql.com/doc/refman/5.5/en/show-databases.html)

```sql
SHOW DATABASES;
```

This gives us the following output:

    +--------------------+
    | Database           |
    +--------------------+
    | information_schema |
    | mysql              |
    | performance_schema |
    +--------------------+
    3 rows in set (0.00 sec)

## Selecting a Database

Since virtually all MySQL information is stored within a database, it can be convenient to switch to a particular database. Doing so ensures that your subsequent queries refer (by default) to tables and other objects within that database. The command to select a database is [`USE`](http://dev.mysql.com/doc/refman/5.5/en/use.html).

```sql
USE database_name;
```

### Referring to Other Databases

At times it may be necessary to refer to a table or object in a separate database. Or, if you have just connected to a MySQL, you may not have any database selected. To do this, you can use the syntax `database_name.table_name`. In fact, we have been using this style of query for a while now. Refer back to the previous lessons and notice that most of our queries refer to the `mysql` database (e.g. `mysq.user`). That is because we had not selected any database at that point.

## Showing Current Database

In order to determine what database you currently have selected you can use the following query:

```sql
SELECT database();
```

You should see the following output:

    +---------------+
    | database()    |
    +---------------+
    | database_name |
    +---------------+
    1 row in set (0.00 sec)

If the MySQL server responds with `NULL` as the database name, most likely you do not have any database selected.

## Inspecting a Database

You can actually find out the query used to create a database with the [`SHOW CREATE` query](http://dev.mysql.com/doc/refman/5.5/en/show-create-database.html):

```sql
SHOW CREATE DATABASE database_name;
```

The output for this command looks like the following:

    +---------------+------------------------------------------------------------------------+
    | Database      |         Create Database                                                |
    +---------------+------------------------------------------------------------------------+
    | database_name | CREATE DATABASE `database_name` /*!40100 DEFAULT CHARACTER SET utf8 */ |
    +---------------+------------------------------------------------------------------------+
    1 row in set (0.00 sec)

The query has given us the exact SQL command necessary to recreate the database. This could be useful if we were trying to export or duplicate our database on a different server. While this information may not look like much now, we will be using a nearly identical command when it comes to tables as well.

## Deleting a Database

To remove a database from MySQL, we use the [`DROP` command](http://dev.mysql.com/doc/refman/5.5/en/drop-database.html).

```sql
DROP DATABASE database_name;
```

Just like with [creating a database](#creating-a-database), trying to delete a database that does not already exist can create errors. To avoid this problem when trying to drop a database in a script we use `IF EXISTS`.

```sql
DROP DATABASE IF EXISTS database_name;
```

## Database vs. Schema

You may have noticed the word "schema" used in documentation several places. Within MySQL, "database" and "schema" mean the same thing and can be used interchangeably. Other RDBMSs use schemas as a second level of organization *within* databases and strictly separate databases from each other from the user's perspective. Understandably, this has lead to more than a bit of [confusion and debate](http://en.wikipedia.org/wiki/Comparison_of_relational_database_management_systems#Databases_vs_schemas_.28terminology.29) over the years.

## Application Specific Databases (and Users)

In the next major unit we will begin integration MySQL with PHP. When you begin developing an application backed by a database, you must decide how to organize that information within your database. Most web applications can be encapsulated in a single database. Because of this, we will usually pair our application's database with a dedicated user. This user would be granted full control of just that database. We do this also as a security measure: if our application's user is somehow compromised, attackers only have access to the data for that application, not to any other database on our server.

_**Note:** Most other RDBMSs take this practice one step further, treating users & schemas interchangeably, or declaring that a schema is "owned" by a particular user. MySQL is unique in that it completely separates the idea of "users" from "databases / schemas"_

### Ansible

We have provided you with an Ansible script to simplify the process of creating a MySQL database and user together as a pair. In order to make a database & user for your web application, `cd ~/vagrant-lamp` in your Mac and then run:

```bash
ansible-playbook ansible/playbooks/vagrant/mysql/database.yml
```

The script will prompt you for a new database name, user, and password. Ansible will then connect to your MySQL server, create the database and user, and grant all privileges to that user for your new database. If you were to specify that your database name was `my_new_db`, user name `my_new_user`, and password `my_user_password`, it would be the equivalent to:

```sql
CREATE DATABASE IF NOT EXISTS my_new_db;
CREATE USER 'my_new_user'@'localhost' IDENTIFIED BY 'my_user_password';
GRANT ALL ON my_new_db.* TO 'my_new_user'@'localhost';
FLUSH PRIVILEGES;
```

## Reserved Words

Words like `SELECT`, `INSERT`, `CREATE` are reserved words in MySQL, and cannot be used for database, table, or column names. Refer to the MySQL documentation on [reserved words](https://dev.mysql.com/doc/refman/5.5/en/reserved-words.html) for a complete list.

### Quoting Identifiers

Although great care should be used to avoid using reserved words in your database names, there is actually a way around it. In SQL, you can actually use any word for a database name, even space characters, so long as we enclose the database name in back ticks (<code>`</code>). You will see that in our output from `SHOW CREATE`, our database name was enclosed in back ticks as well. In practice though, do not do this. Using a reserved word as a table name is basically never worth the trouble it takes to do so; the same goes double for names with spaces in them.

## Exercises

### Exercise Goals

- Create, show, inspect, and delete a new database
- Use ansible to create a new application specific database and user 

-------------------------------------

1. Connect to your MySQL server using `mysql -u codeup -p`. Enter the password you defined in the previous lesson.
1. Create a new database named `testing123`
1. List all databases, make sure your new database is in the list.
1. Show the SQL to recreate your database.
1. Switch to your new database using the `USE` statement.
1. Delete your new database.
1. List all databases, make sure your new database is not in the list.
1. Try dropping your database again, make sure the command succeeds even though the database is now missing.
1. Using Ansible create a new database called `codeup_test_db` and user `codeup_test_user`. Make sure to remember this new user's password.
