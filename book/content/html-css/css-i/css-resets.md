# CSS Resets

CSS reset is a way to level the playing field when messing with css. Think of it as a base start for CSS.

## Default Styling

All browsers have different styles that are applied to every HTML element (e.g. h1, body) that have their own padding, margin and other CSS adjustments. The hard thing about this is that none of the browsers default styling is the same for any given element.

## What Does a CSS Reset Do?

A CSS reset is a stylesheet that is referenced before your main CSS files that sets all margins, paddings, and borders back down to 0. It also has some other elements that it gives the most basic adjustment to. This gets carried across all browsers so your CSS starts from the same point, no matter what browser the user is using.

## Normalize.css

There are a good number of resets out there but the one we will be using for this class is [normalize.css](http://necolas.github.io/normalize.css/). For further reading and research, see [CSS reset](http://www.cssreset.com/).

## Exercise

1. Click on the normalize link above find the CSS file and read all the comments to get a better understanding of what exactly being reset.
1. Save the reset file locally in your `codeup.dev/public/css` folder and name it `normalize.css`.
1. Visit [http://codeup.dev/hello_world.html](http://codeup.dev/hello_world.html) and use the inspector to look at the padding, margin, border, font settings, etc applied to your elements.
1. Now open `hello_world.html` file in Sublime and add an external link to the `normalize.css` file.
1. Refresh your page and notice how the styles on your page change. Now adjust any code that needs to be tweaked now that we have included the normalize file.
