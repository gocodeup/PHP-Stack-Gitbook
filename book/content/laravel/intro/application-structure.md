# Application Structure

Now that we have our Laravel application set up, we should talk about the directory structure. Everything is organized in a way that makes it easy to find things when you know where to look.

Open the `~/vagrant-lamp/sites/blog.dev` directory in finder so we can take a look. Here is what you should see:

- app
- bootstrap
- public
- vendor
- various files

## App Directory

This is a very important directory. This is the place where all of the custom code for your Laravel project will be. Let us take a look inside the app directory to see what we find.

- commands
- config
- controllers
- database
- lang
- models
- start
- storage
- tests
- views
- filters.php
- routes.php

### App/commands

Laravel allows you to write custom commands. Any custom commands that you write should be saved in this directory.

### App/config

Laravel configuration files go here. Things like your database connection info and any other configuration items will go in here. We will talk more about the specifics when we configure our blog application.

### App/controllers

Remember the 'C' in MVC? The controllers for your application go in this directory.

### App/database

Database migrations and seed files go in this directory. We will discuss these more later, but migrations and seeds allow you to create database tables and insert records into the tables.

### App/lang

Laravel supports localization. Language files can be placed in this directory. We will not be using this feature in our blog application.

### App/models

Remember the 'M' in MVC? The models for your application go in this directory.

### App/start

Files that get loaded and process on startup are found in this directory. The primary reasons to make changes in this directory are to add additional directories to the autoloader path or to customize how errors are handled by your application.

### App/storage

This is the directory where Laravel stores log files, temp files, sessions, etc. You will primarily access this directory to view the Laravel log file.

### App/tests

Your application tests go in this directory. Laravel provides some example test cases for you.

### App/views

Remember the 'V' in MVC? The views for your application go in this directory.

### App/filters.php

Laravel provides something called filters that can be applied to a route to change the way it behaves. This will be discussed in more detail later.

### App/routes.php

Remember how we discussed that when you access a URL through Laravel that you won't see something like `blog.dev/post.php`? Instead, Laravel will route requests based on paths that are configured in this file. You will be accessing and changing this file often, so do not forget where to find it.

## Bootstrap Directory

This directory contains files that are necessary for the startup of the Laravel framework. The only likely change that you will make in this directory is that you may modify the "Detect The Application Environment" section of the `start.php` file. We will discuss this more later.

## Public Directory

This is another important directory. This is the "web root" that the Apache web server is pointing to. The `index.php` file in this directory is what actually starts running the Laravel application. You will place additional directories here that will include your JavaScript, CSS, and image files.

## Vendor Directory

This directory contains all of the dependencies for Laravel and your application. This directory will be managed by Composer so you should not make changes to any files in this directory.

## Other Files

There are two important files to know about in the root of your Laravel install directory. Those are `artisan` and `composer.json`.

### Artisan

Artisan is the name of the command line helper that comes with Laravel. We will be using artisan for various tasks like migrating our database and generating controllers.

Read more about artisan here: https://laravel.com/docs/4.2/artisan

### Composer.json

The composer.json file describes the dependencies for your project so that Composer is able to install or update them. We will be modifying this file later so that we can load some third party libraries for use in our blog application.

## Additional Info

For more details on any of the above directories, see the following link:

http://daylerees.com/codebright/getting-started
