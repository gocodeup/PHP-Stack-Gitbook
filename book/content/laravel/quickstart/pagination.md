# Pagination

We learned how to do pagination the hard way. Now you will truly appreciate how simple Laravel makes this mundane and tedious task.

## In your Controller

Right now, your `PostController@index` action probably looks something like this:

~~~php
public function index()
{
    $posts = Post::all();
    return View::make('posts.index')->with(array('posts' => $posts));
}
~~~

We can achieve pagination with one simple change:

~~~php
public function index()
{
    $posts = Post::paginate(4);
    return View::make('posts.index')->with(array('posts' => $posts));
}
~~~

Here, we have replaced the `all` method with the `paginate` method. The `paginate` method takes the number of items per page as an argument, in this case `4`. Laravel will take care of the limit and offset in the query and also the passing of what page you are on.

## In your View

Now that we have a paged result set, the next thing is to add the previous and next buttons to our view. Fortunately, that is also extremely simple:

~~~php
{{ $posts->links() }}
~~~

Yes, that is all there is to it. Just call the `links` method on the paged result set and Laravel will render some nice links for you. If you read the doc link found below you will learn that you can even customize how Laravel displays the paging links.

## Additional Information

For additional information on pagination, see the link below:

- https://laravel.com/docs/4.2/pagination

## Exercises

Please follow the instructions below, and as always commit your work to git and push to GitHub.

1. Update your `PostController@index` action and the post index view so that paging is used. Show four blog articles per page.
