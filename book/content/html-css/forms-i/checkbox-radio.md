# Checkbox and Radio Buttons

In this lesson, we will be covering a couple non-text inputs; checkboxes and radio buttons.

## Checkboxes

Checkboxes are used to ask users for input on yes or no questions. For example, "Yes, please sign me up for your mailing list". They are also used to ask a user a question with one or more possible answers.

A checkbox can be created using an `<input>` element with a `type` of `checkbox` as follows:

Yes/No Question:

```html
<input type="checkbox" id="mailing_list" name="mailing_list" value="yes">
<label for="mailing_list">Sign me up for the mailing list!</label>
```

Zero-to-many Answers Question:

```html
<p>What operating systems have you used?</p>
<label><input type="checkbox" id="os1" name="os[]" value="linux"> Linux</label>
<label><input type="checkbox" id="os2" name="os[]" value="osx"> OS X</label>
<label><input type="checkbox" id="os3" name="os[]" value="windows"> Windows</label>
```

There are a couple things to notice in the above examples. First, notice how the `<input>` elements is placed within `<label>` elements. Also, notice how the labels have unique `for` attribute values that point to the `id` values of the checkboxes they correspond to. This allows the text associated with the checkbox to be clicked to activate or deactivate the checkbox. It also helps with web accessibility as mentioned previously.

The second thing to notice is that when multiple checkboxes are used for a single question, the same `name` is used, but the `id`s are different. Also notice that the `name` ends with `[]`. Doing this allows the back-end language you are using to treat the input as an array. You will see why this is helpful in the PHP form input lessons.

If you want a checkbox to be checked by default, you can add the `checked` attribute with no value as follows:

```html
<input type="checkbox" id="mailing_list" name="mailing_list" value="yes" checked>
<label for="mailing_list">Sign me up for the mailing list!</label>
```

## Radio Buttons

Radio buttons are primarily used to allow a user to select one value from a list of values. For example, a web survey may ask a multiple choice question using radio buttons.

Radio buttons can be created using an `<input>` element with a `type` of `radio` as follows:

```html
<p>What is the capital of Texas?</p>
<label>
    <input type="radio" name="q1" value="houston">
    Houston
</label>
<label>
    <input type="radio" name="q1" value="dallas">
    Dallas
</label>
<label>
    <input type="radio" name="q1" value="austin">
    Austin
</label>
<label>
    <input type="radio" name="q1" value="san antonio">
    San Antonio
</label>
```

Notice how the usage of radio buttons is very similar to checkboxes. Giving radio buttons the same `name` puts them in the same group. Only one radio button in a group can be checked at a time. The `name` for radio buttons does not need to end with square brackets `[]` since only one of the values ever is submitted at a time. Just like checkboxes, the `checked` attribute can be added to a radio button to make it the default selection.

## Exercises

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

For this lesson, you will continue modifying the `my_first_form.html` file that you created earlier. You'll be utilizing the same RequestBin for this Exercise.

Please perform the following steps:

1. Open the `my_first_form.html` file in your favorite editor.
1. Add a checkbox to the "Compose an Email" form that asks a user if they want to save a copy to their sent folder. Make the checkbox checked by default.
1. Try submitting the email form and view the results in your browser with and without the checkbox checked. What observations can you make?
1. Add a new form below the existing forms with a heading of: "Multiple Choice Test".
1. Add two or more question and answer sets using radio buttons. Experiment with the naming so that you understand how radio buttons are grouped.
1. Try submitting the multiple choice test form and view the results in your browser with and without or without questions answered. What observations can you make?
1. Add a question that has multiple answers using grouped checkboxes. Try submitting the form to your browser to see how the inputs work.
1. Try removing the `<label>` elements from your checkboxes and radio buttons. Try clicking on the text next to the checkbox or radio button in the web browser. Notice the difference in behavior? Replace the labels when you are done.
1. From the browser, view the results from your file and the data from your RequestBin.

{% else %}

For this lesson, you will continue modifying the `my_first_form.php` file that you created earlier. Please perform the following steps:

1. Open the `my_first_form.php` file in your favorite editor.
1. Add a checkbox to the "Compose an Email" form that asks a user if they want to save a copy to their sent folder. Make the checkbox checked by default.
1. Try submitting the email form and view the results in your browser with and without the checkbox checked. What observations can you make?
1. Add a new form below the existing forms with a heading of: "Multiple Choice Test".
1. Add two or more question and answer sets using radio buttons. Experiment with the naming so that you understand how radio buttons are grouped.
1. Try submitting the multiple choice test form and view the results in your browser with and without or without questions answered. What observations can you make?
1. Add a question that has multiple answers using grouped checkboxes. Try submitting the form to your browser to see how the inputs work.
1. Try removing the `<label>` elements from your checkboxes and radio buttons. Try clicking on the text next to the checkbox or radio button in the web browser. Notice the difference in behavior? Replace the labels when you are done.

{% endif %}
