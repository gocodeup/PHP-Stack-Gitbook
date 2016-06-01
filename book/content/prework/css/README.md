# CSS

So if HTML is the foundation or structure of a page how can I move stuff around for placement? What about the color of those items, can I control those? Yes you can! This is where CSS comes in. CSS stands for Cascading Style Sheet. CSS does the following things:

1. Controls where tags (or, "elements") will be placed on your page.
2. Controls the color of elements on your page
3. Controls font size and styles
4. Controls background color/image

## CSS syntax and selector

Basic syntax is as follows:

```css
selector_name {
    property_name1: some_property_setting;
    property_name2: some_property_setting;
}
```

Note each property ends with a semicolon and all properties are within the curly braces of the thing being styled. You can call different elements on a page with css simply by their tag name. For example for a "p" paragraph tag you would do the following:

```css
p {
    color: blue;
    font-size: 15px;
    text-decoration: underline;
}
```

So by just typing the name of the tag you can target style that tag. Note that this will target all "p", or paragraph tags, on the page. See list of properties that can be applied in css on [W3Schools](http://www.w3schools.com/cssref/).
