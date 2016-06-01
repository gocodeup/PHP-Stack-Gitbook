# Images

Images can be used in web pages by using the image, `<img>`, element as follows:

```html
<img src="https://www.google.com/images/srpr/logo1w.png" alt="Google">
```

The above example with look something like this:

![Google](https://www.google.com/images/srpr/logo1w.png)

As you can see, the `<img>` element is a void element, because it has not contents. You can also see that a couple of attributes have been specified as part of the `<img>` element.

- src - Source of the image, specified as an absolute or relative url.
- alt - Alternative text for non-visual or text based browsers.

In order to properly display an image, a valid `src` must be specified. The `alt` attribute is optional, but really should be included in all `<img>` elements.

## Hotlinking

Using an image by linking to the file on another website, as we did with the Google logo in the example above, is known as hotlinking. Hotlinking is a discouraged practice because it uses someone else's web bandwidth, and web bandwidth costs money.

Instead of hotlinking, you should host your images on your own web site so that you can link to them locally. In order to do that, a new directory should be created in your public web directory specifically to hold the images for your site. Most often, the name of that directory is `img`.

Here is an example of using a relative url to link to a local image:

```html
<img src="/img/codeup.png" alt="Codeup">
```

In the example above, the `src` attribute of the `<img>` element is set to `/img/codeup.png`. When we learned about traversing the file system in the terminal, we learned that when you precede a path with a backslash (`/`), you are starting at the root. Similarly, when you do this within web urls, you are referring to the web root. This means that the `<img>` element in the example above will look for a directory name `img` in the web root containing a file named `codeup.png`. The rest of the url (the domain name part) will automatically get filled in by the web browser.

## Exercises

For this lesson, you will continue modifying the `hello_world.html` file that you created earlier. Please perform the following steps:

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Open the `hello_world.html` file in your favorite editor.
1. Within the body tags of the document, below everything else you have added, create a new level 2 heading that says: "My Vehicle".
1. Below the heading, create a new paragraph describing the vehicle you own, or the one you dream about.
1. Browse the web and find an image of the vehicle you described and download the image.
1. Create a new directory, named `img`, in your `Codeup` folder.
1. Move the image you downloaded into the `img` directory you just created.
1. Use what you learned in this lesson to display the image in your web page right below the paragraph describing the vehicle.
1. View the result in your web browser by dragging the `hello_world.html` file from your `Codeup` folder directly into your browser window.

{% else %}

1. Open the `hello_world.html` file in your favorite editor.
1. Within the body tags of the document, below everything else you have added, create a new level 2 heading that says: "My Vehicle".
1. Below the heading, create a new paragraph describing the vehicle you own, or the one you dream about.
1. Browse the web and find an image of the vehicle you described and download the image.
1. Create a new directory, named `img`, in the following location: `~/vagrant-lamp/sites/codeup.dev/public`
1. Move the image you downloaded to the directory you just created.
1. Use what you learned in this lesson to display the image in your web page right below the paragraph describing the vehicle.
1. View the result in your web browser by browsing to: [http://codeup.dev/hello_world.html](http://codeup.dev/hello_world.html)

{% endif %}
