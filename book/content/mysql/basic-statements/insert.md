# Insert

### Lesson Goals

- Understand the `INSERT` statement
- Learn which quotes to use when writing SQL

------------------------

The commands to add new rows to a table is [`INSERT`](http://dev.mysql.com/doc/refman/5.5/en/insert.html). Its basic structure looks like the following:

~~~sql
INSERT INTO table_name (field1, field2, ...)
VALUES ('value1', 'value2', ...);
~~~

This statement uses `INSERT` to tell MySQL that we want to add data, `INTO` defines defines table we are adding data to, followed by the columns we want to assign values to, and then what values we want in those columns. You do not have to specify every column in your table, but the set of values must match up exactly with the set of columns. In particular, you should almost never specify a column that has `AUTO_INCREMENT` like your primary key.

A basic example to add a record to our `quotes` table would be:

~~~sql
INSERT INTO quotes (author_first_name, author_last_name, content)
VALUES ('Douglas', 'Adams', 'I love deadlines. I love the whooshing noise they make as they go by.');
~~~

If we wanted to add more than one record we could do that as well:

```sql
INSERT INTO quotes (author_first_name, author_last_name, content)
VALUES ('Douglas', 'Adams',    'Time is an illusion. Lunchtime doubly so.'),
       ('Mark',    'Twain',    'Clothes make the man. Naked people have little or no influence on society.'),
       ('Kurt',    'Vonnegut', 'The universe is a big place, perhaps the biggest.');
```

Here we have specified the table and columns once, followed by three sets of values in parenthesis, separated by commas.

## SQL Quotes

Notice that all our string values are enclosed in single quotes (`'`), this is the SQL standard. Some versions of MySQL allow you to use double quotes (`"`) for strings as well, but ours does not. If you need to put a single quote in a string, you can escape it like we did with JavaScript and PHP (`\'`) or you can use two single quotes in a row (`''`) like the following:

```sql
INSERT INTO quotes (author_first_name, author_last_name, content)
VALUES ('Douglas', 'Adams', 'Don''t Panic.');
```

When your value is saved to the table, it will just contain one single quote character: `Don't Panic.` Numeric values do not need to be quoted at all.

## Exercises

### Exercise Goals

- Use the `INSERT` statement to add data to our database

----------------------

1. Create a new file in your `sql` directory called `albums_seeder.sql`.
1. At the top of `albums_seeder.sql` be sure to `USE` the `codeup_test_db` database.
1. Use `INSERT` to add records for all the albums from [this list on Wikipedia](http://en.wikipedia.org/wiki/List_of_best-selling_albums) that claim over 30 million sales (the first two tables). For `sales` data, use the "sales certification" column of the tables, not "claimed sales". For artists listed with "Various Artists", just use the primary artist's name.
    1. First write your queries as separate `INSERT` statements for each record and test. You should see no output.
    1. Refactor your script to use a single `INSERT` statement for all the records and test it again. Again, this should not generate any output.
1. Commit your changes after each step and then push them out to GitHub.
