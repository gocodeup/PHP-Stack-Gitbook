# Tables

### Lesson Goals

- Understand what a table is
- Understand data types in MySQL
- Understand how to create, show, describe and drop tables
- Introduce primary keys
- Understand how to use external sql scripts

----------------------

Now that we have databases, we are ready to actually store some *data* in our *database* server. Data is organized into tables. Tables look a lot like a spreadsheet; they break our data down into columns and store individual records in rows. Unlike a spreadsheet however, a database table has a specific set of columns and it is up to us as developers to define what those columns are called and what kind of data they can contain.

## Data types

The programming languages we have worked with so far have all been [dynamically typed](http://en.wikipedia.org/wiki/Dynamic_typing). In essence this meant that we could declare a variable and give it a value of one type (say, a string) but then use it with other types or assign it a value with a different type (int, array, etc). Dynamic typing looks at the value and the operation to guess what type the variable should *really* be.

MySQL, and most database systems, are different: they are statically typed. This means that when we create our tables we must specify what data type each column will be. This forces us as developers to be much more thoughtful about how we organize and structure our data, and how our data will ultimately be used in our applications. Believe it or not, this is a good thing&#8482;.

### Numeric Types

The basic building block of any language is a numeric data type. MySQL supports a [variety of numeric types](http://dev.mysql.com/doc/refman/5.5/en/numeric-type-overview.html), but the most common ones are listed below.

- `INT` &mdash; Any number *without* a decimal point.
- `FLOAT` &mdash; A number *with* decimal values, but which can sometimes be less accurate. You can use `DOUBLE` instead to increase the precision.
- `DECIMAL(length, precision)` &mdash; A *precise* decimal number. Decimal columns must be defined with a *length* and a *precision*; length is the total number of digits that will be stored for a value, and precision is the number of digits after the decimal place. For example, a column defined as `DECIMAL(4,2)` would allow four digits total: two before the decimal point and two after. So the values `99.99`, `4.50`, and `-88.10` would be allowed, but not `100.00` or `7.134`. Decimal columns are perfect for storing monetary values.

#### Unsigned

When we are declaring our numeric columns, we can specify that the values are `UNSIGNED`. This allows us to potentially store larger numbers in a column but only positive values. For example, a normal `INT` column can store numbers from `-2,147,483,648` to `2,147,483,647`, whereas an `INT UNSIGNED` column can store `0` to `4,294,967,295`.

#### Boolean

MySQL has no native support for boolean values. Instead, it uses a `TINYINT` data type that goes from `-128` to `127` and treats `0` as `false` and `1` as `true`.

### String Types

Like our other languages, MySQL also has [string types](http://dev.mysql.com/doc/refman/5.5/en/string-type-overview.html), although with a few caveats. Below are the most common string datatypes in MySQL and how to use them.

- `CHAR(length)` &mdash; A string with a fixed number of characters, where `length` can be from 1 to 255. If a string shorter than `length` is stored in a `CHAR` column then the value is padded with empty space to take up the full size. If you try to store a string longer than `length`, then an error occurs. `CHAR` column types are ideal for values where you know the length and it is constant, like a state abbreviation `CHAR(2)`, zip code `CHAR(5)`, or phone number `CHAR(10)`.
- `VARCHAR(length)` &mdash; For strings where the length could vary up to some maximum number. `VARCHAR` columns are probably the most common type of column you will use in your database tables. Although `VARCHAR` lengths can go up to 65,535, if you need more than 255 characters consider using `TEXT` instead.
- `TEXT` &mdash; A large block of characters than can be any length. It may be tempting to just throw everything in `TEXT` columns and not worry about lengths, but this is a very bad idea! There are some major technical limitations to `TEXT` and they can cause serious performance issues if they are abused. Only use `TEXT` columns for very large blocks of text, like the full text of an article, or the pages of a book.

### Date Types

Dates and times are deceptively complex data types. Thankfully MySQL includes several ways of [representing them](http://dev.mysql.com/doc/refman/5.5/en/date-and-time-type-overview.html).

- `DATE` &mdash; A date value without any time. Typically MySQL displays dates as `YYYY-MM-DD`.
- `TIME` &mdash; A time down to the seconds. MySQL uses 24-hour times.
- `DATETIME` &mdash; A combined date and time value. `DATETIME` does not store any timezone information and will typically display information in the format `YYYY-MM-DD HH:MM:SS`.

### Null

The value `NULL` has special meaning in relational databases. In most languages, like PHP or JavaScript, `null` behaves like `0` (many times, it secretly *is* `0`). In MySQL, `NULL` can be thought of as *the absence of value*. This has some interesting consequences. If we asked whether `NULL != NULL` the answer would be `NULL`. On the other hand, if we asked if `NULL = NULL` the answer would **also** be `NULL`! In essence, you can think of this question as "does some unknown value equal some other unknown value?" to which MySQL responds "How should I know?!"

Since `NULL` values are complex, and because they can lead to inconsistent data, columns can specify that their values are `NOT NULL`. This will prevent `NULL` from being stored in a particular column and lead to more predictable results.

## Creating Tables

The syntax for [creating a table](http://dev.mysql.com/doc/refman/5.5/en/create-table.html) looks very similar to [creating a database](databases.html#creating-a-database). The basic structure is:

```sql
CREATE TABLE table_name (
    column1_name data_type,
    column2_name data_type,
    ...
);
```

For example, if we wanted to create a table for storing famous quotes it might look like:

```sql
CREATE TABLE quotes (
    author_first_name VARCHAR(50),
    author_last_name  VARCHAR(100) NOT NULL,
    content TEXT NOT NULL
);
```

Notice we allow for the `author_first_name` to be `NULL`, but that `author_last_name` and `content` are both mandatory. However, this example is not yet complete. We are missing a final key concept for our tables. Some might even say, that it was the *primary key* concept.

### Primary Keys

If we were to start working with our `quotes` table as is, there would be nothing to stop us from inserting multiple duplicate values. At that point we could have two or more records in the database with no way to distinguish between them. Primary keys solve this problem; a primary key is a guaranteed way to uniquely identify a single row in a table. A primary key is a special type of column with the following rules:

1. Each value must be unique.
1. They cannot be `NULL`.
1. There can only be one primary key in a table.

There is a lot of database theory that can go into creating and assigning primary keys. Practically speaking though, this is usually not a problem you want to burden yourself with. Most of the time, it is perfectly reasonable to let the database server manage your primary key values for you. Let's update our `quotes` table definition to have a primary key:

```sql
CREATE TABLE quotes (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    author_first_name VARCHAR(50),
    author_last_name  VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    PRIMARY KEY (id)
);
```

Let's break down our changes a bit. First, our new column `id` **is** a column just like the other four, but we have added some additional constraints to it. We have specified that the `id` is an `UNSIGNED` integer. That is because MySQL will assign IDs starting with `1`, so it does not make sense to allow negative values in our column. The last part of our column definition is `AUTO_INCREMENT`. This is what instructs MySQL to generate a new values for this column when we try to insert records into our table. Only one column per table may be `AUTO_INCREMENT` and it **must** be the primary key. Finally, at the end our table definition, we specify that the `PRIMARY KEY` for the table is `id`.

### Default Values

For any given column we can specify a default value for it in our table definition. For example, if we wanted to specify that the default first name was `'NONE'` we could do so in our table definition like so:

```sql
CREATE TABLE quotes (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    author_first_name VARCHAR(50) DEFAULT 'NONE',
    author_last_name  VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    PRIMARY KEY (id)
);
```

## Showing Tables

If we need to see what tables are defined in a database, we use [`SHOW TABLES`](https://dev.mysql.com/doc/refman/5.5/en/show-tables.html).

```sql
SHOW TABLES;
```

In our case, we should see:

    +--------------------------+
    | Tables_in_codeup_test_db |
    +--------------------------+
    | quotes                   |
    +--------------------------+
    1 row in set (0.00 sec)

## Describing Tables

The command to show the structure of a table is [`DESCRIBE`](https://dev.mysql.com/doc/refman/5.5/en/explain.html).

```
DESCRIBE quotes;
```

This give us:

    +-------------------+------------------+------+-----+---------+----------------+
    | Field             | Type             | Null | Key | Default | Extra          |
    +-------------------+------------------+------+-----+---------+----------------+
    | id                | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
    | author_first_name | varchar(50)      | YES  |     | NULL    |                |
    | author_last_name  | varchar(100)     | NO   |     | NULL    |                |
    | content           | text             | NO   |     | NULL    |                |
    +-------------------+------------------+------+-----+---------+----------------+
    4 rows in set (0.00 sec)

MySQL uses `EXPLAIN` and `DESCRIBE` interchangeably. By convention we use `DESCRIBE` when we want to inspect a table, and `EXPLAIN` when we want to analyze a query.

MySQL can also display the original command used to create a table by using [`SHOW CREATE TABLE`](https://dev.mysql.com/doc/refman/5.5/en/show-create-table.html).

```sql
SHOW CREATE TABLE quotes\G
```

    *************************** 1. row ***************************
           Table: quotes
    Create Table: CREATE TABLE "quotes" (
      "id" int(10) unsigned NOT NULL AUTO_INCREMENT,
      "author_first_name" varchar(50) DEFAULT NULL,
      "author_last_name" varchar(100) NOT NULL,
      "content" text NOT NULL,
      PRIMARY KEY ("id")
    )
    1 row in set (0.00 sec)

## Dropping Tables

If we need to get rid of a table we use the [`DROP TABLE` command](http://dev.mysql.com/doc/refman/5.5/en/drop-table.html).

```sql
DROP TABLE quotes;
```

Note that `DROP TABLE` can also take a conditional `IF EXISTS`:

```sql
DROP TABLE IF EXISTS quotes;
```

The same is also true about the inverse:

```sql
CREATE TABLE IF NOT EXISTS quotes (
    ...
);

```

# SQL Scripts

Creating even a simple table is several lines long, and if a single typo is made it can be frustrating to have to recall the previous command and step through it character by character to find the typo. To simplify this, we can create our SQL commands in a script file and then instruct the MySQL command line client to run those commands. In order to do so we create a file in Sublime with the extension `.sql`. The script can contain as many SQL queries as you need, each ending with `;` or `\G`. To run the script from your vagrant box, use the following command:

```bash
mysql -u codeup -p -t < filename.sql
```

The `< filename.sql` tells the MySQL command line client to read in the specified file and execute all the SQL queries in it. The option `-t` makes MySQL output data in tables just like when we interact with it diretly.

You can add comments in your SQL script with two dashes: `--`. Everything on a line after `--` is a comment and will not be executed.

# Exercises

### Exercise Goals

- Create a new repository for database exercises
- Create a table from an external sql file
- Log into the mysql server and verify the new table exists

--------------------------------------

We are going to first create a new git repository for all our SQL scripts.

1. In Chrome, go to your GitHub account and create a new remote repository called "Database_Exercises".
1. Create a new folder inside of `~/vagrant-lamp` called `sql`.
1. Inside of `sql` run your `git init` and `git remote add` commands.

Now we are ready to write our first SQL script!

1. Create a new file in your `sql` directory called `albums_migration.sql`.
1. The first command your `albums_migration.sql` will need is:
    ```
    USE codeup_test_db;
    ```
1. Next, use `DROP IF EXISTS` to (optionally) delete a table called `albums`.
1. After dropping in your SQL script, create an `albums` table with the following columns:
    - `id` &mdash; auto incrementing unsigned integer primary key
    - `artist` &mdash; string for storing the recording artist name
    - `name` &mdash; string for storing a record name
    - `release_date` &mdash; integer representing year record was released (_**Note:** MySQL also supports a `YEAR` data type!_)
    - `sales` &mdash; floating point value for number of records sold (in millions)
    - `genre` &mdash; string for storing the record's genre(s)
1. From your vagrant environment, run the script with
    ```bash
    mysql -u codeup -p < albums_migration.sql
    ```
1. After running the script, connect to the MySQL client normally.
1. `USE` the `codeup_test_db` and use `DESCRIBE` and `SHOW CREATE` to verify that your `albums` table has been successfully created.
1. If everything looks good, remember to `git push` your changes!
