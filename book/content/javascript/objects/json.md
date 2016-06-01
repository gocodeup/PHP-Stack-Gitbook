# JavaScript Object Notation (JSON)

JavaScript Object Notation (JSON) is a data-interchange format that is easy for humans to read and write. It is widely used in cloud based services and web application programming interfaces (APIs).

Object literal and array literal notations were discussed in their respective sections. These same notations are used in JSON.

~~~js
// empty object in json form
{}

// empty array in json form
[]
~~~

Object properties in JSON start with a string version of the property name, followed by a colon, followed by the value of the property. Properties are separated by a comma.

~~~json
{
    "name1": "value1",
    "name2": "value2"
}
~~~

The value of a property can be one of the following:

- A quoted string
- A number
- An object
- An array
- true or false
- null

Here is an example utilizing all the possible types:

~~~json
{
    "stringProp": "stringValue",
    "numberProp": 1,
    "objectProp": {
        "prop": "value"
    },
    "arrayProp" : ['item1', 'item2'],
    "arrayOfObjectsProp" : [
        {
            "prop": "value"
        },
        {
            "prop": "value"
        }
    ],
    "boolProp"  : true,
    "nullProp"  : null
}
~~~

The above example illustrates the use of different types within JSON. It also shows how objects and arrays can be nested to create complex data structures.

Note: Do not place a comma after the last property of an object. Doing so may cause some hard-to-debug errors in Internet Explorer.

## Exercises

Please follow the instructions below.

1. Create an HTML file named `objects_json_js.html` within the `~/vagrant-lamp/sites/codeup.dev/public` folder on your Mac.
1. Copy and paste the code below as inline JavaScript and complete the todo items in the code.
1. View the results in your browser to test for the expected output.
1. Finally, save your work, commit the changes to your git repository, and push to GitHub.

~~~js
'use strict';

// todo:
// Create an array of objects that represent books.
// Each book should have a title and an author.
// The book author should be an object with a firstName and lastName.
// Be creative and add at least 5 books to the array
// var books = [todo];

// log out the books array
console.log(books);

// todo:
// Loop through the array of books using .forEach and print out the specified information about each one.
// start loop here
    console.log("Book #" + todo);
    console.log("Title: " + todo);
    console.log("Author: " + todo);
    console.log("---");
// end loop here
~~~
