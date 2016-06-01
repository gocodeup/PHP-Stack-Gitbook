# Database Seeders

Database seeders are an easy way to add information into the database. Laravel has a seeder class that makes the seeding process simple so you can test the application with realistic looking data.

## Base Seeder Class

Out of the box, Laravel give us one seeder class. The file is called `DatabaseSeeder.php` and can be found in the `app/database/seeds` directory.

~~~php
<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
	}

}
~~~

When we run the artisan seed command `php artisan db:seed`, this file is called and only the seeder classes listed will execute. Each seeder class can be added to this file like so:

~~~php
$this->call('UserTableSeeder');
~~~

## Creating a new Seeder

We will create a new seeder class for each table in our database we want to add data to. Every seeder we create will reside in `app/database/seeds` and will look very similar to the code below:

~~~php
<?php

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seeding code goes here
    }
}
~~~

The `call()` method in `DatabaseSeeder` looks for a class in the `seeds` directory and executes the method `run()` in that class. The `run()` method is where we will define the steps to seed a particular database table.

To add an entry to the table we will create a new instance of a model within `run()`. Once we have set each of the attributes values, we will save it to the database.

~~~php
public function run()
{
    $user1 = new User();
    $user1->email = 'user1@codeup.com';
    $user1->password = Hash::make('password123');
    $user1->save();

    $user2 = new User();
    $user2->email = 'user2@codeup.com';
    $user2->password = Hash::make('password123');
    $user->save();
}
~~~

## Artisan Seeder Commands

Artisan gives us a couple commands we can use in the terminal to run our seeder files.

To run all seeders listed in DatabaseSeeder, run the command:

~~~
php artisan db:seed
~~~

Sometimes you may want to run just one of your seeders. To do that, you run the command below but replace `UserTableSeeder` with the name of the seeder class you want to run.

~~~
php artisan db:seed --class=UserTableSeeder
~~~

Whenever you run any of your migration commands, you can also pass `--seed` to cause Laravel to run your seeders after your migrations.

~~~
php artisan migrate:refresh --seed
~~~

## Clearing Previously Seeded Data

If we were to run our `UserTableSeeder` a second time we would have an error. Our `users` table has a unique constraint on the `email` column, so the second time we try to seed the table, Laravel will try to insert a duplicate record. Whenever we seed a table, we must make sure that all the old data in that table is deleted first. The best solution is to actually delete data in our `DatabaseSeeder` class, rather than in the individual seeders. This gives us more control over what order records are deleted and created. In general, you will want to delete data from your tables in the *reverse* order you seed them.

Our `DatabaseSeeder` class should now look like this:

~~~php
class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->command->info('Deleting users records');
        // There are also comment() and error() methods that output different colors

        DB::table('users')->delete();

		$this->call('UserTableSeeder');
	}

}
~~~

## Additional Information

For additional information on DB seeders, see [Laravel's documentation](https://laravel.com/docs/4.2/migrations#database-seeding).

## Exercise

Please follow the instructions below, and as always commit your work to git and push to GitHub.

1. Create a seeder file for your users table. It should only create a single user. *Do not forget to hash your password before saving!*
1. Create a `PostsTableSeeder` seeder for your posts table.
    - Use this seeder to create at least 10 blog posts. Use either an array of data and `foreach()` or a `for()` loop to create unique posts.
    - Make sure your `posts` table is seeded *after* your `users` table.
    - Before seeding, delete your records from `posts` and `users`. Make sure the delete is in the reverse order of your calls.
1. Run your seeder at least twice using the `artisan` commands given in the lesson.

### Bonus

1. Sometimes we may want seeders to behave differently in different environments. In our `local` environment we should always delete and reseed everything every time `db:seed` is run. In production though, we may want to just seed our `users` table, and potentially make sure to seed it just one time. Read how to determine what the [application environment](https://laravel.com/docs/4.2/configuration#environment-configuration) is, and make your seeders behave differently in local and (eventually) production environments.
1. The data we are creating for each post is awfully boring. Research [Faker](https://packagist.org/packages/fzaninotto/faker) to see about creating more "realistic" looking blog posts.
