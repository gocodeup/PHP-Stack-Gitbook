# Introduction to MySQL

### Lesson Goals

- Introduce Databases as a concept
- Introduce SQL
- Explain how to access our mysql database from the command line
- Explain how to get different format for query results

-----------------------------

MySQL is a Relational Database Management System, or RDBMS. This means it stores data in tables and creates relationships between the data in the different tables. This is much like having multiple spreadsheets and having the data from one sheet use data from another. Unlike spreadsheet programs like Excel or Numbers, relational databases like MySQL are able to manipulate millions of rows rapidly and effectively.

Relation databases are the most common way to permanently store data in web development, with MySQL as one of the most popular, and most common.

## Queries

We use the Structured Query Language (SQL) to interact with MySQL. SQL is made up of statements and commands sent to the server individually, with results sent back to the client. We often think of these statements as asking questions of the server; as in "who are the users named 'jason'?", "how many clients does this seller have?", "what movies were sold between May 5 and October 20?", etc. Because of this, these statements are generally called *queries*. MySQL's commands are divided into several different [categories](http://en.wikibooks.org/wiki/MySQL/Language/Definitions:_what_are_DDL,_DML_and_DQL%3F). Our focus for the next few lessons will be on Data Definition Language (DDL) and Data Control Language (DCL) commands. These are the commands that create and define structures within MySQL. Later, we will get into Data Manipulation Language (DML) and Data Query Language (DQL).

# Using the MySQL Command Line

MySQL stores information in a series of files in our Vagrant environment, but we will virtually never look at or manipulate those files directly. Instead, we need some sort of interface for interacting with the data they contain. That is where the `mysql` command line tool comes in.

There are actually two parts to MySQL we will be using. There is the underlying MySQL server understands Structured Query Language (SQL) commands, stores and organizes the data on disk, and users that can connect and manipulate the data. To interact with the server there is the MySQL client that connects to the server for us, sends our commands to the server, and displays the data on screen.

From within our Vagrant box, we can connect to the MySQL server with the following command:

```bash
mysql -u vagrant -p
```

This instructs the MySQL *client* to connect to the MySQL *server* running on our Vagrant system using the user `vagrant` and to prompt us for a password. When we provisioned your dev environment, we set up the `vagrant` user and gave it the password `vagrant`. When prompted just enter in `vagrant` and press `Return`. At that point we will be greeted by the server:

    Welcome to the MySQL monitor.  Commands end with ; or \g.
    Your MySQL connection id is 65
    Server version: 5.5.41-0ubuntu0.14.04.1 (Ubuntu)

    Copyright (c) 2000, 2014, Oracle and/or its affiliates. All rights reserved.

    Oracle is a registered trademark of Oracle Corporation and/or its
    affiliates. Other names may be trademarks of their respective
    owners.

    Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

    mysql>

This interface is a lot like the REPL from PHP, or the Javascript console in Chrome. We can issue a SQL command and the server and client will respond with the output. Also like PHP and Javascript, SQL commands are (almost) always ended with a `;`. Conveniently, MySQL has even told us how to get some help. Just type `help;` and press return. Let's see what help MySQL has to offer us.

    For information about MySQL products and services, visit:
       http://www.mysql.com/
    For developer information, including the MySQL Reference Manual, visit:
       http://dev.mysql.com/
    To buy MySQL Enterprise support, training, or other products, visit:
       https://shop.mysql.com/

    List of all MySQL commands:
    Note that all text commands must be first on line and end with ';'
    ?         (\?) Synonym for `help'.
    clear     (\c) Clear the current input statement.
    connect   (\r) Reconnect to the server. Optional arguments are db and host.
    delimiter (\d) Set statement delimiter.
    edit      (\e) Edit command with $EDITOR.
    ego       (\G) Send command to mysql server, display result vertically.
    exit      (\q) Exit mysql. Same as quit.
    go        (\g) Send command to mysql server.
    help      (\h) Display this help.
    nopager   (\n) Disable pager, print to stdout.
    notee     (\t) Don't write into outfile.
    pager     (\P) Set PAGER [to_pager]. Print the query results via PAGER.
    print     (\p) Print current command.
    prompt    (\R) Change your mysql prompt.
    quit      (\q) Quit mysql.
    rehash    (\#) Rebuild completion hash.
    source    (\.) Execute an SQL script file. Takes a file name as an argument.
    status    (\s) Get status information from the server.
    system    (\!) Execute a system shell command.
    tee       (\T) Set outfile [to_outfile]. Append everything into given outfile.
    use       (\u) Use another database. Takes database name as argument.
    charset   (\C) Switch to another charset. Might be needed for processing binlog with multi-byte charsets.
    warnings  (\W) Show warnings after every statement.
    nowarning (\w) Don't show warnings after every statement.

    For server side help, type 'help contents'

These are the commands and options the MySQL *client* understands. For information on *server* commands we can use `help contents`.

    You asked for help about help category: "Contents"
    For more information, type 'help <item>', where <item> is one of the following
    categories:
       Account Management
       Administration
       Compound Statements
       Data Definition
       Data Manipulation
       Data Types
       Functions
       Functions and Modifiers for Use with GROUP BY
       Geographic Features
       Help Metadata
       Language Structure
       Plugins
       Procedures
       Storage Engines
       Table Maintenance
       Transactions
       User-Defined Functions
       Utility

We can actually dive down into any one of these topics (and their various sub-categories) by using `help <category name>`. Before we do though, let's talk about how the MySQL *client* displays it's information.

Most of our output from MySQL will be formatted in a table. Something similar to:

    +----+----------+----------+----------+
    | id | Column 1 | Column 2 | Column 3 |
    +---------------+----------+----------+
    |  1 | Value A  | Value B  | Value C  |
    |  2 | Value D  | Value E  | Value F  |
    |  3 | Value G  | Value H  | Value I  |
    |  4 | Value J  | Value K  | Value L  |
    +----+----------+----------+----------+

This is the default layout, but it is not always the best. As discussed before, SQL commands are terminated with a `;`. However, we can actually use a different combination of characters as a terminator. If you ended the same SQL command with `\G` the output would look like the following:

    *************************** 1. row ***************************
          id: 1
    Column 1: Value A
    Column 2: Value B
    Column 3: Value C
    *************************** 2. row ***************************
          id: 2
    Column 1: Value D
    Column 2: Value E
    Column 3: Value F
    *************************** 3. row ***************************
          id: 3
    Column 1: Value G
    Column 2: Value H
    Column 3: Value I
    *************************** 4. row ***************************
          id: 4
    Column 1: Value J
    Column 2: Value K
    Column 3: Value L

This is the same information as before, but laid out in a way that works well for long rows of data. Finally, we need some way to leave the MySQL client. Thankfully, it's a simple as running:

```sql
exit;
```

At this point, you should be back out in your Vagrant shell. And now you know how to start the MySQL client, issue commands, and tweak the output. Next up, we will discuss creating users.

## Exercises

### Exercise Goals

- Connect to the MySQL server
- Try out a few different queries
- Experiment with different output formats for query results

---------------------------

For our exercises, we will use these four SQL queries. You are not expected to understand the syntax for these queries yet, just use them to test the different ways of formatting output.

```sql
SELECT * FROM mysql.user
SELECT user, host, password FROM mysql.user
SELECT * FROM mysql.help_topic
SELECT help_topic_id, help_category_id, url FROM mysql.help_topic
```

1. In your Vagrant environment, try connecting to the MySQL server using just `mysql -u vagrant`.

    What happens if you omit the `-p` option? Try again, but this time make sure `mysql` prompts you for a password.
1. Run the queries listed above one at a time by copying each individually and pasting it into the `mysql` prompt.
    1. End each query with a `;`.
    1. Run the queries again but put `\G` at the end instead of `;`.
    1. Compare the output of the commands and why one method may be better than another.
1. Issue the following command to MySQL:
    ```sql
    pager less -~SFX
    ```
    Re-run the four queries above and notice how the output changes.

    You can use the arrow keys to move around the display, and the space bar to jump to the next page of results.

    Press `q` to exit the pager.
1. Undo your previous setting with
    ```sql
    nopager
    ```
1. Our next section will cover creating and managing users in MySQL. Start with `help contents;` and see if you can get a preview of what we will be covering next.
