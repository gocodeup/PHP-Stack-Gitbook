# jQuery Animate

jQuery's [animate method](http://api.jquery.com/animate/) allows us to change any number of CSS properties over a period of time.

## Basic Syntax

The simplest way to use `.animate()` is to pass it a JSON object of CSS properties and a duration:

```js
$(selector).animate({
    property1: "value1",
    property2: "value2",
    // ...
}, time);
```

For example, if we wanted to move an element with the id `the-box` to left `30px` and top `50px` in half a second, we could do it with:

```js
// Note: #the-box must already have either position fixed, relative, or absolute
$("#the-box").animate({
    left: "30px",
    top:  "50px"
}, 500);
```

### Relative Values

In our previous example, `#the-box` was moved to some absolute coordinates. If we were to call the same `.animate()` method again nothing would change since it is already in that spot. If instead, we wanted the box to always move by that many pixels, we can use `+=` or `-=` like the following:

```js
$("#the-box").animate({
    left: "+=30px",
    top:  "+=50px"
}, 500);
```

Now, `#the-box` will always move left by 30 pixels and down by 50 pixels each time the method is called. In addition to numeric and relative values, the values of `show`, `hide` and `toggle` can be used.

### Completion Callback

If you need some code run when your animation completes, you can pass a function as the third paramater to `.animate()`:

```js
$("#the-box").animate({
    left: "+=30px",
    top:  "+=50px"
}, 500, function() {
    alert("Animation complete!");
});
```

### Live Example

Read through the JavaScript code at left first and try to anticipate what it will do. Click on each `<h3>` to see if your assumptions were correct.

[Animation Example](http://jsbin.com/cemuna/4/edit?js,output)

*__Note:__ Our list of state parks had `position: relative` as well as `border-width: 0` in order to make the animation work properly.*

## Animation Stack

If you want multiple animations to happen in sequence you can create an *animation stack* by chaining additional calls to `.animate()`:

```js
$(selector).animate({
    property: "value"
}, duration1).animate({
    property: "value"
}, duration2).animate({
    property: "value"
}, duration3);

// etc

```

See it in action below.

[Animation Stack Example](http://jsbin.com/pezuli/2/edit?js,output)

## Exercise

1. Download [animate_exercise.html](../../examples/html/animate_exercise.html) and save it to your `codeup.dev/public` directory.
1. Open the file in Sublime and complete the `TODO` items.
1. Check the results in Chrome and remember to commit your changes after completing each `TODO` item. When you are done push your work to GitHub.
