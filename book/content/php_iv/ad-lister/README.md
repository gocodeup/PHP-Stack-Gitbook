# Ad Lister Project

The Ad Lister project is a modified craigslist clone that will help test and solidify your understanding of the HTML, CSS, JavaScript, and PHP concepts you have learned so far in this course. You will be working on this project in teams of two to three. Teams of two are preferred unless there are an odd number of students, forcing one team of three.

This project is meant to be a challenge. Working through tough challenges that require lots of coding will help take your skills and confidence to the next level.

Here are the primary goals of the project:

1. Gain experience in building a well-designed in PHP site without the use of a framework.
1. Learn how to use Git in a team environment.
1. Test your resourcefulness in solving problems.

## Project Tasks Outline

1. Build your site layout
1. Generate and render PHP mock data
1. Design your database
1. Implement Models
1. Replace mock data with live data
1. Implement Ad creation w/ image upload
1. Implement User Login
1. Protect your sensitive configuration
1. Allow bulk Ad import via CSV upload
1. Implement a Front Controller

After each step, you will need to provide a demo to an instructor so they can approve the work and review your code.

### Step 1: Build your site layout

We need to set up a site structure that will be organized and intuitive. Here is the recommended layout:

    database/
        migration.php
        seeder.php

    models/
        Ad.php
        BaseModel.php
        User.php

    public/
        css/
            main.css       // site styles
        img/
            logo.png
        js/
            main.js        // site javascript

        ads.create.php     // ad creation form
        ads.edit.php       // ad editing form
        ads.index.php      // listing of all ads
        ads.show.php       // view of individual ad

        auth.login.php     // login form
        auth.logout.php    // logout action

        index.php          // marketing homepage

        users.create.php   // user signup
        users.edit.php     // user editing form
        users.show.php     // user profile

    utils/
        Auth.php
        Input.php
        Logger.php

    views/
        partials/
            header.php
            footer.php
            navbar.php

    bootstrap.php          // site initialization

1. Start by creating a new site, `adlister.dev`, and then create the above file and folder structure.
1. Next, build an HTML template for your site. Once complete, break down the template into a header, footer, navbar, etc and populate the PHP files in the `views/partials` directory accordingly.
1. Then, begin adding content to the `public/index.php` file and include your partial views to make your PHP site look like your HTML mockup. Make sure to put any site resources (JS, images, and CSS) in the appropriate locations.
1. Continue building out your site with HTML so that all of the PHP files in the public directory have content.
1. Add links between the pages so that you can browse the site and it feels like it is complete. All the data for each page should just be hard-coded HTML. For example, in the `ads.index.php` file, you should have a listing of 3-5 hard-coded sample ads. The `ads.show.php` page will have hard-coded data showing one single ad, etc.

When you think you have completed all the above tasks, please call over an instructor and give them a demonstration before continuing.

### Step 2: Generate and render PHP mock data

The goal of this step is to take your hard-coded HTML mockup data and replace it with hard-coded PHP associative arrays. You will need to consider what your database tables and fields will look like to accomplish this step.

Use the page controller template from previous lessons to add PHP sample data to the pages where appropriate (`ads.index.php`, `ads.show.php`, `users.show.php`). For example, the data for the `ads.index.php` page may look like this:

```php
$ads = [
    [
        'id'          => 100,
        'user_id'     => 100,
        'name'        => 'SNES',
        'description' => 'Plays like new! Includes mario kart.',
        'price'       => 150.00,
        'image_url'   => '/img/uploads/100.png'
    ],
    // ...
];
```

### Step 3: Design your database

Now that you have generated some mock data in PHP, it should be clear how to convert that to a database schema. Create the database tables and also enter some sample data into the database. Fill in your `database/seeder.php`; using SQL statements and `PDO::exec()` it should first drop all your database's tables if they exist, and then recreate them. Your `database/seeder.php` file should truncate the same tables and then use prepared statements to insert test data for your application. Be sure to create enough data to effectively test all the relations and models in your application.

### Step 4: Implement your models

Now that we have some data in the database, it is time to make that accessible via PHP. To do so, we will use the Model class you created in an earlier exercise. At a minimum, you will need models for `Ad` and `User`. If you have other tables, you may need models for those as well. Each model will be a class that inherits from the `BaseModel` that provides much of the reusable functionality.

Knowing that, go implement the necessary models. When complete, test the models by using the PHP interactive shell or by writing a small test PHP file.

### Step 5: Replace mock data with live data

We are now ready to replace our mock PHP data in the views with live data from the database. Since we already have the mock data, it should be pretty easy to replace the mock data with a call to the appropriate model to retrieve the live data.

When viewing individual ads or user profiles, it will be important to pass data via the URL about what ad or user is being viewed. You should use your `Input` helper class build in previous exercises to help with this task.

### Step 6: Implement Ad creation w/ image upload

So far, we have a site that appears to work. We can browse ads and look at individual ads and users. Now, it is time to allow users to create ads so we will have more than just our seeded data.

For this step, implement the `ad.create.php` view and include the ability to upload an image with the ad. When complete, you can then implement the `ad.edit.php` view.

### Step 7: Implement User Login

Now that we have introduced editing features, we really need to have a login system to make sure that users only have access to what they should. Here is what we need:

1. Only authenticated users can create ads.
1. Ads can only be edited by the user that created them.

You should be able to use your `Auth` helper class you created in previous lessons to help with these tasks.

### Step 8: Protect your sensitive configuration

Now that we have incorporated database access and user login, you may have noticed that we have some important things like usernames and passwords stored in our code. If we check these things into a public repository on GitHub then they are there for all the world to see, which certainly is not ideal.

In order to combat this, we will need to do a couple things. First, we need to create a `.gitignore` file in the root directory of our site. This file will contain a list of filenames that git should ignore when looking at what has changed within our project.

Create a `.gitignore` file that has the contents below:

```
.env.php
```

Next, create a file called `.env.php`, also in the site root, that contains the following contents (replace placeholders with actual values):

```php
<?php

return array(

    'DB_HOST' => '127.0.0.1',
    'DB_NAME' => 'your-db-name',
    'DB_USER' => 'your-db-user',
    'DB_PASS' => 'your-db-password',

);
```

Notice that this PHP file is essentially just an array that gets returned. There is a neat trick that will allow you to use the contents of this file to initialize a variable. It goes like this:

```php
// Load the environment variables.
$_ENV = include './.env.php';
```

So, we can use a PHP `include` statement to read our `.env.php` file and store the contents in a variable of our choosing.

We should put this code in a place where it will always be accessible. A great place to do this would be the `bootstrap.php` file in the sites root folder. Then, the `bootstrap.php` file should get required in all other PHP files. You can also put other important initialization code there and you will always know that it got done. For example, if you wanted to make logging available across your application, you may initialize your site logger there.

Now, you will have access to variables such as your database name by doing the following:

```php
echo $_ENV['DB_NAME'];
```

Try replacing all your sensitive configuration currently in your code with references to the entries in your `$_ENV` array. Since we ignored the `.env.php` file using `.gitignore`, we don't have to worry about those appearing in our repository and now we are much better off.

### Step 9: Allow bulk Ad import via CSV upload

Once nice feature for a user of the Ad Lister app would be to create some ads in a CSV and then do a bulk upload. Implement this feature, but don't worry about the image upload.

### Step 10: Implement a Front Controller

On the web, you will rarely see URLs like `http://adlister.dev/ads.index.php`. Instead, you are more likely to see URLs like `http://adlister.dev/ads`. These pretty-URLs look much nicer. We can implement these in our project using a Front Controller.

The Front Controller will be our `index.php` file. It will look at each request that comes in, and based on the path, it will require or include other PHP files. Here is an example:

```php
<?php

switch ($_SERVER['REQUEST_URI']) {
    case '/ads':
        include 'ads/index.php';
        break;
    case '/ads/show':
        include 'ads/show.php';
        break;
    default:
        include 'home.php';
        break;
}
```

In the simple example above, you can get the basic idea of what is going on. We use the superglobal `$_SERVER` array to determine what the request path is. We then conditionally load one of our other PHP files based on that value.

At this point, it would be a good thing to refactor your file structure so that `ads.index.php` in the public directory becomes `ads/index.php` within the views directory. Follow this same pattern for all the other files as well.

### Where to go from here

There are so many places to go. If you have time, try some of these but feel free to come up with your own ideas too!

1. Allow a user to edit their profile, update their password, etc.
1. Allow users to delete ads that they have created.
1. Implement a user dashboard view where they will have quick access to all their ads.
1. Use composer to pull in a third party libraries for things like email (SwiftMailer), generating fake data (Faker), or any other feature you may want.
1. Send emails on important events like user signup.
1. Allow user's to mark their "favorite" ads and make these show up on the dashboard.
1. Implement a "flagging" feature where users can mark ads as inappropriate.
1. Implement an admin user that can moderate ads and remove them.
1. Implement a user feedback system.
1. Implement a forgot-password feature.

Be creative, and most of all have fun!
