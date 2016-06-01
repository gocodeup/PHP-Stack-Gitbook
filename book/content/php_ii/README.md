# PHP II

In this section, we will learn about control structures, IO streams, and functions.

## Running PHP Scripts

Our code is starting to get a bit too complex to test and run from the REPL. Instead, we are going to start putting our PHP code in files (or *scripts*) and telling the PHP interpretor to run our file. A PHP script is a plain text file, just like HTML or JavaScript files. Like those file types, our PHP scripts should end with their own extension: `.php`.

When we start a PHP script, we need to tell the interpretor we have some PHP code that must be executed. To do this, we start our script file with an opening PHP *tag*, like so:

```php
<?php
```

All of our scripts from here until we get to PHP with HTML should start with that, with nothing else on that line.

_**Note:** If this tag looks incomplete, that is because in a way it is. There is an ending piece of the tag that looks like `?>`. You may see that closing piece in some example code and Sublime may actually insert it for you. For the time being though, it is best practice to **not** include the closing part of the tag._

After the opening PHP tag, you can put whatever PHP code you wish to be executed. For example:

```php
<?php

echo 'Welcome to Codeup!' . PHP_EOL;
echo 'This is my first PHP script!' . PHP_EOL;
```

Now that we have a script, how do we test our code? Remember previously we would execute `php -a`. In that command, `-a` was a *flag* that told the interpretor (`php`) we wanted to use the interactive shell. Now, we want to tell the interpretor we want to run a particular file. So, if we saved the above script as `my_first_script.php`, we could test it with the following command:

```bash
$ php my_first_script.php
```

_Just like with the REPL, make sure to **always** run your PHP scripts from the Vagrant environment!_

## Codeup Exercises Repository

Now that we are going to be making files, where should we be putting those files? If you answered "in a repository" you are absolutely correct and win the coveted Codeup-no-prize! Most of our previous work all ran within the browser, so the repositories we made were in directories within the `~/vagrant-lamp/sites` directory. Our PHP scripts will be run from the command line so there is no practical value to putting them in the `sites` directory. Instead, we will be making a directory called `exercises` directly within `~/vagrant-lamp`.

1. Create your remote repository on GitHub and call it `Codeup-Exercises`.

1. Create the folder for your exercises with the command `mkdir ~/vagrant-lamp/exercises`.

1. Change to the `exercises` directory (`cd ~/vagrant-lamp/exercises`) and initialize your local repository: `git init`.

1. Make sure your remote repository is properly linked up: `git remote add origin <url>`.

1. Create your first PHP script and open it in Sublime. Call your file `hello_world.php`. You can do this with the command `subl hello_world.php`.

1. In your script, make sure to start with the opening PHP tag `<?php`

1. Create two variables called `$firstName` and `$lastName` and set them equal to strings with your name.

1. Echo the string `"Hello, my name is "` with your first and last name.

1. Save your file. Connect to your Vagrant environment with `vagrant ssh`

    _**Hint:** From here on out, it may be useful to have two tabs in your Terminal application open at all times: one in your local Mac environment, and one in your Vagrant box._

1. Navigate to your `exercises` directory in your vagrant box and test your new script with `php hello_world.php`. Make sure you get your expected output.

1. When you are done, make sure to commit your file and push your changes to GitHub. Check your repository and ensure the file was pushed out correctly.
