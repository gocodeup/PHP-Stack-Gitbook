# While Loops

A `while` loop is a basic looping construct that will execute a code block as long as a certain condition is true. For example:

```js
'use strict';

var i = 0;

while (i < 10) {
    console.log('while loop iteration #' + i);
    i++;
}
```

Let's look at another example:

```js
'use strict';

var i = 10;

while (i < 10) {
    console.log('while loop iteration #' + i);
    i++;
}
```

In the second example, the condition `i < 10` is never true, so the code in the `while` loop never gets executed. Well, what if we wanted the code in the `while` loop to get executed at least one time regardless of whether the condition is met? That brings us to the `do-while` loop.

## Do While

A `do-while` loop is only different from a `while` in that the condition is evaluated at the end of the loop instead of the beginning. For example:

```js
'use strict';

var i = 10;

do {
    console.log('while loop iteration #' + i);
    i++;
} while (i < 10);
```

In this example, the code in the `do` block will get executed once before the `while` condition is checked. The condition is then checked to decide if the loop should continue. For the above example, the `do` block will only get executed once.

## Exercises

Please follow the instructions below.

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Create an HTML file named `while_loop_js.html` within the `Codeup` folder on your Desktop.
1. Use inline JavaScript to create a `while` loop that uses `console.log()` to create the output shown below.

        2
        4
        8
        16
        32
        64
        128
        256
        512
        1024
        2048
        4096
        8192
        16384
        32768
        65536

1. Save your work, please and thank you!

{% else %}

1. Create an HTML file named `while_loop_js.html` within the `~/vagrant-lamp/sites/codeup.dev/public` folder on your Mac.
1. An ice cream seller can't go home until she sells all of her cones. Write a
   JS program that generates a random number between 50 and 100 representing the
   amount of cones to sell. Your code should generate numbers between 1 and 5,
   simulating the amount of cones being bought by her clients. Use a `do-while`
   loop to log to the console the amount of cones sold to each person. This is
   how you get the random numbers.

  ```js
  // This is how you get a random number between 50 and 100
  var allCones = Math.floor(Math.random() * 50) + 50;
  // This is how you get a random number between 1 and 5
  var cones = Math.floor(Math.random() * 5) + 1;
  ```
  The output should be similar to the following:

  ```
  5 cones sold...  // if there are enough cones
  Cannot sell you 6 cones I only have 3...  // If there are not enough cones
  Yay! I sold them all! // If there are no more cones
    ```

1. Use inline JavaScript to create a `while` loop that uses `console.log()` to create the output shown below.

        2
        4
        8
        16
        32
        64
        128
        256
        512
        1024
        2048
        4096
        8192
        16384
        32768
        65536

1. Finally, save your work, commit the changes to your git repository, and push to GitHub.

{% endif %}
