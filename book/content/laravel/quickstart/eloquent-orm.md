# Eloquent ORM

Now that you have created your posts table via a database migration it is time to learn how to start creating and querying the database through the provided ORM, Eloquent. ORM stands for **O**bject **R**elational **M**apper. In this lesson, we will see how the Eloquent ORM makes it easy to manage our posts.

## Creating a Model (Post)

For the ORM to work properly, we need a database table and a corresponding class. The class we are about to create is known as a model, the last piece of MVC that we have not yet discussed. The Laravel framework will do all the work of connecting our model to the database table it corresponds to. To create a model that represents our posts table, create a file named `Post.php` in the `app/models` directory with the following contents:

~~~php
<?php

class Post extends Eloquent
{
    protected $table = 'posts';
}
~~~

Notice that the class name is `Post` singular. Also notice that the class extends `Eloquent`. All of your model classes will need to extend `Eloquent` (or perhaps another class that extends `Eloquent`). Next, notice that there is a `protected` class attribute named `$table` with a value of `'posts'`. This attribute tells Laravel how to match this model class to the appropriate database table. It is not required when the standard naming conventions are followed (plural db table, singular model class), but it adds clarity and is recommended.

Although this model is very simple, it is all that we need to start experiencing the great power of the Laravel Eloquent ORM.

## Managing Posts through our Model

We will be discussing how to add, find, update, and delete posts from the database through our Post model. However, there are tons of features in the Eloquent ORM and we will not be able to discuss them all. Please look over the excellent docs for more details.

https://laravel.com/docs/4.2/eloquent

For the activities below, we will be using a test route. Place the following in your `routes.php` file:

~~~php
Route::get('orm-test', function ()
{
    // test code here
});
~~~

### Adding a new post

To create a new post in the posts table, add the following code to the test route we created above:

~~~php
$post1 = new Post();
$post1->title = 'Eloquent is awesome!';
$post1->body  = 'It is super easy to create a new post.';
$post1->save();

$post2 = new Post();
$post2->title = 'Post number two';
$post2->body  = 'The body for post number two.';
$post2->save();
~~~

First, we create a new instance of the model class. Next, we set the title and body as if they were attributes on the class. Even though we did not add any attributes, all of the database columns for our posts table are available through the magic of Eloquent. After we update the desired attributes, we call the `save()` method on the model instance.

Go to http://blog.dev/orm-test to run the code and create two new posts. Then, go to your database and see that they actually got created. Awesome, right?

Notice that there are `created_at` and `updated_at` columns in the `posts` table? Eloquent automatically manages those fields so you do not have to. Upon creation they both get the same value. If a row is updated at a later point, then the `updated_at` will get a new value based on the current time.

### Finding all posts

On the main page of our blog, we are going to want to see a list of recent posts. For now, we will start out by showing all the available posts.

~~~php
$posts = Post::all();
return $posts;
~~~

No, this is not a joke. That is seriously all you need to do to get back all the posts from the posts table. Now you can just send the `$posts` variable along to your view and display the posts in a `foreach` loop.

Replace the code in the orm test route with the code above and then go to http://blog.dev/orm-test to view the result.

### Finding a specific post

When we click on a blog entry from the main page, we want to be able to view the specific post we clicked on. The easiest way to find a row in the post is by using the primary key for the table, in this case, the post `id`. Laravel provides the `find()` method to allow us to look up a row based on the primary key as follows:

~~~php
$post = Post::find(1);
return $post;
~~~

Here we are searching for a post with an `id` of `1`. Next, we return the `$post` so we can view the contents.

Replace the code in the orm test route with the code above and then go to http://blog.dev/orm-test to view the result.

Based on the result, we can see that we would be able to access attributes of a post in the same way we set them. For example, if we wanted to get the title of the post we could just access `$post->title`.

### Updating a post

If we want to make changes to a post, we will need to find and then update it. We can combine what we learned about finding a specific post and creating a new post to look something like this:

~~~php
$post = Post::find(1);
$post->title = "New Title Goes Here.";
$post->save();
return $post;
~~~

Here, we simply find the post with an `id` of `1`. Next we update the `title` attribute. Then we call the `save()` method.

Replace the code in the orm test route with the code above and then go to http://blog.dev/orm-test to view the result.

### Deleting a post

We may also want to allow the user to delete a post. First, we need to locate the specific post we want to delete using the `find()` method. Next, we can call the `delete()` method as follows:

~~~php
$post = Post::find(1);
$post->delete();
~~~

Replace the code in the orm test route with the code above and then go to http://blog.dev/orm-test to delete the post with an `id` of `1`. Next, go into SequelPro to make sure the post was deleted.

## Additional Information

For additional information on models, see the links below:

- https://laravel.com/docs/4.2/eloquent
- http://daylerees.com/codebright/eloquent

## Exercises

Please follow the instructions below, and as always commit your work to git and push to GitHub.

1. Create the `Post` model based on this lesson.
1. Create views for showing all posts (`posts/index.blade.php`) and a single post (`posts/show.blade.php`).
1. Update the `index` and `show` actions in `PostsController` so that you can view all posts and also view an individual post using the views you just created.
1. Update the `store` action in `PostsController` so that a post can be stored. Once stored, redirect to the `index` action of the `PostsController`.
