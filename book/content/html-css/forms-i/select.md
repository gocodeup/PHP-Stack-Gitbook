# Select (Drop-Down and Multi-Select Lists)

In this lesson, we will be working with selection list inputs.

## Basic Select aka Drop-Down List

A basic select presents a drop-down list of items for a user to choose from. This can be accomplished in HTML by using the `<select>` element as follows:

```html
<label for="transmission">Select your transmission type: </label>
<select id="transmission" name="transmission">
    <option>Automatic</option>
    <option>Manual</option>
</select>
```

Notice how the `<select>` element contains `<option>` elements. The options are the items that appear in the drop down list. By default, the first option in the list will be "selected". If you want to override this behavior, you can do so by using the `selected` attribute with no value as follows:

```html
<label for="transmission">Select your transmission type: </label>
<select id="transmission" name="transmission">
    <option>Automatic</option>
    <option selected>Manual</option>
</select>
```

In this example, "Manual" will be selected by default instead of "Automatic".

When a form is submitted, the selected option inner text is what will get submitted as the value for the input. So in the above example, the query string would either contain `transmission=Manual` or `transmission=Automatic`. You can override this behavior by specifying a `value` attribute in the `<option>` element as follows:

```html
<label for="transmission">Select your transmission type: </label>
<select id="transmission" name="transmission">
    <option value="1">Automatic</option>
    <option value="2">Manual</option>
</select>
```

In this example, the query string will contain `transmission=1` if *Automatic* is selected, or `transmission=2` if *Manual* is selected. This is often uses so you can show the user a human readable option, but send a unique identifier to the back-end as a value.

## Multi-Select List aka List Box

Multi-select lists are structured almost identically to basic select lists. The only difference is the presence of the `multiple` attribute with no value as follows:

```html
<label for="os">What operating systems have you used? </label>
<select id="os" name="os[]" multiple>
    <option value="linus">Linux</option>
    <option value="osx">OS X</option>
    <option value="windows">Windows</option>
</select>
```

This works very similarly to the multi-select checkbox example in the previous lesson. The primary difference is in the visual representation. Notice that the square brackets `[]` are again used after the input name? This is because multiple values are being sent to the back-end and we want to treat the values as an array.

## Exercises

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

For this lesson, you will continue modifying the `my_first_form.html` file that you created earlier. You will be utilizing the same RequestBin for this Exercise.

Please perform the following steps:

1. Open the `my_first_form.html` file in your favorite editor.
1. Add a new form below the others with a heading of: "Select Testing".
1. Create a basic select input that asks the user a yes or no question. Try defaulting the answer to yes, and then to no. Try submitting the form to your browser and view the results.
1. Change the select input so that when yes is selected, a value of `1` is sent with the form data, and when no is selected, a value of `0` is sent. Try submitting the form in your browser and verify the results.
1. Update the "Multiple Choice Test" you made in the last lesson. Add another multi-answer question and use a multi-select input to accept the answer. Try submitting the form in your browser and viewing the results on both your file and your RequestBin page.

{% else %}

For this lesson, you will continue modifying the `my_first_form.php` file that you created earlier. Please perform the following steps:

1. Open the `my_first_form.php` file in your favorite editor.
1. Add a new form below the others with a heading of: "Select Testing".
1. Create a basic select input that asks the user a yes or no question. Try defaulting the answer to yes, and then to no. Try submitting the form to your browser and view the results.
1. Change the select input so that when yes is selected, a value of `1` is sent with the form data, and when no is selected, a value of `0` is sent. Try submitting the form in your browser and verify the results.
1. Update the "Multiple Choice Test" you made in the last lesson. Add another multi-answer question and use a multi-select input to accept the answer. Try submitting the form in your browser and view the results.

{% endif %}
