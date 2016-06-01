# Form Inputs and Submitting

So far, we have covered the basic structure of HTML forms, and a little bit about how they work. Now we will begin to cover form inputs and submission.

## Form Inputs

Form inputs can be defined by using the HTML `<input>` element. The `<input>` element is a void element, since it doesn't have any inner content.

### Type Attribute

There are many types of form inputs in HTML. Since most HTML inputs use the same HTML element, `<input>`, the browser needs a way to distinguish the input type. This is achieved by specifying a `type` attribute as part of the `<input>` element. The types we will be covering in this unit are:

- submit
- text
- hidden
- password
- checkbox
- radio

We will also be covering the *textarea* and *select* input types, which use unique HTML elements that will be discussed later in this unit.

### Name Attribute

HTML inputs should also have a `name` attribute that describes what the input is. The `name` attribute for the input will appear as the *key* in the query string when the form is submitted.

### Id Attribute

Additionally, an `id` attribute with the same value as the `name` attribute is often specified with the `<input>`. The `id` attribute is used for input labeling and also for easy access via JavaScript.

### Value Attribute

Some input types, like submit, text, and email, can have an initial value set by using the `value` attribute.

### Placeholder Attribute

Some input types, like text, password, email, and textarea, can have a text overlay that give information about the input that disappears once data is entered for the input. This text overlay is accomplished using the `placeholder` attribute. The `placeholder` attribute will not be shown if a `value` is set for the `<input>`.

Note: The placeholder attribute is supported in Internet Explorer 10+, Firefox, Opera, Chrome, and Safari.

### Input Example

Using all the attributes we just learned, here is a simple text input:

```html
<input type="text" id="username" name="username" placeholder="Enter your username">
```

## Input Labeling

To label form inputs, the `<label>` element is used. You may have noticed the labels in the example in the previous lesson. Form labels should be defined along with a `for` attribute that points to the `id` of the `<input>` that the label is for.  Here is an example of the proper use of a form label:

```html
<label for="username">Username:</label>
<input type="text" id="username" name="username">
```

## Submitting Forms

Forms are generally submitted by having a user click on a submit button. To add a submit button to a form, use an `<input>` that has a `type` attribute with a value of `submit` as follows:

```html
<input type="submit">
```

This will create a button that says: "Submit". If you would like to specify alternate text for the button, you can do that via the `value` attribute as follows:

```html
<input type="submit" value="Login">
```

The above example will create a button that says: "Login". It should be noted that if you add a `name` attribute to an `<input type="submit>`, the `value` specified will appear along with other form data when the form is submitted.

An HTML `<button>` element can also be used to submit a form. Although we haven't discussed the `<button>` element yet, here is an example of using it to submit a form.

```html
<button type="submit">Login</button>
```

This example will display the same result as the previous one. The main reason to use a `<button>` over an `<input type="submit>` is that the `<button>` element is not a void element and can contain other elements. It also offers more styling possibilities.

## Exercises

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

For this lesson, you will continue modifying the `my_first_form.html` file that you created earlier. You will be utilizing the same RequestBin for this Exercise.

Please perform the following steps:

1. Open the `my_first_form.html` file in your favorite editor.
1. Add `placeholder` attributes with appropriate values to both the `username` and `password` inputs.
1. Try adding a `name` attribute to the `<input type="submit>`. Submit the form as a `POST` request and view the results in your browser.
1. Add a `value` attribute to the `<input type="submit>` to change the button to say "Login". Try submitting the form and view the results in your browser.
1. Replace the `<input type="submit>` with a `<button>` element and try submitting the form.
1. From the browser, view the results from your file and the data from your RequestBin.

{% else %}

For this lesson, you will continue modifying the `my_first_form.php` file that you created earlier. Please perform the following steps:

1. Open the `my_first_form.php` file in your favorite editor.
1. Add `placeholder` attributes with appropriate values to both the `username` and `password` inputs.
1. Try adding a `name` attribute to the `<input type="submit>`. Submit the form as a `POST` request and view the results in your browser.
1. Add a `value` attribute to the `<input type="submit>` to change the button to say "Login". Try submitting the form and view the results in your browser.
1. Replace the `<input type="submit>` with a `<button>` element and try submitting the form.

{% endif %}
