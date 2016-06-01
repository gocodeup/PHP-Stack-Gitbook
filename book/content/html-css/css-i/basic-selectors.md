# CSS Selectors

{% video %}https://vimeo.com/155164196{% endvideo %}
[CSS Selectors](https://vimeo.com/155164196/dba9c448d5)

One of the keys to styling HTML documents is being able to selectively apply styles to specific elements or groups of elements. In order to do this, something called a CSS selector is used. There are many types of CSS selectors, and advanced selectors can get quite complicated. We will be teaching you the basics so that you can start adding your own style to your pages.

Here are the selectors we will be talking about in this lesson:

- [Element Selector](#element-selector)
- [ID Selector](#id-selector)
- [Class Selector](#class-selector)

We will be using some basic CSS properties in our discussion of selectors. Don't worry about the properties for now, just focus on the selectors themselves. Let's look at the basic selector syntax:

```css
selector {
    property1: value;
    property2: value;
}
```

A style definition starts with a selector. Following the selector is an open and a close curly brace. Inside the curly braces is a list of key:value pairs. As we saw in the last lesson, the key:value pairs have a colon between them, and a semi-colon after them. The key is the name of a CSS property, and the value is the value of the property is being used.

If you would like to have multiple selectors have the same style definition, you can separate the selectors with commas as follows:

```css
selector1, selector2 {
    property1: value;
    property2: value;
}
```

Here, both selector1 and selector2 will have the same style property values assigned.

## Element Selector

The element selector is one of the most basic CSS selectors. It allows you to style an HTML element by specifying the element name. The specified style will be applied to any elements of that type contained in the web page. Let's see an example:

```css
h1 {
    color: blue;
}
```

The example above would set the text color of any `h1` elements to blue.

## ID Selector

The id selector is a commonly used selector. As we have seen, we can add an `id` attribute to an HTML element. The primary purpose for doing this is to be able to easily locate the element for adding style or behavior. The CSS id selector will allow us to apply styles to an element with the specified id. Let's see an example:

```css
#main-header {
    color: blue;
}
```

```html
<h1 id="main-header">Header Text</h1>
```

The example above would set the text color of any element with `id="main-header"` to blue. The number sign in the selector declaration is what tells us that we are looking at an id selector. Remember, any `id` should be unique within the HTML document it is contained in, so by using the id selector alone you are targeting a single element. Notice that when we apply the style to an element, the number sign is not included in the `id` attribute.

## Class Selector

The class selector is another commonly used selector. Similar to the `id` attribute, a `class` attribute can be added to any HTML element. The CSS class selector will allow us to apply styles to all elements with the specified class. Let's see an example:

```css
.fancy-header {
    color: blue;
}
```

```html
<h1 class="fancy-header">Header Text</h1>
```

The example above would set the text color of any elements with `class="fancy-header"` to blue. The dot/period in the selector declaration is what tells us that we are looking at a class selector. Notice that the class selector will let us style all elements with a particular class, whereas the id selector allows us to target a single element. Also notice that when we apply the style to an element, the dot is not included in the `class` attribute.

### Combining Classes

Often times, you want an HTML element to have several style classes applied. That can be accomplished as follows:

```css
.fancy-header {
    color: blue;
}
.extra-large {
    font-size: 200px;
}
```

```html
<h1 class="fancy-header extra-large">Header Text</h1>
```

In the example above, the `h1` element receives styles from both the `fancy-header` and `extra-large` classes.

## Descendent Selector

Often times, it is useful to apply style to an element or group of elements based on their descendant relationship to some parent element in the page. To create a descendent selector, you first type the parent selector, followed by a space, followed by the descendent selector.

```css
#container h1 {
    color: blue;
}
```

In this example, any `h1` elements that are a descendant of an element with `id="container"` will be blue. Other `h1` elements that are not a descendant of an element with `id="container"` will not receive the style.

## Direct-Child Selector

The direct child selector is similar to the descendent selector except that only direct children of the parent selector will receive the specified style. For the direct-child selector a greater than `>` symbol is used in place of the space from the descendent selector.

```css
#container>h1 {
    color: blue;
}
```

In this example, only `h1` elements that are direct children of an element with `id="container"` will be blue.

## Combining Selectors

Sometimes it is useful to combine selectors to be more specific. For example, if the `fancy-header` class is only applicable to `h1` elements, then it can be written as follows:

```css
h1.fancy-header {
    color: blue;
}
```

In the example above, `h1` elements with `class="fancy-header"` will receive the specified style, but other element types with `class="fancy-header"` will not. Combination selectors also allow for customization of properties based on element type. For example:

```css
h1.fancy-header {
    color: blue;
}
h2.fancy-header {
    color: green;
}
```

In this example, you can see that `h1` and `h2` elements will receive different styling through the use of the same class name. Combination selectors can also be used with the `id` selector as follows:

```css
h1#main-header {
    color: blue;
}
```

## Pseudo Classes

Pseudo classes can be added to a selector to specify that a particular style should be applied only to a particular state of an element. First, let us see the syntax for a pseudo class with a selector:

```css
selector:pseudo-class {
    property1: value;
    property2: value;
}
```

Notice the colon after the selector, followed by the pseudo-class name. There are many pseudo-classes available in CSS and some of the most commonly used deal with the anchor element.

```css
/* unvisited link (:link) */
a:link {
    color:red;
}

/* visited link (:visited) */
a:visited {
    color:black;
}

/* mouse hover over link (:hover) */
a:hover {
    color:blue;
}

/* active/selected link (:active) */
a:active {
    color:green;
}
```

As you can see, pseudo-classes allow us to style the anchor element based on different states of the link. For a more complete list of available pseudo-classes, look at the [Mozilla Developer Network](https://developer.mozilla.org/en-US/docs/Web/CSS/Pseudo-classes).

## Other Selectors

There are a variety of other CSS selectors available. These include universal selectors, attribute selectors, and sibling selectors. For more information about these types of selectors, see the [Mozilla Developer Network](https://developer.mozilla.org/en-US/docs/Web/CSS/Reference).

## Specificity

Due to the cascading nature of style sheets, and the potential for duplicate or conflicting styles being applied to an element, there must be a set of rules that determine what styles actually get applied. The process of deciding what styles get applied is referred to as *specificity*. In general, the more specific the selector, the higher the precedence, the more likely the style will be applied. For more detail information on how specificity work, look at the [MDN](https://developer.mozilla.org/en-US/docs/Web/CSS/Specificity).

## Exercises

Please follow the instructions below.

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Download [css_selectors.html](../../examples/css/css_selectors.html) and save it in the `Codeup` folder on your Desktop.
1. Create a folder called `css` inside `Codeup`.
1. Download [selectors.css](../../examples/css/selectors.css) and save it in the `css` folder on your Mac.
1. Open `selectors.css` in Sublime and replace all the "selector-todo"s with the appropriate selector based on the comment above.
1. View the results in your browser.

{% else %}

1. Download [css_selectors.html](../../examples/css/css_selectors.html) and save it in `~/vagrant-lamp/sites/codeup.dev/public` on your Mac.
1. Create a folder called `css` inside `~/vagrant-lamp/sites/codeup.dev/public/`.
1. Download [selectors.css](../../examples/css/selectors.css) and save it in `~/vagrant-lamp/sites/codeup.dev/public/css` on your Mac.
1. Open `selectors.css` in Sublime and replace all the "selector-todo"s with the appropriate selector based on the comment above.
1. View the [results](http://codeup.dev/css_selectors.html) in your browser.

{% endif %}
