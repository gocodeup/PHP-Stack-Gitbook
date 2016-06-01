# Include and Require

Up to this point, we have written individual PHP files that stand on their own. However, when you are actually building projects, you will want to organize your code more efficiently than that. Include and require are two statements in PHP that will help us with this.

## Include

To start out, let us look at a simple example of including one file in another.

```php
<?php
// one.php
echo "one" . PHP_EOL;
?>
```

```php
<?php
// two.php
include 'one.php';
echo "two" . PHP_EOL;
?>
```

Assuming these files are both located in the same directory, running the `two.php` file will produce the following output:

    one
    two

So, when you run `two.php`, it is as if you copied the contents from `one.php` and pasted it where the `include` statement is. Now, what would happen if we ran `two.php`, but the included file, `one.php`, did not exist. We would get output that looks like this:

    Warning: include(one.php): failed to open stream: No such file or directory in two.php on line 4
    Warning: include(): Failed opening 'one.php' for inclusion (include_path='.:') in two.php on line 4
    two

Here, we can see that PHP will produce warnings when an included file does not exist. We can also see that after the warnings, the code that follows the include statement will still be run. This sets us up to now look at require so we can see how it works differently.

## Require

Require works nearly the same as include. The difference is in how a missing file is handled. Here is the same example as above, except with a `require` statement.

```php
<?php
// one.php
echo "one" . PHP_EOL;
?>
```

```php
<?php
// two.php
require 'one.php';
echo "two" . PHP_EOL;
?>
```

This produces the exact same output as the include:

    one
    two

Here is what happens when the required file, `one.php`, does not exist:

    Warning: require(one.php): failed to open stream: No such file or directory in two.php on line 4
    Fatal error: require(): Failed opening required 'one.php' (include_path='.:') in two.php on line 4

Notice here that we get a warning and a fatal error. When PHP encounters a fatal error, code execution will not continue. We can see that to be true by noticing that the word 'two' is never echoed.

So, the summary is: Use include when you want to include another file but continue on even if the file is not there. Use require when you do not want to continue if the required file is not found.

## Include and Require Once

The [`include_once`](http://php.net/manual/en/function.include-once.php) statement includes and evaluates the specified file during the execution of the script. This is a behavior similar to the include statement, with the only difference being that if the code from a file has already been included, it will not be included again, and include_once returns TRUE. As the name suggests, the file will be included just once.

The [`require_once`](http://php.net/manual/en/function.require-once.php) statement is identical to require except PHP will check if the file has already been included, and if so, not include (require) it again.

This is meant to be used as a tool to avoid repeating yourself, and help you to avoid causing conflicts in your application by including your excess code multiple times, unnecessarily. This can cause problems in your application, and make your code disorganized, harder to read, and can potentially lead you to having a file included more times than is necessary in your program structure.

Feel free to take a look at the PHP docs for more information, on the subject. But you will likely find these two PHP commands more often in larger applications, where organization needs to be clear and duplications in code need to be as limited as possible.

## Practical Applications

Our examples in this lesson are very simple, but there are many very practical ways that you can apply `include` and `require`. There is an important principle in coding that says: "Don't repeat yourself." This basically means that if you find yourself writing the same code many times you have probably found an opportunity to perform some code optimization.

### Templating

Think about building a website with several pages. There is the homepage, a contact page, an about page, some blog articles, etc. Every page has the same header, navbar, and footer and you keep pasting it over and over again. Now, you want to add a link to the menu... well, you have half a dozen or more pages to go update now.

Instead, imagine that you separated your header and navbar and footer into separate files that get included in each page. Brilliant! Now you just have to go add the new menu item to the navbar file and it automatically gets updated on all the other pages.

An include file that acts as a template doesn't have to contain any PHP code. It doesn't even need to be named with a `.php` extension. So, do not worry if you have a `footer.php` that only contains HTML.

### Reusable Code

Now, think about all the nifty functions you have been building. When you want to use one of them in a new file, you copy and paste it. Now that we know about require, we certainly shouldn't be doing that. Instead, you can create a `functions.php` file and place all of your great functions there (perhaps you can come up with better naming as your function library grows). Then, you can just require the file in any other PHP file that uses one or more of the functions.

## Exercises

Create some reusable code. To fill in some of the functions, you will need to read about and use the `$_REQUEST` superglobal for PHP.

1. Create a file called `functions.php` and add the following functions:
    - inputHas($key): returns true or false based on whether the key is available.
    - inputGet($key): returns the value specified by the key, or null if the key is not set.
    - escape($input): returns the input as a safely escaped string.

1. Now, go back to the ping/pong and user login lessons from PHP with HTML and require the functions file you created. Use the input wrapper functions you created in place of accessing `$_GET` or `$_POST` directly. Also, use the `escape` function anywhere you need to echo user input.

Create a small templated web site.

1. Create a header, navbar, and footer all as separate PHP files. Add some HTML content to them as appropriate for each one.
1. Create an `index.php` file that includes all the other templates. Try viewing the index and see if it appears as you expected. Make sure you also view the page source to make sure that things come out just right.
