# Writing to Files

Reading files is a great feature, and writing to files can be even more powerful.  Computer programs need to store information all the time; for their own needs, for log files, and for outputting files for end users.

Have you ever exported your bank transactions to a spreadsheet from your bank's website? There was a program that grabbed all that data, and wrote it to a spreadsheet formatted file for you to download.

PHP makes it easy to write data to a file, no matter the use case.

## Using PHP to Write to Files

In our last example, we used `fopen()` to read a file, passing the mode of `r`.

The [PHP documentation for `fopen()`](http://php.net/manual/en/function.fopen.php) lists the possible modes for `fopen()`. The three most frequently used modes are the following:

Mode | Description
--- | ---
`'r'` | Open for reading only; place the file pointer at the beginning of the file.
`'w'` | Open for writing only; place the file pointer at the beginning of the file and truncate the file to zero length. If the file does not exist, attempt to create it.
`'a'` | Open for writing only; place the file pointer at the end of the file. If the file does not exist, attempt to create it.

We'll be using the `'a'` mode for writing to the end of a file.

In the previous subunit, we created this text file:

**cities.txt**

    Berkeley County, South Carolina
    Council Bluffs, Iowa
    Douglas County, Georgia
    Quilicura, Chile
    Mayes County, Oklahoma
    Lenoir, North Carolina
    The Dalles, Oregon

In this example, we are going to add the following cities to the file.

    Changhua County, Taiwan
    Hamina, Finland
    St Ghislain, Belgium
    Dublin, Ireland

Here is the code we'll use to write these to a file.

~~~php
<?php
$newCities = ['Changhua County, Taiwan', 'Hamina, Finland', 'St Ghislain, Belgium', 'Dublin, Ireland'];

$filename = 'txt/cities.txt';
$handle = fopen($filename, 'a');
foreach ($newCities as $city) {
    fwrite($handle, PHP_EOL . $city);
}
fclose($handle);
~~~

Let's examine this code and see what it is doing.

~~~php
$newCities = ['Changhua County, Taiwan', 'Hamina, Finland', 'St Ghislain, Belgium', 'Dublin, Ireland'];
~~~

This should be very familiar by now, we've created an array using the PHP 5.4 syntax.

~~~php
$filename = 'txt/cities.txt';
$handle = fopen($filename, 'a');
~~~

Like before, we set the filename to a variable, then created a handle to the file pointer.  This time we used the `'a'` mode instead of `'r'`.  `'a'` opens the file for writing and puts the pointer at the end of the file.

~~~php
foreach ($newCities as $city) {
    fwrite($handle, PHP_EOL . $city);
}
~~~

Here we are iterating through our array and assigning each element's value to a temporary `$city` variable.  Then we are using `fwrite()` to write to the file using the file pointer `$handle`.

We can see the [predefined constant](http://www.php.net/manual/en/reserved.constants.php) `PHP_EOL` being concatenated to the beginning of each string. This is the same as adding a `"\n"` new line character, except this constant will use the new line character that is compatible with the host operating system.  As long as we are working on Linux or OS X based operating systems, `"\n"` works fine, however, on Windows there are other characters for newlines, etc.  Using `PHP_EOL` ensures proper functionality across multiple platforms.

Still, why do we need a newline _before_ each city?  Well, the file pointer is at the end of the file, which means the end of the last line.  To create an entry on a new line, we need to start with a newline character.  To continue this patterns means we'll start each array item on its own line.

In many cases, we will ensure that a file *always* has a newline character at the end in order to avoid this complication.

~~~php
fclose($handle);
~~~

Just like before, anytime we open a resource to a file, we need to close it when we are done.

## Exercises

When building web applications it is very important to add logging to track when certain events or errors occur. In this exercise, you will be creating a set of functions that will allow you to perform basic logging.

1. Save the file [logger.php](../../examples/php/logger.php) to your `exercises` directory.

1. Open `logger.php` in Sublime and complete the `logMessage` function so that it has the following features:
    - Log to a file named `log-YYYY-MM-DD.log` where the Y, M, and D values are the 4-digit year, 2-digit month, and 2-digit day that the log is taking place.
    - If the log file for a given day does not yet exist, it should be created. If it already exists, it should be appended to.
    - Newer logs should appear at the end of the log file.
    - Log entries should match the format:

            YYYY-MM-DD HH:MM:SS [LEVEL] MESSAGE

    The line starts with a date and time. Next is the `$logLevel`, followed by the `$message`. Each log entry should be on its own line.

1. Add `logInfo()` and `logError()` functions that call `logMessage()`, passing the appropriate log level values. Replace the calls to `logMessage()` with calls to the new functions you just created.
