# GROUP BY

### Lesson Goals

- Understand the `ORDER BY` clause

-------------------------------------------------

Grouping results based on data in columns allows us to remove duplicates, much like using `DISTINCT`.

## Using the GROUP BY clause

GROUP BY follows the same syntax as ORDER BY.

~~~sql
SELECT column FROM table GROUP BY column_name [ASC|DESC];
~~~

However, GROUP BY returns only the unique occurrences of the column specified.

~~~sql
SELECT DISTINCT first_name
FROM employees;
~~~

Should get the same results as:

~~~sql
SELECT first_name
FROM employees
GROUP BY first_name;
~~~

MySQL extends the use of GROUP BY to permit selecting fields that are not mentioned in the GROUP BY clause.  This is not the case for all databases.

~~~sql
SELECT first_name, last_name
FROM employees
GROUP BY hire_date;
~~~

MySQL extends the GROUP BY clause so that you can also specify ASC and DESC after columns named in the clause:

~~~sql
SELECT last_name
FROM employees
GROUP BY first_name ASC;
~~~

## Exercises

### Exercise Goals

- Use the `ORDER BY` clause to create more complex queries

-------------------------------------------------

1. Create a new file in your `sql` directory called `group_by_exercise.sql`
1. In your script, use `DISTINCT` to find the unique titles in the `titles` table. Your results should look like:

        Senior Engineer
        Staff
        Engineer
        Senior Staff
        Assistant Engineer
        Technique Leader
        Manager

1. Update the previous query to sort the results alphabetically.

1. Find your query for employees whose last names start **and** end with `'E'`. Update the query find just the *unique* last names that start and end with `'E'` using `GROUP BY`. The results should be:

        Eldridge
        Erbe
        Erde
        Erie
        Etalle

1. Update your previous query to now find unique combinations of first and last name where the last name starts and ends with `'E'`. You should get 846 rows.

1. Find the unique last names with a `'q'` but not `'qu'`. You may use either `DISTINCT` or `GROUP BY`. Your results should be:

        Chleq
        Lindqvist
        Qiwen

1. After each step commit your changes and push to GitHub when you are done.
