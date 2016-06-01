# Date

According to the documentation:

> Creates a JavaScript Date instance that represents a single moment in time. Date objects are based on a time value that is the number of milliseconds since 1 January, 1970 UTC.

For full documentation on the Date object, go here:

[https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date)

## Creating a Date

Here are some examples of the various Date constructors that are available:

~~~js
'use strict';

// get a date object that represents the current date/time
var today = new Date();

// create a date object based on a specific date/time
// notice that month is zero based in non-string constructors
var codeup = new Date("February 4, 2014 09:00:00");
var codeup = new Date("2014-02-04T09:00:00");
var codeup = new Date(2014, 1, 4);
var codeup = new Date(2014, 1, 4, 9, 0, 0);
~~~

## Formatting Dates

The options for formatting dates in JavaScript are somewhat limited. If you want to print out a full date, you can use the `toString()` method as follows:

~~~js
'use strict';

var codeup = new Date(2014, 1, 4, 9, 0, 0);
codeup.toString(); // Tue Feb 04 2014 09:00:00 GMT-0600 (CST)
~~~

If you do not want the full date string, you can use other Date methods to retrieve individual portions of the date and build the string yourself.

## Calculating Elapsed Time

You can calculate elapsed time using the Date.now() function to get a timestamp at the start and end of an activity. The elapsed time will be the difference between the two timestamps.

According to the documentation:

> The Date.now() method returns the number of milliseconds elapsed since 1 January 1970 00:00:00 UTC.

~~~js
'use strict';

// get the start timestamp
var start = Date.now();

// do something for a long time

// get the end timestamp
var end = Date.now();

// calculate the elapsed time in milliseconds
var elapsed = end - start;
~~~

## Exercises

Please follow the instructions below.

1. Create an HTML file named `objects_date_js.html` within the `~/vagrant-lamp/sites/codeup.dev/public` folder on your Mac.
1. Copy and paste the code below as inline JavaScript and complete the todo items in the code.
1. View the results in your browser to test for the expected output.
1. Finally, save your work, commit the changes to your git repository, and push to GitHub.

~~~js
'use strict';

// todo:
// Create an array of months for printing dates
var months = [];

// todo:
// Create the date corresponding to your birthday using the JavaScript Date object.
//var jsBirthday

// todo:
// Log your birthday in the format: January 1, 2014 using the JavaScript Date object.
// See link below for methods needed:
// https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date#Getter
console.log('Here is my birthday using JavaScript: ');
