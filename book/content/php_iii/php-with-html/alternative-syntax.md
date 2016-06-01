# Alternative Syntax For Control Structures

PHP allows a more HTML friendly style of syntax for control structures.  It also allows _short tags_, which are now on by default on most servers.

## Using Short Tags and Alternative Syntax

Short tags and alternative syntax are most commonly used inside of view files when PHP is interspersed with HTML.

### Short Tags

The typical opening and closing tags for PHP are `<?php` and `?>`, respectively. With `short_open_tag` enabled, we can use `<?` and `?>`. Use of these short tags is **strongly** discouraged, as it can conflict with other languages like XML.

On the other hand, PHP offers us a short hand echo tag, often times called a _template tag_.

~~~php
<?= 'Hello Codeup'; ?>
~~~

is short for

~~~php
<?php echo 'Hello Codeup'; ?>
~~~

As we can see, `<?=` means the same thing as `<?php echo`. Template tags can be used without enabling `short_open_tag` and can do a lot to clean up your code.

### Alternative Syntax

The PHP documentation for alternative syntax defines it as follows:

> PHP offers an alternative syntax for some of its control structures; namely, `if`, `while`, `for`, `foreach`, and `switch`. In each case, the basic form of the alternate syntax is to change the opening brace to a colon (`:`) and the closing brace to `endif;`, `endwhile;`, `endfor;`, `endforeach;`, or `endswitch;`, respectively.

We can see this could be very useful when mixing PHP and HTML.

~~~php
<?php

$items = array('Item One', 'Item Two', 'Item Three');

?>
<ul>
<?php foreach ($items as $item) { ?>
    <li><?php echo $item; ?></li>
<?php } ?>
</ul>
~~~

This can be rewritten using short tags and alternative syntax.

~~~php
<? $items = array('Item One', 'Item Two', 'Item Three'); ?>
<ul>
<?php foreach ($items as $item): ?>
    <li><?= $item; ?></li>
<?php endforeach; ?>
</ul>
~~~

Now our code is much easier to read and maintain.

## Exercise

1. Open the file named `server-name-generator.php`. Refactor the file to use alternative syntax for all control structures. Use short tags where applicable.

1. Open the file named `my-favorite-things.php`. Refactor the file to use alternative syntax for all control structures. Use short tags where applicable.
