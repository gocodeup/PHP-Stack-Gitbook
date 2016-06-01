# MySQL Functions

### Lesson Goals

- Understand how to use MySQL's built in functions in our queries	

-------------------------------------------------

MySQL has several built in functions that we can use in our queries. There is also the ability to create user defined functions; however, this is a more advanced topic and outside of the scope of this course.

## Using MySQL Functions

There are several types of functions available in MySQL. While we will only be covering a few, you can view the entire list in the [Function and Operator Reference in the MySQL documentation](http://dev.mysql.com/doc/refman/5.5/en/func-op-summary-ref.html).

### String Functions

For a full list of available functions, see the [MySQL documentation on string functions](http://dev.mysql.com/doc/refman/5.5/en/string-functions.html#function_concat).

#### CONCAT

The [`CONCAT()` function](http://dev.mysql.com/doc/refman/5.5/en/string-functions.html#function_concat) takes in any number of strings or column names and will concatenate them all together, just like `.` in PHP or `+` in JavaScript.

```sql
SELECT CONCAT('Hello ', 'Codeup', '!');
```

Our results will look like:

    +---------------------------------+
    | CONCAT('Hello ', 'Codeup', '!') |
    +---------------------------------+
    | Hello Codeup!                   |
    +---------------------------------+

#### LIKE / NOT LIKE

As we learned earlier, we use `WHERE` with the `LIKE` option to find similarities.  The `%` are wildcards.

We saw this query will select all first names with the letter combination "sus":

~~~sql
SELECT first_name
FROM employees
WHERE first_name LIKE '%sus%';
~~~

`NOT LIKE` will return the results that do not match the pattern.

~~~sql
SELECT DISTINCT first_name
FROM employees
WHERE first_name NOT LIKE '%a%';
~~~

This query selects all the first names with out the letter "a" in them.

### Date and Time Functions

MySQL offers a wide range of [date and time functions](http://dev.mysql.com/doc/refman/5.5/en/date-and-time-functions.html).  One of the most commonly used is `NOW()` or its synonymous alias `CURRENT_TIMESTAMP()`.

#### NOW

The [`NOW()` function](http://dev.mysql.com/doc/refman/5.5/en/date-and-time-functions.html#function_now) returns the current time in `YYYY-MM-DD HH:MM:SS` format.

~~~sql
SELECT NOW();
~~~

#### CURDATE

The [`CURDATE()` function](http://dev.mysql.com/doc/refman/5.5/en/date-and-time-functions.html#function_current-date) returns just the current date with no time information  in `YYYY-MM-DD` format.

~~~sql
SELECT CURDATE();
~~~

#### CURTIME

The [function `CURTIME()`](http://dev.mysql.com/doc/refman/5.5/en/date-and-time-functions.html#function_current-time) returns the time formatted as `HH:MM:SS`.

~~~sql
SELECT CURTIME();
~~~

#### UNIX_TIMESTAMP() & UNIX_TIMESTAMP(date)

The [`UNIX_TIMESTAMP()` function](http://dev.mysql.com/doc/refman/5.5/en/date-and-time-functions.html#function_unix-timestamp) is used to represent time as an integer. It will return the number of seconds since midnight January 1st, 1970, just like the PHP function `time()`. If you pass a date time value to `UNIX_TIMESTAMP()`, it will give you the number of seconds from the [unix epoch](https://en.wikipedia.org/wiki/Unix_time) to that date.

~~~sql
SELECT CONCAT(
    'Teaching people to code for ',
    UNIX_TIMESTAMP() - UNIX_TIMESTAMP('2014-02-04'),
    ' seconds'
);
~~~

### Aggregate Functions

The functions we have seen so far look at data in a single column or possibly across an entire row. An *aggregate* function works with data across all the rows in our result. There are many aggregate functions listed in the [MySQL documentation page](https://dev.mysql.com/doc/refman/5.5/en/group-by-functions.html). `COUNT()` is the most commonly used, and that is the one we will be taking a look at.

#### COUNT

The [`COUNT()` function](https://dev.mysql.com/doc/refman/5.5/en/group-by-functions.html#function_count) will return the number of non-null expression values in a result. You will commonly see it written as `COUNT(*)`. For example, if we wanted to see how many rows were in our `employees` table total, we would run:

```sql
SELECT COUNT(*) FROM employees;
```

If we were only concerned about the values in a given column, we can pass that to the `COUNT()` function:

~~~sql
SELECT COUNT(first_name)
FROM employees
WHERE first_name NOT LIKE '%a%';
~~~

This query will return a count of all first names that do not have an `a` in them from the `employees` table. The result should be `118195`. If for some reason an employee's first name was `NULL`, it would not be counted here.

We can also use `COUNT(DISTINCT column_name)` to get [*unique* matches](https://dev.mysql.com/doc/refman/5.5/en/group-by-functions.html#function_count-distinct).

~~~sql
SELECT COUNT(DISTINCT first_name)
FROM employees
WHERE first_name NOT LIKE '%a%';
~~~

This query returns a result of `500`. While there are 118,195 employees with a first name that did not have the letter _a_, there are only 500 *different* first names that do not have _a_ in them.

The `COUNT()` function will be the one you used most frequently, but there are many others such as `SUM()`, `AVG()`, `MIN()` and `MAX()`. There are even functions that do statistical analysis like `STDDEV()` and `VARIANCE()`. Using aggregates can save a lot of tedious looping and arithmetic on your end.

### Mathematical Functions

MySQL provides mathematical functions, with a full listing in the [documentation](http://dev.mysql.com/doc/refman/5.0/en/numeric-functions.html).

## Exercises

### Exercise Goals

- Integrate MySQL's built in functions into our existing queries

-------------------------------------------------

1. Open the `order_by_exercises.sql` script and save it as `functions_exercises.sql`. After each step commit your changes to git.

1. Update your query for `'Irena'`, `'Vidya'`, or `'Maya'`. Use `count(*)` and `GROUP BY` to find the number of employees for each gender with those names. Your results should be:

        441 M
        268 F

1. Update your queries for employees whose names start and end with `'E'`. Use `concat()` to combine their first and last name together as a single column in your results.

1. For your query of employees born on Christmas and hired in the 90s, use [`datediff()`](https://dev.mysql.com/doc/refman/5.5/en/date-and-time-functions.html#function_datediff) to find how many days they have been working at the company (_**Hint:** You will also need to use `now()` or `curdate()`_)

1. Add a `GROUP BY` clause to your query for last names with `'q'` and not `'qu'` to find the distinct combination of first and last names. You will find there were some duplicate first and last name pairs in your previous results. Add a `count()` to your results and use `ORDER BY` to make it easier to find employees whose unusual name is shared with others.
