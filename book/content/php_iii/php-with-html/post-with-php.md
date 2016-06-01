# POST with PHP

In this lesson, we are going to talk about `POST` requests. POST is an HTTP method that adds or updates data for a resource. A POST request implies that something is being changed or updated. Some examples of a `POST` request would be logging into a website or creating a new account. In each of these cases, a form will get submitted and the form will have a method of `POST`.

## POST vs GET Variable Handling

With `GET` requests we saw that variables were sent by passing key-value pairs in the query string as part of the URL. Imagine if we used a `GET` request to perform a login. You would see your username and password appear briefly in the URL while being submitted. That is bad on multiple levels. First, because we are using a GET on an action that changes something on the server (user state changes to logged in), and second because we are exposing the password in the URL. Fortunately, variables passed as part of a `POST` request do not get exposed within the URL but actually get passed as part of the request body itself.

## POST Example

The form shown below allows the submission of a name and phone number as if a contact was being created. Since the `action` attribute is absent from the form declaration, the form will simply post back to the same page. We will be using the `$_POST` superglobal to access the submitted form data. It works much like the `$_GET` superglobal except it contains the POST data instead of the GET data.

```html
<?php
var_dump($_POST);
?>
<!DOCTYPE html>
<html>
<head>
    <title>POST Example</title>
</head>
<body>
    <form method="POST">
        <label>Name</label>
        <input type="text" name="name"><br>
        <label>Number</label>
        <input type="text" name="number"><br>
        <input type="submit">
    </form>
</body>
</html>
```

Try pasting the form above into a file named `form-example.php` in your codeup.dev site and then access the site via the Chrome browser. Next, open the Network tab of the Chrome developer tools and then try submitting a name and number. After the page submits and then reloads, you will see a `POST` request in the network results. If you click on it, and look at the Headers tab, you can see that the form values are passed as part of the `Form Data` inside the body of the request. If we were using an SSL connection, this data would get encrypted as it traveled between your computer and the web server after submission.

## Another POST Example

In this example, we will post to a different page instead of posting back to the same page as above. To do this, add `action="form-results.php"` to the form declaration in the example above. Then, create the `form-results.php` file with the following contents:

```html
<?php
$name = isset($_POST['name']) ? $_POST['name'] : '';
$number = isset($_POST['number']) ? $_POST['number'] : '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>POST Example</title>
</head>
<body>
    <h2>Name</h2>
    <p><?php echo $name; ?></p>
    <h2>Number</h2>
    <p><?php echo $number; ?></p>
    <a href="form-example.php">Back</a>
</body>
</html>
```

As you can see, we were able to access data stored within the `$_POST` superglobal variable in the page that we instructed the form to POST to.

_**Note:** The example above shows unescaped user input which is bad practice. We will be remedying this in the next lesson: "Handling User Input"._

## Exercises

In this exercise, you will be creating a simple login form. Perform the following steps:

1. Create a file named `login.php` in your codeup.dev site. Add a form that accepts a username and password and have the form submit to the same page (`login.php`).
1. Create a file named `authorized.php` in your codeup.dev site. Add some HTML that simply says "Authorized" when it is viewed in the browser.
1. Add some PHP code to the top of the login page that checks the POST'ed username and password. If the username is equal to "guest" and the password is equal to "password" then redirect to the authorized.php. If the username and password do not match those values, show a login failed message on the login page.

As you may have noticed, you can access the `authorized.php` page directly without being logged in. We will be fixing this in the upcoming lesson on Sessions.
