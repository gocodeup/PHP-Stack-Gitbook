We are going to use Angular to recreate our previous [Ajax Blog](../jquery/ajax/ajax-intro.html#ajax-blog) and add some additional interactivity.

1. You will create a page called `angular-blog.html`.
1. Create `angularBlog` and `blogComment` modules; put them in their own files and include them in `angular-blog.html` using `<script>` tags.
1. The `blogComment` module should be a dependency for `angularBlog`; `angularBlog` should be bootstrapped in `angular-blog.html`.
1. You will need a controller in `angularBlog` that will:
    - Automatically load the blog posts from [`blog.json`](../examples/javascript/blog.json).
    - Have a method to add a new blog post.
1. The `blogComment` module should have a controller for adding a comment to an existing post (_**Hint:** Each `post` object will need an initial empty array of comments, and you will need to pass a `post` object to the function for adding a comment._)
