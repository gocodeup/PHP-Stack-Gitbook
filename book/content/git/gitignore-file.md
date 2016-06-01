# Ignoring Files

Sometimes there are files or folders we do not want to be tracked by git. For example, if we were building an application that had multiple *dependencies* managed by another piece of software, tracking those files with git would be redundant and could cause conflicts. We can tell git to ignore certain files by creating a `.gitignore` file in our repository.

## Creating the `.gitignore` File

Git looks for a file called `.gitignore` at the base of our repository for instructions on what files to ignore. Notice that the file name starts with a period (`.`), this is important. Git will only look for files with that exact name, and the dot tells your computer to hide the file by default. We can create the `.gitignore` file and open it for editing with `subl .gitignore`.

The `.gitignore` file is a list of files and paths we want git to not pay attention to. For example, if we had a file called `.env` we wanted hidden from git, we could put it in our `.gitignore` file like so:

```
.env
```

We can also put longer paths in our `.gitignore` file:

```
.env
app/bootstrap/compiled.php
```

Finally, `.gitignore` can contain wildcards (`*`) to find files or folders that match a certain pattern. For example, if we wanted git to ignore everything in a directory called `vendor` we could add it with a wildcard:

```
.env
app/bootstrap/compiled.php
vendor/*
```

## Exercises

When you were adding and committing files previously you may have noticed a file called `.DS_Store` in several directories. This file is created by your computer and does not belong in git's history, so let's make sure git ignores it.

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Create your `.gitignore` file in `Codeup` and open it in Sublime.

1. Add `.DS_Store` to that file.

1. Save your changes and then run `git status`. You may be surprised to find the `.gitignore` listed as an untracked file. Even though it is used by git, it is still a file like all the others in your repository. You must `git add` and `git commit` it like all the rest.

1. If you had previous committed any `.DS_Store` files, you can remove them with the command:

    ```bash
    git rm --cached .DS_Store
    ```

    You will need to run that command for any additional `.DS_Store` files in any subdirectories of your repository.

1. Once you have committed all your changes, do not forget to push them all up to GitHub!

{% else %}

1. Create your `.gitignore` file in `~/vagrant-lamp/sites/codeup.dev` and open it in Sublime.

1. Add `.DS_Store` to that file.

1. Save your changes and then run `git status`. You may be surprised to find the `.gitignore` listed as an untracked file. Even though it is used by git, it is still a file like all the others in your repository. You must `git add` and `git commit` it like all the rest.

1. If you had previous committed any `.DS_Store` files, you can remove them with the command:

    ```bash
    git rm --cached .DS_Store
    ```

    You will need to run that command for any additional `.DS_Store` files in any subdirectories of your repository.

1. Once you have committed all your changes, do not forget to push them all up to GitHub!

{% endif %}

### Bonus

Those `.DS_Store` files will continue to pop up in all your other repositories in class. It would be nice if we could tell git to **always** ignore them throughout your computer. Research how to create and configure a *global* git ignore file and use that to make sure that `.DS_Store` is not tracked in any other repository you make.
