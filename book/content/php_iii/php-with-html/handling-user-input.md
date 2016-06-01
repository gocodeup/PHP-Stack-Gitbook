# User Input

When we display a user's input, we are exposing our application to some risk.  Vulnerabilities in our code can allow attackers to run malicious code on our sites.  PHP offers several ways to sanitize our output to help prevent these types of attacks.

## Handling User Input

As we saw in our previous exercise, if we add a todo with tags, like `<h1>Hello!</h1>`, the HTML is rendered inside our page.  This could allow users to break our layout, design, and make our site look bad.  While this can cause our site to look bad, it is not the biggest of our worries.  If a user can add HTML to our page, then they can likely also use JavaScript to cause even more damage.

Cross Site Scripting (XSS) is a popular way for users to attack our sites.  XSS vulnerabilities allow users to execute code inside a web page, most commonly using JavaScript.

Here is an example of a vulnerable page:

~~~html
<?php
$items = array('Item One', 'Item Two', 'Item Three');
$allItems = array_merge($items, $_POST);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Alternative Syntax</title>
</head>
<body>
    <h1>List of Items</h1>
    <ul>
    <?php foreach ($allItems as $item): ?>
        <li><?php echo $item; ?></li>
    <?php endforeach; ?>
    </ul>

    <form method="POST">
        <input type="text" id="newitem" name="newitem" placeholder="Add new todo item">
        <input type="submit" value="add">
    </form>
</body>
</html>
~~~

If we add a new item with JavaScript in it, like `<script>alert('attacked');</script>`, it will execute in some browsers.  Newer versions of Google's Chrome and Apple's Safari browsers will prevent this in most cases, as they now ship with a XSS auditor that will not execute JavaScript contained in a POST or GET request that is displayed in the source.  Firefox, IE, and many other browsers are still susceptible to these types of attacks.

In the example given, we are only executing an alert; in the wild it may have been code that could steal a cookie, allowing an attacker to hijack a session and take on the identity of a logged in user. Our site may have an admin area, with sensitive data, and we do not want our users being able to hijack our site and see this data.

As we build our sites, we should always be on the lookout to protect our users. The best way to do this, is to not trust any user input.

PHP gives us a few tools to help sanitize our data before we display it.

- [`htmlspecialchars()`](http://php.net/htmlspecialchars) &mdash; Convert special characters to HTML entities
- [`htmlentities()`](http://php.net/manual/en/function.htmlentities.php) &mdash; Convert all applicable characters to HTML entities
- [`strip_tags()`](http://php.net/manual/en/function.strip-tags.php) &mdash; Strip HTML and PHP tags from a string

We can use these to help us in our fight against unwanted user input.

HTML character entities are encoded characters that begin with an ampersand `&`, followed by the entity code, and ending with a semicolon `;`.

Common entities are `&amp;` for `&`, `&nbsp;` for non-breaking space, and `&lt;` and `&gt;` for `<` and `>`. The full list is viewable via [this Wikipedia page](http://en.wikipedia.org/wiki/List_of_XML_and_HTML_character_entity_references).

First, we can use `htmlspecialchars()` to convert any input to HTML entities.

~~~html
<ul>
<?php foreach ($allItems as $item): ?>
    <li><?php echo htmlspecialchars($item); ?></li>
<? endforeach; ?>
</ul>
~~~

Now, if we try to submit `<script>alert('attacked');</script>` as our input, we will see this in our output:

    Item One
    Item Two
    Item Three
    <script>alert('hello');</script>

Viewing the source reveals the HTML entities:

~~~html
<ul>
    <li>Item One</li>
    <li>Item Two</li>
    <li>Item Three</li>
    <li>&lt;script&gt;alert('hello');&lt;/script&gt;</li>
</ul>
~~~

Here we see that `htmlspecialchars()` converted our `<` and `>` to `&lt;` and `&gt;`, respectively. This made our XSS attempt fail, and all the page did was display our attempt as text.

We can take this one step further and remove the `<script>` tags completely.  We do not want HTML or JavaScript to be displayed at all.

Using `strip_tags()`, we can remove any HTML element tags from our strings.  Here we can see it added to our unordered list:

~~~html
<ul>
<?php foreach ($allItems as $item): ?>
    <li><?php echo htmlspecialchars(strip_tags($item)); ?></li>
<? endforeach; ?>
</ul>
~~~

Now any HTML or JavaScript we attempt to inject into the HTML will have the tags removed, and any other special characters converted to HTML entities. We've protected our site from XSS attacks, and are one step closer to keeping our application working as expected in the wild.

## Exercise

Download [`form-example.php`](../../examples/php/form-example.php) to your `public` directory and open it in Sublime.

1. Try injecting some malicious input into the form and see what happens.

1. Update all code where user input is displayed to use `htmlspecialchars()` and `strip_tags()` to prevent malicious inputs.

1. Test your updates with HTML and JavaScript to make sure your application is secure.
