# Break and Continue

There are two special keywords that can be used as part of loops. These are `break` and `continue`. We already used `break` as part of a `switch` statement, but let's see how it works with a loop.

## Breaking Out of a Loop

Sometimes, a condition independent of the loop condition will occur that gives reason to exit the loop. The `break` keyword allows you to exit the loop at any time. Code execution in the loop will immediately halted and the loop will not continue.

Here is an example:

```js
'use strict';

// do not worry about the details of this line
// just know that it generates a random number between 1 and 100
var random = Math.floor((Math.random()*100)+1);

console.log('Random stopping point is: ' + random);

for (var i = 1; i < 100; i++) {

    console.log('Loop counter is: ' + i);

    if (random == i) {

        console.log('We have reached the random stopping point: break!');

        // use the break keyword to exit from the while loop
        break;

        // nothing after the break will get processed
        console.log('You will never see this line.');
    }
}
```

Although a `for` loop was used as an example, `break` works the same way with a `while` loop.

## Continuing the Next Iteration of a Loop

Besides breaking out of a loop, sometimes conditions occur that give reason to skip to the next loop iteration without completing processing of the entire loop code block. The `continue` keyword provides this functionality.

Here is an example:

```js
'use strict';

for (var i = 1; i < 100; i++) {

    if (i % 2 !== 0) {
        // number isn't even
        // odd numbers aren't as cool
        // skip the rest of the loop and continue with the next iteration
        continue;
    }

    console.log('Here is a lovely even number: ' + i);
}
```

Again, although a `for` loop was used as an example, `continue` works the same way with a `while` loop.

## Exercises

Please follow the instructions below.

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Create an HTML file named `break_continue_js.html` within the `Codeup` folder on your Mac.
1. Use `Math.floor((Math.random()*50)+1)` to generate a random number between 1 and 50. If the number is not odd, keep getting a new random number till it is odd.
1. Use console.log to log all the odd numbers from 1 to 50, except the random odd number you generated, by using `break` and `continue`. Try to match the output shown below (your random number will be different).
1. Finally, save your work and proceed to the next Lesson.

{% else %}

1. Create an HTML file named `break_continue_js.html` within the `~/vagrant-lamp/sites/codeup.dev/public` folder on your Mac.
1. Use `Math.floor((Math.random()*50)+1)` to generate a random number between 1 and 50. If the number is not odd, keep getting a new random number till it is odd.
1. Use console.log to log all the odd numbers from 1 to 50, except the random odd number you generated, by using `break` and `continue`. Try to match the output shown below (your random number will be different).
1. Finally, save your work, commit the changes to your git repository, and push to GitHub.

{% endif %}

Your output should look like this:

    Random odd number to skip is: 27
    Here is an odd number: 1
    Here is an odd number: 3
    Here is an odd number: 5
    Here is an odd number: 7
    Here is an odd number: 9
    Here is an odd number: 11
    Here is an odd number: 13
    Here is an odd number: 15
    Here is an odd number: 17
    Here is an odd number: 19
    Here is an odd number: 21
    Here is an odd number: 23
    Here is an odd number: 25
    Yikes! Skipping number: 27
    Here is an odd number: 29
    Here is an odd number: 31
    Here is an odd number: 33
    Here is an odd number: 35
    Here is an odd number: 37
    Here is an odd number: 39
    Here is an odd number: 41
    Here is an odd number: 43
    Here is an odd number: 45
    Here is an odd number: 47
    Here is an odd number: 49
