# Dynamic Queries and User Input

Thus far, our SQL queries have used pretty minimal dynamic input, especially from users. It may be tempting to simply use string interpolation or concatenation to build query strings dynamically however that approach comes with some significant limitations.

1. When quoting values within SQL queries, handling inline quote characters can get difficult. We will highlight this further in the next section.
1. As a consequence of that confusion, we leave ourselves open to a user inserting malicious code into our query that could do [serious damage](http://xkcd.com/327/).
1. Whenever we sent a query to MySQL several complicated steps are done behind the scenes. In order to cut down on this complexity, MySQL will attempt to cache the results of these optimizations and analysis. If we send multiple queries where the only thing that changes is a single value (such as, what ID we are querying for) MySQL has to try to cache each and everyone of those queries. It would be far more efficient if we could send the basic query once for MySQL to *prepare* and cache, and then send whatever parts of the query change as a separate piece.

## The Trouble with Quotes

We saw in a previous lesson on MySQL that we must escape certain characters within strings, just like PHP. Unlike PHP however, we are now embedding MySQL code *inside* of PHP. This can create some confusion when dealing with escaping characters. For example, if we had the following code in PHP

~~~php
$string = 'Can\'t, or won\'t?';

$query = "SELECT character_name FROM famous_quotes WHERE quote = '$string'";
~~~

The string we see is:

    'Can\'t, or won\'t?'

Inside of PHP, the string delimiters are removed and the escape characters are parsed, so PHP understands the string as:

    Can't, or won't?

When PHP interpolates that string within `$query` however this would create a problem. As it is written, the query we would send to MySQL in this case would be:

~~~sql
SELECT character_name FROM famous_quotes WHERE quote = 'Can't, or won't?'
~~~

As we can see even though we have escaped those single quote characters from PHP, when they are sent to MySQL they are no longer escaped, and our query will now fail. Thankfully PDO provides us with a method to avoid this and the above problems.

## Question Mark Parameters

When writing prepared statements, you must provide placeholders for PDO and MySQL to substitute in the dynamic values. The simplest form of place holder is simply `?`. We can use as many `?` as we need to substitute in our values. Going back to our example of inserting users into our database, we can update it slightly:

~~~php
$query = 'INSERT INTO users (email, name) VALUES (?, ?)';

$stmt = $dbc->prepare($query);
~~~

It is very important to note that in addition to eliminating the variable interpolation, we also get rid of the `'`s around them; PDO and MySQL will automatically quote the values as needed for us. Once we have our query, we pass it to a new PDO function, `prepare()` that gets the query ready for execution.

## Binding Values Directly

Even though we have prepared our query we have *not* executed it against the database, which is good because we also have not told it what values we want to use for those placeholders. The method we use to run the query is `$stmt->execute()`. This method can optionally take an array of values we want bound to our placeholders, for `?` parameters we use a numerically indexed array.

~~~php
$query = 'INSERT INTO users (email, name) VALUES (?, ?)';

$stmt = $dbc->prepare($query);

$stmt->execute(array('ben@codeup.com', 'Ben Batschelet'));
~~~

## Named Parameters

As queries get more complex, using multiple `?`s can get confusing and it can be difficult to tell which `?` goes with which value or parameter. Thankfully, PDO provides us with a second way in which we can define our placeholders: using named parameters. Our parameter names must start with a `:` and then a letter, followed by any combination of letters, numbers, and `_`, much like a variable in PHP. Updating our previous query, we can use:

~~~php
$query = 'INSERT INTO users (email, name) VALUES (:email, :name)';

$stmt = $dbc->prepare($query);
~~~

Now, it is much clearer which placeholder should correspond to which column. Just like before, we can pass an array to `$stmt->execute()`, but instead of numeric keys, we use the parameter name as the key.

~~~php
$query = 'INSERT INTO users (email, name) VALUES (:email, :name)';

$stmt = $dbc->prepare($query);

$stmt->execute(array(':email' => 'ben@codeup.com', ':name' => 'Ben Batschelet'));
~~~

Notice that we are no longer using `?` parameters with these queries. You cannot mix the two parameter types in the same query, you must use either `?`s **or** named parameters.

Another important note comes from the PHP documentation on [`prepare()`](http://www.php.net/manual/en/pdo.prepare.php)

> You cannot use a named parameter marker of the same name twice in a prepared statement.

Although the documentation specifies that you cannot use a named parameter more than once, doing so usually works without issue. If you do so, your query will probably still work, but there is no guarantee that it will not break in future versions of PHP or with a different database backend.

## Using bindValue()

Passing bound values directly to `$stmt->execute()` has a few limitations. First off, we can see that if we needed to use a more complicated query with many different bound values, we would be passing a rather large array to the method. More importantly however, bound values typically have a data type assigned to them. When we are passing values to `$stmt->execute()`, PDO assumes all the values are strings, however that will not necessarily work for other data types; in particular `LIMIT` and `OFFSET` values **must** be integers. So, we need some method to specify a bound parameter name, value, and data type &mdash; `$stmt->bindValue()` is that method.

The method `$stmt->bindValue()` accepts three parameters. The first is the parameter name, like the array keys before (it can also accept numeric values if you are using `?` parameters, starting with `1`), the second is the value you want bound, but the third is a PDO constant indicating the data type. There are several different [data type constants](http://www.php.net/manual/en/pdo.constants.php), but the most common ones you will use are:

- `PDO::PARAM_BOOL` &mdash; boolean data type
- `PDO::PARAM_INT` &mdash; integer data type
- `PDO::PARAM_STR` &mdash; string data type
- `PDO::PARAM_NULL` &mdash; null data type

Notice there isn't a float data type; we will be using `PDO::PARAM_STR` in its place.

Updating our script to insert into the users table,

~~~php
$users = [
    ['email' => 'jason@codeup.com',   'name' => 'Jason Straughan'],
    ['email' => 'chris@codeup.com',   'name' => 'Chris Turner'],
    ['email' => 'michael@codeup.com', 'name' => 'Michael Girdley']
];

$stmt = $dbc->prepare('INSERT INTO users (email, name) VALUES (:email, :name)');

foreach ($users as $user) {
    $stmt->bindValue(':email', $user['email'], PDO::PARAM_STR);
    $stmt->bindValue(':name',  $user['name'],  PDO::PARAM_STR);

    $stmt->execute();
}
~~~

It is important to note that we prepared our query *outside* of our loop. We only need to prepare our query **once** and then inside the loop we bind our values and execute it multiple times.

Now if we wanted to return the user with an `id` of 1 we would do the following:

~~~php
$stmt = $dbc->prepare('SELECT * FROM user WHERE id = :id');

$stmt->bindValue(':id', 1, PDO::PARAM_INT);
$stmt->execute();

print_r($stmt->fetch(PDO::FETCH_ASSOC));
~~~

Because we have bound our values explicitly we no longer need to pass anything to `execute()`. In fact, passing a value to that function would attempt to overwrite our bound variables and could lead to errors or unexpected behavior.

## Exercises

1. Update `park_migration.php` to include an additional column named `description` in the `national_parks` table (you may still use `exec()` for this step).

1. Update `park_seeder.php` to use `prepare()` rather than `exec()`. Add values for the park descriptions. *Hint: you should only have to prepare your `insert` query once!*

1. Update the query(s) in `national_parks.php` to use prepared statements, in particular for the limit and offset.

1. Add a form that allows national parks to be added to your database.  Use prepared statements for all queries that contain dynamic data.

1. Validate all form inputs to ensure that database entries are not empty.
