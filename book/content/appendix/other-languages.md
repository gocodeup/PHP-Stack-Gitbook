# JavaScript

Naming conventions are the same for JavaScript as they are for PHP: variable and function names should be in camelCaps. While JavaScript has classes in a manner of sorts they were not covered in this course. Regardless, they too would be formatted in StudlyCaps like PHP. The biggest difference between JavaScript and PHP is in the placement of opening curly braces. In JavaScript, all opening curly braces should be placed on the same line as the heading for the block, whether it's a control structure, function, or object. For example, simple JavaScript functions would appear as follows:

~~~js
function firstFunctionName(firstParam, secondParam) {
    // function body
}

var secondFunctionName = function() {
    // function body
};
~~~

And a JavaScript object:

~~~js
var object = {
    firstProperty: "value a",
    secondProperty: "value b",

    objectMethodName: function(param) {
        // function body
    }
}
~~~

This formatting lends itself very well to anonymous functions, which are used throughout JavaScript:

~~~js
document.getElementById("element-id").addEventListener("click", function(e) {
    setTimeout(function() {
        // do something one second later
    }, 1000);
});
~~~

# MySQL

MySQL schema, table, and column names are all case-insensitive, meaning `myLongColumnName` could be written in camelCaps as here, or as `mylongcolumnname`, or `MYLONGCOLUMNNAME` or even `mYlONGcOLUMNnAME`. Because of this, names in MySQL are formatted in snake_case so that they can be read and understood, no matter was case the individual letters are in.

* Tables representing a single entity type (such as users, books, stores, posts, addresses) should be given plural names
* Auto-incrementing primary key columns should be named `id` and should be unsigned integers
* Foreign key columns should be named as `[singlular_entity_name]_id`, for example: `user_id`, `book_id`, `address_id`.

An example database:

~~~sql
CREATE DATABASE sample_db;

CREATE TABLE books (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  author_first_name VARCHAR(127),
  author_last_name VARCHAR(127) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE stores (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  street VARCHAR(127) NOT NULL,
  city VARCHAR(63) NOT NULL,
  state CHAR(2) NOT NULL,
  zip CHAR(5) NOT NULL,
  phone CHAR(10),
  PRIMARY KEY (id),
  UNIQUE KEY store_name_unq (name)
);

CREATE TABLE book_store (
  book_id INT UNSIGNED NOT NULL,
  store_id INT UNSIGNED NOT NULL,
  PRIMARY KEY (book_id, store_id)
);
~~~