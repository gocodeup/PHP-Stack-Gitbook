# Table Relationships with Eloquent

Laravel provides some neat ways to define and access table relationships through the Eloquent ORM. The Laravel documentation is very detailed in this area so it will be referenced often. Relationships can be one-to-one, one-to-many, or many-to-many.

Our goal in this lesson will be to link a post to a particular user.

## Defining Relationships

Table relationships can be defined through migrations. In order to link a post to a particular user, we would need a new column, `user_id` in the `posts` table. That can be achieved as follows:

~~~php
Schema::table('posts', function($table)
{
    $table->integer('user_id')->unsigned();
    $table->foreign('user_id')->references('id')->on('users');
});
~~~

The above code would be placed in the `up` method of a new migration. Notice that we create a new column named `user_id` and then we define the foreign key relationship back to the `users` table. The `down` method of the migration would look something like this:

~~~php
Schema::table('posts', function($table)
{
    $table->dropForeign('posts_user_id_foreign');
    $table->dropColumn('user_id');
});
~~~

Notice that we are dropping the foreign key followed by the `user_id` column. The foreign key naming convention is `table_name` underscore `column_name` underscore `foreign`.

Note: Naming of the columns is important. When you are creating a foreign key, make sure it is named based on the singular version of table it is linking to followed by `_id`. In this case we were linking to the `users` table so we named the column `user_id`.

## Updating Models to Add Relationships

Once you have updated your database to reflect the desired relationships, you need to add some code to your models to make them aware of the relationships. Right now, we are trying to create a one-to-many relationship between our `User` and `Post` models.

As you can imagine, we need a way to access posts from the user model and a user from the post model. Let us start with the `User` model. In order access the posts for a user, we need to add a `posts()` method as follows:

~~~php
public function posts()
{
    return $this->hasMany('Post');
}
~~~

Notice that since a user has many posts, we link to the `Post` model via the `hasMany` method. Also note that we are not linking to the table `posts`, but instead to the actual model named `Post`.

We now have to define the inverse side of the relationship by modifying the `Post` model as follows:

~~~php
public function user()
{
    return $this->belongsTo('User');
}
~~~

Here, since a post belongs to a single user, we use the `belongsTo` method and we provide the `User` model for linking.

## Accessing Relationships

Once you have the relationships defined on the models, accessing them is super easy. Here is an example of accessing all the posts for a particular user:

~~~php
// get the user with an id of 1
$user = User::find(1);

// get the user's posts
$posts = $user->posts;
~~~

Instead, if we had a post and we wanted to get the user we could do this:

~~~php
// get the post with an id of 1
$post = Post::find(1);

// get the user's posts
$user = $post->user;
~~~

## Eager Loading

The concept of eager loading is an important one. The Laravel docs provides an [excellent example](http://laravel.com/docs/4.2/eloquent#eager-loading).

The basic concept behind eager loading is that you can retrieve a models relationships along the query that provides a list of said models. When you intend to loop through a list of models you retrieve and then get data through a relationship, eager loading can save you lots of unnecessary queries.

An applicable scenario in our blog application occurs on the page that lists all the recent blog posts. If we wanted to display the user that wrote the blog post along with the post, we would have to query for it as we went through the list of posts. Instead, the user should be eager loaded.

## Additional Information

Read more about relationships here in [Laravel's docs](http://laravel.com/docs/4.2/eloquent#relationships)

## Exercise

Please follow the instructions below, and as always commit your work to git and push to GitHub.

1. Create a one-to-many relationship between a user and his/her posts based on the information provided in this lesson.
1. Use eager loading to obtain the user with the posts in the `PostsController@index` method.
