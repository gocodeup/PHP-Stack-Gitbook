# Intro to HTML Forms

{% video %}https://vimeo.com/155164190{% endvideo %}
[HTML Forms](https://vimeo.com/155164190/f7cb60d697)

You have used forms in web pages many times. Maybe you were logging in, signing up, or leaving a comment. Forms provide a way to take inputs from a user and then perform some action based upon them.

## Form Structure

HTML forms can be defined by using the `<form>` element. Let's start out by looking at an example of a simple login form.

```html
<form method="POST" action="/my_first_form.php">
    <p>
        <label for="username">Username</label>
        <input id="username" name="username" type="text">
    </p>
    <p>
        <label for="password">Password</label>
        <input id="password" name="password" type="password">
    </p>
    <p>
        <input type="submit">
    </p>
</form>
```

Do not worry about the contents of the form for now, we will go over the content later. For now, just look at the `<form>` element and the attributes that go with it. As you can see in the example above, a couple attributes were specified on the `<form>` element. Let's go through them individually.

### Form Method

The `method` attribute of an HTML `form` refers to the HTTP (HyperText Transfer Protocol) method that should be used to transmit the form data. Some HTTP methods were covered in the prework, but let's review two basic HTTP methods. If no `method` is specified, by default, the `GET` method will be used.

#### "GET" Method

HTTP GETs are used to request information, without making any changes to data on the server. When a form's method is set to `GET`, any of the data that the form sends will be appended to the url.

#### "POST" Method

HTTP POSTs are used to make a change to existing data on the server. When a form's method is set to `POST`, any of the data that the form sends will not be added to the url, but will instead be embedded in the body of the HTTP request as key-value pairs. If you have ever been asked a question like, "Are you sure you want to re-submit this form?", then you were probably refreshing a page after submitting an HTTP `POST`.

#### Additional HTTP Methods

There are other HTTP methods, such as `PUT` and `DELETE`, that will be covered later when we start developing web apps in Laravel.

### Form Action

The `action` attribute of an HTML `form` refers to the location that the form data should be sent. This will generally be a PHP (or other back-end language) file on the web server that can read the inputs and perform some action based on them. If no `action` is specified, by default, the `action` will be set to send data back to the current url.

## Query String

A *query string* is composed of key-value pairs. It begins with a question mark (`?`). Following the question mark, is the first key-value pair. Key-value pairs are structured as `key=value`. Key-value pairs after the first will be separated by ampersands (`&`).

Here is an example:

    ?key1=value1&key2=value2&key3=value3

Whenever you use the `GET` method in an HTML form, the form inputs will be appended to the url in the format shown above. If you are using a `POST` method in an HTML form, the inputs will be sent as a query string (this time without the preceding question mark) in the body of the HTTP request.

## Exercises

Please perform the following steps to create your first form.

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Within the `Codeup` folder on your Mac, create a file named `my_first_form.html`.
1. Open the file you just created in your favorite editor. Using what you have learned in the previous lessons, add the necessary HTML document structure to the page with a title of: "My First HTML Form".
1. Copy and paste the form example in this lesson into the body of your HTML document.
1. View the result in your web browser.
1. Next, open a new tab in your browser and go to [RequestBin](http://requestb.in/) in order to generate a URL that you can send data to. RequestBin allows us to view GET and POST data without the help of a server.
1. Click 'Create A RequestBin' and copy and paste the generated URL into your `my_first_form.html` file to replace your original form action.

Below is an example. Your RequestBin URL will be unique, but will look very similar to the one below. For a thorough walkthrough of this process, please watch the video for this lesson!

```html
<form method="POST" action="http://requestb.in/109a25d1">
```

1. Experiment with using the `GET` and `POST` methods by submitting the form and viewing the results in your browser. Refresh your RequestBin page to view the data there, too.
1. Try deleting the `name` attributes from the inputs and then submit the form. View the results in your browser. What do you observe? Repeat with the `id` attributes. What do you observe?

{% else %}

1. Within the `~/vagrant-lamp/sites/codeup.dev/public/` folder on your Mac, create a file named `my_first_form.php`.
1. Open the file you just created in your favorite editor. Using what you have learned in the previous lessons, add the necessary HTML document structure to the page with a title of: "My First HTML Form".
1. Copy and paste the form example in this lesson into the body of your HTML document.
1. View the result in your web browser by browsing to: [http://codeup.dev/my_first_form.php](http://codeup.dev/my_first_form.php)
1. Place the following at the top of your php file.

```php
<?php
  var_dump($_GET);
  var_dump($_POST);
?>
```

1. Experiment with using the `GET` and `POST` methods by submitting the form and viewing the results in your browser.
1. Try deleting the `name` attributes from the inputs and then submit the form. View the results in your browser. What do you observe? Repeat with the `id` attributes. What do you observe?

{% endif %}
