# Delete

### Lesson Goals

- Understand how to use and the dangers of the `DELETE` statement
- Understand the `TRUNCATE` command

------------------------

To remove records from a table we use the [`DELETE`](https://dev.mysql.com/doc/refman/5.5/en/delete.html) statement. The basic syntax for delete rows:

~~~sql
DELETE FROM table_name WHERE column_name = 'value';
~~~

To remove our third Douglas Adams quote, we would do:

~~~sql
DELETE FROM quotes WHERE id = 3;
~~~

Once again, listing all the rows allows us to see that the delete was successful:

    +----+-------------------+------------------+----------------------------------------------------------------------------+
    | id | author_first_name | author_last_name | content                                                                    |
    +----+-------------------+------------------+----------------------------------------------------------------------------+
    |  1 | Douglas           | Adams            | I love deadlines. I love the whooshing noise they make as they go by.      |
    |  2 | Douglas           | Adams            | Don't Panic.                                                              |
    |  4 | Samuel            | Clemens          | Clothes make the man. Naked people have little or no influence on society. |
    |  5 | Kurt              | Vonnegut         | The universe is a big place, perhaps the biggest.                          |
    +----+-------------------+------------------+----------------------------------------------------------------------------+
    4 rows in set (0.00 sec)

Notice that they `id`s in our table did **not** automatically reorder. This is actually by design and helps keep our data consistent and predictable. If the values for our primary key changed regularly, we would have no reliable way to find a particular row.

## Caution

The `DELETE` query is exceptionally dangerous&mdash;there is no confirmation and there is no going back. It is up to you as a developer to make sure you are **only** deleting the records you want to. A good rule of thumb is to:

1. Always write your `WHERE` condition first.
1. Whenever possible, `DELETE` using the table's primary key.

The safest way to write a `DELETE` statement is to write a `SELECT` statement first. Use that query to narrow down your condition and make sure you know what is about to be removed. Once you have a good `SELECT` it is trivial to convert it into a `DELETE`:

```sql
-- First:
SELECT * FROM quotes WHERE id = 3;
-- Convert to:
DELETE FROM quotes WHERE id = 3;
```

## Truncate

Sometimes you do not want to just remove a handful of records, but **all** the records from a table. For that, SQL also has a [`TRUNCATE`](https://dev.mysql.com/doc/refman/5.5/en/truncate-table.html) command:

```sql
TRUNCATE table_name;
```

`TRUNCATE` has no `WHERE` clause, there is no way to limit what rows of the table will be removed, it deletes _**EVERYTHING**_. If you thought `DELETE` was scary, `TRUNCATE` is downright terrifying.

## Exercises

### Exercise Goals

- Update our seeder to use a `TRUNCATE` statement
- Use the `DELETE` statement to remove records from our database

-----------------------

1. Open up `albums_seeder.sql`, after your `USE` statement, add a `TRUNCATE` query to delete all records from the table before inserting.
1. Test your change and make sure you no longer get any duplicate records when running `albums_seeder.sql`.
1. Create a file called `delete_exercises.sql`.
1. Write `SELECT` statements for:
    1. Albums released after 1991
    1. Albums with the genre "disco"
    1. Albums by "Whitney Houston" (...or maybe an artist of your choice)
1. Make sure to put appropriate captions before each `SELECT`.
1. Convert the `SELECT` statements to `DELETE`.
1. Use the MySQL command line client to make sure your records really were removed.
1. Commit your changes after each step and push to GitHub.
