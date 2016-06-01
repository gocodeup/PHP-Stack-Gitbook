# Reading Files

Reading the contents of a file is very important for programming. Configuration files, data files, text documents, images; all these files need to be read by computer programs everyday.

Whether you are parsing large amounts of data within your program, or watching the state of files for particular sets of information, or verifying information against flat files, you can easily accomplish these tasks using PHP's native filesystem functions.

## Using PHP to Read Files

We will be using the following functions in these examples:

- [`fopen()`](http://us2.php.net/manual/en/function.fopen.php) &mdash; Opens a file (or URL), returns a _file pointer_
- [`fread()`](http://us2.php.net/manual/en/function.fread.php) &mdash; Reads a file to a specific length using a file pointers
- [`filesize()`](http://us2.php.net/manual/en/function.filesize.php) &mdash; Returns the size of a given file in bytes.
- [`fclose()`](http://us2.php.net/manual/en/function.fclose.php) &mdash; Closes a handle to an open file pointer.

Let's assume the local directory we are working in has a file named `cities.txt` which contains a list of cities and their respective states.

**cities.txt**

    Berkeley County, South Carolina
    Council Bluffs, Iowa
    Douglas County, Georgia
    Quilicura, Chile
    Mayes County, Oklahoma
    Lenoir, North Carolina
    The Dalles, Oregon

We need to open and read this list file, and make each line an element in an array.  To accomplish this, we could use PHP's file functions, specifically `fopen()` and `fread()`.

~~~php
<?php

$filename = 'cities.txt';
$handle = fopen($filename, 'r');
$contents = fread($handle, filesize($filename));
echo $contents;
fclose($handle);
~~~

Let's take a look at this code line by line.

~~~php
$filename = 'cities.txt';
~~~

Pretty simple, we are just assigning a string containing the name of our file to the variable `$filename`.  We could skip this step completely and pass the filename directly to the `fopen()` function on the next line. However, doing this extra step ensures that the code is easier to read, easier to update, and we may need the variable later.

~~~php
$handle = fopen($filename, 'r');
~~~

Here we are calling `fopen()` on our `$filename`, and passing the "r" option to _read_ the file.  `fopen()` returns a file pointer, pointing to the beginning of the file's contents.  We are assigning that file pointer to `$handle`.

~~~php
$contents = fread($handle, filesize($filename));
~~~

Here we are reading the file using `fread()`.  This function will read the contents of a file for a specific length, or until the end of the file is reached.  As we are not worried about our list exceeding the bounds of memory, we can open the entire file using `filesize()` to return the size of the file in bytes.  We are assigning the read contents to a new variable `$contents`.

~~~php
echo $contents;
~~~

This should be pretty obvious by now, we are outputting the string `$contents`.

~~~php
fclose($handle);
~~~

We use `fclose()` to close the file pointer handle we have to the open file when we are no longer using it.

## Making Each Line an Array Element

Flat files are often used to store data, logs, and other information from within an application.  Being able to read a file and make each line a new element in an array is a common task when creating command line applications.

Using our `cities.txt` example file from above, we can add the following code to our example to create an array of cities.

~~~php
$contentsArray = explode("\n", $contents);
~~~

By using the array function `explode()` and using the newline character as a delimiter, we can break the contents by line into array elements.

The entire code would read:

~~~php
$filename = 'cities.txt';
$handle = fopen($filename, 'r');
$contents = fread($handle, filesize($filename));
$contentsArray = explode("\n", $contents);
fclose($handle);
~~~

And outputting `$contentsArray` would yield:

    print_r($contentsArray);

    Array
    (
        [0] => Berkeley County, South Carolina
        [1] => Council Bluffs, Iowa
        [2] => Douglas County, Georgia
        [3] => Quilicura, Chile
        [4] => Mayes County, Oklahoma
        [5] => Lenoir, North Carolina
        [6] => The Dalles, Oregon
    )

## Exercises

1. Save [contacts.txt](../../examples/php/contacts.txt) and [contact-parser.php](../../examples/php/contact-parser.php) to your `~/vagrant-lamp/exercises` directory.

1. Open `contact-parser.php` in Sublime and complete the function `parseContacts()`. By the end, your output should look like the following.

        array(3) {
            [0]=>
            array(2) {
                ["name"]=>
                string(10) "Jack Blank"
                ["number"]=>
                string(12) "123-123-1234"
            }
            [1]=>
            array(2) {
                ["name"]=>
                string(8) "Jane Doe"
                ["number"]=>
                string(12) "234-234-2345"
            }
            [2]=>
            array(2) {
                ["name"]=>
                string(9) "Sam Space"
                ["number"]=>
                string(12) "345-345-3456"
            }
        }

### Additional Notes

- Notice the phone numbers are formatted with dashes in them.

    _**Hint:** You may be able to accomplish this with help from the native PHP function: [`substr()`](http://php.net/manual/en/function.substr.php)_

- Remember to close your file before the function returns!
