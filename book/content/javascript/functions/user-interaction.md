# Dialog Functions for User Interaction

JavaScript provides several functions that allow you to interact with users on a web page. The dialog functions we will be discussing below are part of the `window` object, which will be covered later.

## Alert

Have you ever seen a dialog box pop-up with a message when you are browsing a website? This was most likely a JavaScript alert message. The syntax for the alert function is as follows:

```js
alert("Message goes here.");
```

As you can see, the `alert` function takes in a string message as an argument. This message will be displayed to a user with an OK button to close the dialog.

## Confirm

Sometimes, instead of just displaying a message, you'd like to confirm that a certain action should be taken before performing it. This could be useful for something like emptying your trash folder in you email account. For that, JavaScript provides a `confirm` function. It works as follows:

```js
'use strict';

// the following line will show the OK/CANCEL confirm dialog
// if the user clicks OK, confirmed will be true, otherwise, confirmed will be false
var confirmed = confirm('Are you sure you want to do XYZ?');

// we can now use the confirmed variable to make a conditional action
if (confirmed) {
    // do XYZ
}

// you can also put the confirm function directly in the if condition as follows
if (confirm('Are you sure you want to do XYZ?')) {
    // do XYZ
}
```

## Prompt

Another function for interacting with a user via JavaScript is `prompt`. The `prompt` function will display a dialog that allows a user to type in a response to a question that is asked. The syntax for the `prompt` function is as follows:

```js
'use strict';

// the line below will display the prompt dialog and store the user input result in the response variable
var response = prompt('What is your favorite color?');

// next, we will send a message back to the user that uses their response
alert('Awesome, ' + response + ' is my favorite color too!');
```

## Exercises

Please follow the instructions below.

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Download [`user-interaction.js`](../../examples/javascript/user-interaction.js) to the `js` directory within the `Codeup` folder on your desktop.
1. Create an HTML file named `user-interaction.html` in the `Codeup` folder.
1. Make sure to include `user-interaction.js` with a `<script>` tag in `user-interaction.html`.
1. Open `user-interaction.js` and follow the `TODO` listed there.
1. Don't forget to save your work!

{% else %}

1. Download [`user-interaction.js`](../../examples/javascript/user-interaction.js). Save it to the `js` directory within the `~/vagrant-lamp/sites/codeup.dev/public`.
1. Create an HTML file named `user-interaction.html` in the `public` folder.
1. Make sure to include `user-interaction.js` with a `<script>` tag in `user-interaction.html`.
1. Open `user-interaction.js` and follow the `TODO` listed there.
1. Finally, save your work, commit the changes to your git repository, and push to GitHub.

{% endif %}
