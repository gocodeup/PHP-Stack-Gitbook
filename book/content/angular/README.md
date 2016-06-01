# Intro to Angular

Angular is a third party JavaScript library, just like jQuery. While jQuery's focus is on traversing and altering DOM elements, Angular's strength lies in presenting data to the user and defining how they can manipulate it. Generally, both libraries play well with one another and provide a certain amount of overlap (for example, events and AJAX requests).

## Getting the Angular Script

Much like jQuery, we can either download Angular locally to our server, or access it from a CDN. Either solution can be found by clicking the nice, blue "Download" button on the [Angular homepage](https://angularjs.org/).

## Modules

All of our Angular code will be organized into *modules*. Modules are simply a way to encapsulate our features and functionality into a single object. We can define a new module in the following manner:

```js
var app = angular.module("moduleName", []);
```

The [`angular.module()` function](https://docs.angularjs.org/api/ng/function/angular.module) takes in two parameters. The first is the name for your module. This name can be anything you want, but convention is to stick with camelCase names. The second argument is an array of *dependencies*. We will cover more of what dependencies are and how to use them in a later section. For now, just pass an empty array.

### Self-Invoking Functions

One of the key objectives for Angular modules is to allow them to interoperate with other modules. Because of this we want to prevent them from accidentally interfering with other Angular modules (even if we have not yet made more than one). We already know the best way to do this. The way we keep our modules isolated is to encapsulate them in an [immediately invoked function expression](../javascript/functions/scope.html#immediately-invoked-function-expression-iife). A more complete example of our previous module declaration would be the following:

```js
"use strict";

(function() {
    var app = angular.module("moduleName", []);
})();
```

### Bootstrapping a Module

Once a module has been created we need a way to initiate it when our page loads. This process of initializing some modular code when the user navigates to a page is called *bootstrapping*. We instruct Angular which module we want to bootstrap with a *directive*. Directives look and act almost identically to HTML attributes, but they are generally ignored by the browser and instead are interpreted by Angular. The directive we use to bootstrap a particular module is [`ng-app`](https://docs.angularjs.org/api/ng/directive/ngApp). This directive **must** be placed on the `<html>` element of our page. A page that bootstraps our `moduleName` module would look like the following:

```html
<!DOCTYPE html>
<html ng-app="moduleName">
<head>
    <meta charset="utf-8">
    <title>Bootstrap an Angular Module</title>
</head>
<body>
    <script type="text/javascript" src="/js/angular.min.js"></script>
    <script type="text/javascript" src="/js/moduleName.js"></script>
</body>
</html>
```

## Exercises

We have only just begun to scratch the surface with Angular, and until the next section we do not have much to experiment with...yet. Your exercise is to remember what we have covered on this page, and to refer back to it as we go through the later lessons. The key steps to remember are:

1. Declare your module in an IIFE.
1. Keep each module in its own file, ideally named the same as the module itself.
1. Module declaration requires a camelCaps module name and an empty array.
1. Include both the `angular.min.js` file and the file for your module in your HTML, in that order.
1. Bootstrap your module by using `ng-app="..."` in the `<html>` tag.
