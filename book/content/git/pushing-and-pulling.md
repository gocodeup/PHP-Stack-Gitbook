# Pushing and Pulling

Pushing refers to transferring changes from a local repository to a remote repository.  This is much like uploading a file, the difference being that git only uploads, or _pushes_, the changes.

Pulling is the opposite of pushing, it is the act of retrieving updates of changes from a remote repository.

What is a remote repository?  They are exact duplicates of your local repository, just at a different location.  They may be on a company server, another laptop, or hosted for free on GitHub, like ours.

## Using `git push` and `git pull`

Pushing and pulling are very simple, and git makes it easy for us to update and retrieve code from our remote repository.

To push (update) the remote repository we can run `git push <remote> <branch>`.  Pull is the same format: `git pull <remote> <branch>`.

### Setting Up a Remote Repository

Earlier we created a repository on GitHub.  Opening the repository page in your browser will show instructions for setting up a repo. First, make sure your repo on GitHub is configured to use *SSH*, **not** *HTTPS*. We have already configured your computers to push using SSH very easily. Find the line that refers to adding the remote to git.  It should look like this:

```bash
git remote add origin git@github.com:YourUsername/Codeup-Web-Exercises.git
```

This line tells git to add a remote repository named `origin`, and point it to a GitHub repository.

Now that we have a remote setup, pushing and pulling is simple.

## Exercises

Your code is committed in your local repository. If for any reason you lose this code (hard drive failure, dropped laptop, etc), it will be gone forever.  By pushing to the remote repository, your code will not only be backed up, you'll be able to access it from anywhere.

If you get errors regarding your SSH keys, please see the [GitHub help guide](https://help.github.com/articles/generating-ssh-keys).

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Push your local commit to GitHub by running `git push -u origin master`. Note: `-u` is only needed on your first push.

    This should output:

        Counting objects: 3, done.
        Delta compression using up to 8 threads.
        Compressing objects: 100% (2/2), done.
        Writing objects: 100% (3/3), 336 bytes, done.
        Total 3 (delta 0), reused 0 (delta 0)
        To git@github.com:YourUsername/Codeup-Web-Exercises.git
         * [new branch]      master -> master

    What you did was tell git to push your changes to the remote _origin_ (GitHub) using the _master_ branch. You will learn more about branches later on, for now it is only important to know we are using the `master` branch.

    We can see from the output that git compressed and uploaded your changes, and added the newly created branch to the repository.

1. Issue a `git pull origin master`.  Your output should show you are up to date.

    ```
     * branch            master     -> FETCH_HEAD
    Already up-to-date.
    ```

    If there were changes, this command would have downloaded them to your local repo.

1. Reload the repository page in GitHub.  You should see your README file.  Clicking on commits should show your commit in the log.

    Explore the GitHub repository.  This is where all your code will be living.

{% else %}

1. Push your local commit to GitHub by running `git push -u origin master`. Note: `-u` is only needed on your first push.

    This should output:

        Counting objects: 3, done.
        Delta compression using up to 8 threads.
        Compressing objects: 100% (2/2), done.
        Writing objects: 100% (3/3), 336 bytes, done.
        Total 3 (delta 0), reused 0 (delta 0)
        To git@github.com:YourUsername/Codeup-Web-Exercises.git
         * [new branch]      master -> master

    What you did was tell git to push your changes to the remote _origin_ (GitHub) using the _master_ branch. You will learn more about branches later on, for now it is only important to know we are using the `master` branch.

    We can see from the output that git compressed and uploaded your changes, and added the newly created branch to the repository.

1. Issue a `git pull origin master`.  Your output should show you are up to date.

    ```
     * branch            master     -> FETCH_HEAD
    Already up-to-date.
    ```

    If there were changes, this command would have downloaded them to your local repo.

1. Reload the repository page in GitHub.  You should see your README file.  Clicking on commits should show your commit in the log.

    Explore the GitHub repository.  This is where all your code will be living.

{% endif %}
