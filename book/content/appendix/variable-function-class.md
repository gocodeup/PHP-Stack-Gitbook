# Variables, Functions, & Classes

- Variable and function names should be formatted in camelCase
- Class names should be formatted in StudlyCaps
- Classes should exist in their own file and only one class should be defined per file
- Class filenames should be formatted in snake_case
- There should be no space between the function name and the opening parenthesis
- The opening curly braces for function and class bodies should be on the next line after their heading
- Function and class bodies should be indented four spaces
- The closing curly brace for each function and class should be on its own line and line up with the function or class keyword
- Class properties and methods should have their visibility explicitly specified

## Sample Function

~~~php
/**
 * functionName is a sample function needing one parameter passed with an optional second
 *
 * @param bool    $firstParam  a boolean parameter
 * @param string  $secondParam a second, optional, parameter, with a default value
 */
function functionName($firstParam, $secondParam = 'some value')
{
    // function body
}
~~~

## Sample Class

~~~php
/**
 * This is the file for the sample class
 *
 * @package GithubUsername\ProjectName
 */

/**
 * Class ClassName is a sample class
 *
 * This is a sample class with two properties and two methods
 */
class ClassName
{
    /** @var float $firstProperty a class property that should store floating point numbers */
    public $firstProperty;

    /** @var string[] $secondProperty a second property that should store an array of strings */
    protected $secondProperty;

    /**
     * This is the first method
     *
     * This function takes in no parameters so they are not defined.
     *
     * @throws ExceptionClassName It may throw this type of exception for some reason
     *
     * @return array|bool This function will return either an array or boolean
     */
    public function firstMethod()
    {
        // function body
    }

    /**
     * This is the second method
     *
     * @param AnotherClassName $firstParam First parameter will be an instance of a particular class
     * @param string $secondParam Second, optional, parameter set with a default value
     *
     * @return void This function doesn't return anything but it's still good practice to document it
     */
    protected function secondMethod($firstParam, $secondParam = 'some value')
    {
        // function body
    }
}
~~~
