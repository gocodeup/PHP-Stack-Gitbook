# Committing Changes

By committing code to a git repository, changes are recorded with a message, timestamp, and unique identifier.

Code committed to a repository can then be shared, altered, and all future changes will be logged in the history.  We can revert to previous states in the code, see who wrote which lines (and when), and many other features.  By committing our code, we are making it officially part of a project.

## Using `git commit`

To commit code, we can simply run `git commit`.  Do not do this yet, we are going to learn a bit more first!

To see the help for the command, we can run `git commit -h`.  Doing so gives us lots of options:

    usage: git commit [<options>] [--] <pathspec>...

        -q, --quiet           suppress summary after successful commit
        -v, --verbose         show diff in commit message template

    Commit message options
        -F, --file <file>     read message from file
        --author <author>     override author for commit
        --date <date>         override date for commit
        -m, --message <message>
                              commit message
        -c, --reedit-message <commit>
                              reuse and edit message from specified commit
        -C, --reuse-message <commit>
                              reuse message from specified commit
        --fixup <commit>      use autosquash formatted message to fixup specified commit
        --squash <commit>     use autosquash formatted message to squash specified commit
        --reset-author        the commit is authored by me now (used with -C/-c/--amend)
        -s, --signoff         add Signed-off-by:
        -t, --template <file>
                              use specified template file
        -e, --edit            force edit of commit
        --cleanup <default>   how to strip spaces and #comments from message
        --status              include status in commit message template
        -S, --gpg-sign[=<key-id>]
                              GPG sign commit

    Commit contents options
        -a, --all             commit all changed files
        -i, --include         add specified files to index for commit
        --interactive         interactively add files
        -p, --patch           interactively add changes
        -o, --only            commit only specified files
        -n, --no-verify       bypass pre-commit hook
        --dry-run             show what would be committed
        --short               show status concisely
        --branch              show branch information
        --porcelain           machine-readable output
        --long                show status in long format (default)
        -z, --null            terminate entries with NUL
        --amend               amend previous commit
        --no-post-rewrite     bypass post-rewrite hook
        -u, --untracked-files[=<mode>]
                              show untracked files, optional modes: all, normal, no. (Default: all)

There are a lot of options available to us. Some of these flags and options may become useful to you later in your coding experience.

To record our changes in git's history, we run just `git commit`. This will take all the files we have staged previously and record their content in git's history.

## Exercises

We need to commit our `README.md` file. This will be the first of many files we will be committing to our repository.

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Commit your changes with just `git commit`. This should open a new window in Sublime with the following information pre-filled:

        # Please enter the commit message for your changes. Lines starting
        # with '#' will be ignored, and an empty message aborts the commit.
        # On branch master
        #
        # Initial commit
        #
        # Changes to be committed:
        #   new file:   README.md
        #
        # Untracked files:
        #   Codeup/index.php
        #   Codeup/hello_world.html
        #   ...

    This window is where we enter a message for our commit. Messages are very important, and every commit must have one! Commit messages are how you remind yourself what happened when you come back to your repository months from now. Commit messages are how you communicate with other developers what you did with your changes and why you did them. Commit messages are the difference between "what on earth is going on here?!" and "oh, well that makes sense".

    **If Sublime does not open when you run `git commit`,** first flag down an instructor to help you exit either Vim or Nano, depending on whichever is running. Then, run the following two commands:

    ```bash
    ln -s "`find /Applications -name subl`" /usr/local/bin/subl
    git config --global core.editor "subl -n -w"
    ```

1. At the top of the window, type in your commit message. A reasonable message for this commit might be `Initial commit - adding README file`. Save your changes, and then close the window. Once you close the window, your commit will finish. You should see the following in your terminal:

        [master 25670c9] Initial commit - adding README file
         1 file changed, 3 insertions(+)
         create mode 100644 README.md

1. Run `git status`. You should no longer see any files in the staging section.

1. Run `git log`. You should see the commit hash, your author name, and the timestamp of the commit.

    _**Note:** When git's log becomes long, it will allow you to scroll. Pressing `q` will return you to your prompt._

1. Add a new line to your `README.md`. Save your changes and run `git status` again. You should see `README.md` listed again, but in a new section:

        On branch master
        Changes not staged for commit:
          (use "git add <file>..." to update what will be committed)
          (use "git checkout -- <file>..." to discard changes in working directory)

            modified:   README.md

        Untracked files:
          (use "git add <file>..." to include in what will be committed)

            Codeup/index.php
            Codeup/hello_world.html
            ...

    Git allows us to track the the changes to files *over time*. So, since we have modified `README.md`, git recognizes that there are changes to the file that it has no record of. To record those changes, we follow the same process form before of staging the file with `git add README.md` and then committing our changes with `git commit`.

1. There are many other files in `Codeup` that we have not yet tracked with git. This is generally a bad idea. You should try to keep **all** your files (and all your changes to them) tracked in git. Run through the same `git add`, `git commit` process to track all the remaining files in your `Codeup` folder. You will know you are finished when `git status` gives you the following output:

        On branch master
        nothing to commit, working directory clean

    A clean working directory is a happy working directory.

{% else %}

1. Commit your changes with just `git commit`. This should open a new window in Sublime with the following information pre-filled:

        # Please enter the commit message for your changes. Lines starting
        # with '#' will be ignored, and an empty message aborts the commit.
        # On branch master
        #
        # Initial commit
        #
        # Changes to be committed:
        #   new file:   README.md
        #
        # Untracked files:
        #   public/index.php
        #   public/hello_world.html
        #   ...

    This window is where we enter a message for our commit. Messages are very important, and every commit must have one! Commit messages are how you remind yourself what happened when you come back to your repository months from now. Commit messages are how you communicate with other developers what you did with your changes and why you did them. Commit messages are the difference between "what on earth is going on here?!" and "oh, well that makes sense".

    **If Sublime does not open when you run `git commit`,** first flag down an instructor to help you exit either Vim or Nano, depending on whichever is running. Then, run the following two commands:

    ```bash
    ln -s "`find /Applications -name subl`" /usr/local/bin/subl
    git config --global core.editor "subl -n -w"
    ```

1. At the top of the window, type in your commit message. A reasonable message for this commit might be `Initial commit - adding README file`. Save your changes, and then close the window. Once you close the window, your commit will finish. You should see the following in your terminal:

        [master 25670c9] Initial commit - adding README file
         1 file changed, 3 insertions(+)
         create mode 100644 README.md

1. Run `git status`. You should no longer see any files in the staging section.

1. Run `git log`. You should see the commit hash, your author name, and the timestamp of the commit.

    _**Note:** When git's log becomes long, it will allow you to scroll. Pressing `q` will return you to your prompt._

1. Add a new line to your `README.md`. Save your changes and run `git status` again. You should see `README.md` listed again, but in a new section:

        On branch master
        Changes not staged for commit:
          (use "git add <file>..." to update what will be committed)
          (use "git checkout -- <file>..." to discard changes in working directory)

            modified:   README.md

        Untracked files:
          (use "git add <file>..." to include in what will be committed)

            public/index.php
            public/hello_world.html
            ...

    Git allows us to track the the changes to files *over time*. So, since we have modified `README.md`, git recognizes that there are changes to the file that it has no record of. To record those changes, we follow the same process form before of staging the file with `git add README.md` and then committing our changes with `git commit`.

1. There are many other files in `codeup.dev` that we have not yet tracked with git. This is generally a bad idea. You should try to keep **all** your files (and all your changes to them) tracked in git. Run through the same `git add`, `git commit` process to track all the remaining files in `codeup.dev`. You will know you are finished when `git status` gives you the following output:

        On branch master
        nothing to commit, working directory clean

    A clean working directory is a happy working directory.

{% endif %}

### Bonus

When you run `git commit` you may have noticed some warnings about your name and eMail address not being set. Git actually gives you instructions to solve these warnings:

    Your name and email address were configured automatically based
    on your username and hostname. Please check that they are accurate.
    You can suppress this message by setting them explicitly:

        git config --global user.name "Your Name"
        git config --global user.email you@example.com

Use `git config` to set your name and eMail. You can then modify the name and eMail associated with your previous commits using the following command:

```bash
git filter-branch --commit-filter '
    export GIT_AUTHOR_NAME="Your Name";
    export GIT_AUTHOR_EMAIL=you@example.com;
    export GIT_COMMITTER_NAME="$GIT_AUTHOR_NAME";
    export GIT_COMMITTER_EMAIL=$GIT_AUTHOR_EMAIL;
    git commit-tree "$@"'
```
