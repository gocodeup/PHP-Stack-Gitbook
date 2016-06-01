# Models

Angular stores input coming from the user in *models*. At their core, models are just JavaScript variables. Typically we will store related information together in a single JavaScript object, and use the familiar `objectName.propertyName` syntax to view or change their value. The real power will come when we combine our models together with expressions to take advantage of Angular's [two-way binding](https://docs.angularjs.org/tutorial/step_04).

## Form Inputs

Models are assigned to standard form inputs. You will use the directive [`ng-model`](https://docs.angularjs.org/api/ng/directive/ngModel) to specify which input corresponds to which model. For example, a typical signup form might look like the following:

```html
<form>
    <label for="first_name">First Name</label>
    <input type="text" id="first_name" ng-model="user.firstName">

    <label for="last_name">Last Name</label>
    <input type="text" id="last_name"  ng-model="user.lastName">

    <label for="email">eMail</label>
    <input type="email" id="email" ng-model="user.email">

    <label for="password">Password</label>
    <input type="password" id="password" ng-model="user.password">
</form>
```

If we want to output this information on the page we can use expressions, just like in previous examples:

```html
<div>
    Welcome {{ user.firstName }} {{ user.lastName }}<br>
    We will send a confirmation eMail to {{ user.email }}
</div>
```

If you try out the above code you will see some of the real magic of Angular. As you type your information in to the form, the data is *immediately* being displayed out to the screen! This is what two-way data binding does for us: it links our form inputs to their output, so as they change in one place they change everywhere.

## Validation

As we typed into the email field, you may have noticed that the value did not get immediately displayed to the screen. That is because Angular was *validating* that what we typed into that form field actually looked like an eMail address. Angular's validations are based off of the type of field, and some common HTML5 form attributes. To take advantage of validation, we can use the following standard input types in our forms:

- `email`
- `number`
- `url`
- `date`
- `week`
- `month`
- `time`
- `datetimelocal`

In addition, we can add some validation conditions as properties of our input:

- `required`
- `min`
- `max`
- `minlength`
- `maxlength`

Let's apply some of these new rules to our previous form:

```html
<!-- Novalidate disables the browser's default validation. Angular recommends
     doing this in order to make a more consistent user experience across browsers -->
<form novalidate>
    <label for="first_name">First Name</label>
    <input type="text" id="first_name" ng-model="user.firstName" maxlength="50" required>

    <label for="last_name">Last Name</label>
    <input type="text" id="last_name"  ng-model="user.lastName" maxlength="100" required>

    <label for="email">eMail</label>
    <input type="email" id="email" ng-model="user.email" required>

    <label for="password">Password</label>
    <input type="password" id="password" ng-model="user.password" minlength="6" required>
</form>
```

We have made all our inputs required, set maximum lengths for both our first and last name, and a minimum length for our password. Now, the entire form will only be considered *valid* if all those conditions are met.

### CSS Classes

As Angular parses and validates our form for us, it automatically adds and removes some utility classes to the form inputs depending on their state. We can use these classes to communicate to the user whether or not their input matches our expectations. Those classes are:

- `ng-valid` &mdash; The input is valid
- `ng-invalid` &mdash; The input is **not** valid
- `ng-pristine` &mdash; The user has **not** changed the input value
- `ng-dirty` &mdash; The user has changed the input value
- `ng-untouched` &mdash; The user has **not** interacted with the input at all
- `ng-touched` &mdash; The user has put their cursor in the input at least once

## Exercises

Based off of our previous work with expressions and directives, we are going to create another sample page to experiment with Angular models.

1. In `angular-test.dev/public` create a file called `model-test.html`.
1. Create `modelTest.js` inside of `codeup.dev/public/js`.
1. Create an Angular module called `modelTest` in `modelTest.js`.
1. Do not forget to bootstrap your module!
1. Create a form where a person can enter
    - Their name
    - eMail address
    - Date of birth
    - GitHub page
    - A drop down where the use can pick one of at least three possible icon images

  Use appropriate input types for each field. Make sure the images are downloaded to your local server.
1. Use CSS to help the user identify valid & invalid fields. Pay special attention to your class selectors; we want to highlight invalid fields **only** if they have been modified and are invalid. The same should be true of valid fields.
1. Render out the user's input on the page, including the icon. Use custom CSS to layout the information like an business card.
1. Use filters to display the user information in a well formatted manner (_**Hint:** There is a [`date`](https://docs.angularjs.org/api/ng/filter/date) filter!_)
