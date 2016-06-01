# Database Migrations

Database migrations make it easy to track (version control) and manage (apply or roll back) changes to the database. Laravel provides some really easy tools to help you get started with database migrations.

## Database Configuration

Before working with database migrations, we need to make sure that our database connection info is configured properly. Database configuration can be found in the `app/config/database.php` file. Inside that file, find the entry for your MySQL connection. Modify those lines to the following if they have not been already:

~~~php

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

~~~

You should also make sure to delete the file `app/config/local/database.php`. The setting in that file can overwrite this one in our development environment, and we do not want to cause any conflicts.

We will also need to ensure that the database is created; use either Sequel Pro, the `mysql` command line tool, or Ansible to create the `blog_db` database.

## Installing Migration Table

Before using migrations, a special table that tracks the migrations that have been run needs to be set up. Laravel does this for us with one simple command. Since creating the migrations table will require us to connect to the database it is a great way to make sure that our database configuration settings are correct. To create the migrations table, run the following command in the root directory of your Laravel project:

~~~
php artisan migrate:install
~~~

You should see: "Migration table created successfully." If you get an error, it means that your database configuration is not correct. Check the settings in `app/config/database.php` and try again.

## Creating a new Migration

To create a new migration file, just type the following command within the root directory of your Laravel project:

~~~
php artisan migrate:make create_users_table
~~~

Once you run the above command, you will find a new file in the `app/database/migrations` directory. Open the file and you will see something like this:

~~~php
class CreateUsersTable extends Migration
{
    public function up()
    {
        //
    }

    public function down()
    {
        //
    }
}
~~~

As you can see, a new class was generated based on the name we passed to the migrate:make artisan command. This class has `up` and `down` methods. The `up` method is run when a new change is being applied to a database. The `down` method is run when a change is being removed/rolled back.

## Schema Builder

Laravel provides a schema builder for use with database migrations. The schema builder is well documented here: https://laravel.com/docs/4.2/schema.

Using the schema builder provides an alternative to writing your `CREATE TABLE` statements in SQL. Here is what the migration file for our users table will look like when finished:

~~~php
class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function($table)
        {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('users');
    }
}
~~~

As you can see, the `up` method creates a table named `users` with nine columns: `id`, `username`, `email`, `password`, `first_name`, `last_name`, `remember_token`, and thanks to the timestamps method which creates two columns: `created_on` and `modified_on` which in turn will be used to track when a user is created, and when the user's information was last modified. The `down` method drops the table `users`.

(*Note: We use the `$table->rememberToken()` method to create the `remember_token` column in the database. This column can later be used to track information within the client-side code, allowing the user to store their login information to the session, and keep the user logged in over time. For more information on implementing the remember_token check out the [Laravel Documentation](https://laravel.com/docs/4.2/security) - Read over the section on Authenticating Users.*)


## Migrating

In order to run the migration we wrote and create our `users` table, the following command needs to be run:

~~~
php artisan migrate
~~~

The migrate command will run the `up` method in all migrations that exist that have not already been run. So, if we were to run migrate two times in a row, the second migrate command would not do anything and instead tell us: "Nothing to migrate."

## Rolling Back and Refreshing

Sometimes, a migration needs to be un-done, or perhaps all the migrations should be un-done and then re-done. Laravel provides additional migration commands to perform these tasks.

To rollback a single migration, run the following command:

~~~
php artisan migrate:rollback
~~~

For our example, this will run the `down` method in the `CreateusersTable` migration. After rolling back, you can make your desired changes and then run migrate again as we did above.

In the case that you want to rollback and then re-run all migrations you can do so by issuing the following command:

~~~
php artisan migrate:reset
~~~

## Out of Sync Conditions

In order to successfully manage your database through migrations, all changes to the database must be made by a migration. If you make manual changes to your database by another means, the migrations will be out of sync. Out of sync conditions can also occur when you have an error in a migration that results in a partially applied change. The best way to combat this is to have each migration only perform a single change.

## Additional Information

For additional information on db migrations, see the links below:

- https://laravel.com/docs/4.2/migrations
- http://daylerees.com/codebright/migrations

## Exercises

Please follow the instructions below, and as always commit your work to git and push to GitHub.

1. Read the schema builder documentation to become familiar with the available data types. https://laravel.com/docs/4.2/schema
1. Follow the instructions in this lesson to configure your db, create a migration for the posts table, install migrations, and run the migration you created.
