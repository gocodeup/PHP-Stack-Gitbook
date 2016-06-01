# CSS Properties

{% video %}https://vimeo.com/155164198{% endvideo %}
[CSS Properties](https://vimeo.com/155164198/1770848691)

Now that we understand how to include CSS in a web page and how CSS selectors work, we can start learning some basic CSS properties. There are a *lot* of CSS properties, and we will only be scratching the surface. For a complete reference, see the [MDN](https://developer.mozilla.org/en-US/docs/Web/CSS/Reference).

## Colors

Often times, you will find yourself applying colors while defining the style of your page. It is worth having a short discussion about how colors work in CSS prior to getting started with properties.

One way to reference a color is simply by using its name. For example, `red` or `blue` are valid colors in CSS. It should be noted that specifying colors by name is not the preferred method and is not something you will see used often. For a list of color names available in CSS look at the [MDN](https://developer.mozilla.org/en-US/docs/Web/CSS/color_value).

Another way to reference a color is by using its RGB value, and this is the preferred method. As you may have guessed, RGB stands for Red/Green/Blue. RGB values can be specified in CSS in several ways, but the most common method is by using a six character hexadecimal value. An example of a hex color is `#FFFFFF`, which is the color `white`. Notice how there is a number sign preceding the hexadecimal color value. This is necessary, so do not forget to include it when specifying a color in hexadecimal.

You now know that colors can be specified using a six character hexadecimal value that represents the RGB value of a color. This implies that there are two hex characters for each color. Based on that knowledge, let us look at some example colors:

```css
#FF0000 = red
#00FF00 = green
#0000FF = blue
#000000 = black
#FFFFFF = white
#808080 = grey
```

From the examples above, along with some knowledge of the hexadecimal number system, you can being to see how hex color codes work. We can also see that since 00-FF represents 256 unique values, we have a total of 256 x 256 x 256 (over 16 million) color combinations.

Besides seeing six character hex color codes, you may also see three character hex color codes. Three character color codes are a shorthand notation that works as follows:

```css
#F00 = #FF0000
#ABC = #AABBCC
#AAA = #AAAAAA
```

Essentially, to convert from a three character color code to a six character color code, you just have to duplicate each of the characters. More color reference material can be found on the [MDN](https://developer.mozilla.org/en-US/docs/Web/Guide/CSS/Getting_Started/Color).

## Text Properties

### color

> The CSS color property sets the foreground color of an element's text content and its decorations. It does not affect any other characteristic of the element. [More Info](https://developer.mozilla.org/en-US/docs/Web/CSS/color).

```css
/* make element text color red */
element { color: #F00; }
```

### text-decoration

> The text-decoration CSS property is used to set the text formatting to underline, overline, line-through, or blink. [More Info](https://developer.mozilla.org/en-US/docs/Web/CSS/text-decoration).

```css
element { text-decoration: underline; }
```

### text-align

> The text-align CSS property describes how inline content like text is aligned in its parent block element. text-align does not control the alignment of block elements itself, only their inline content. [More Info](https://developer.mozilla.org/en-US/docs/Web/CSS/text-align).

```css
element { text-align: center; }
```

### text-indent

> The text-indent CSS property specifies how much horizontal space should be left before the beginning of the first line of the text content of an element. Horizontal spacing is with respect to the left (or right, for right-to-left layout) edge of the containing block element's box. [More Info](https://developer.mozilla.org/en-US/docs/Web/CSS/text-indent).

```css
element { text-indent: 40px; }
```

## Font Properties

### font-family

> The font-family CSS property allows for a prioritized list of font family names and/or generic family names to be specified for the selected element. Unlike most other CSS properties, values are separated by a comma to indicate that they are alternatives. The browser will select the first font on the list that is installed on the computer or that can be downloaded using the information provided by a @font-face at-rule.

```css
element { font-family: Helvetica, Arial, Sans-Serif; }
element { font-family: "Times New Roman", Times, Serif; }
element { font-family: "Courier New", Monospace; }
```

You may be curious what the difference is between a serif font, and a sans-serif font. Serifs are the fancy edges/lines that appear on the end of characters. Serif fonts have the fancy edges, sans-serif fonts are "without" serifs. Here is an illustration:

![Example of serif and sans-serif letter A](../../img/css/serif-sans-serif.png)

Monospace fonts are a bit different in that all the characters are the same width. Monospace fonts are often used in terminals to help with readability.

More information on font families can be found on the [MDN](https://developer.mozilla.org/en-US/docs/Web/CSS/font-family).

### font-style

> The font-style CSS property allows italic or oblique faces to be selected within a font-family. [More Info](https://developer.mozilla.org/en-US/docs/Web/CSS/font-style).

```css
element { font-style: italic; }
```

### font-size

> The font-size CSS property specifies the size of the font – specifically the desired height of glyphs from the font. Setting the font size may, in turn, change the size of other items since it is used to compute the value of em and ex length units.

```css
element { font-size: 12px; }
element { font-size: 1em; }
```

As you can see in the examples above, different units can be used to specify sizes in CSS. Here is a description of the units used above:

- `px` stands for pixels. Pixels are an absolute unit used for screen media.
- `em` is a relative/dynamic unit that corresponds to the current font size. If the current font size is 12px, then 1em is 12px. 2em would be 24px. 0.5 em would be 6px. If the browser font size changes, all em values would change accordingly.

Here is a note regarding pixels from the MDN:

> Note: Defining font sizes in pixel is not accessible, because the user cannot change the font size from the browser. (For example, users with limited vision may wish to set the font size much larger than the size chosen by a web designer.) Therefore, avoid using pixels for font sizes if you wish to create an inclusive design.

To read more about font size specification, look at the [MDN](https://developer.mozilla.org/en-US/docs/Web/CSS/font-size).

### font-weight

> The font-weight CSS property specifies the weight or boldness of the font. However, some fonts are not available in all weights; some are available only on normal and bold. [More Info](https://developer.mozilla.org/en-US/docs/Web/CSS/font-weight).

```css
element { font-weight: bold; }
```

## Background Properties

### background-color

> The background-color CSS property sets the background color of an element, either through a color value or the keyword transparent. [More Info](https://developer.mozilla.org/en-US/docs/Web/CSS/background-color).

```css
element { background-color: #F00; }
```

### background-image

> The CSS background-image property sets one or several background images for an element. The images are drawn on successive stacking context layers, with the first specified being drawn as if it is the closest to the user. [More Info](https://developer.mozilla.org/en-US/docs/Web/CSS/background-color).

```css
element { background-image: url(http://www.example.com/images/bck.png); }
```

### background-repeat

> The background-repeat CSS property defines how background images are repeated. A background image can be repeated along the horizontal axis, the vertical axis, both, or not repeated at all. [More Info](https://developer.mozilla.org/en-US/docs/Web/CSS/background-repeat).

```css
element { background-repeat: repeat-x; }
```

## List Properties

### list-style

> The list-style CSS property is a shorthand property for setting list-style-type, list-style-image, and list-style-position. [More Info](https://developer.mozilla.org/en-US/docs/Web/CSS/list-style).

```css
ol { list-style: upper-alpha; }
ul { list-style: square; }
```

## Inheriting Styles

> The inherit CSS-value causes the element for which it is specified to take the computed value of the property from its parent element. It is allowed on every CSS property. [More Info](https://developer.mozilla.org/en-US/docs/Web/CSS/inherit).

```css
/* make second-level headers green */
h2 { color: green; }

/* ...but leave those in the sidebar alone so they use their parent's color */
#sidebar h2 { color: inherit; }
```

## Exercises

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Open up your `hello_world.html` file from your `Codeup` folder.
1. Add a style to change the color of the headers on your page and make them underlined.
1. Add a style to change the background color of the page.
1. Add a style to add a background image to your background. Search how to manipulate the position, sizing of this background image.
1. Add a style to change the list-style to something other than the default bullet.
1. Add a style to change the font for the entire page. Use google fonts if you would like [Google Fonts](http://www.google.com/fonts).
1. Add a style to change the table, table cells `td` and rows `tr` padding and font sizes.
1. Add a style to alter the anchor tags and its different states. (e.g. link, visited, hover and active).
1. Continue experimenting with styles to increase the visual appeal of the page.

{% else %}

1. Open up your `hello_world.html` file from codeup.dev.
1. Add a style to change the color of the headers on your page and make them underlined.
1. Add a style to change the background color of the page.
1. Add a style to add a background image to your background. Search how to manipulate the position, sizing of this background image.
1. Add a style to change the list-style to something other than the default bullet.
1. Add a style to change the font for the entire page. Use google fonts if you would like [Google Fonts](http://www.google.com/fonts).
1. Add a style to change the table, table cells `td` and rows `tr` padding and font sizes.
1. Add a style to alter the anchor tags and its different states. (e.g. link, visited, hover and active).
1. Continue experimenting with styles to increase the visual appeal of the page.

{% endif %}
