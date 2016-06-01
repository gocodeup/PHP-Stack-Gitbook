# Select

### Lesson Goals

- Introduce the `SELECT` statement
- Introduce the `WHERE` clause
- Understand MySQL operators
- Learn how to output arbitrary data from SQL scripts

----------------------------

We use [`SELECT`](http://dev.mysql.com/doc/refman/5.5/en/select.html) to find and return rows from a table. `SELECT` is a deceptively powerful statement and we will be learning a lot more about its capabilities in the later sections, but for right now let's focus on its basic syntax:

~~~sql
SELECT column1, column2, ... FROM table_name;
~~~

If we just wanted our `author_last_name` and `content` from `quotes` we would run:

~~~sql
SELECT author_last_name, content FROM quotes;
~~~

Running this query produces:

    +------------------+----------------------------------------------------------------------------+
    | author_last_name | content                                                                    |
    +------------------+----------------------------------------------------------------------------+
    | Adams            | I love deadlines. I love the whooshing noise they make as they go by.      |
    | Adams            | Don't Panic.                                                              |
    | Adams            | Time is an illusion. Lunchtime doubly so.                                  |
    | Twain            | Clothes make the man. Naked people have little or no influence on society. |
    | Vonnegut         | The universe is a big place, perhaps the biggest.                          |
    +------------------+----------------------------------------------------------------------------+
    5 rows in set (0.00 sec)

We can see the output is formatted as tabular data, with the columns defined by their names, and each row containing the data we inserted.

If we want to retrieve all of the available columns for a database table, we can use the wildcard `*`.

~~~sql
SELECT * FROM quotes;
~~~

This produces a similar result, containing all the possible rows:

    +----+-------------------+------------------+----------------------------------------------------------------------------+
    | id | author_first_name | author_last_name | content                                                                    |
    +----+-------------------+------------------+----------------------------------------------------------------------------+
    |  1 | Douglas           | Adams            | I love deadlines. I love the whooshing noise they make as they go by.      |
    |  2 | Douglas           | Adams            | Don't Panic.                                                              |
    |  3 | Douglas           | Adams            | Time is an illusion. Lunchtime doubly so.                                  |
    |  4 | Mark              | Twain            | Clothes make the man. Naked people have little or no influence on society. |
    |  5 | Kurt              | Vonnegut         | The universe is a big place, perhaps the biggest.                          |
    +----+-------------------+------------------+----------------------------------------------------------------------------+
    5 rows in set (0.00 sec)

Here we can see our `id` column has been auto incrementing for us on each insert.

## Where Clause

As we can see, `SELECT` will return all the rows in our table. If we want to change what data is being returned, we need to narrow down our selection. We can do this by using a `WHERE` clause. `WHERE` allows you to specify a condition that must be true for a given row to be displayed. The basic syntax looks like:

```sql
SELECT column1, column2, ...
FROM table_name
WHERE column_name = 'value';
```

Notice that for comparison SQL uses just a single `=` and not the double `==` we saw in PHP and JavaScript. For example, if we wanted all the quotes written by `'Adams'` we could do:

```sql
SELECT * FROM quotes WHERE author_last_name = 'Adams';
```

We should now see the following results returned:

    +----+-------------------+------------------+-----------------------------------------------------------------------+
    | id | author_first_name | author_last_name | content                                                               |
    +----+-------------------+------------------+-----------------------------------------------------------------------+
    |  1 | Douglas           | Adams            | I love deadlines. I love the whooshing noise they make as they go by. |
    |  2 | Douglas           | Adams            | Don't Panic.                                                         |
    |  3 | Douglas           | Adams            | Time is an illusion. Lunchtime doubly so.                             |
    +----+-------------------+------------------+-----------------------------------------------------------------------+
    3 rows in set (0.00 sec)

Also remember, the guaranteed fastest and most precise way to find a single record in a table is to use the table's primary key:

```sql
SELECT * FROM quotes WHERE id = 5;
```

Because we are querying the primary key, this should get us just one row:

    +----+-------------------+------------------+---------------------------------------------------+
    | id | author_first_name | author_last_name | content                                           |
    +----+-------------------+------------------+---------------------------------------------------+
    |  5 | Kurt              | Vonnegut         | The universe is a big place, perhaps the biggest. |
    +----+-------------------+------------------+---------------------------------------------------+
    1 row in set (0.00 sec)


### Operators

Most [MySQL operators](https://dev.mysql.com/doc/refman/5.5/en/non-typed-operators.html) should look pretty familiar to you, although there are a couple of new ones:

Operator | Description
--- | ---
`=` | Equal
`!=` or `<>` | Not equal
`<` | Less than
`>`  | Greater than
`<=`  | Less than or equal to
`>=`  | Greater than or equal to
`BETWEEN value1 AND value2` | Greater than or equal to value1 and less than or equal to value2

## Miscellaneous Output

Sometimes it may be useful to output arbitrary data from our SQL scripts. We can do this by selecting an arbitrary string and giving it a name like so:

```sql
SELECT 'I am output!' AS 'Info';
```

This gives us a table output like before.

    +----------------+
    | Info           |
    +----------------+
    | I am a output! |
    +----------------+
    1 row in set (0.00 sec)

## Exercises

### Exercise Goals

- Use the `SELECT` statement and the `WHERE` to output various information about our albums table

-----------------------------------

1. In your `sql` directory, create a new file called `select_exercise.sql`.
1. Remember to `USE` the `codeup_test_db`.
1. In `select_exercises.sql` write queries to find the following information. Before each item, output a caption explaining the results:
    - The name of all albums by Pink Floyd.
    - The year Sgt. Pepper's Lonely Hearts Club Band was released
    - The genre for Nevermind
    - Which albums were released in the 1990s
    - Which albums had less than 20 million certified sales
    - All the albums in the rock genre. Is this **all** the rock albums in the table?
1. As always, commit your changes after each step and push them out to GitHub
