# Sessions with PHP

Sessions allow you to track a client along with some associated data by storing an ID for the client on the server side. This will allow you to do things like decide whether or not a user is logged in, or preserve some data on a page after a user leaves and then returns.

## Basic Session Usage

The best way to understand sessions is to start using them. The following example will show you how to start a session and set or access data within it. Session data is kept in a superglobal called `$_SESSION`. There are a few native functions to PHP that will help us manipulate this variable, as detailed below:

- [`session_start()`](http://php.net/manual/en/function.session-start.php) &mdash; Creates a session, or resumes the current one, based on a session identifier passed in the request.
- [`session_id()`](http://php.net/manual/en/function.session-id.php) &mdash; Used to get and set our session ID for the current session.
- [`session_unset()`](http://php.net/manual/en/function.session-unset.php) &mdash; Clear all session data from memory.
- [`session_destroy()`](http://php.net/manual/en/function.session-destroy.php) &mdash; Destroys all of the data associated with the current session. It does not unset any of the global variables associated with the session, or unset the session cookie. To use the session variables again, session_start() has to be called.
- [`session_regenerate_id()`](http://php.net/manual/en/function.session-regenerate-id.php) &mdash; Replaces the current session ID with a new one, and maintains the current session information.

Now that we know a bit more about some of the more common functions used to create, alter, and destroy session data, let's take a look at a complete applications with these functions. Here, we have a page that tracks the number of times a user has viewed it.

```html
<?php
// start the session (or resume an existing one)
// this function must be called before trying to get or set any session data!
session_start();

// get the current session ID
$sessionId = session_id();

// initialize a view count variable
$viewCount = isset($_SESSION['view_count']) ? $_SESSION['view_count'] : 0;

// increment the counter
$viewCount++;

// finally, store the new value in the session
$_SESSION['view_count'] = $viewCount;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Session Example</title>
</head>
<body>
    <ul>
        <li>Session ID: <?= $sessionId; ?></li>
        <li>View Count: <?= $viewCount; ?></li>
    </ul>
</body>
</html>
```

Obviously, there are quite a few things happening in the example above. Do not worry if you feel overwhelmed with what is occurring in the code above; we are about to break this down.

Let's take a closer look:

~~~php
session_start();
~~~

The first thing we are doing is initializing our session, we are doing this with the help of the native PHP function `session_start()`. This will create a new session for us to begin utilizing.

~~~php
$sessionId = session_id();
~~~

Next, we are getting the current session ID with `session_id()` and assigning its value to the variable `$sessionID`. This is not normally something you would be terribly concerned with, but for learning about how sessions work it will be useful.

~~~php
$viewCount = isset($_SESSION['view_count']) ? $_SESSION['view_count'] : 0;
~~~

This next piece is where we will look at some data stored in the session. The `$_SESSION` superglobal is an associative array just like `$_POST` and `$_GET`. Also like those variables, our `view_count` key may or may *not* be set! To protect ourselves from an error when the page first loads, we are using a ternary to check if the value is set. If it is, we assign it to `$viewCount`. Otherwise, we initialize `$viewCount` to 0 since it means this is the first time the user has seen the page (they have viewed it zero times before).

We will be using `$viewCount` to track the number of times the user loads the page.

~~~php
$viewCount++;

$_SESSION['view_count'] = $viewCount;
~~~

Finally we increment `$viewCount` and store the new value to `$_SESSION['view_count']`. This last step is important; this is how we can make data *persist* between multiple page loads. Remember that when you load a page in PHP it is a clean slate. The information and variables from one run of the script does not affect the data in the next. Sessions allow us to get around that; we store the `$viewCount` variable in `$_SESSION` so that the second time we load the page it can be read, modified, and then re-saved in the `$_SESSION`.

Did you notice that each time the page was refreshed that the counter changed but the session ID did not? That is because the session ID is how PHP tracks which session belongs to which client. At the end of the script, the data in `$_SESSION` gets automatically saved to disk. When we run the script again, PHP looks at the session ID our browser sends, find the data it saved previously, and then loads the information back into `$_SESSION`. But how does PHP know which session ID belongs to which user? The answer to this question hides in what are called [cookies](https://en.wikipedia.org/wiki/HTTP_cookie) (no, not the kind you eat). Cookies are bits of data that get stored in the browser on the client that can be accessed from the server side via PHP. PHP automatically stored the session ID for us in a cookie when the session started. It then subsequently accesses that cookie to see if it can match the ID from the client to a valid session ID on the server side.

## Clearing Session Data

If we test this sample application as is, we will see that the counter will continue to increment by one each time the page loads. The `view_count` value is being preserved on repeated page loads. The data we stored is now effectively permanent and shared for every PHP page across our entire site. This is certainly useful, but does come with some drawbacks. If we have some data we no longer want to keep (an error message that only applies on the next page, for example) we must explicitly remove it.

### Remove a Value

Remember that `$_SESSION` is an array, just like any other array we have used with PHP. There is a PHP function we can use to remove a particular key from an array called [`unset()`](http://php.net/manual/en/function.unset.php). In our HTML, we might add a form to trigger this action:

```html
<form method="POST">
    <button type="submit" name="reset" value="counter">Reset Counter</button>
</form>
```

To handle this in PHP, we can do the following:

```php
// start the session (or resume an existing one)
// this function must be called before trying to get or set any session data!
session_start();

if (isset($_POST['reset'])) {
    if ($_POST['reset'] == 'counter') {
        unset($_SESSION['view_count']);
    }
}

// ...
```

When this form is submitted, we will remove the `view_count` key from the `$_SESSION`. At that point, the rest of the code proceeds as normal and our count is set back to 1.

One final note on the subject, PHP's official documentation *explicitly* warms against calling just `unset($_SESSION)`. We will discuss clearing all the session information in the next section.

### Reset All Session Data

What if, in addition to this, we wanted to clear the session entirely and reset it. This is something you'd do when a user logs out of your application, so none of their data accidentally leaks out. There are several different functions related to clearing or ending sessions, and while they all do similar things, there are subtle differences between them.

<table>
    <tr><th>Session Function</th><th>Result</th></tr>
    <tr>
        <td><code>session_unset()</code></td>
        <td>
            Session data in memory (<code class="lang-php">$_SESSION</code>) is destroyed. Data on disk gets flushed at the end of the request. Client's session cookie remains unchanged.
            <p>This is equivalent to doing <code class="lang-php">$_SESSION = array();</code></p>
        </td>
    </tr>
    <tr>
        <td><code>session_destroy();</code></td>
        <td>
            Session is "stopped", and data on disk is deleted. Values in <code class="lang-php">$_SESSION</code> are not changed and any new data added to <code class="lang-php">$_SESSION</code> will be lost. Client's session cookie is unchanged.
        </td>
    </tr>
    <tr>
        <td><code>session_regenerate_id();</code></td>
        <td>
            Session data in <code class="lang-php">$_SESSION</code> and on disk is not changed. Client is sent a new session cookie.
        </td>
    </tr>
    <tr>
        <td><code>session_regenerate_id(true);</code></td>
        <td>
            Previous session information on disk is destroyed and data in <code class="lang-php">$_SESSION</code> is flushed to disk. Information in memory is not changed. Client is sent a new session cookie.
        </td>
    </tr>
</table>

**No single function fully solves this problem.** One function clears data in memory (`session_unset()`), another clears it on disk (`session_destroy()`), and third resets the session tracking cookie on the clients browser (`session_regenerate_id()`). To fully clear the session, we must create our own function that combines these pieces together. Something like the following:

```php
function clearSession()
{
    // clear $_SESSION array
    session_unset();

    // delete session data on the server
    session_destroy();

    // ensure client is sent a new session cookie
    session_regenerate_id();

    // start a new session - session_destroy() ended our previous session so
    // if we want to store any new data in $_SESSION we must start a new one
    session_start();
}
```

There is, however, a shortcut. If you look at the description of `session_regenerate_id(true)` you will see that it creates a new cookie for the client **and** deletes the old session data, all without having to *start* a new session. Our simplified function is as follows:

```php
function clearSession()
{
    // clear $_SESSION array
    session_unset();

    // delete session data on the server and send the client a new cookie
    session_regenerate_id(true);
}
```

To test this, we can update our form as follows:

```html
<form method="POST">
    <button type="submit" name="reset" value="counter">Reset Counter</button>
    <button type="submit" name="reset" value="session">Reset Session</button>
</form>
```

And update our PHP code:

```php
// clear session data in memory & on disk and send user a new session cookie
function clearSession()
{
    // clear $_SESSION array
    session_unset();

    // delete session data on the server and send the client a new cookie
    session_regenerate_id(true);
}

// start the session (or resume an existing one)
// this function must be called before trying to get or set any session data!
session_start();

if (isset($_POST['reset'])) {
    if ($_POST['reset'] == 'counter') {
        unset($_SESSION['view_count']);
    } elseif ($_POST['reset'] == 'session') {
        clearSession();
    }
}

// ...
```

You should be **very** cautious with a this function. It will destroy all session data for, not just this page, but *every* page on your site.

## Exercises

In this lesson, we will expand our `login.php` and `authorized.php` pages from the POST lesson so that they use sessions.

1. Open the `login.php` page. If the correct username and password are sent, assign a session key called `logged_in_user` to the username of the logged in user.
1. Add a check to the `login.php` page to see if the user is logged in by checking the `logged_in_user` key. If they are, redirect to the `authorized.php` page instead of showing the login page.
1. Add a check to the `authorized.php` page to redirect to the `login.php` page if a user is **not** logged in. If they are, display their username after the authorized message.
1. Add a `logout.php` file. Use the `clearSession()` function from the examples in this lesson to perform a logout when that page is accessed and then redirect the user to the login page.
1. Add a link to the `authorized.php` page that goes to `logout.php`.
1. Test logging in, logging out, and accessing the authorized page without being logged in to make sure everything works as expected.
