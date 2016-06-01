# Expressions and Directives

Expressions allow us to display data. In essence they are a way to very quickly inject JavaScript in our HTML, and have the results displayed to the browser. This is the essence of what is called a *templating* language.

## Displaying Data

Angular expressions are defined using two sets of curly braces in a row: `{{ }}`. For example, if we wanted to display the string "Hello, Codeup!" on a page, the syntax would be:

```html
<body>{{ "Hello, Codeup!" }}</body>
```

Expressions can also evaluate JavaScript code, for example to perform math:

```html
<body>{{ (5 * 3 + 7) / 11 }}</body>
```

In this case, we should expect to see `2` displayed on the page.

For now our expressions are going to be limited to literal values, meaning we cannot use variables or functions. We will discuss how to use expressions with dynamic data in the next section.

### Filters

Angular includes some convenient features for formatting data in an expression, called *filters*. We pass data in an expression through a filter with the pipe character (`|`). For example, if we were incredibly excited about saying hello, we could pass our previous example through the [`uppercase` filter](https://docs.angularjs.org/api/ng/filter/uppercase):

```html
<body>{{ "Hello, Codeup!" | uppercase }}</body>
```

In our page, we would see:

    HELLO, CODEUP!

There is also a [`lowercase` filter](https://docs.angularjs.org/api/ng/filter/lowercase).

Angular includes a [`number` filter](https://docs.angularjs.org/api/ng/filter/number) that adds commas to a numeric value so that they are easier to read. The `number` filter can also specify a number of decimal points as an argument using a `:`. For example,

```html
<body>{{ 123456789.123456|number:3 }}</body>
```

would display:

    123,456,789.123

## Page Structure

Expressions are useful for simply outputting data. If we want to alter the structure of our HTML itself, we need to use *directives*. We used a directive earlier when we bootstrapped our module: `ng-app`.

### Removing Elements

If there is a block of HTML we only want included conditionally in the DOM, we can use the directive [`ng-if`](https://docs.angularjs.org/api/ng/directive/ngIf). If the value of `ng-if` is `false`, then Angular removes the element entirely from the page. For example,

```html
<ul>
    <li ng-if="1 < 2">One is Less Than Two</li>
    <li ng-if="1 <= 2">One is Less Than or Equal to Two</li>
    <li ng-if="1 == 2">One is Equal to Two</li>
    <li ng-if="1 >= 2">One is Greater Than or Equal to Two</li>
    <li ng-if="1 > 2">One is Greater Than Two</li>
</ul>
```

Only the first two bullet points should still exist in the DOM.

### Showing & Hiding Elements

Instead of removing an element from the page structure entirely, Angular can use CSS to hide or show a given block. The directive [`ng-hide`](https://docs.angularjs.org/api/ng/directive/ngHide) will add `display: none` to an element if its value is true. The [`ng-show` directive](https://docs.angularjs.org/api/ng/directive/ngShow) does the inverse. The key difference between `ng-show`/`ng-hide` and `ng-if` is that show and hide do not remove the element entirely from the DOM, they just prevent the user from seeing them. This can have some subtle differences, especially when working with CSS.

### Repeating Elements

For values in arrays (and objects!) Angular provides us with an [`ng-repeat` directive](https://docs.angularjs.org/api/ng/directive/ngRepeat). The basic syntax for `ng-repeat` is:

```html
<element ng-repeat="variableName in someArray">
    <!-- ... -->
</element>
```

For example, to create an ordered list with the letters A through F, we could do the following:

```html
<ol>
    <li ng-repeat="letter in ['A', 'B', 'C', 'D', 'E', 'F']">{{ letter }}</li>
</ol>
```

Notice in our `<li>` tag, we were able to use the variable `letter`. In an `ng-repeat`'d element, Angular will create and assign a variable to each element in our array in turn. We can then use that variable in our expressions, or even other directives:

```html
<ul>
    <li ng-repeat="num in [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]" ng-if="num % 2 == 0">
        {{ num }} is even!
    </li>
</ul>
```

### Images

Angular's expressions and directives are evaluated after the browser finishes loading the page. Because of this, if we wanted to set the `src` attribute for an `<img>` using Angular, the browser would treat the expression as a literal file name, and almost certainly come up with a 404! To avoid this, Angular provides an [`ng-src` directive](https://docs.angularjs.org/api/ng/directive/ngSrc) that will allow us to set the source of an image after the page has completed loading.

For example, if we had an image called `caturday.gif` inside of the `img` directory of our server, we could use Angular to display it in several different ways:

```html
<img ng-src="{{ '/img/caturday.gif' }}" alt="Cat gifs are always funny">
<img ng-src="/img/{{ 'caturday.gif' }}" alt="Cat gifs are always funny">
<img ng-src="/img/{{ 'caturday' }}.gif" alt="Cat gifs are always funny">
```

## Exercises

To experiment and learn about Angular, we are going to make a new domain name and git repository so our work can stay organized. Before you get started with the exercise, do the following steps:

1. Create a new static site called `angular-test.dev` using the `ansible-playbook` command.
1. Create a new git repository in `~/vagrant-lamp/sites/angular-test.dev`.
1. Create a new repository on GitHub called `Angular-Test`.
1. Use `git remote` to connect your local repository to GitHub.

You are going to make a simple page demonstrating many of these different techniques. After each step, commit your changes. When you are finished with the exercise, push all your work to GitHub.

1. Create a file in your `public` directory called `template-test.html`.
1. Create a file in your `public/js` directory called `templateTest.js`.
1. In `templateTest.js` create an Angular module called `templateTest`.
1. Make sure to bootstrap `templateTest` in your `template-test.html`.
1. Use `ng-repeat` to output the numbers 0 through 9 in an unordered list.
1. Hide or remove the numbers that **are** divisible by three. You should only have 6 numbers in your list.
1. Add the following CSS to your page:
    ```css
    li:first-child {
        font-style: italic;
    }
    li:last-child {
        font-weight: bold;
    }
    ```
    Now experiment with `ng-hide`, `ng-show`, and `ng-if` and notice how they respond to CSS differently.
1. Make a new unordered list that goes through the letters A through F, use filters to display the letters in both upper and lower case.
1. Include three pictures, use `ng-repeat` and `ng-src` to display those three images on your page.
