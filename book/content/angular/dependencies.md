# Building More Complex Applications

Our previous few apps have only used a single module, but Angular modules are designed to be&hellip;*modular!* Most apps will have a single main module, plus multiple submodules responsible for smaller portions of the application. It simply a matter of tying all your required modules together.

## Module Dependencies

In the previous exercise you created a module for dealing with a shopping cart. Most online stores have more than just a shopping cart however. In reality, you would probably have a main store module, it in turn could depend on a module for displaying products. The products module could include a module for handling reviews. The main store module could also use our shopping cart module and possibly even a module for handling payments. Let's see how we might define these dependencies:

```js
"use strict";

(function() {
    var app = angular.module("store", ["products", "cart", "payment"]);
})();

(function() {
    var app = angular.module("products", ["productReviews"]);
})();

(function() {
    var app = angular.module("productReviews", []);
})();

(function() {
    var app = angular.module("cart", []);
})();

(function() {
    var app = angular.module("payment", []);
})();
```

The array at the end of our `module()` method allows us to define our module's dependencies. Our `store` module depends on the modules `products` and `cart`. Those modules in turn define their own dependencies. Notice we also take advantage of our immediately invoked function expressions to keep our modules isolated and encapsulated. In practice, we would split these out into their own files but keep the IIFEs; they are listed together here to make it easier to see them all at once.

Despite having five different modules at play here here, nothing changes in our main application. We still just need to bootstrap the main module:

```html
<!DOCTYPE html>
<html ng-app="store">
<!-- ... -->
</html>
```

## Services

Many Angular features are wrapped up in their own *service* objects. Many of these services are wrappers for existing JavaScript objects, such as `$document` or `$window`. Using the Angular versions of these objects is best practice as it can help with testing and security. These objects are not automatically available to us in our controllers however; we must use what is called *dependency injection* to bring them into our controller's scope. To do this, we change how we define our controller:

```js
"use strict";

(function() {
    var app = angular.module("moduleName", []);

    app.controller("ExampleController", ["$serviceName", function($serviceName) {
        // ...
    }]);
})();
```

Notice we have wrapped our controller function in an array. We list the names of the services our controller needs first, and then the controller's function at the end of the array. In the function itself we define the services as parameters to be passed in.

### `$log`

Angular's [`$log` service](https://docs.angularjs.org/api/ng/service/$log) provides a powerful wrapper for the `console.log()` function, but with more features. In our example controller, we can inject and use the `$log` object like so:

```js
"use strict";

(function() {
    var app = angular.module("moduleName", []);

    app.controller("ExampleController", ["$log", function($log) {
        $log.log("Standard log message");

        $log.info("An informative message");

        $log.warn("A warning message");

        $log.error("An error occurred!");

        $log.debug("Debugging my code");
    }]);
})();
```

If you test out that controller in Chrome, you will discover that the console uses different colors and icons for each of the different log methods. This can help in navigating your code, and identifying whether something is merely an informational message, versus an error that needs correcting.

### `$http`

The [`$http` service](https://docs.angularjs.org/api/ng/service/$http) is Angular's way of sending Ajax requests. Let's include it along side our `$log` service:

```js
"use strict";

(function() {
    var app = angular.module("moduleName", []);

    app.controller("ExampleController", ["$log", "$http", function($log, $http) {
        // ...
    }]);
})();
```

Notice all we needed to do was add the string `$http` to the controller array, and a corresponding parameter to our anonymous function. Using the `$http` service is very similar to the jQuery version:

```js
"use strict";

(function() {
    var app = angular.module("moduleName", []);

    app.controller("ExampleController", ["$log", "$http", function($log, $http) {
        // An Ajax get request to load some data from the server
        $http.get("/some/url.json").then(function(data) {
            $log.info("Ajax request completed successfully!");

            $log.debug(data);
        }, function(response) {
            $log.error("Ajax request failed for some reason!");

            $log.debug(response);
        });

        // Post some data to the server
        $http.post("/different/url.php", {
            key1: "value a",
            key2: "value b"
        }).then(function() {
            $log.info("Info was sent to the server successfully!")
        }, function(response) {
            $log.error("Ajax request failed for some reason!");

            $log.debug(response);
        });
    }]);
})();
```

The above example fires two separate Ajax requests. The first does a `GET` call for `/some/url.json`, the second a `POST` to `/different/url.php` with some additional data (as a JSON object). After each Ajax method we call `.then()` in order to define functions (or "handlers") to be called when the request completes. The first argument to `.then()` is the handler called if the request was successful. If any data was returned from the server, it will be passed as the first argument to the handler. The second argument to `.then()` is the handler for any errors that occur. Again, if the server gives any additional information about the error, it will be passed as an argument.

### `$scope`

The `$scope` dependency is somewhat of a special case. Strictly speaking, it is not a service provider like `$log` or `$http`. Rather, `$scope` is a way to refer to area of the page that a controller is attached to. Think of it like the variable `this`, but one that stays constant regardless of whether your code is in a function or a callback. If we took a previous example:

```html
<div ng-controller="ExampleController as ex">
    <div ng-show="ex.showElement">
        I may or may not be visible
    </div>

    <button ng-click="ex.toggleElement()">Toggle Element</button>
</div>
<script>
"use strict";

(function() {
    var app = angular.module("moduleName", []);

    app.controller("ExampleController", function() {
        this.showElement = true;

        this.toggleElement = function() {
            this.showElement = !this.showElement;
        };
    });
})();
</script>
```

We can update the template and controller to use the `$scope` dependency like so:

```html
<div ng-controller="ExampleController">
    <div ng-show="showElement">
        I may or may not be visible
    </div>

    <button ng-click="toggleElement()">Toggle Element</button>
</div>
<script>
"use strict";

(function() {
    var app = angular.module("moduleName", []);

    app.controller("ExampleController", ['$scope', function($scope) {
        $scope.showElement = true;

        $scope.toggleElement = function() {
            $scope.showElement = !$scope.showElement;
        };
    }]);
})();
</script>
```

Notice, we got rid of the alias in the `ng-controller` directive. When you are using `$scope`, you should not use a controller alias. We also replaced `this` in our controller with `$scope`. Anything we want exposed in our page should now be attached to that variable instead.

## Exercises

{% include "exercises/" + book.curriculumName +".md" %}
