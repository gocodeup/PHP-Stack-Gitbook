# Keyboard Events

jQuery events include keyboard events like a key being pressed or when a key is up or down.

## Using Keyboard Events

We will be learning about these [jQuery keyboard events](http://api.jquery.com/category/events/keyboard-events/):
- `.keydown()` &mdash; Bind an event handler to the "keydown" JavaScript event or trigger that event on an element.
- `.keypress()` &mdash; Bind an event handler to the "keypress" JavaScript event or trigger that event on an element.
- `.keyup()` &mdash; Bind an event handler to the "keyup" JavaScript event or trigger that event on an element.

### .keydown()

> Bind an event handler to the "keydown" JavaScript event or trigger that event on an element.
[http://api.jquery.com/keydown/](http://api.jquery.com/keydown/)

The syntax for using `.keydown()` is:

~~~js
$( selector ).keydown( handler(eventObject) )
~~~

We can use the `.keydown()` event handler in the same way we do a `click`.

~~~html
<!DOCTYPE html>
<html>
<head>
    <title>Example jQuery Page</title>
    <script src="/js/jquery.js"></script>
    <script>
        "use strict";

        $(document).ready(function() {
            $('#textfield').keydown(function() {
                alert('.keydown() event fired');
            });
        });
    </script>
</head>
<body>
    <p>Please type something into this form:<\p>
    <form>
        <input type="text" id="textfield" name="textfield" placeholder="Type Here"/>
    </form>
</body>
</html>
~~~

We can test this functionality below:

[Example](http://jsbin.com/pafit/1/edit?output)

### .keypress()

> Bind an event handler to the "keypress" JavaScript event or trigger that event on an element.
> The keypress event is sent to an element when the browser registers keyboard input. This is similar to the keydown event, except that modifier and non-printing keys, such as Shift, Esc, and delete, trigger keydown events but not keypress events
[http://api.jquery.com/keypress/](http://api.jquery.com/keypress/)

### .keyup()

> Bind an event handler to the "keyup" JavaScript event or trigger that event on an element.
[http://api.jquery.com/keyup/](http://api.jquery.com/keyup/)

The opposite of `.keydown()` is `.keyup()`; it will trigger an event when a key is released.

The syntax is the same as `.keydown()`:

~~~js
$( selector ).keyup( handler(eventObject) )
~~~

Simply changing out the `.keydown()` method with the `.keyup()` method alters the behavior:

~~~html
<!DOCTYPE html>
<html>
<head>
    <title>Example jQuery Page</title>
    <script src="/js/jquery.js"></script>
    <script>
        "use strict";

        $(document).ready(function() {
            $('#textfield').keyup(function() {
                alert('.keydown() event fired');
            });
        });
    </script>
</head>
<body>
    <p>Please type something into this form:<\p>
    <form>
        <input type="text" id="textfield" name="textfield" placeholder="Type Here"/>
    </form>
</body>
</html>
~~~

We can test the changes below:

[Example](http://jsbin.com/bazom/1/edit?output)

## .on()

All the jQuery events we covered can also be called using the `.on()` method. This method takes the event listener type and a callback function.

To use a keyboard event, like `.keydown()` the syntax would be:

~~~js
.on('keydown', function() {});
~~~

The main benefit of using the `.on()` method is it will add event listeners to elements that are added dynamically after the DOM is loaded.  All mouse, keyboard, and other event listeners can be used with the `on()` method.

## Exercises

The [Konami Code](http://en.wikipedia.org/wiki/Konami_Code) was a cheat code that appeared on a number of games from Konami. [Contra](http://en.wikipedia.org/wiki/Contra_%28video_game%29) was one of the early NES games to have featured the Konami Code. Contra would start you on 3 lives per game but after the start screen if you entered the Konami Code you would get 30 lives on Contra!

The Konami Code: Up, Up, Down, Down, Left, Right, Left, Right, B, A ( &uarr; &uarr; &darr; &darr; &larr; &rarr; &larr; &rarr; B A )

Create a file named konami.html in your `codeup.dev/public` folder using the template below. This code will log a number reference that is tied to each key that is entered on your keyboard. Open the console and view the output as you type on the keyboard.

```html
<!DOCTYPE html>
<html>
<head>
    <title>Konami Code</title>
</head>
<body>
    <h1>Konami Code</h1>

    <script src="/js/jquery.js"></script>
    <script>
        "use strict";

        $(document).keyup(function(event){
            console.log(event.keyCode);
        });
    </script>
</body>
</html>
```

1. Allow the user to enter the Konami Code: "&uarr; &uarr; &darr; &darr; &larr; &rarr; &larr; &rarr; b a enter" (the return key)
1. Find the matching sequence using the code above for each key in the Konami Code.
1. Don't worry about capital `a` or `b` just check for lowercase.
1. After the correct Konami Code sequence is inputted then the enter key have the script alert the user:
__"You have added 30 lives!__ Other ideas:
    1. Change the background screen.
    1. Play a sound.
    1. Be creative!
1. Happy Playing[.](https://www.youtube.com/watch?v=g_kMGkGYNJM)
