# Laravel's Environment

The system and configuration settings an application runs within is called its *environment*. Thus far all of our applications have been running in the same environment: our Vagrant box. Laravel has support for running the same basic code in different environments and using different settings. Before we go further in writing our Laravel application it is a good idea for us to look at how Laravel sets up these environments.

## Detecting Environment

The default environment for Laravel is called `production`. This will be the environment our application will run in once it is deployed to a public server. Laravel calls the environment for developing new code `local`. We can create additional environments if we need to, but we should make sure at least these two work for our project.

By default, Laravel tries to determine what environment it is using based on the server's hostname. We have actually configured nginx on our Vagrant machine with a built in parameter that explicitly states it is a `local` environment. We just need to instruct Laravel to use that parameter, rather than trying to guess based on hostnames. Look in the file `boostrap/start.php`. In there, Laravel is setting up a variable called `$env`. We need to change that to the following:

```php
$env = $app->detectEnvironment(function()
{
    return isset($_SERVER['LARAVEL_ENV']) ? $_SERVER['LARAVEL_ENV'] : 'production';
});
```

This anonymous function tells Laravel to look at the value in `$_SERVER['LARAVEL_ENV']` for the environment name, but use `production` if it is not set. To test, log into your Vagrant box, `cd` to the `blog.dev` directory and run:

```bash
php artisan env
```

The output should be:

    Current application environment: local

_**Note:** We will talk more about the `artisan` script in a later lesson._

## Database Configuration

Laravel applications are designed to store their data inside of a database. To do so however, Laravel needs to know what kind of database server we are using, how to connect to it, what username & password to use, etc. We want these options to be environment variables, so that they can be changed depending on which server our application is running in. This way, our production database can use a different, more secure password than our local database. Furthermore, it will allow different developers working together on the same project to have different database passwords for their app.

### Database Creation

To get us started, we need to create a database. As before, the easiest way to do so will be with Ansible. From your **Mac** terminal, run the following:

```bash
cd ~/vagrant-lamp
ansible-playbook ansible/playbooks/vagrant/mysql/database.yml
```

Use the values `blog_db` and `blog_user` for database name and username respectively. Come up with your own password, **but do not forget it**.

### Environment Settings

Laravel gives us a way to have environment variables loaded automatically for us, we simply need to put those options in specially named files within the `blog.dev` directory. Our configuration options for the `local` environment will be put in a file called `.env.local.php`. Create that file in Sublime, it will warn you about file names starting with a `.` but that is ok and it is what we need. Put the following contents in that file:

```php
<?php

return array(
    'DB_HOST' => '127.0.0.1',
    'DB_NAME' => 'blog_db',
    'DB_USER' => 'blog_user',
    'DB_PASS' => '', // <-- Choose your own password here
);
```

Environment settings are simply arrays returned from a given file. Laravel will automatically include the appropriate file for our environment and assign its values to the superglobal `$_ENV` for us.

When we eventually deploy our code to production we will make a new file called just `.env.php`.

### Configuration Files

Now that we have created a database and our environment settings, Laravel needs to be told to use those settings when connecting to the database, rather than its own hard coded values. The database configuration for Laravel is actually stored in two separate files. The main configuration is in `app/config/database.php`, however some of the values are overridden by `app/config/local/database.php`. Once again the `local` part of that path is in reference to our `local` environment. Putting local configuration options in that file is an alternative to using environment settings. Since we are going down the the environment route, we should first delete the local database configuration file. From your `blog.dev` directory:

```bash
rm app/config/local/database.php
```

Now that the file has been deleted, open up `app/config/database.php` in Sublime and find entry regarding the `mysql` connection. Modify those lines to the following:

```php
'mysql' => array(
    'driver'    => 'mysql',
    'host'      => $_ENV['DB_HOST'],
    'database'  => $_ENV['DB_NAME'],
    'username'  => $_ENV['DB_USER'],
    'password'  => $_ENV['DB_PASS'],
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
),
```

## Gitignore, and Composer Lock

Now that we have created this environment file, let's look at how Laravel keeps these settings secure. Your passwords and other sensitive information are things you do **not** want to be publicly shared, so these are things we would not want committed to GitHub. Thankfully, Laravel came configured out of the box with a `.gitignore` file that helps us keep things safe. Let's take a look at its contents:

```
/bootstrap/compiled.php
/vendor
composer.phar
composer.lock
.env.*.php
.env.php
.DS_Store
Thumbs.db
```

Notice the two lines regarding `.env`. These entries will make sure your environment settings are not tracked by git. While we are looking in this file however, there is one change we should take care of. The line right above our `.env` files causes git to also ignore the file `composer.lock`. That file is where composer tracks the precise version of the requirements for our project&mdash;it *locks* our dependencies to a certain version. Laravel's default is to ignore this file, primarily for their own internal development. For ourselves however, it is a good idea to keep this file tracked. Doing so is just a matter of deleting the line with `composer.lock` from the file `.gitignore`.

## Exercises

1. Update your `boostrap/start.php`, test your environment to make sure that it is being detected properly.
1. Create a file called `env-template.php` in `blog.dev`, and enter your environment array in it, but with all the values assigned to empty strings. For example:
    ```php
    <?php
    return array(
        'DB_HOST' => '',
        // ...
    );
    ```
    We will track this file in git, and use it as a way of communicating our environment requirements to other developers.

1. Copy `env-template.php` to `.env.local.php`. In your new file fill in the appropriate values for your database.
1. Delete `app/config/local/database.php`, and update `app/config/database.php` to use your environment settings.
1. Create your database using Ansible. From `/vagrant/sites/blog.dev` in your Vagrant environment run:
    ```bash
    php artisan tinker
    ```
    This will take you into a REPL for Laravel. Use the following to test whether your database is properly configured:
    ```php
    DB::connection()->getDatabaseName();
    ```
    You should see the name of your database, and no errors. To leave the REPL use `exit;`.

1. Remove `composer.lock` from your `.gitignore` file. Commit all your files and push to GitHub. Your commit *should* include `env-template.php` and `composer.lock`. It should **not** include `.env.local.php` or anything in the `vendor` directory.
