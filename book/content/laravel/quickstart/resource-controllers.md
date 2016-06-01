# Resource Controllers

For our blog application we need to be able to create, read, update, and delete posts (CRUD operations). We will eventually have a `posts` table in our database, and we will also have a corresponding model named `Post`. In light of these things, posts would be called a resource for our application.

## REST

REST stands for Representational State Transfer. To efficiently manage posts in the blog application, we can create a RESTful API (Application Programming Interface) that will allow us to perform CRUD operations in a consistent and recognizable manner.

Laravel provides something called resourceful controllers to handle RESTful interfaces for resources. Here is what the methods of a resourceful controller for posts would look like:

Verb | Path | Controller Method/Action | Description
--- | --- | --- | ---
`GET` | `/posts` | `index` | Show a list of all posts
`GET` | `/posts/create` | `create` | Show a form for creating a post
`POST` | `/posts` | `store` | Store the new post
`GET` | `/posts/{post}` | `show` | Show a specific post
`GET` | `/posts/{post}/edit` | `edit` | Show a form for editing a specific post
`PUT` | `/posts/{post}` | `update` | Update a specific post
`DELETE` | `/posts/{post}` | `destroy` | Delete a specific post

See how all the CRUD actions for the posts are mapped to specific controller methods that are set to respond to specific HTTP verbs? Imagine if we had another resource in our app, like users. It would be nice  if the API for manipulating users worked the same way, right? Following the format above will keep our API consistent and easy to use. Other web frameworks, like Ruby on Rails, use the same API structure.

## Generating Controllers with Artisan

So, after seeing all those routes and controller actions one might think this would be very tedious to create, right? Fortunately, Laravel makes it super easy! First, we should make our `PostsController`. We can do that by leveraging the power of the Laravel CLI, artisan. Run the following command in your VM to create a `PostsController`:

~~~
cd /vagrant/sites/blog.dev
php artisan controller:make PostsController
~~~

First, we made sure we were in the root of our Laravel project. Any time you are running artisan commands that is where you should be. Next, we ran a command that will make a controller and we passed it a name of `PostsController`. Go to `app/controllers` and open up the `PostsController.php` file. See how all of the API methods we showed above have been automatically created for you?

## Routing Resource Controllers

The next step is to actually route all of the controller actions, which could also be tedious. That is a total of 7 new routes that need to be properly mapped. Guess what… Laravel provides an easy way for us to map all those routes too. Just add the following code to your `routes.php` file:

~~~php
Route::resource('posts', 'PostsController');
~~~

This one line tells Laravel to map all 7 CRUD routes to the appropriate methods on the 'PostsController' and to make them available via the `/posts` route path. For example, when we access http://blog/posts the `PostsController@index` method will be called.

## Additional Information

For additional information on resource controllers, see the links below:

- https://laravel.com/docs/4.2/controllers
- http://daylerees.com/codebright/controllers

For a great presentation on RESTful API design, go here:

- https://blog.apigee.com/detail/restful_api_design

## Exercises

Please follow the instructions below, and as always commit your work to git and push to GitHub.

1. Create a `PostsController` using artisan if you have not already done so.
1. Route the resources `posts` to the `PostsController` if you have not already done so.
1. Add a return value to each of the methods in the `PostsController` that describes what the method should do based on the table in this lesson.
1. Access the GET routes (using info from the table) and see if you get the appropriate returns.
