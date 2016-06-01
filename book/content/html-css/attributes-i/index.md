# Naming Conventions

Deciding what class and ID names can sometimes become overwhelming depending upon the type of website or application for which you are coding. It is always good to establish a naming convention before you begin coding.

### A Brief Thought About IDs

Since IDs are unique, meaning only one ID per page, generally it is best to save IDs for use with Javascript or identifying major view differences. For example:

```html
<!DOCTYPE html>
<html id="homepage">
...
</html>
```

```html
<header id="hero">
...
</header>
```

Neither of these are really necessary from a CSS point of view. With CSS, which we will cover later, IDs have a higher priority over classes when it comes to styling and can overwrite a previously written style if you are not careful.

## Class Naming Conventions

There are generally three methods for determining a class naming structure:

* Content Based Naming
* Presentation Based Naming
* Functional Naming

### Content Based Naming

Content-based class names are class names that describe the content they contain. If you have ever seen a class name like `submit-button`, `intro-text`, or `profile-photo`, you were looking at a content-based class name. An example might look like:

```html
<button class="submit-button">Send Message</button>
```

These class names feel clean. They help keep a clear separation between your content (HTML) and styling (CSS). In theory, this enables you to completely redesign the look and feel of your website without touching your HTML.

Content-based class names work fine if you are working on small websites. As your site grows though, they become less and less appropriate. They are not good for style reuse. What if your `login-button` and your `submit-button` look the same? You do not want to repeat yourself and will have to use a comma separator. Unfortunately they may change style in the future, which will cost you in development time.

### Presentational Based Naming

Presentational class names describe the way an element looks–like `green-button` or `big-text` or `squiggle-border`. The name itself is describing the styles that are being applied, like the following:

```html
<button class="green-button">Send Message</button>
```

These classes are conducive to code reuse. They do not care if they are being used to style a product title, a username, or a page heading. They just know they are gonna make text big and bold. This also comes with the benefit of scaling gracefully. As you are developing new components, you are able to grab already-existing styles and slap them onto your new markup. You do not need to worry about where to fit your new styles into a pre-existing architecture since you are not writing any new styles.

Presentational classes are also very self-describing. A developer inspecting code can infer more about how an element will look if it has the class name `round-image` rather than `profile-photo`.

### Functional Naming

A functional class name would look something like `positive-button`, `important-text`, or `selected-tab`. The styling of these elements is based on their function or meaning. Take a look at the following example:

```html
<button class="positive-button">Send Message</button>
```

Functional class names are great. When possible, this is probably how you want to write styles. But here is the catch: functional class names are not always possible.

Design is not always logical. It is easy to give an example for a functional class name when we are talking about buttons. Sometimes that block needs an inset shadow because it looks nice. Sometimes that icon needs to grow on hover because it is cute. Sometimes that text needs to be orange just because, well, it is orange.

If we cannot think of a good functional class name, we can either name that element based on its content, or based on its presentation.

## Other Attributes

### style

DO NOT do this in practice for web sites. Please note that it is an html attribute. Most use cases would be for creating email newsletters, since email clients don't process CSS.

```html
<div style="margin: 10px; color: #000000;">
...
</div>
```

### alt

Alt is used with images to clarify what the image is thats being presented. In some cases when the image does not load or loads slower the text will be displayed. This will allow search engines to index it as content as well as assist screenreaders used by people who have seeing disabilities.

```html
<img src="http://placehold.it/300x200" alt="My Company Logo">
```

### title & href

Generally we use title and href together on anchors. The href attribute points to the intended target, this can be an `id` or an external source.

```html
<a href="#" title="Blog Title Read More">Read More</a>
```

Titles are also found in other elements, like the `<abbr>`. For example:

```html
<abbr title="Hypertext Markup Language">HTML</abbr>
```

## Exercise

1. Open your `semantic_exercise.html` file so we can add some IDs and classes to it.
1. Add the `<a>` tag to each blog post that has the text `Read More`. Give each of these anchors a content based class name.
1. Find an `<img>` tag and add a semantic `alt` attribute to it.
1. Find your main `<header>` tag and give it a presentational class name.
