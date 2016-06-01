# Update

### Lesson Goals

- Understand how to use the `UPDATE` command to modify records in a database

-------------------------------

The command to modify existing data in a table is [`UPDATE`](http://dev.mysql.com/doc/refman/5.5/en/update.html). Unlike `INSERT`, update only works with existing records; it will **not** add new rows to any table.

The basic syntax for an `UPDATE` statement is:

~~~sql
UPDATE table_name
SET column1 = 'value1', column2 = 'value2', ...
WHERE columnA = 'valueA';
~~~

For example, let's change Mark Twain in our `quotes` table to use his birth name:

~~~sql
UPDATE quotes
SET author_first_name = 'Samuel', author_last_name = 'Clemens'
WHERE id = 4;
~~~

If we display all of our quotes again, we can see the only row updated was our desired entry.

    +----+-------------------+------------------+----------------------------------------------------------------------------+
    | id | author_first_name | author_last_name | content                                                                    |
    +----+-------------------+------------------+----------------------------------------------------------------------------+
    |  1 | Douglas           | Adams            | I love deadlines. I love the whooshing noise they make as they go by.      |
    |  2 | Douglas           | Adams            | Don't Panic.                                                              |
    |  3 | Douglas           | Adams            | Time is an illusion. Lunchtime doubly so.                                  |
    |  4 | Samuel            | Clemens          | Clothes make the man. Naked people have little or no influence on society. |
    |  5 | Kurt              | Vonnegut         | The universe is a big place, perhaps the biggest.                          |
    +----+-------------------+------------------+----------------------------------------------------------------------------+
    5 rows in set (0.00 sec)

It is generally safest to use your primary key column for updates, as we did, but you can have any condition in your `WHERE` clause, or omit it entirely if you choose.

## Exercises

### Exercise Goals

- Use the `UPDATE` command to update records in our albums table

-----------------------------------

1. Create a file called `update_exercises.sql` in your `sql` directory.
1. Write `SELECT` statements to output each of the following with a caption:
    1. All albums in your table.
    1. All albums released before 1980
    1. All albums by Michael Jackson
1. After each `SELECT` add an `UPDATE` statement to:
    1. Make all the albums 10 times more popular (`sales * 10`)
    1. Move all the albums before 1980 back to the 1800s.
    1. Change "Michael Jackson" to "Peter Jackson"
1. Add `SELECT` statements after each `UPDATE` so you can see the results of your handiwork.
1. Push all your changes to GitHub.
