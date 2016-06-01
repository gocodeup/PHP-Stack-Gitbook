# Semantic Usage of Elements

> Semantics are the implied meaning of a subject, like a word or sentence. It aids how humans (and these days, machines) interpret subject matter. On the web, HTML serves both humans and machines, suggesting the purpose of the content enclosed within an HTML tag.
> <footer><cite>[HTML5 Doctor](http://html5doctor.com/lets-talk-about-semantics/)

Throughout the history of the web, we have strived to give better meaning to HTML. Machines do not care what the information is, they just need to know what to do with it. As technology improves, browsers and devices will better understand what to do with the information presented to humans, resulting in a better experience for all users.

As you develop more and more websites or applications, you will find yourself questioning which elements to use at any given time. Think about the intended purpose of the information you are wrapping code around. Is it meant to be a blog article? Or possibly navigation? It is up to you to determine the true intent of the content.

If you are coding a site given to you by another designer, speak with that designer about it if you are unsure. If it is your own design, ask yourself the purpose. Do not forget you always have Google if you need to do some research on semantics and the web. Do not beat yourself up about, but do your work with purpose.

Its ok to use `<div>` or `<span>` if you cannot find a valid enough reason to use a `<section>` or `<li>`.

Let's review some common elements and their usage to give you an example:

## Header

The header element represents a group of introductory or navigational aids. A header element is intended to usually contain the section’s heading (an h1–h6 element), but this is not required. The header element can also be used to wrap a section’s table of contents, a search form, or any relevant logos.

```html
<header>
    <h1>Page Title</h1>
    ...
</header>
```

## Nav

The nav element represents a section of a page that links to other pages or to parts within the page: a section with navigation links. Not all groups of links on a page need to be in a nav element — only sections that consist of major navigation blocks are appropriate for the nav element.

```html
<nav>
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        ...
    </ul>
</nav>
```

## Main

The HTML main element represents the main content of the `<body>` of a document or application. The main content area consists of content that is directly related to, or expands upon the central topic of a document or the central functionality of an application.

```html
<main>
    <h1>Page Title</h1>
    <p>Page description of this page</p>
    ...
</main>
```

## Section

The section element represents a generic document or application section. A section, in this context, is a thematic grouping of content, typically with a heading. Examples of sections would be chapters, the tabbed pages in a tabbed dialog box, or the numbered sections of a thesis. A Web site's home page could be split into sections for an introduction, news items, contact information.

```html
<section>
    <h2>All Posts</h2>
    ...
</section>
```

## Article

The article element represents a component of a page that consists of a self-contained composition in a document, page, application, or site. This could be a forum post, a magazine or newspaper article, a web log entry, a user-submitted comment, an interactive widget or gadget, or any other independent item of content.

```html
<article>
    <h2>Post 1</h2>
    <p>Lorem ipsum dolor...</p>
    ...
</article>

<article>
    <h2>Post 2</h2>
    <p>Lorem ipsum dolor...</p>
    ...
</article>
```

## Aside

The aside element represents a section of a page that consists of content that is tangentially related to the content around the aside element, and which could be considered separate from that content. Used for quotes or sidebars, for advertising, for groups of nav elements, and for other content that is considered separate from the main content of the page.

```html
<aside>
    ...
</aside>
```

## Footer

Footer tag is used at the bottom of your page and can hold copyright information, privacy policies, site name, secondary navigation, etc. It is generally information and links a user might need, or that is necessary for legal or ethical reasons, but is of much lower priority than the rest of your navigation and content.

```html
<footer>
    <p>&copy; Copyright 2015.</p>
</footer>
```

## UL

The unordered list element represents an unordered list of items, namely a collection of items that do not have a numerical ordering, and their order in the list is meaningless.

```html
<ul>
    <li></li>
    <li></li>
    <li></li>
</ul>
```

## Div

Div element (division element) is a generic tag that does not represent anything. Divs are your container of last resort, if none of the semantic container tags makes sense you can wrap your content in `<div>` tags. However, you should use this sparingly!

```html
<div class="row">
    ...
</div>
```

## Exercise

1. Download the file [semantic_exercise.html](../../examples/html/semantic_exercise.html) to the folder `~/vagrant-lamp/sites/codeup.dev/public`.

1. View the original file in your browser at [http://codeup.dev/semantic_exercise.html](http://codeup.dev/semantic_exercise.html).

1. Open the file with Sublime.

1. Replace all of the `<div>` tags with correct semantic tags. Every single `<div>` can be replaced with a more appropriate semantic tag. Do not forget to replace both the opening and closing tags.

1. Refresh the view in your browser. Did your layout change? Why or why not do you think?

1. Throughout the rest of this course, be on the look out for `<div>` tags that can be replaced with semantic containers.
