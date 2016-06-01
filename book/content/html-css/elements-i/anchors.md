# Anchors

Hyperlinks to other pages, or to locations within the current page, are accomplished using the HTML anchor, `<a>`, element.

## External Links

From your experience on the web, you are probably quite familiar with external links. Any link that you click on that takes you to a new page, even within the same website, is an external link. You can build an external link using the HTML anchor element as follows:

```html
<a href="http://www.google.com">Go to Google</a>
```

This would appear as: [Go to Google](http://www.google.com)

As you can see, the anchor element in the above example contains an attribute named `href`. The `href` attribute is used to specify the web address the web browser should go to when the anchor is clicked. Also, notice that the content of the anchor element is the text that the browser displays for the link.

By default, an anchor tag will open the link destination in the same browser window the user is currently using. However, you can tell the browser that a link should be opened in a new window by using the `target` attribute. To open a link in a new window, do the following:

```html
<a href="http://www.google.com" target="_blank">Go to Google</a>
```

Instead of opening Google in the current browser window, this will open Google in a new window. There are other possible values for the `target` attribute, but we will not be using them in our lessons.

## Internal Links

Besides transitioning between pages, anchor tags can also be used to take a user somewhere else within the existing document. This can be useful in a table of contents, allowing a user to click an item to jump to a particular section of the document. It is also used for things like allowing a user to jump back to the top of a page.

To create a anchored location within an HTML document, use an anchor with no content and an id attribute as follows:

```html
<a id="top"></a>
```

In the above example, you can see that an anchor tag, without an `href` attribute, can be used to create an anchored location within a page. An `id` attribute with a unique value must be specified as part of the internal anchor.

Next, you probably want to link to the anchored location from other areas of your HTML document. To link back to the anchored location, create another anchor with an href that points to the id of the anchored location as follows:

```html
<a href="#top">Go to the top of the page</a>
```

Notice that the value of the `href` attribute of the above anchor element starts with `#`. This tells the web browser that we want to link to an internal id. Later on, you will see this used again when we get into CSS selectors.

## Exercises

For this lesson, you will continue modifying the `hello_world.html` file that you created earlier. Please perform the following steps:

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Open the `hello_world.html` file in your favorite editor.
1. Within the body tags of the document, below everything else you have added, create a new level 2 heading that says: "My Favorite Websites".
1. Below the heading, use either an ordered or unordered list to list your top 5 favorite websites. Make the names of the sites link to the sites by opening them in a new window.
1. Use what you learned in this lesson to create a "go to top of page" feature within your HTML document.
1. View the result in your web browser by dragging the `hello_world.html` file from your `Codeup` folder directly into your browser window.

{% else %}

1. Open the `hello_world.html` file in your favorite editor.
1. Within the body tags of the document, below everything else you have added, create a new level 2 heading that says: "My Favorite Websites".
1. Below the heading, use either an ordered or unordered list to list your top 5 favorite websites. Make the names of the sites link to the sites by opening them in a new window.
1. Use what you learned in this lesson to create a "go to top of page" feature within your HTML document.
1. View the result in your web browser by browsing to: [http://codeup.dev/hello_world.html](http://codeup.dev/hello_world.html)

{% endif %}
