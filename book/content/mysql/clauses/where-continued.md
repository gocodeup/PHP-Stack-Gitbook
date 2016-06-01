# Chaining WHERE clauses

### Lesson Goals

- Learn to combine `WHERE` clauses with `AND` and `OR` to create more complex queries

-------------------------------------------------

We can chain together an `IN` clause with a `LIKE` clause, or any of the clauses, using `AND` and `OR`.

~~~sql
SELECT emp_no, first_name, last_name
FROM employees
WHERE last_name IN ('Herber','Baek')
  AND emp_no < 20000;
~~~

The important thing is that we can chain as many of these as we please together, but it can get messy very quickly.

~~~sql
SELECT emp_no, first_name, last_name
FROM employees
WHERE emp_no < 20000
  AND last_name IN ('Herber','Baek')
   OR first_name = 'Shridhar';
~~~

We can force evaluation grouping using ().

~~~sql
SELECT emp_no, first_name, last_name
FROM employees
WHERE emp_no < 20000
  AND (
      last_name IN ('Herber','Baek')
   OR first_name = 'Shridhar'
);
~~~

## Exercises

### Exercise Goals

- Query our sample database with more complex `WHERE` clauses

-------------------------------------------------

1. Open your `where_exercises.sql` file in Sequel Pro, and update the queries in that file. Between each step save your changes and commit to git.
1. Update your query for `'Irena'`, `'Vidya'`, or `'Maya'` to use `OR` instead of `IN` &mdash; 709 rows.
1. Now add a condition to find everybody with those names who is also male &mdash; 441 rows.
1. Find all employees whose last name starts or ends with `'E'` &mdash; 30,723 rows.
1. Duplicate the previous query and update it to find all employees whose last name starts **and** ends with `'E'` &mdash; 899 rows.
1. Find all employees hired in the 90s and born on Christmas &mdash; 362 rows.
1. Find all employees with a `'q'` in their last name but **not** `'qu'` &mdash; 547 rows.
