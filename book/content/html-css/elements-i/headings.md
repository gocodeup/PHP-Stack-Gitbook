# Headings

To define in a main heading in an HTML document, you can use an `<h1>` tag. In fact, the text "Headings", just above this paragraph, is defined using an `<h1>` tag.

Since documents can contain different level headings, HTML provides several different heading levels. The levels, start at `1` as in `<h1>` and go all the way down to `6` as in `<h6>`.

Here is what a full heading level 1 element would look like in your HTML document:

```html
<h1>Heading Goes Here</h1>
```

Here are some examples of what the different heading levels look like.

# I am an &lt;h1&gt;

## I am an &lt;h2&gt;

### I am an &lt;h3&gt;

#### I am an &lt;h4&gt;

##### I am an &lt;h5&gt;

###### I am an &lt;h6&gt;

You have certainly seen headings used all over the web. Now it is time to begin using them in your own pages.

## Exercises

For this lesson, you will be modifying the `hello_world.html` file that you created earlier. Please perform the following steps:

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Open the `hello_world.html` file in your favorite editor.
1. Experiment with the different heading levels by enclosing your "hello world" message inside heading tags. Notice that even without any styles in the page, the browser provides default styles for the heading elements.
1. View the result in your web browser by dragging the `hello_world.html` file from your `Codeup` folder directly into your browser window.
1. When you are done experimenting with the heading levels, change the page so that you have your "hello world" message inside `<h1>` tags.

{% else %}

1. Open the `hello_world.html` file in your favorite editor.
1. Experiment with the different heading levels by enclosing your "hello world" message inside heading tags. Notice that even without any styles in the page, the browser provides default styles for the heading elements.
1. View the result in your web browser by browsing to: [http://codeup.dev/hello_world.html](http://codeup.dev/hello_world.html)
1. When you are done experimenting with the heading levels, change the page so that you have your "hello world" message inside `<h1>` tags.

{% endif %}
