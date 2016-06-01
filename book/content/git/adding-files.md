# Adding files

When we add files to our repository, we are _staging_ them.  Staging means they are ready to be added to the repository, and will be available to _commit_.  When we commit, we making an official record of the changes (additions or deletions) resulting from the _commit_.

Adding files is how we take our files from _untracked_ to _tracked_.

## Using `git status`

Before we add any files, let's take a look at the current status, but running `git status` inside our repo.

    On branch master

    Initial commit

    Untracked files:
      (use "git add <file>..." to include in what will be committed)

        Codeup/

    nothing added to commit but untracked files present (use "git add" to track)

Notice that git says we have an *untracked* file. That is because when we initialized our repository there were files already in the directory. Because git has no history of those files they are in an unknown state, aka "untracked". We will be dealing with the contents of the `Codeup` directory over the next couple of exercises.

## Using `git add`

To move a file from *untracked* to *tracked* we use the `gid add` command. Because we could have any number of file untracked in our repository, we must tell `git add` which file we want to track. For example, if we had a file called `Codeup/my_new_file.html` we would do:

```bash
$ git add Codeup/my_new_file.html
```

Doing this would change the output of our `git status`:

    On branch master

    Initial commit

    Changes to be committed:
      (use "git rm --cached <file>..." to unstage)

        new file:   Codeup/my_new_file.html

    Untracked files:
      (use "git add <file>..." to include in what will be committed)

        Codeup/index.php
        Codeup/hello_world.html
        ...

This tells us that our file is now staged, and is ready to be committed. We can run `git add` additional times for any other files we would like to stage for the next step: committing.

## Exercises

Let's start by adding a `README` file. `README` files are common with development projects, and GitHub will display them under our repository for easy viewing. Most `README` files contain a description of the project, basic usage guide, and sometimes a list of contributors and a license.

To create a new file, you can use the command line `touch` utility.

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Create a new `README` file in markdown format by running `touch README.md` in your local repo.

1. Open the new `README` file in your text editor.

1. Add a description to the file (something like this)

    ```markdown
    # Codeup Web Exercises

    This is my personal repository of web exercises
    I've completed during my amazing time at Codeup!
    ```

    To learn more about markdown formatting, visit the [documentation on GitHub](https://help.github.com/articles/github-flavored-markdown).

1. Run `git status`. Your README file should be listed as `untracked`.

1. Add the README file using `git add README.md`

1. Run `git status` again, your README should now be *staged*

    Now that our file is staged, it is ready to be committed to the repository.

{% else %}

1. Create a new `README` file in markdown format by running `touch README.md` in your local repo.

1. Open the new `README` file in your text editor.

1. Add a description to the file (something like this)

    ```markdown
    # Codeup Web Exercises

    This is my personal repository of web exercises
    I've completed during my amazing time at Codeup!
    ```

    To learn more about markdown formatting, visit the [documentation on GitHub](https://help.github.com/articles/github-flavored-markdown).

1. Run `git status`. Your README file should be listed as `untracked`.

1. Add the README file using `git add README.md`

1. Run `git status` again, your README should now be *staged*

    Now that our file is staged, it is ready to be committed to the repository.

{% endif %}
