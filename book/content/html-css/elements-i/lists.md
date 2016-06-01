# Lists

HTML provides a variety of elements for defining lists.

## Unordered Lists

One of the simplest forms of a list is an unordered list. Whenever you see a list with bullet points, you are likely viewing the browser's presentation of an unordered list.

Unordered lists are defined using the `<ul>` element. An unordered list should contain list items. List items are represented using the `<li>` element. Here is an example:

```html
<ul>
    <li>The first list item.</li>
    <li>The second list item.</li>
    <li>The third list item.</li>
</ul>
```

The above example would look something like this:

- The first list item.
- The second list item.
- The third list item.

It should again be noted that the styling of lists, like other elements, can be changed, and anything that represents a non-numbered list of items could accurately be describe using an unordered list. In fact, many web page navigation bars are defined using unordered lists.

## Ordered Lists

Ordered lists are not just bulleted, but instead have some type of identifier that specifies the order. Ordered lists can be defined using the `<ol>` element as follows:

```html
<ol>
    <li>The first list item.</li>
    <li>The second list item.</li>
    <li>The third list item.</li>
</ol>
```

The above example would look something like this:

1. The first list item.
2. The second list item.
3. The third list item.

## Definition Lists

HTML provides specific elements for defining a definition list. First of all, a definition list is defined using the `<dl>` element. A definition list contains definition terms and definition descriptions, defined using the `<dt>` and `<dd>` elements, respectively. Let's look at an example:

```html
<dl>
    <dt>DNS</dt>
    <dd>Domain Name System</dd>
    <dt>HTML</dt>
    <dd>HyperText Markup Language</dd>
    <dt>HTTP</dt>
    <dd>HyperText Transfer Protocol</dd>
</dl>
```

The above example would look something like this:

<dl>
    <dt>DNS</dt>
    <dd>Domain Name System</dd>
    <dt>HTML</dt>
    <dd>HyperText Markup Language</dd>
    <dt>HTTP</dt>
    <dd>HyperText Transfer Protocol</dd>
</dl>

## Exercises

For this lesson, you will continue modifying the `hello_world.html` file that you created earlier. Please perform the following steps:

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Open the `hello_world.html` file in your text editor.
1. Below your favorite quote, add a level 2 heading that says: "I'm Learning the LAMP Stack".
1. Below the heading, create an unordered list that names each item in the LAMP stack.
1. Below the unordered list, create another level 2 heading that says: "My Top 5 Favorite Foods".
1. Below the heading, create an ordered list containing your top 5 favorite foods in order.
1. Below the ordered list, create another level 2 heading that says: "Questions I'm Often Asked".
1. Below the heading, create a definition list containing at least 2 questions you are often asked, along with the answers you generally give. Be creative.
1. View the result in your web browser by dragging the `hello_world.html` file from your `Codeup` folder directly into your browser window.

{% else %}

1. Open the `hello_world.html` file in your favorite editor.
1. Below your favorite quote, add a level 2 heading that says: "I'm Learning the LAMP Stack".
1. Below the heading, create an unordered list that names each item in the LAMP stack.
1. Below the unordered list, create another level 2 heading that says: "My Top 5 Favorite Foods".
1. Below the heading, create an ordered list containing your top 5 favorite foods in order.
1. Below the ordered list, create another level 2 heading that says: "Questions I'm Often Asked".
1. Below the heading, create a definition list containing at least 2 questions you are often asked, along with the answers you generally give. Be creative.
1. View the result in your web browser by browsing to: [http://codeup.dev/hello_world.html](http://codeup.dev/hello_world.html)

{% endif %}
