# Basic Tables

To display tabular data in an HTML document, you can use the `<table>` element. Note that the `<table>` element should not be used to create web layouts, just to display tabular data.

HTML tables contain rows, and rows contain columns. Table rows are defined using the `<tr>` element, and column data is defined using the `<td>` element. Within the first row (`<tr>`) of a table, you can place the heading column element, `<th>`, instead of `<td>` to designate the contents as a heading.

A simple HTML table element looks like this:

```html
<table>
    <tr>
        <th>Heading 1</th>
        <th>Heading 2</th>
        <th>Heading 3</th>
        <th>Heading 4</th>
    </tr>
    <tr>
        <td>Row 1, Column 1</td>
        <td>Row 1, Column 2</td>
        <td>Row 1, Column 3</td>
        <td>Row 1, Column 4</td>
    </tr>
    <tr>
        <td>Row 2, Column 1</td>
        <td>Row 2, Column 2</td>
        <td>Row 2, Column 3</td>
        <td>Row 2, Column 4</td>
    </tr>
</table>
```

This would look something like this:

Heading 1 | Heading 2 | Heading 3 | Heading 4
--- | --- | --- | ---
Row 1, Column 1 | Row 1, Column 2 | Row 1, Column 3 | Row 1, Column 4
Row 2, Column 1 | Row 2, Column 2 | Row 2, Column 3 | Row 2, Column 4

There are many other customization options available with HTML tables, but you will only need to know the basics covered here for this course.

## Exercises

For this lesson, you will continue modifying the `hello_world.html` file that you created earlier. Please perform the following steps:

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Open the `hello_world.html` file in your favorite editor.
1. Within the body tags of the document, below everything else you have added, create a new level 2 heading that says: "Decimal to Hexadecimal Conversion Chart".
1. Below the heading, create a table with a heading row with 2 columns: "Decimal" and "Hexadecimal". Next, create additional rows to show the conversion of the decimal numbers 0 through 15 to hexadecimal.
1. View the result in your web browser by dragging the `hello_world.html` file from your `Codeup` folder directly into your browser window.

{% else %}

1. Open the `hello_world.html` file in your favorite editor.
1. Within the body tags of the document, below everything else you have added, create a new level 2 heading that says: "Decimal to Hexadecimal Conversion Chart".
1. Below the heading, create a table with a heading row with 2 columns: "Decimal" and "Hexadecimal". Next, create additional rows to show the conversion of the decimal numbers 0 through 15 to hexadecimal.
1. View the result in your web browser by browsing to: [http://codeup.dev/hello_world.html](http://codeup.dev/hello_world.html)

{% endif %}
