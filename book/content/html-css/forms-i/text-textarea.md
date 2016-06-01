# Text, Password, Hidden and Textarea

Now that you know about some of the different types of form inputs that are available, and how forms are submitted, we can start to talk about individual input types.

## Text Inputs

An `<input>` element with a `type` attribute value of `text` is one of the most basic inputs. We have seen it in use in the examples in the previous lessons.

Here is another example:

```html
<input type="text" id="first_name" name="first_name" value="" placeholder="First Name">
```

## Password Inputs

An `<input>` element with a `type` attribute value of `password` is very similar to a `text` input. The primary difference is that `password` inputs are masked so that text that is typed in the box cannot be seen.

Here is an example:

```html
<input type="password" id="password" name="password" placeholder="Enter Password Here">
```

## Hidden Inputs

An `<input>` element with `type` attribute value of `hidden` is also like the `text` input. The main difference would be is that `hidden` is not viewable in the browser. The hidden field would have a value the developer would set so that value can still get sent along with the form.

Example below:

```html
<input type="hidden" id="user_id" name="user_id" value="1234">
```

## Text Area Inputs

Sometimes we need an input that allows a user to type more than just a word or phrase. For example, what if we wanted to allow a user to compose an email? For larger text inputs, we can use the `<textarea>` element.

Here is an example:

```html
<textarea id="email_body" name="email_body">Content Here</textarea>
```

Notice that the `<textarea>` element is not a void element. The contents between the tags will be rendered as the initial value of the text area.

One way to control size of the `<textarea>` element is the use the `rows` and `cols` attributes as follows:

```html
<textarea id="email_body" name="email_body" rows="5" cols="40">Content Here</textarea>
```

Later on, we will learn additional ways to size inputs, like the `<textarea>` element, using styles.

## Exercises

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

For this lesson, you will continue modifying the `my_first_form.html` file that you created earlier. You will be utilizing the same RequestBin for this Exercise.

Please perform the following steps:

1. Open the `my_first_form.html` file in your favorite editor.
1. Add a new form below the existing form.
1. Add inputs to the form that would allow a user to compose an email (to, from, subject, body, and a send button). Make sure to use the appropriate input types for each form element.
1. Put headings above the forms. Label the first form as "User Login", and the second form as "Compose an Email".
1. When complete, try submitting the new form and viewing the results on on both your file and your RequestBin page.

{% else %}

For this lesson, you will continue modifying the `my_first_form.php` file that you created earlier. Please perform the following steps:

1. Open the `my_first_form.php` file in your favorite editor.
1. Add a new form below the existing form.
1. Add inputs to the form that would allow a user to compose an email (to, from, subject, body, and a send button). Make sure to use the appropriate input types for each form element.
1. Put headings above the forms. Label the first form as "User Login", and the second form as "Compose an Email".
1. When complete, try submitting the new form and view the results in
   your browser.

{% endif %}
