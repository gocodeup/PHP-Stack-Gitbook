# foreach (cont'd)

`foreach` not only allows us to iterate through the values of an `array` or `object`, it allows us to iterate through the keys as well.

## Using foreach with keys

`foreach` has a more robust syntax for getting keys.

~~~php
foreach (arrayExpression as $key => $value) {
    statement
}
~~~

Here, we've added to the section after the `as` with `$key => $value`.  This now reads "for each array element, yield the key as `$key` and the value as `$value`".

Back to our first example.

~~~php
$numbers = [1, 2, 3, 4, 5];
foreach ($numbers as $key => $value) {
    echo "\$value has a key of {$key} and a value of {$value}\n";
}
~~~

Now our output is more descriptive:

    $value has a key of 0 and a value of 1
    $value has a key of 1 and a value of 2
    $value has a key of 2 and a value of 3
    $value has a key of 3 and a value of 4
    $value has a key of 4 and a value of 5

Remember, key `0` has a value of `1`.  Array keys always default to starting with 0.

Associative arrays yield their keys instead of index number.

~~~php
$studentDetails = array(
    'name' => 'Jane Doe',
    'age' => 29
);

foreach ($studentDetails as $key => $value) {
    echo "Student's $key is $value\n";
}
~~~

This outputs:

    Student's name is Jane Doe
    Student's age is 29

Using multidimensional arrays, we can begin to see the power of combining loops and arrays.

~~~php
$students = array(
    array('name' => 'Virginia Potts', 'age' => 29),
    array('name' => 'Elon Musk', 'age' => 42),
    array('name' => 'Rasmus Lerdorf', 'age' => 45),
    array('name' => 'Marissa Mayer', 'age' => 38)
);

foreach ($students as $student) {
    echo "{$student['name']} is {$student['age']} years old.\n";
}
~~~

This outputs:

    Virginia Potts is 29 years old.
    Elon Musk is 42 years old.
    Rasmus Lerdorf is 45 years old.
    Marissa Mayer is 38 years old.

As we can see, arrays make great data structures, and loops are good at extracting that data quickly and easily.

We can continue to nest our loops as we need to, but remember, the more we nest, the more confusing things become.  Later we'll learn how to refactor solutions like this into more optimal code.

~~~php
$students = array(
    array('name' => 'Virginia Potts', 'age' => 29),
    array('name' => 'Elon Musk', 'age' => 42),
    array('name' => 'Rasmus Lerdorf', 'age' => 45),
    array('name' => 'Marissa Mayer', 'age' => 38)
);

foreach ($students as $student) {
    foreach ($student as $key => $value) {
        echo "Student's $key is $value\n";
    }
}
~~~

Gives us

    Student's name is Virginia Potts
    Student's age is 29
    Student's name is Elon Musk
    Student's age is 42
    Student's name is Rasmus Lerdorf
    Student's age is 45
    Student's name is Marissa Mayer
    Student's age is 38


## Exercises

Use the following array to complete the practice exercises.

~~~php
$books = array(
    'The Hobbit' => array(
        'published' => 1937,
        'author' => 'J. R. R. Tolkien',
        'pages' => 310
    ),
    'Game of Thrones' => array(
        'published' => 1996,
        'author' => 'George R. R. Martin',
        'pages' => 835
    ),
    'The Catcher in the Rye' => array(
        'published' => 1951,
        'author' => 'J. D. Salinger',
        'pages' => 220
    ),
    'A Tale of Two Cities' => array(
        'published' => 1859,
        'author' => 'Charles Dickens',
        'pages' => 544
    )
);
~~~

1. Create a file named `foreach_books.php` in you exercises directory.  Commit each step and push to GitHub.

1. Construct a loop that iterates through each book and then each book's keys and values.  Have it output the book's title, then list the key value pairs for the data about each book.

1. Update your loop to only show books that were written after 1950.
