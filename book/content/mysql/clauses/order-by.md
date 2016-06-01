# ORDER BY

### Lesson Goals

- Understand how to use an `ORDER BY` clause
- Understand how to chain multiple `ORDER BY` clauses

-------------------------------------------------

The ORDER BY clause allows us to specify the order in which we wish to view our data.

## Using the ORDER BY clause

Queries with a ORDER BY clause normally follow this form:

~~~sql
SELECT column FROM table ORDER BY column_name [ASC|DESC];
~~~

Columns selected for output can be referred to in ORDER BY and GROUP BY clauses using column names, column aliases, or column positions. Column positions are integers and begin with 1.

~~~sql
SELECT first_name, last_name
FROM employees
ORDER BY last_name;
~~~

To sort in reverse order, add the DESC (descending) keyword to the name of the column in the ORDER BY clause that you are sorting by.

~~~sql
SELECT first_name, last_name
FROM employees
ORDER BY last_name DESC;
~~~

The default is ascending order; this can be specified explicitly using the ASC keyword.

~~~sql
SELECT first_name, last_name
FROM employees
ORDER BY last_name ASC;
~~~

The `ORDER BY` clause can be used with any `SELECT` query.

## Chaining ORDER BY clauses

The ORDER BY clause also allows you to chain together column names, column aliases, or column positions.

~~~sql
SELECT first_name, last_name
FROM employees
ORDER BY last_name DESC, first_name ASC;
~~~

## Exercises

### Exercise Goals

- Use `ORDER BY` clauses to create more complex queries for our database

-------------------------------------------------

1. Open `where_exercises.sql` in Sequel Pro and rename it `order_by_exercises.sql`. Save your changes after each step and add & commit your changes with git. At the end, push all your changes to GitHub.
1. Modify your first query to order by first name. The first result should be Irena Majewski and the last result should be Vidya Schaft.
1. Update the query to order by first name and then last name. The first result should now be Irena Acton and the last should be Vidya Zweizig.
1. Change the order by clause so that you order by last name before first name. Your first result should still be Irena Acton but now the last result should be Maya Zyda.
1. Update your queries for employees with `'E'` in their last name to sort the results by their employee number. Your results should *not* change!
1. Now reverse the sort order for both queries.
1. Change the query for employees hired in the 90s and born on Christmas such that the first result is the **oldest** employee who was hired **last**. It should be Khun Bernini.
