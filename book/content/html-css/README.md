# Intro to HTML

{% video %}https://vimeo.com/155164430{% endvideo %}
[HTML Introduction](https://vimeo.com/155164430/000fb3ae5b)

HTML stands for HyperText Markup Language, and it is the language of the web. When you view a page on the web, your web browser processes the HTML, along with styling information, into the page you see on your screen. Even if the website was written using PHP or Ruby, the final result that your browser sees is just HTML.

HyperText is described as text that is displayed on an electronic device that can be linked to other text which is accessible to the user. Whenever you click on a link on a web page, you are taking advantage of HyperText linking.

A Markup Language is defined annotations that gets added to text that describes the text further. For example, if you were writing an essay, you would have headings, paragraphs, and embedded images. HTML has all the same things, and there is a defined format in which to represent the different parts of a document.

In this course, we will be using HTML5, the fifth revision of the HTML standard.

## Doctype Declaration

The first line of an HTML document is the doctype declaration. Since there are different versions of the HTML standard, this line is needed to help the browser identify the data that will follow.

For HTML5, the doctype declaration looks like this:

```html
<!DOCTYPE html>
```

## Root Element

In an element-based markup language, the root element is the first element on the page. It is also the element that contains all other elements. For HTML, the root element is `<html>`.

So far, this is what we have:

```html
<!DOCTYPE html>
<html>
</html>
```

## Head and Body

Within the root element, `<html>`, of an html document, you will find a `<head>` element, and a `<body>` element. The `<head>` element is used to tell the web browser information about the web page. The `<body>` element is used to define the content that the web browser will display to a user.

Now, we have a document that looks like this:

```html
<!DOCTYPE html>
<html>
    <head>
        // info for web browser goes here
    </head>
    <body>
        // actual page content goes here
    </body>
</html>
```

### Page Title

As you know, web pages have titles. You have seen these in the title bar of your web browser, or in the name of bookmarks you make. There is an element, `<title>`, that gets added to the HTML document's `<head>` that provides the title to the web browser. An HTML document with a title looks like this:

```html
<!DOCTYPE html>
<html>
    <head>
        <title>My First Web Page</title>
    </head>
    <body>
        // actual page content goes here
    </body>
</html>
```

In the example above, the page title is `My First Web Page`.

### Metadata

Metadata, or extended information, can be provided via the `<meta>` element within the document's `<head>`. A few examples of things specified via metadata are:

- search keywords
- page description
- page author
- page character set

```html
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>My First Web Page</title>
    </head>
    <body>
        // actual page content goes here
    </body>
</html>
```

In the example above, we specified a `<meta>` element defining the character set for the web page. Notice that there is no close tag for `<meta>` because it is a void element.

### Styles and Scripts

Later on, we will learn about adding styles and scripts to our HTML pages. There are special elements that get added to the document to describe such data, but we aren't quite ready for them.

### Comments

Comments in HTML pages look different from what you see in PHP or other programming languages. HTML comments will not be rendered by the web browser, but are viewable in the source of the web page. An HTML comment looks like this:

```html
<!-- comment goes here -->

<!--
multi
line
comment
here
-->
```

## Semantic Markup

As we get further into HTML and begin learning about some of the available elements, you may notice that the same visual result can be achieved using different combinations of markup and styles. It should be noted that the HTML element that best describes the data that it contains is the appropriate one for the job.

Keep in mind that there are other consumers of web pages besides web browsers. For example, there are screen readers, for the visually impaired, that actually read the contents of the page to a user. If you do not use the appropriate elements to hold your data, the screen reader will not provide a good user experience.

## Exercises

Hello World in HTML.

Please perform the following steps to create your own Hello World web page.

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Within the `Codeup` folder on your Desktop, create a file named `hello_world.html`.
1. By hand (please do not copy and paste unless all this has been a review for you!), type out a complete HTML document using the example shown in the metadata section above.
1. Change the page title to something creative.
1. Replace the comment in the body of the HTML document with text that says `Hello from Codeup!`.
1. View the result in your web browser by dragging the `hello_world.html` file from your Codeup folder directly into your browser window.

{% else %}

1. Within the `~/vagrant-lamp/sites/codeup.dev/public/` folder on your Mac, create a file named `hello_world.html`.
1. By hand (please do not copy and paste unless all this has been a review for you!), type out a complete HTML document using the example shown in the metadata section above.
1. Change the page title to something creative.
1. Replace the comment in the body of the HTML document with text that says `Hello from Codeup!`.
1. View the result in your web browser by browsing to: [http://codeup.dev/hello_world.html](http://codeup.dev/hello_world.html)

{% endif %}
