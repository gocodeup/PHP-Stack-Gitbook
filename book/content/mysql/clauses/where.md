# WHERE

### Lesson Goals

- Introduce the `WHERE` clause

-------------------------------------------------

The WHERE clause can be used to filter our results to do exactly what we want using criteria we specify.

## Using WHERE clauses

The WHERE clause, if given, indicates the condition or conditions that rows must satisfy to be selected.  The `WHERE` condition is an expression that evaluates to true for each row to be selected. The statement selects all rows if there is no `WHERE` clause.

~~~sql
SELECT * FROM employees WHERE hire_date = '1985-01-01';
~~~

We can use `WHERE` with the `LIKE` option to find similarities.  The `%` are wildcards.

This query will select all first names with the letters combination "sus":

~~~sql
SELECT first_name
FROM employees
WHERE first_name LIKE '%sus%';
~~~

While not a part of the `WHERE` clause, it is worth mentioning that we can add the `DISTINCT` keyword to our `SELECT` statement to only get non-repeating values.

~~~sql
SELECT DISTINCT first_name
FROM employees
WHERE first_name LIKE '%sus%';
~~~

Now, instead of seeing over 1,600 names with `sus` in them, we can see the 7 distinct names with 'sus' in them.

We can use WHERE with BETWEEN to find specific ranges of values.

To find all the employees between employee number 10026 and 10082:

~~~sql
SELECT emp_no, first_name, last_name
FROM employees
WHERE emp_no BETWEEN 10026 AND 10082;
~~~

We can use WHERE with IN to query only very specific sets of values.  The () are required when you use IN.

To find all the employees with the last name of 'Herber', 'Dredge', 'Lipner', and 'Baek':

~~~sql
SELECT emp_no, first_name, last_name
FROM employees
WHERE last_name IN ('Herber', 'Dredge', 'Lipner', 'Baek');
~~~

We can also use comparison operators.

~~~sql
SELECT emp_no, first_name, last_name
FROM employees
WHERE last_name = 'Baek';

SELECT emp_no, first_name, last_name
FROM employees
WHERE emp_no < 10026;

SELECT emp_no, first_name, last_name
FROM employees
WHERE emp_no <= 10026;
~~~

We can also use IS NULL and IS NOT NULL to see if a boolean value is NULL or not.

~~~sql
SELECT emp_no, title
FROM titles
WHERE to_date IS NOT NULL;
~~~

We can also check if a boolean value is TRUE, FALSE, or UNKNOWN.

There are even more expressions on the [MySQL Expression Syntax page](https://dev.mysql.com/doc/refman/5.7/en/expressions.html).

## Exercises

### Exercise Goals

- Query our sample database using basic `WHERE` clauses

-------------------------------------------------

1. Use Sequel Pro to write and test the following queries. Between each step, save your queries (<kbd>Cmd + Ctrl + S</kbd>) in a file named `where_exercises.sql` to the `sql` directory. Commit your changes to git after each save and push to GitHub at the end of this exercise.
1. Be sure to select the `employees` database from the dropdown before you begin.
1. Write individual queries to find the following things:
    - Employees with first names `'Irena'`, `'Vidya'`, or `'Maya'` &mdash; 709 rows (_**Hint:** Use `IN`_).
    - Employees whose last name starts with `'E'` &mdash; 7,330 rows.
    - Employees hired in the 90s &mdash; 135,214 rows.
    - Employees born on Christmas &mdash; 842 rows.
    - Employees with a `'q'` in their last name &mdash; 1,873 rows.

