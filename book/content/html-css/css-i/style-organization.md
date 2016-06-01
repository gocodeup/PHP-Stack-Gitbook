# CSS Organization

> Having a standard way of writing (literally writing) CSS means that code will always look and feel familiar to all members of the team.
>
> Further, code that looks clean feels clean. It is a much nicer environment to work in, and prompts other team members to maintain the standard of cleanliness that they found. Ugly code sets a bad precedent.
> <footer><cite>[Harry Roberts](http://cssguidelin.es)

When writing CSS, keep in mind that not only will you have to go back and edit the code, others may as well. Sticking with a standard way of writing CSS will help ensure clean, scalable code. Here are some guidelines:

## Indentation
Use indentation on your code. Also have good use of proper white space. Separate major sections of CSS with at least one or two line breaks. Keep similar rulesets together with no additional line breaks.

```css
selector1 {
    property: value;
}
selector1-a {
    property: value;
}


selector2 {
    property: value;
}
```

## Multiple Selectors
When dealing with multiple selectors having the same styles, give each selector its own line.

```css
selector1,
selector2,
selector3 {
    property: value;
}
```
## Table of Contents
A table of contents belongs at the beginning of your CSS file(s) and lets others (and yourself) know how you have organized your CSS. This is also good practice, as it forces you to think in a more modular and systematic fashion about your code, instead of haphazardly writing rulesets.

Do not worry if you have to organize as you go along. Sometimes it is not always clear where a ruleset will go right away, but as you do this more often, it will become easier. Try to use the same naming of titles in your contents that you will use later on to divide up your styles.

```css
/**
 * CONTENTS
 *
 * SETTINGS
 * Global...............Global styles and config.
 *
 * GENERIC
 * Normalize.css........A level playing field.
 * Box-sizing...........Better default `box-sizing`.
 * Layout...............Layout

 ...

**/
```

## Commenting
Commenting should be a quick and helpful way to explain what is going on in your code. With CSS, it is almost never obvious to another person why you coded things a certain way. Even you may forget why you wrote a declaration or two. Commenting allows you to have some future context for those decisions. You do not need to explain everything you have done, but the more complicated rulesets may need clarification. Especially ones dealing with layout or positioning.

```css
/**
 * A comment explaining a major section
 * or going into more detail about something
 * you have done.
**/

/* a quick comment */
```

## Titling CSS sections
Titling sections or areas of your CSS help discern where groups of styles end and being. For instance, if you are styling a navigation and then later are styling a footer, having a clear separation of these styles will keep things in check. These titles should also correspond with the titles you listed in your Table of Contents.

```css
/*-------------------*\
  HEADER
\*-------------------*/
...

/*-------------------*\
  NAVIGATION
\*-------------------*/
...

/*-------------------*\
  FOOTER
\*-------------------*/
...

```

## Exercise
You will need style keep note of your style organization throughout this whole process.

1. Open up box_model.css file from your `codeup.dev/public` folder and add any organizational elements according to this lesson.
1. Start a new html file: `codeup.dev/public/blog.html`, and a css file: `codeup.dev/public/css/blog.css`.
1. Add the normalize css reset to your `blog.html` file.
1. Start creating a blog like page and be creative with your background image/color, font styles (look at [Google Fonts](http://www.google.com/fonts)). Possibly introduce some icons using [Font Awesome](http://fortawesome.github.io/Font-Awesome/icons).
1. Be sure that your blog includes the following:
    1. Navigation (`<nav>` tag) with 5 links
    1. Header image
    1. Heading title tag
    1. 5 blog posts and each containing: Blog title, blog date, blog content, blog image.
