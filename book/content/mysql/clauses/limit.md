# LIMIT

### Lesson Goals

- Understand how to get query results in batches using the `LIMIT` clause

-------------------------------------------------

The LIMIT clause limits the number of results returned to a number or range you specify.

## Using LIMIT

Generally, a query with a LIMIT clause follows this form:

~~~sql
SELECT columns FROM table LIMIT count [OFFSET count];
~~~

The simplest use of the LIMIT clause just specifies a number after the keyword.

~~~sql
SELECT emp_no, first_name, last_name
FROM employees
WHERE first_name LIKE 'M%'
LIMIT 10;
~~~

Adding an `OFFSET` tells MySQL which row to start with.

~~~sql
SELECT emp_no, first_name, last_name
FROM employees
WHERE first_name LIKE 'M%'
LIMIT 25 OFFSET 50;
~~~

`LIMIT` and `OFFSET` are commonly used for pagination, or creating pages of data.

The above query asks for the employee number, first name, and last name, where the first name starts with an "M". The results are offset by fifty and will  start at the fifty-first record, limiting the results to twenty-five records.

## Exercises

### Exercise Goals

- Add the `LIMIT` clause to our existing queries

-------------------------------------------------

1. Create a new SQL script called `limit_exercises.sql`. After each step commit your changes and at the end push to GitHub.

1. List the first 10 distinct last name sorted in descending order. Your result should look like this:

        Zykh
        Zyda
        Zwicker
        Zweizig
        Zumaque
        Zultner
        Zucker
        Zuberek
        Zschoche
        Zongker

1. Find your query for employees born on Christmas and hired in the 90s from `order_by_exercises.sql`. Update it to find just the first 5 employees. Their names should be:

        Khun Bernini
        Pohua Sudkamp
        Xiaopeng Uehara
        Irene Isaak
        Dulce Wrigley

1. Try to think of your results as *batches*, or *sets*. The first five results are your first batch. The five after that would be your second batch, etc. Update the query to find the tenth batch of results. The employee names should be:

        Piyawadee Bultermann
        Heng Luft
        Yuqun Kandlur
        Basil Senzako
        Mabo Zobel
