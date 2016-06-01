# Indexes (Indices)

### Lesson Goals

- Understand how to use indexes

-------------------------------------------------

Indexes, also referred to as _indices_, are used to optimize queries and ensure integrity of data.

> Indexes are used to find rows with specific column values quickly. Without an index, MySQL must begin with the first row and then read through the entire table to find the relevant rows. The larger the table, the more this costs. If the table has an index for the columns in question, MySQL can quickly determine the position to seek to in the middle of the data file without having to look at all the data. If a table has 1,000 rows, this is at least 100 times faster than reading sequentially. If you need to access most of the rows, it is faster to read sequentially, because this minimizes disk seeks.
[https://dev.mysql.com/doc/refman/5.0/en/mysql-indexes.html](https://dev.mysql.com/doc/refman/5.0/en/mysql-indexes.html)

## Using Indexes

We use indexes on almost every table we create.  At the very least, we are going to set a _primary key_, or a unique identifier for each row, much like a row number in a spreadsheet.  This will give us the ability to easily reference the data in that row, and MySQL will make sure there are never duplicates.

### Primary Keys

> The primary key for a table represents the column or set of columns that you use in your most vital queries. It has an associated index, for fast query performance. Query performance benefits from the NOT NULL optimization, because it cannot include any NULL values.
[https://dev.mysql.com/doc/refman/5.5/en/optimizing-primary-keys.html](https://dev.mysql.com/doc/refman/5.5/en/optimizing-primary-keys.html)

Typically we add the PRIMARY KEY index on our id column, along with AUTO_INCREMENT.

An example we used earlier to create the quotes table included a PRIMARY KEY index.

~~~sql
CREATE TABLE quotes (
    id INT NOT NULL AUTO_INCREMENT,
    author VARCHAR(50) NOT NULL,
    content VARCHAR(240) NOT NULL,
    PRIMARY KEY (id)
);
~~~

This table will now have a column named `id` that will increase automatically, starting at 1.  Because we set it as a primary key, the `id` column will never have a duplicate, and performing queries on the `id` will be very fast.

### Unique

Optimization is the primary focus of indexes; however, we can use indexes to ensure uniqueness and create relationships.

`UNIQUE` indexes work very similar to primary keys; however, unique indexes are not limited to 1 per table.  If we need to add a constraint on a column to make sure there are not duplicates, like email addresses in a user database, then the `UNIQUE` constraint can be added to the column.

In our quotes table, we may want to make sure each quote is unique, so we don't end up with duplicate quotes.

We can use the `ALTER` statement to update a table.

~~~sql
ALTER TABLE quotes
ADD UNIQUE (content);
~~~

A new `DESCRIBE` shows the `UNI` key:

~~~
mysql> DESCRIBE quotes;
+---------+--------------+------+-----+---------+----------------+
| Field   | Type         | Null | Key | Default | Extra          |
+---------+--------------+------+-----+---------+----------------+
| id      | int(11)      | NO   | PRI | NULL    | auto_increment |
| content | varchar(240) | NO   | UNI | NULL    |                |
| author  | varchar(50)  | NO   |     | NULL    |                |
+---------+--------------+------+-----+---------+----------------+
3 rows in set (0.00 sec)
~~~

### Foreign Keys

We'll use foreign keys to relate tables that will be used in joins.  We will be working with multiple tables in single queries soon, and foreign key constraints will be important.

> If a table has many columns, and you query many different combinations of columns, it might be efficient to split the less-frequently used data into separate tables with a few columns each, and relate them back to the main table by duplicating the numeric ID column from the main table. That way, each small table can have a primary key for fast lookups of its data, and you can query just the set of columns that you need using a join operation.
[https://dev.mysql.com/doc/refman/5.5/en/optimizing-foreign-keys.html](https://dev.mysql.com/doc/refman/5.5/en/optimizing-foreign-keys.html)

### Multiple-Column Indexes

> MySQL can create composite indexes (that is, indexes on multiple columns). An index may consist of up to 16 columns.
https://dev.mysql.com/doc/refman/5.5/en/multiple-column-indexes.html

In our quotes table, we want to keep another table that is just authors.  This table will contain an id and the author's first name and last name.  We want the _combination_ of the author's first and last name to be unique.

We can create this table with the following query:

~~~sql
CREATE TABLE authors (
    id INT NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE (first_name, last_name)
);
~~~

This creates a new table named `authors`, and the unique key constraint is on the combined values of `first_name` and `last_name`.

## Exercises

### Exercise Goals

- Explore the indexes in the employees database
- Add a unique constraint to our test database

-------------------------------------------------

1. `USE` your `employees` database.

1. `DESCRIBE` each table and inspect the keys and see which columns have indexes and keys.

1. `USE` your `codeup_test_db` database.

1. Add an index to make sure all album names combined with the artist are unique.  Try to add duplicates to test the constraint.
