Your exercise will be to integrate AngularJS in a view from your Laravel blog project. You are going to create a "manage posts" page where a user can see a table listing all of the blog posts. They should be able click on a "Delete" button next to each post that will remove it from the table and the database. To accomplish this, you will need:

1. Two new actions in the `PostsController` called `getManage` and `getList`. `getManage` should return a view in the `posts` directory called `manage.blade.php`. `getList` will query for all the posts in the database and return them as a JSON array. You will use [`Response::json()`](http://laravel.com/docs/4.2/responses#special-responses) for this.
1. Two new routes for those actions. They will both be `get` routes. Making a `GET` request for `posts/manage` should call `PostsController@getManage` and `posts/list` should call `PostsController@getList`. Make sure to declare your new routes above the `Route::resource()`.
1. A view called `manage.blade.php`. This view should:
    - Include the AngularJS script and a script containing your Angular module (more on this below).
    - A table with an `ng-repeat` to display all your posts' title, author, date posted, and a button to delete the post. Each title should be a link to that post's show page.
    - Since both Angular and Blade use the {% raw %}`{{ }}`{% endraw %} syntax, we need to escape our curly braces from Blade so they can be processed by Angular. To do this, preface each set of braces with an `@` like the following:
        ```html
        {% raw %}<td>@{{ post.title }}</td>{% endraw %}
        ```
        That line will be skipped by Blade and instead interpreted by Angular.
1. An AngularJS module called `blog`. Your `blog` module should include a `ManagePostsController`. That controller should:
    - Have a `posts` property initialized to an empty array.
    - Use `$http` to get all the posts from the server and assign them to your `posts` property.
    - Include a `deletePost()` function that takes in the array index of post to delete, sends a `DELETE` request to the server for that post's id, and on success remove that element from the `posts` array.

    Make sure to bootstrap your module and attach the controller to an appropriate element in your view.
1. Follow the instructions and examples on [this Gist](https://gist.github.com/bbatsche/93d802cd08f6e2841658) to make sure AngularJS and Laravel can correctly communicate.

### Bonus

Deleting a post is great and all, but know what would be even better? Editing a post. Add a second button to each table row that opens up a modal. That modal should contain a form pre-populated with the information from that post. When the modal form submits, send a `PUT` request to the server to update that post in the database and close the modal. Make sure any changes to the post are reflected in the table as well (i.e. the title).
