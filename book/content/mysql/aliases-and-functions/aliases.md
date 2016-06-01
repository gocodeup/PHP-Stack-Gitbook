# Aliases

### Lesson Goals

- Understand how to use aliases

-------------------------------------------------

Aliases allow us to assign a temporary name to a column or table.

## Using Aliases

Aliases are commonly used to make temporary names for joins, or to change the output of a column's name.

We use the `AS` keyword to assign an alias to a column name or table.

~~~sql
SELECT CONCAT(first_name, ' ', last_name) AS full_name
FROM employees
LIMIT 25;
~~~

A SELECT expression can be given an alias using AS alias_name. The alias is used as the expression's column name and can be used in GROUP BY, ORDER BY, or HAVING clauses.

~~~sql
SELECT CONCAT(first_name, ' ', last_name) AS full_name
FROM employees
ORDER BY full_name
LIMIT 25;
~~~

We can still use the original column names alongside the aliases.

~~~sql
SELECT CONCAT(first_name, ' ', last_name) AS full_name
FROM employees
GROUP BY full_name
ORDER BY last_name
LIMIT 25;
~~~

The AS keyword is optional when aliasing a SELECT expression with an identifier.

We can also alias the table name.

~~~sql
SELECT CONCAT(first_name, ' ', last_name) AS full_name
FROM employees AS emp
GROUP BY full_name
ORDER BY last_name
LIMIT 25;
~~~

While aliasing the table name may not seem useful, we will use it when we are joining tables to make it easier to reference the different tables.

**BEWARE:** It is not permissible to refer to a column alias in a WHERE clause, because the column value might not yet be determined when the WHERE clause is executed.  This query will fail with an error:

~~~sql
SELECT birth_date, CONCAT(first_name, ' ', last_name) AS full_name, gender
FROM employees
WHERE hire_date='1985-01-01'
  AND full_name='Arie Staelin';
~~~

## Exercises

### Exercise Goals

- Use aliases to create more readable output from our queries

-------------------------------------------------

1. Use the employees database.

1. Return 10 employees in a result set named "full_name" in the format of "lastname, firstname" for each employee.

1. Add the date of birth for each employee as "DOB" to the query.

1. Update the query to format `full name` to include the employee number so it is formatted as "employee number - lastname, firstname".

    The final result should look like this:

    ~~~
    +-----------------------------+------------+
    | full_name                   | DOB        |
    +-----------------------------+------------+
    | 10001 - Facello, Georgi     | 1953-09-02 |
    | 10002 - Simmel, Bezalel     | 1964-06-02 |
    | 10003 - Bamford, Parto      | 1959-12-03 |
    | 10004 - Koblick, Chirstian  | 1954-05-01 |
    | 10005 - Maliniak, Kyoichi   | 1955-01-21 |
    | 10006 - Preusig, Anneke     | 1953-04-20 |
    | 10007 - Zielinski, Tzvetan  | 1957-05-23 |
    | 10008 - Kalloufi, Saniya    | 1958-02-19 |
    | 10009 - Peac, Sumant        | 1952-04-19 |
    | 10010 - Piveteau, Duangkaew | 1963-06-01 |
    +-----------------------------+------------+
    10 rows in set (0.00 sec)
    ~~~
