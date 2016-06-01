# Sub-queries

### Lesson Goals

- Understand how to use sub queries

-------------------------------------------------

Sub-queries, also called nested queries, refers to having more than one query expression in a query.

## Using Sub-queries

Sub-queries are helpful when we want to find if a value is within a subset of acceptable values.

A nested query follows this syntax:

~~~sql
SELECT column_a, column_b, column_c
FROM table_a
WHERE column_a IN (
    SELECT column_a
    FROM table_b
    WHERE column_b = true
);
~~~

From our employees database, we can use this example query to find all the department managers names and birth dates:

~~~sql
SELECT first_name, last_name, birth_date
FROM employees
WHERE emp_no IN (
    SELECT emp_no
    FROM dept_manager
)
LIMIT 10;
~~~

That query should return the following result:

~~~
+------------+--------------+------------+
| first_name | last_name    | birth_date |
+------------+--------------+------------+
| Margareta  | Markovitch   | 1956-09-12 |
| Vishwani   | Minakawa     | 1963-06-21 |
| Ebru       | Alpin        | 1959-10-28 |
| Isamu      | Legleitner   | 1957-03-28 |
| Shirish    | Ossenbruggen | 1953-06-24 |
| Karsten    | Sigstam      | 1958-12-02 |
| Krassimir  | Wegerle      | 1956-06-08 |
| Rosine     | Cools        | 1961-09-07 |
| Shem       | Kieras       | 1953-10-04 |
| Oscar      | Ghazalie     | 1963-07-27 |
+------------+--------------+------------+
~~~

## Exercises

### Exercise Goals

- Use sub queries to find information in the employees database

-------------------------------------------------

1. `USE` the `employees` database.

1. Craft queries to return the results for the following criteria:
    - Find all the employees with the same hire date as employee `101010` using a sub-query.
    - Find all the titles held by all employees with the first name `Aamod`.
    - Find all the department managers that are female.
    - **BONUS** Find all the department names that have female managers.
