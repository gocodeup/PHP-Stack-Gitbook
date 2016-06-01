# Initializing a Repository

`git init` is used any time we want to create&mdash;or *initialize*&mdash;a new repository.

## Exercises

You need to create a new repository to hold the exercise files you will be creating during this course.

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Open your terminal and change directory (`cd`) to your `Codeup` directory (`~/Desktop/Codeup`).

1. Initialize a new git repository by running `git init`

    Your output should look similar to this, though your vagrant directory may be in a different location.

        Initialized empty Git repository in /Users/USERNAME/Desktop/Codeup/.git/

    Congratulations, you now have a git repository in your local directory.

{% else %}

1. Open your terminal and change directory (`cd`) to your `codeup.dev` directory (`~/vagrant-lamp/sites/codeup.dev`).

1. Initialize a new git repository by running `git init`

    Your output should look similar to this, though your vagrant directory may be in a different location.

        Initialized empty Git repository in /Users/USERNAME/vagrant-lamp/sites/codeup.dev/.git/

    Congratulations, you now have a git repository in your local directory.

{% endif %}
