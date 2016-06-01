# Creating Files And Directories

There are a number of ways to create files and directories on the linux filesystem. We are going to show you some of the most common commands.

## touch

How do we create new files from the command line? Just like this:

```
$ touch newfile.txt
```

The `touch` command allows us to create a new empty file of whatever name we specify. In this case, our file will show up like this:

```
$ ls -l

-rw-r--r--   1 user  wheel         0 Nov 18 11:00 newfile.txt
```

You can even create multiple files at once, like this:

```
$ touch one two three four five
```

## mkdir

What if we want to create a directory?  There is the `mkdir` command:

```
$ mkdir secret_plans
```

What happens to your desktop if you `cd` to it, and make this directory?

Just like `touch`, you can create multiple directories inside your current one simultaneously:

```
$ mkdir one two three four
```

## Exercise
1. Create a new directory on your desktop called "test".
2. Create some new files in there, named "test1", "test2", and "test3".
3. Create another directory inside of test, called "secret_files".
4. Create some new files inside of that.
5. Navigate back to your desktop and run `ls -l test`.  What do you see?
6. Now try `ls -l test/secret_files`.  Do you see your secret files?
