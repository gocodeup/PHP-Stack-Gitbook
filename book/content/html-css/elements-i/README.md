# HTML Elements

{% video %}https://vimeo.com/155164194{% endvideo %}
[HTML Elements](https://vimeo.com/155164194/4c383e0d1d)

HTML uses `elements` to describe the data in a web document. These elements help give meaning and context to information being displayed.

For example, this is how we would structure a paragraph:
```html
<p>
    content
</p>
```

An element starts with an open tag, `<p>`, according to the example. The open tag is followed by content, which can be text or additional html elements. Finally, the element ends with a close tag, `</p>`, according to the example.

Notice that the open tag and close tag of the element look very similar. The only difference is the presence of a backslash (`/`) in the close tag.

## Block-Level Elements

A block-level element occupies the entire space of its parent element (container), thereby creating a "block." They also begin on new lines. Generally, block-level elements may contain data, other block-level elements, or inline elements.
```html
<div>
    content
</div>
```

> address, article, aside, audio, blockquote, canvas, div, dd, dl, fieldset, figcaption, figure, footer, form, h1 - h6, header, hr, li, main, nav, ol, p, pre, section, table, ul, video

## Inline Elements

An inline element occupies only the space bounded by the tags that define the inline element. Inline elements do not begin with a new line. Generally, inline elements may contain only data and other inline elements.

```html
<p>Look, we have an amazing <span>inline</span> element.</p>
```

> a, abbr, cite, code, em, q, span, script, sub, sup, strong, button, input, label, select, textarea, img, object, map



### Void Elements

Some HTML elements, are defined as "void elements". This simply means that they are not meant to contain any content. Since there is no content, a closing tag is not needed and therefore a void element looks like this:

```html
<br>
```

According to the [HTML5 specification](http://www.w3.org/TR/html5/syntax.html#void-elements), the following elements are "void elements":

> area, base, br, col, embed, hr, img, input, keygen, link, meta, param, source, track, wbr

From the above list, we will be covering:

- br - line breaks
- img - images
- input - form inputs
- meta - metadata

## Attributes

HTML elements can also contain additional data, known as attributes. Let's look at an example:

```html
<div id="wrapper">
    content
</div>
```

In the above example, an `id` attribute has been added to a `div` element. Notice that the attribute starts with a name, followed by an equals sign (`=`), followed by a value in double quotes. There shouldn't be any spaces between any of these components. Attributes can be added to non-void or void elements. We will be covering some valid attributes and their usage shortly.

## Exercises

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Within the `Codeup` folder on your Desktop, open your file named `hello_world.html`.
1. Add an empty `<div>` inside the body with an `id` attribute of `"wrapper"`.
1. Add two paragraphs with a sentence in each. The first paragraph can be something about your favorite vacation spot. The second paragraph about your favorite actor.
1. Add a `<span>` around the first word in your first sentence. Does it cause the display of your page to be different? Do you know why?
1. Add a break `<br>` somewhere in your second paragraph. Do the results look different in your browser?
1. Be sure to save your changes.

{% else %}

1. Within the `~/vagrant-lamp/sites/codeup.dev/public/ `folder on your Mac, open your file named `hello_world.html`.
1. Add an empty `<div>` inside the body with an `id` attribute of `"wrapper"`.
1. Add two paragraphs with a sentence in each. The first paragraph can be something about your favorite vacation spot. The second paragraph about your favorite actor.
1. Add a `<span>` around the first word in your first sentence. Does it cause the display of your page to be different? Do you know why?
1. Add a break `<br>` somewhere in your second paragraph. Do the results look different in your browser?
1. Be sure to save your changes.

{% endif %}
