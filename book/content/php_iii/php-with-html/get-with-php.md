# GET with PHP

In this lesson, we are going to talk about `GET` requests. GET is an HTTP method that requests data from a resource. A GET request implies that we are simply reading data. This may be a GET to `cnn.com` to see the homepage. It may be a GET to `ebay.com` to search for a particular item. Well, you GET the point.

## How to Make a GET Request

This is simpler than you think. Look at the following code:

```html
<a href="http://google.com">Google</a>
```

Yes, it is just a simple HTML link. For a user, clicking this link will instruct the browser to make a GET request. It really is that simple. Now, the question is... where does PHP come in?

## Passing Data With a GET request

Have you ever seen extra data at the end of the URL that looks something like this?

    https://duckduckgo.com/?q=codeup

The question mark is the start of something called a *query string*. The query string allows additional key-value pairs to be passed along to the receiving end of the GET request. The receiving end can then inspect the key-value pairs passed in the query string and then return the specific data that was requested. In this case, there is one key-value pair. The key is `q`, representing the query. The value is `codeup` representing the value for the query.

There are a couple of ways that you can make a GET request to search for Codeup on DuckDuckGo. One easy way would be to copy and paste the URL above into your web browser. Another way would be to put an anchor tag into your HTML, with an href attribute set equal to the URL you are attempting to access (note that this would require the *query string* to be hard coded as part of the URL). Finally, you could create a form that makes a GET request. It would look something like this:

```html
<form method="GET" action="https://duckduckgo.com/">
    <input type="text" name="q" value="" placeholder="Search DuckDuckGo">
    <button type="submit">Go!</button>
</form>
```

As you can see, there is a form input named `q`, just like what we saw in the link shown above. Also, notice that the form has a method of `GET`. When you click the submit button on the form, it will make a `GET` request to the URL defined in the `action` for the form and it will encode the form values into a query string and pass them along. If you were to type `codeup` in the form and hit Go, you would end up with a GET request to the URL: `https://duckduckgo.com/?q=codeup`.

### Passing More Than One Key-Value Pair

So far, we have only seen one value being passed as part of a query string. What if you need to pass multiple values? Well, that would look something like this:

    http://example.com/index.php?var1=value1&var2=value2&var3=value3

Additional key-value pairs after the first get separated by an ampersand (`&`). You can add as many of these pairs as you need.

## Encoding Data for the Query String

Some data needs to be encoded before it is passed as part of a query string. For example, what if one of the values you wanted to pass had an ampersand (`&`) in it? Besides ampersand there are several other characters that need to be encoded. Fortunately, there are some handy functions available in PHP that take care of this for us. These are [`urlencode()`](http://php.net/manual/en/function.urlencode.php) and [`http_build_query()`](http://php.net/manual/en/function.http-build-query.php). Let's check out some examples of how they are used:

```php
$query = urlencode('Dave & Busters');

$url = "https://duckduckgo.com/?q={$query}";

echo $url;

// outputs: https://duckduckgo.com/?q=Dave+%26+Busters
```

As you can see, `urlencode()` can be used to encode a single value that will be used to build up a query string. You can also see that both spaces and the ampersand were encoded. Now, let's look at an example for `http_build_query`.

```php
$params = array(
    'search'    => 'iphone 6',
    'condition' => 'new',
    'page'      => 5
);

$url = 'https://great-auctions.com/index.php?' . http_build_query($params);

echo $url;

// outputs: https://great-auctions.com/index.php?search=iphone+6&condition=new&page=5
```

As you can see, we started out with an array of key-value pairs that we wanted to pass as the query string. By using the `http_build_query()`, all of the key-value pairs were encoded and then we can simply append that to the end of a url after a question mark.

## Reading Data From a GET Request

The sending of GET requests really doesn't have much to do with PHP at all, but the processing of GET requests does. For example, how can you read data that is passed in the query string? Let's take a look.

PHP has some variables called [*superglobals*](http://php.net/manual/en/language.variables.superglobals.php). It basically just means that there are some variables that are available in all scopes. You do not have to declare them, they are just there. And PHP puts values in them based on what they are for. There are lots of superglobals in PHP, but for now, all we need to know about is the `$_GET` superglobal. Notice the all caps naming and that it starts with an underscore. When you see that, that is a clue there is something special about the variable. You should not name your own variables this way.

So, when we want to read data from the query string, we can do it by looking at `$_GET`. Let's see how it works.

```php
<?php
// Filename: hello.php
// GET Request: http://codeup.dev/hello.php?name=Chris

echo 'Hello ' . $_GET['name'];

// Prints: Hello Chris
```

By inspecting this example, we can conclude that `$_GET` is an associative array with key-value pairs that correspond to the key-value pairs that were passed in the query string. Try implementing the example above. What happens when you don't pass a name? Perhaps you have found a good use for `isset`?

## Exercises

### Counter

In this exercise we will be experimenting with sending single data values to a page. This will allow us to gain a better understanding of how data will be transmitted to our web-applications. Follow the specifications below to get started:

1. Create a file called `counter.php` using the page controller template.
1. In your HTML, you will need two links. One that says `up` and another that says `down`.
    - Add a heading that shows a number representing the current counter value. This value will start at zero. When `up` is clicked, the counter value should increase; when `down` is clicked, it should decrease.
    - The `up` and `down` links will send `GET` requests back to the counter page itself.
1. Create a function that will access the `$_GET` superglobal variable. It should determine what the new counter value is and return it.
1. Use the `extract()` function to change the return value of the `pageController()` into variables for your HTML.

### Ping and Pong

In this next exercise, we will be looking at GET requests from another perspective. To solidify your understanding of GET requests in PHP, we have designed an exercise that will help you see how to use GET to send data between multiple pages. To accomplish this goal, follow the specifications below:

1. Create two files, `ping.php` and `pong.php`, using the page controller template.
1. Each page should have 2 links, called `HIT` and `MISS`.
    - If you click `HIT`, a counter increases and the game continues. If you click `MISS`, that player missed and the game is over.
    - The links on the `ping.php` page should go to `pong.php` and vice versa.
    - Each link's query string should include whether it was a "hit" or a "miss" and the current count of hits.
1. Each page should have a `pageController()` function that will contain all of our PHP logic.
    - This function will need to access the `$_GET` superglobal variable and check the values stored to it.
    - It will also need to increment the counter when the "hit" link was clicked, and reset the counter in the event of a "miss".
1. Use `extract()` function to change the return value of the `pageController()` into variables for your HTML.
1. Feel free to add images or make it more interesting by using `rand()` to decide if a play is a hit or miss. You could also use CSS and JavaScript to randomly move the `HIT` and `MISS` links, or change them to make the game more challenging. Be creative and have fun!
