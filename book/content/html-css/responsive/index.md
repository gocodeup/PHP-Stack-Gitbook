# Responsive Web Design

> Responsive web design (RWD) is an approach to web design aimed at crafting sites to provide an optimal viewing experience—easy reading and navigation with a minimum of resizing, panning, and scrolling—across a wide range of devices (from desktop computer monitors to mobile phones).
> <footer><cite>[Wikipedia](http://en.wikipedia.org/wiki/Responsive_web_design)

## How did we get here?
Although most elements are *responsive* by default (think block elements spanning the width of their parent automatically) in the past most sites were built to be static. They had a very specific width, usually `960px`, and only grew vertically with content. Later small improvements were made with the use of an *elastic* or *flexible* layout, where percentages, ems, etc. were being used to take advantage of larger desktop screens.

Over time though, as more mobile devices and capabilities improved (ie. introduction of "smart phones"), websites needed to become much more flexible. In May of 2010, Ethan Marcotte coined the term *Responsive Web Design* in A List Apart article. From that point on, responsive design gained traction and became a standard amongst the web design industry.

There are [many good examples](http://mediaqueri.es) of how Responsive Design can optimize both layout and structure of a page depending on the user's screen size.

## Setting the Viewport
One of the first things you need to do is set the viewport. The viewport meta tag instructs the page to match the screen's width. This allows the page to match different screen sizes, whether rendered on a small mobile phone or a large desktop monitor. Do not use this tag if you are not planning on making your page responsive.
```html
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- ... -->
</head>
```

## Size Content to the Viewport
In previous lessons you have been using `px` to set specific dimensions to elements. For responsive design, we want to use relative units like percentages instead. For example, an image should be set to contain 100% width of its parent and height to auto adjust accordingly:

```html
<div class="column one-third">
    <img src="http://placehold.it/300x200" alt="picture" class="my-image" />
</div>
```

```css
.my-image {
    width: 100%;
    height: auto;
}
```

This way, the CSS that you're using to determine layout is what gives the content its boundaries, instead of the content having explicit dimensions. Now the content can be flexible.

### Better Font Sizing
Up until now you've probably used `px` units for font sizing. Many web designers or developers use this and also like using `em`s for `font-size`. The problem with `px` is that its not flexible. A pixel is a pixel, is a pixel. It will not adapt. A potential risk with `em` units is they are compounding. They are relative to their parent.

One popular choice is using `rem` units; `rem` means *root em*. Whatever your `html` element font size is set to, you can use that as a base. If `html` is set to `14px`, then `1rem` is `14px`, no matter what the relative size of the parent element.

For responsive design, try using at least `em` or `rem` for `font-size`.

## Media Queries
Media queries are generally perceived as the most important tool in your belt when it comes to building a responsive web site. They allow, with CSS, you to detect the pixel width of the viewable area and make changes based on those dimensions.

```css
/* screen sizes 500px and up */
@media screen and (min-width:500px) {
    selector {
        property: value;
    }
}

/* screen sizes between 960px and 1200px */
@media screen and (min-width:960px) and (max-width:1200px) {
    /* ... */
}
```

### Breakpoints
*Breakpoints* are what we refer to as major resolution changes, which you specify with media queries, usually based on popular device configurations. They are called breakpoints because traditionally major layout elements are broken and repositioned, though not always the case, and the name stuck.

You can determine whatever breakpoint px size you want, but you can find plenty of resources online to find the most frequently used breakpoints.

```css
/* Small devices (tablets, 768px and up) */
@media screen and (min-width:768px) { /* ... */ }

/* Medium devices (desktops, 992px and up) */
@media screen and (min-width:992px) { /* ... */ }

/* Large devices (large desktops, 1200px and up) */
@media screen and (min-width:1200px) { /* ... */ }
```

## Mobile First Approach
The mobile first approach is one that builds all styles default to a mobile device, then uses media queries to change the layout based on larger devices. This approach works well because you will always support mobile and can build up from there. Whereas working larger first usually introduces complications trying to break a design down to fit.

The breakpoints listed above fit this model. You can see there is no breakpoint for anything under `768px`. The default CSS applies. Then as the resolution grows, the breakpoints kick in.

## Other Research
* Retina Graphics - More and more mobile and desktop devices are able to process higher resolution graphics. Look into `retina.js`
* Font Icons - Font icons can scale by use of font-size since they are a typeface and not images. Research font icons.
* SVG Graphics & Icons - SVG is a much more efficient way to put graphics on a website. They can scale without degradation and are faster to process when used with the `<canvas>` tag.

## Exercise

1. Create a new page called `responsive.html`.
1. Add in your `doctype` and other required elements for a basic `html` page.
1. Add in the `viewport` meta tag.
1. Somewhere within your `body` tag, add 5 `div`s.
1. Create a `responsive.css` file and point to it correctly within your `responsive.html` page.
1. Now give each `div` a different background color using unique class names.
1. Create breakpoints for your `block`'s that make them all take up 80% of the view under 550px screen size but they take up 30% of the screen size for anything over 550px.
1. Make another breakpoint so they also take up 25% of the screen size for anything over 800px.
1. Now go back and give the `block`'s some margin in between each of them at every step/breakpoint

Josh's extra credit: style each `<div>` a different color without using unique class names
