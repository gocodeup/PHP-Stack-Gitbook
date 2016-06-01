# Sliding Effects

Like fading effects, sliding effects add animation to elements that are being hidden or shown.

## Using Sliding Effects

jQuery offers these sliding effects:
- `.slideUp()` &mdash; Hide the matched elements with a sliding motion.
- `.slideDown()` &mdash; Display the matched elements with a sliding motion.
- `.slideToggle()` &mdash; Display or hide the matched elements with a sliding motion.

The syntax for sliding effects are the same as the basic effects.

These examples will be using the same HTML structure as our last couple of units:

~~~html
<h1>Parks List</h1>
<h3 id="national-parks-toggle">National Parks</h3>
<ul id="national-parks">
    <li>Arches</li>
    <li>Badlands</li>
    <li>Carlsbad Caverns</li>
    <li>Denali</li>
    <li>Everglades</li>
</ul>
<h3 id="state-parks-texas-toggle">State Parks of Texas</h3>
<ul id="state-parks-texas">
    <li>Abilene</li>
    <li>Big Bend</li>
    <li>Choke Canyon</li>
    <li>Davis Mountains</li>
    <li>Enchanted Rock</li>
</ul>
~~~

We will not be repeating this code in each sub-section as the only thing changing will be the actual jQuery method names.

### .slideUp()

> Hide the matched elements with a sliding motion.
[http://api.jquery.com/slideUp/](http://api.jquery.com/slideUp/)

This method hides selected elements by using an animation to slide up from bottom to top.

The code to hide the lists using `.slideUp()`:

~~~js
$(document).ready(function() {
    $('#national-parks-toggle').click(function() {
        $('#national-parks').slideUp();
    });
    $('#state-parks-texas-toggle').click(function() {
        $('#state-parks-texas').slideUp();
    });
});
~~~

Live example:

[Example](http://jsbin.com/pigiy/1/edit?output)

### .slideDown()

> Display the matched elements with a sliding motion.
[http://api.jquery.com/slideDown/](http://api.jquery.com/slideDown/)

This method shows selected elements with an animation that slides the content from the top down.

We would need to add some CSS to hide the lists initially:

~~~css
#national-parks, #state-parks-texas {
    display: none;
}
~~~

Then we could add the jQuery code to show the lists using `.slideDown()`:

~~~js
$(document).ready(function() {
    $('#national-parks-toggle').click(function() {
        $('#national-parks').slideDown();
    });
    $('#state-parks-texas-toggle').click(function() {
        $('#state-parks-texas').slideDown();
    });
});
~~~

We can see the result in this example:

[Example](http://jsbin.com/kidole/1/edit?output)

### .slideToggle()

> Display or hide the matched elements with a sliding motion.
[http://api.jquery.com/slideToggle/](http://api.jquery.com/slideToggle/)

Like the other toggle functions, `.slideToggle()` will show or hide selected elements using the slide animation.

The code to toggle our parks lists with slide:

~~~js
$(document).ready(function() {
    $('#national-parks-toggle').click(function() {
        $('#national-parks').slideToggle();
    });
    $('#state-parks-texas-toggle').click(function() {
        $('#state-parks-texas').slideToggle();
    });
});
~~~

The live example is below:

[Example](http://jsbin.com/kaduw/1/edit?output)

## Exercises

1. Open the file named `jquery_faq.html` for editing.  Commit all changes to GitHub.

1. Update all toggles to use sliding effect.
