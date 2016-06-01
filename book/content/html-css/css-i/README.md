# Intro to CSS

{% if book.curriculumName == "prep1" %}

{% video %}https://vimeo.com/159360906{% endvideo %}
[CSS Introduction](https://vimeo.com/159360906/071e760a3f)

{% else %}

{% video %}https://vimeo.com/155164202{% endvideo %}
[CSS Introduction](https://vimeo.com/155164202/ce316869b4)

{% endif %}

CSS stands for Cascading Style Sheets. CSS allows us to customize the presentation of a web page by specifying the colors, fonts, layout, and more. CSS also provides for the separation of the document content from the presentation. This separation has many benefits, including:

- Content can be used independently of styling for other purposes.
- Styles can be re-used across pages.
- Updating styles in a stylesheet that is used in many pages is much more efficient than updating all the pages individually.
- Bandwidth savings can be significant due to stylesheet caching.

Styles can be added to a web page in several ways, and we will be discussing those next.

## Element Style Attribute

One of the simplest ways to add style to an HTML element is by using the `style` attribute. This is also the least recommended method, because all the benefits described above do not apply to styles applied in this way. Nonetheless, it is still useful to understand that styles can be applied in this way. Let's look at an example:

```html
<!DOCTYPE html>
<html>
<head>
    <title>CSS Test Page</title>
</head>
<body>
    <h1 style="color:blue;text-decoration:underline;">CSS Test Page</h1>
</body>
</html>
```

In the example above, the `h1` element text will be blue and underlined. For now, do not worry about the style details, just look at the syntax. As you can see, a `style` attribute was added to the `h1` element. The value of the `style` element consists of multiple key:value pairs with a colon between the key and the value. Key:value pairs are then separated by semicolons. As you will see, this syntax is used regardless of how the style is included in the page.

## Inline/Embedded Stylesheet

Another method of adding styles to a webpage is via an embedded stylesheet. This can be accomplished by using a `style` element in the `head` of your HTML page. Let's see an example:

```html
<!DOCTYPE html>
<html>
<head>
    <title>CSS Test Page</title>
    <style>
        .fancy-header {
            color: blue;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1 class="fancy-header">I've got style!</h1>
</body>
</html>
```

In the above example, you can see that a `style` tag with some style definitions was included in the `head` of the HTML page. You can also see that a `class` attribute was added to the `h1` element that linked to one of the defined styles. We will discuss more about how this happens in the next lesson. For now, all you have to know is that you can add styles directly to the `head` of an HTML page in this manner. Using this styles in this way provides some of the benefits described in the intro, but not all of them.

## External Stylesheet

Finally, another way to add styles to a web page is to link to an external stylesheet. This is the recommended method, and the one that will provide all of the benefits listed in the intro. Let's check out how this is done:

```css
/*
this content is stored in a file named "site.css"
in a directory named "css" in the web root
*/

.fancy-header {
    color: blue;
    text-decoration: underline;
}
```

```html
<!DOCTYPE html>
<html>
<head>
    <title>CSS Test Page</title>
    <link rel="stylesheet" href="/css/site.css">
</head>
<body>
    <h1 class="fancy-header">I've got style!</h1>
</body>
</html>
```

As you can see in the example above, an external stylesheet is added via the `link` element. The `link` element is a void element and therefore has no content or closing tag. A `rel` attribute should be specified with a value of `stylesheet`. An `href` attribute with a value pointing to the stylesheet to include also needs to be specified.

Using this method, the `fancy-header` style can be used multiple times in multiple pages. If you want to change what a `fancy-header` looks like, you only need to change it in one place and the update will take place anywhere it is used.

## Comments

Comments in CSS are accomplished using the following syntax:

```css
/*
multi
line
comment
*/

.fancy-header {
    color: blue; /* single line comment */
    text-decoration: underline;
}
```

As you can see, the same syntax is used for both single and multi-line comments.

## Exercises

For this lesson, perform the following tasks:

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Create an HTML file named `css_intro.html` within the `Codeup` folder on your Desktop.
1. Create a folder named `css` in the same location as the html files you created.
1. Inside the `css` folder, create a file named `site.css`.
1. Use the sample code from the "External Stylesheet" section above to add content to the two files you created.
1. View the results in your browser to test for the expected output.

{% else %}

1. Create an HTML file named `css_intro.html` within the `~/vagrant-lamp/sites/codeup.dev/public` folder on your Mac.
1. Create a folder named `css` in the same location as the html files you created.
1. Inside the `css` folder, create a file named `site.css`.
1. Use the sample code from the "External Stylesheet" section above to add content to the two files you created.
1. View the results in your browser to test for the expected output.

{% endif %}

Congrats! You now know how to include CSS in a web page.
