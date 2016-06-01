# Paragraphs and More

In this lesson, we will continue by discussing several common HTML elements.

## Paragraphs &lt;p&gt;

To define a paragraph in HTML, you use the paragraph element, `<p>` as follows:

```html
<p>The text inside the tags will be interpreted as a paragraph.</p>
<p>This is another paragraph. The web browser will put some space between paragraphs, just like you would in a typewritten essay.</p>
<p>
	The tags and the text do not have to be on the same line.
</p>
```

## Line Breaks &lt;br&gt;

To define a line break in HTML, you use the line break element, `<br>` as follows:

```html
<p>Gimme a break,<br>gimme a break,<br>break me off a piece... well, you know the rest.</p>
```

The text above would appear as follows:

    Gimme a break,
    gimme a break,
    break me of a piece... well, you know the rest.

The line break element is a void element (doesn't have any content). You shouldn't use two line breaks in a row. Instead, just create a new paragraph. Line breaks also shouldn't be used for spacing visual elements on a page. Remember, HTML elements are used to describe data, not presentation.

## Emphasis &lt;em&gt;

Giving emphasis to a word or phrase in HTML can be accomplished with the emphasis element, `<em>`, as follows:

```html
<p>HTML is <em>seriously</em> awesome!</p>
```

That would look something like this:

<pre>HTML is <em>seriously</em> awesome!</pre>

As you can see, the browser's default style for the `<em>` element is italics. However, this can easily be changed, as we will learn later. The important thing to notice it that the emphasis tag is defining that something should be emphasized, not how it should be emphasized.

## Strong Emphasis &lt;strong&gt;

Making a word or phrase stand out in HTML can be accomplished with the strong element, `<strong>`, as follows:

```html
<p>What I am about to tell you is <strong>really important</strong>!</p>
```

That would look something like this:

<pre>What I am about to tell you is <strong>really important</strong>!</pre>

As you can see, the browser's default style for the `<strong>` element is bold. Once again, this can easily be changed, as we will learn later when we get to CSS and styling.

## Block Quote &lt;blockquote&gt;

If you'd like to make a quote in HTML, you can accomplish that with the block quote element, `<blockquote>`, as follows:

```html
<blockquote>My favorite quote would go here.</blockquote>
```

By default, most browsers will simply indent block quoted text. With a little styling though, block quotes may look like this:

> My favorite quote would go here.

## Block Elements vs Inline Elements

You may have noticed that some of the element examples above were nested within other elements. For example, the emphasis example was embedded in a paragraph element. Deciding what and how to nest elements should be determined based on whether the element is a block or inline element.

### Block Elements

Block elements naturally take up the full width of the page. Elements placed after them will appear below them. Of the elements you have learned so far, the following are block: headings and paragraphs. Block elements can contain other block elements or inline elements.

### Inline Elements

Inline elements are part of the flow of text in the page. Of the elements you have learned so far, the following are inline: emphasis and strong. Inline elements can be contained within block elements, but not the other way around. For example:

Do this:

```html
<p><em>Add emphasis to this paragraph.</em></p>
```

Do not do this:

```html
<em><p>Add emphasis to this paragraph.</p></em>
```

## Exercises

For this lesson, you will continue modifying the `hello_world.html` file that you created earlier. Please perform the following steps:

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Open the `hello_world.html` file in your favorite editor.
1. Below the "hello world" heading, create a paragraph introducing yourself and telling some fun facts about yourself. Use emphasis, strong emphasis, and line break elements within the paragraph.
1. Below the paragraph, create a level 2 heading that says: "My Favorite Quote". Below that heading, use the block quote element and paste in your favorite quote.
1. View the result in your web browser by dragging the `hello_world.html` file from your `Codeup` folder directly into your browser window.

{% else %}

1. Open the `hello_world.html` file in your favorite editor.
1. Below the "hello world" heading, create a paragraph introducing yourself and telling some fun facts about yourself. Use emphasis, strong emphasis, and line break elements within the paragraph.
1. Below the paragraph, create a level 2 heading that says: "My Favorite Quote". Below that heading, use the block quote element and paste in your favorite quote.
1. View the result in your web browser by browsing to: [http://codeup.dev/hello_world.html](http://codeup.dev/hello_world.html)

{% endif %}
