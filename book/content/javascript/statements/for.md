# For Loops

A `for` loop is a robust looping mechanism available in many programming languages. JavaScript's implementation syntax matches that of PHP.

## Basic For Loop Syntax

Example:

```js
for (var i = 0; i < 10; i++) {
    console.log('for loop iteration #' + i);
}
```

In the example above, you can see that a `for` loop takes 3 expressions separated by semicolons.

The first expression is called once before the first loop iteration starts and allows for initialization of loop variables. In the example, a variable `i` is created with an initial value of `0`.

The second expression is a condition that will decide if the loop should start/continue. It is called before each loop iteration. In the example, the loop will run as long as `i` is less than the number `10`.

The third expression allows for code that should be executed at the end of each loop iteration. Most often, the incrementing of loop counters takes place here.

## Exercises

Please follow the instructions below.

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Create an HTML file named `for_loop_js.html` within the `Codeup` folder on your Desktop.
1. Use inline JavaScript to create a `for` loop that uses console.log to create the output shown below.
1. Make sure to save your changes before continuing.

{% else %}

1. Create an HTML file named `for_loop_js.html` within the `~/vagrant-lamp/sites/codeup.dev/public` folder on your Mac.
1. Using a for loop and inline JS, write the code to log to the console the
   following output.
```
1
22
333
4444
55555
666666
7777777
88888888
999999999
0000000000
```
1. Write the JS code to log to the console the multiplication table for a random
   number between 1 and 10. For instance, if the random number is 7, the console
   output should look like
```
7x1=7
7x2=14
7x3=21
7x4=28
7x5=35
7x6=42
7x7=49
7x8=56
7x9=63
7x10=70
```
1. Using a `for` loop and the code to generate a random number from the previous
   lessons, generate 10 random numbers between 20 and 200 and output to the
   console whether each number is odd or even. For example:
```
123 is odd
80 is even
24 is even
199 is odd
...
```
1. Use inline JavaScript to create a `for` loop that uses console.log to create the output shown below.
1. Finally, save your work, commit the changes to your git repository, and push to GitHub.

{% endif %}

        100
        95
        90
        85
        80
        75
        70
        65
        60
        55
        50
        45
        40
        35
        30
        25
        20
        15
        10
        5
