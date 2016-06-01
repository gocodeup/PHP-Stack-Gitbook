# Control Structures

- There should be one space between the control structure name and the opening parenthesis
- The opening curly brace for the structure body should go on the same line as the structure heading
- There should be one space between the closing parenthesis of the control structure heading and the opening curly brace of the body
- The control structure body should be indented four spaces
- The closing curly brace(s) should be unindented from the body and lined up with the structure name
- `else`, `elseif`, and `catch` should all be inline with the closing curly brace of the previous body

## if

~~~php
if (condition) {
    // if body
}
~~~

~~~php
if (condition) {
    // if body
} else {
    // else body
}
~~~

~~~php
if (condition a) {
    // if body a
} elseif (condition b) {
    // else if body b
} elseif (condition c) {
    // else if body c
} else {
    // else body
}
~~~

## switch

~~~php
switch(condition) {
    case a:
        // case a body
        break;
    case b:
        // case b body
        break;
    default:
        //default body
        break;
}
~~~

## try/catch

~~~php
try {
    // try body
} catch (Exception $e) {
    // catch body
}
~~~

~~~php
try {
    // try body
} catch (CustomException $e) {
    // CustomException catch body
} catch (Exception $e) {
    // generic exception catch body
}
~~~

## for

~~~php
for ($i=0; $i<limit; $i++) {
    // for loop body
}
~~~

## foreach

~~~php
foreach ($array as $value) {
    // foreach loop body
}
~~~

~~~php
foreach ($array as $key => $value) {
    // foreach loop body
}
~~~

## while

~~~php
while (condition) {
    // while loop body
}
~~~

## do-while

~~~php
do {
    // do-while loop body
} while (condition);
~~~
