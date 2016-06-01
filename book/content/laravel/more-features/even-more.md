# More Features

You have developed a lot of great functionality in your blog so far. It is time to challenge yourself to read the docs and add a few new features to the blog that will make it even better.

## Image Upload

Read the [Laravel docs](http://laravel.com/docs/4.2/requests#files) on file uploads.

Modify your blog to allow for an image to be uploaded for each post. Make it optional. When an image is available, display the image at the top of the post.

## User Roles

All for a user to be either an Admin or a Standard User. You will need to add a new column to the users table called role_id. You may either link the role_id to a roles table or just add constants to the `User` model that represent the possible roles.

Adjust your security settings so that an administrator can create posts and edit anyones posts. A standard user can create posts and edit only their own posts. You will need to create a custom route filter and modify the `beforeFilter` in the `PostsController` to achieve this. [Read more](http://laravel.com/docs/4.2/routing#route-filters) about custom filters.

## User Profile Enhancements

Add a `first_name` and `last_name` to the `users` table. Display the name along with each post. Allow a user to edit their name, email, and password.

## Post Tagging

Create a feature that allows posts to be tagged. Implement a tag view that would allow a user to visit a url like http://blog.dev/tags/code to see all posts tagged with `code`.

Posts and tags should have a many-to-many relationship. You can read more about many-to-many relationships in [Laravel's docs](http://laravel.com/docs/4.2/eloquent#many-to-many)

To allow easy tagging of posts, use the jQuery [Tags Input plugin](http://xoxco.com/projects/code/tagsinput/).

## Markdown Editing and HTML Purifier

Right now, our blog only allows basic text input for posts. It would be much nicer to enable markdown input, convert the markdown to HTML using parsedown, and use HTML Purifier to sanitize the result. Read about markdown, the parsedown converter, and HTML Purifier using the links below:

- http://daringfireball.net/projects/markdown/syntax
- http://parsedown.org/
- http://htmlpurifier.org/

Add the following lines to the `require` section of your `composer.json` file just below `"laravel/framework": "4.2.*",` so the require section looks like this (do not forget the comma after the laravel line):

~~~json
{
    "laravel/framework": "4.2.*",
    "erusev/parsedown": "~1.1",
    "ezyang/htmlpurifier": "4.6.*"
}
~~~

Next, run `composer update` within the root of your Laravel app in the VM to download the new dependencies.

Hint, an easy way to achieve the markdown processing/sanitizing feature would be to add a `renderBody` method within the `Post` model that would do the following:

- Convert he post body from markdown to HTML using parsedown.
- Sanitize the converted HTML with HTML Purifier.
- Return the sanitized result.

Finally, use PageDown to create a nice interface for editing and previewing markdown as a post is being created or updated. Read about PageDown [here](https://code.google.com/p/pagedown/wiki/PageDown)

## All done! You built a sweet blog, way to go!
