# Retrieving Data

In the previous exercise we used `exec()` to create tables and insert data. Although that function is well suited for those tasks, it doesn't return useful data from the database. For that we will be using the `query()` method.

## Using query() and PDOStatement

When we want to `SELECT` data from the database we use the function `query()`. Assuming our SQL code is valid and returns results, `query()` will return an instance of `PDOStatement`. We use that object to iterate through the results and pull back metadata about them. If there are any SQL errors, `query()` will throw a `PDOException`.

To use the `query()` method, we pass it a SQL `SELECT` statement as a string, like the following:

~~~php
$stmt = $dbc->query('SELECT id, name, email FROM users');
~~~

The variable `$stmt` now contains an instance of `PDOStatement` representing the results of our query.

### Results Metadata

The `PDOStatement` class provides a couple of methods that are useful for determining information about the results.

- `$stmt->columnCount()` &mdash; The number of columns in a result.
- `$stmt->rowCount()` &mdash; The number of rows in a result.

For example, we can do the following:

~~~php
$stmt = $dbc->query('SELECT * FROM users');

echo "Columns: " . $stmt->columnCount() . PHP_EOL;
echo "Rows: " . $stmt->rowCount() . PHP_EOL;
~~~

With our current dataset, we would expect to see the following output:

    Columns: 3
    Rows: 4

***Note!*** *The `rowCount()` method is typically intended for `INSERT`, `UPDATE`, and `DELETE` queries. MySQL will return the number of rows selected, but this may not be true of other databases you work with in the future.*

### Fetching Row(s)

The most common way to get our results from the `PDOStatement` instance is to use the `fetch()` method. By default, this function will return the current database row as an array and advance to the next row. By putting our call to `$stmt->fetch()` in the heading of a `while` statement we can iterate through all the results, like the following:

~~~php
$stmt = $dbc->query('SELECT * FROM users');

echo "Columns: " . $stmt->columnCount() . PHP_EOL;
while ($row = $stmt->fetch()) {
    print_r($row);
}
~~~

We would expect the following output from the above code:

    Columns: 3
    Array
    (
        [id] => 1
        [0] => 1
        [email] => benb@codeup.com
        [1] => benb@codeup.com
        [name] => Ben Batschelet
        [2] => Ben Batschelet
    )
    Array
    (
        [id] => 2
        [0] => 2
        [email] => jason@codeup.com
        [1] => jason@codeup.com
        [name] => Jason Straughan
        [2] => Jason Straughan
    )
    Array
    (
        [id] => 3
        [0] => 3
        [email] => chris@codeup.com
        [1] => chris@codeup.com
        [name] => Chris Turner
        [2] => Chris Turner
    )
    Array
    (
        [id] => 4
        [0] => 4
        [email] => michael@codeup.com
        [1] => michael@codeup.com
        [name] => Michael Girdley
        [2] => Michael Girdley
    )

Notice that for each database row, `fetch()` appears to have duplicated each value&mdash;even though `columnCount()` reports that there are only three columns&mdash;once with a numeric key and then again with an associative key. This is because we did not specify how we wanted `fetch()` to return each row. We can pass a parameter to `fetch()` instructing how our data returned. Some common values (taken from [PHP.net](http://www.php.net/manual/en/pdostatement.fetch.php)) are:

- `PDO::FETCH_ASSOC` &mdash; returns an array indexed by column name as returned in your result set
- `PDO::FETCH_NUM` &mdash; returns an array indexed by column number as returned in your result set, starting at column 0
- `PDO::FETCH_BOTH` &mdash; (default) returns an array indexed by both column name and 0-indexed column number as returned in your result set

***Note!*** *We are passing what are called "class constants" to `fetch()`. These are part of the `PDO` class itself, and not our `$dbc` instance, and identified by the `::` operator.*

In order to see what effect each of these values has, we can try out the following code. Pay attention to the different ways in which our data is outputted:

~~~php
$stmt = $dbc->query('SELECT * FROM users');

print_r($stmt->fetch());
// Output: Array
// (
//     [id] => 1
//     [0] => 1
//     [email] => benb@codeup.com
//     [1] => benb@codeup.com
//     [name] => Ben Batschelet
//     [2] => Ben Batschelet
// )

print_r($stmt->fetch(PDO::FETCH_ASSOC));
// Output: Array
// (
//     [id] => 2
//     [email] => jason@codeup.com
//     [name] => Jason Straughan
// )

print_r($stmt->fetch(PDO::FETCH_NUM));
// Output: Array
// (
//     [0] => 3
//     [1] => chris@codeup.com
//     [2] => Chris Turner
// )

print_r($stmt->fetch(PDO::FETCH_BOTH));
// Output: Array
// (
//     [id] => 4
//     [0] => 4
//     [email] => michael@codeup.com
//     [1] => michael@codeup.com
//     [name] => Michael Girdley
//     [2] => Michael Girdley
// )

~~~

Realistically speaking, we would probably never really want to do something like that, typically you pick one fetch style that suits the needs of your project and stick with it, but it is helpful to see how each option affects our output.

The `fetch()` method can be useful if we want to act on individual rows of a result, or even individual columns (for example, if we wanted to concatenate two or more values from the database together). However, often times we simply want to get back all the results of a query all at once. For example, imagine we had a function to get back all the users from the database. We could write it like so:

~~~php
function getUsers()
{
    // Bring the $dbc variable into scope somehow

    $stmt = $dbc->query('SELECT * FROM users');

    $rows = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $rows[] = $row;
    }

    return $rows;
}
~~~

However, PDO gives us a method called `fetchAll()` that makes such a function **much** easier. Instead of looping over the results from `fetch()`, `fetchAll()` will return all the results of the query in a single two dimensional array. The previous function could be rewritten as follows:

~~~php
function getUsers()
{
    // Bring the $dbc variable into scope somehow

    return $dbc->query('SELECT * FROM users')->fetchAll(PDO::FETCH_ASSOC);
}
~~~

By using `fetchAll()`, and chaining our method calls, we have reduced the function to nearly a one liner! Moreover, notice we can pass the same `PDO::FETCH_*` constants to the method to control what format our results are in.

At the other end of the spectrum, occasionally we don't want a full set of results back from the database, or even all the values of a row. If all we are interested in is a single value of a single row, we can use the `fetchColumn()` method to retrieve that value quite simply. Most often, this is useful if you want to know how many records are in a table, like the following:

~~~php
$stmt = $dbc->query('SELECT count(*) FROM users');

echo 'There are ' . $stmt->fetchColumn() . ' users in our database' . PHP_EOL;
~~~

Because the `count(*)` query returns only a single value, `fetchColumn()` is an ideal tool for retrieving specific data without any of the additional cruft of `fetch()` or `fetchAll()`.

## Exercises

Use PDO for all queries, nothing should be done directly in MySQL or Sequel Pro. Between each step commit your changes to Git. At the end the exercise, push all your commits to GitHub.

1. Inside `~/vagrant-lamp/sites/codeup.dev/public` create a page called `national_parks.php` that lists the national parks from your database. On each page load, it should retrieve all records from the database and display them.

1. Modify your query to load only four parks at a time. Use a parameter in `$_GET` to determine which page the user is on and load only the appropriate parks for that page.

1. Modify your page to add links to go to the next or previous page(s).

1. Add some logic to determine whether or not to show the next and/or previous page links.

Some hints:

- You will need to determine the total number of parks in the database.
- It may be useful to write out a table like the following on a piece of paper:

|   Page | 1   | 2   | 3   | ... |
| ------ | --- | --- | --- | --- |
|  Limit | ... | ... | ... | ... |
| Offset | ... | ... | ... | ... |

- Based on these values you will come up with a formula for your query parameters and your logic for displaying the links.