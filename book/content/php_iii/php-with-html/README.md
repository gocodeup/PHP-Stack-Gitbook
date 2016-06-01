# PHP with HTML

Mixing PHP and HTML is quite easy. Let us take a look at a few examples to see exactly what it takes.

```html
<?php

$message = 'Hello Codeup';

?>
<!DOCTYPE html>
<html>
...
</html>
```

Examine the example above. When we write PHP, we are accustomed to surrounding our code in `<?php ?>` tags, right? We need to do the same thing when we mix PHP and HTML. The PHP interpreter will not even bother to look at anything outside of the PHP tags.

Notice that we have a block of PHP code that defines the variable `$message` at the top of the file. Placing all of our PHP business logic above our HTML code is good practice; it makes maintaining our code easier, and will help make transitioning into MVC frameworks much simpler.

Next, notice that the `$message` variable has yet to be echoed within our HTML. Echoing or looping through variables with PHP mixed with the HTML will be fine. After all, we have to be able to output our PHP variables somehow. Let us look at this example in a bit more detail.

```html
<?php

$message = 'Hello Codeup';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Codeup!</title>
</head>
<body>
    <h1>echo $message;</h1>
</body>
</html>
```

Do you see any problems with the above code? Remember how we said that the PHP interpreter will not process any code not inside of PHP tags? Well, the `echo $message` in the header tags is not surrounded by PHP tags and will just print to the screen as plain text.

In order to have `$message` print to the screen we can wrap the echo statement in PHP tags like so:

```html
<?php

$message = 'Hello Codeup';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Codeup!</title>
</head>
<body>
    <h1><?php echo $message; ?></h1>
</body>
</html>
```

Remember to always wrap any PHP code that needs to be evaluated and printed to the screen with PHP tags. This will ensure that your code gets displayed properly to the screen.

Now, let us look at an example in which a message is shown conditionally.

```html
<!DOCTYPE html>
<html>
<head>
    <title>Codeup!</title>
</head>
<body>
    <?php
    $message = 'Hello Codeup';
    $showMessage = false;
    if ($showMessage) {
        echo "<h1>$message</h1>";
    } else {
        echo '<h1>Sorry, no message...</h1>';
    }
    ?>
</body>
</html>
```

The code above will work, but it just is not the way we want to you to do it. Notice how the PHP tags within the HTML are doing more than just echoing a result. There are variable declarations going on and that is __not__ good practice. Also, notice that HTML tags are being echoed by PHP. This is generally discouraged and the above code would be much better written as shown below.

```html
<?php

$message = 'Hello Codeup';
$showMessage = false;

?>
<!DOCTYPE html>
<html>
<head>
    <title>Codeup!</title>
</head>
<body>
    <?php if ($showMessage) { ?>
        <h1><?php echo $message; ?></h1>
    <?php } else { ?>
        <h1>Sorry, no message...</h1>
    <?php } ?>
</body>
</html>
```

Notice how we now have a very clean separation between our PHP and HTML. The variable declarations are all at the top of the file. Additionally, the mixing of PHP and HTML is better. No longer is PHP echoing HTML, but instead, we have PHP variables being output within HTML. If you can get in the habit of doing things like this now, it will pay off in the long run.

Now, let us look at an example of a loop within HTML.

```html
<?php

$favoriteFoods = ['Brownies', 'Pound Cake', 'Doughnuts'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Codeup!</title>
</head>
<body>
    <h1>My Favorite Foods</h1>
    <ol>
    <?php foreach ($favoriteFoods as $favoriteFood) { ?>
        <li><?php echo $favoriteFood; ?></li>
    <?php } ?>
    </ol>
</body>
</html>
```

Above is another example of a clean separation between PHP and HTML. As you can see, you already know most of what you need to mix PHP and HTML. The other PHP constructs you have learned about will work just as you would expect. Now it is time for you to try this out yourself!

## Exercises

### Server Name Generator

We are going to build a server name generator. To do this, we will need to follow the specs below.

1. Create a new file in your `public` directory named `server-name-generator.php`.
1. Create two arrays.
    - One containing at least 10 adjectives.
    - Another containing at least 10 nouns.
1. Create a function that will return a random element from an array.
1. Create a function that returns the string value of our new server name made by combining a random adjective with a random noun.
    - Each time you refresh the page a different result should be displayed.
    - Make sure you have fun with it. Add CSS to make it fancy.

### My Favorite Things

We are going to build a simple list of your favorite things and display these in the form of a table in HTML.

1. Create a new file named `my-favorite-things.php` and put it in your `public` directory.
1. Create an array of your favorite things. This array should contain at least five things.
1. We will need to loop through this array and display each element inside your HTML.
    - Use an HTML table for this display.
    - Use CSS to add a light gray background on every other row for a nice effect.
    - Have fun and make it beautiful!
