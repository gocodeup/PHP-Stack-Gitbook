# Navigating the Filesystem

Navigation of the filesystem is important; that is why we want to make sure we understand the structure before we go galavanting around - issuing commands with reckless abandon.

We are going to introduce several common commands, and ask you to put them to work.

## Print Working Directory

We have a command which can tell us where we are in our current filesystem, similar to the *"You Are Here"* marker on a map. We can see where we are in our current filesystem with `pwd`, the "print working directory" command.

```
$ pwd
/Users/username
```

Know that `pwd` will always give us an **absolute** path on our filesystem, never a relative one.

## Change Directory

We can move around our filesystem with the `cd`, or "change directory" command.

```
$ cd
```

When we use `cd` we have to specify where we want to go. We can do this by using either the absolute or relative path to that directory.

This would take you to your home directory using an absolute path:

```
$ cd /Users/john
```

This would take you to your home directory using the shorthand `~`:

```
$ cd ~/
```

So, how does our previous command `ls` factor into this scenario?  Let's find out.

Go to your home directory, and type in:

```
$ ls
```

You're going to see something like this:

```
$ ls
Applications    Documents    Library    Music       Public
Desktop         Downloads    Movies     Pictures
```

This shows us the directories listed under our current one.  Now we can choose to `cd`, or jump into one of those directories.  Let's go into our Desktop and list the files there.

```
$ cd Desktop/
$ ls
```

What do you see?  Do you the files and folder names listed here correspond with what's actually on your desktop?  What happens when you create a new folder on the desktop, and then run `ls` again? Can you see that the new folder you created shows up in your command line as well?

There is one more thing we'd like to show you.  Type `ls -lah` and take a look at what is listed.  It should look something like this:

```
$ ls -lah
total 17032
drwx------+  36 user  staff   1.2K Jan 23 10:01 .
drwxr-xr-x+  51 user  staff   1.7K Jan 21 17:32 ..
-rw-r--r--@   1 user  staff    21K Jan 23 10:01 .DS_Store
-rw-r--r--    1 user  staff     0B May  6  2014 .localized
-rw-r--r--@   1 user  staff   136K Jan 11 09:14 random_file.txt
-rw-r--r--@   1 user  staff    16K Jan 15 14:12
```

Do you see the following characters listed above your files/folders?

```
.
..
```

These are two additional ways of representing directories with shorthand characters, similar to how our home directory can be accessed anywhere with `~`.  These characters are important when we are attempting to navigate using relative paths.

- The `.` single dot, represents our current directory.
- The `..` double dot, represents the parent directory, or the directory immediately above our current directory.

You can use commands like these the traverse upwards:

```
# Go up one directory
$ cd ../

# Go up two directories
$ cd ../../

# Go up three directories
$ cd ../../../
```

Or to traverse downwards from your current directory:

```
$ cd ./Desktop/some_directory/another_directory/
```

You can even chain the double dot with other directories to go up one or more levels and then back down some other part of the directory tree:

```
# Go up one directory, and then down another directory
$ cd ../another_directory/
```

What is important to note about using the `./` is that it isn't always necessary. Neither is the trailing slash at the end of the last directory in the chain. The following commands both have the same result, when issued from the home directory:

```
$ cd ./Desktop/some_directory/another_directory/
$ cd Desktop/some_directory/another_directory
```

The prompt is smart enough to know what you are trying to do in both these instances. Did you also notice that both of those are relative paths? As you use these commands more, you will get more comfortable with the syntax. It will become second nature to you!

## Exercise

1.  Start at your home directory.  Change directory into your Desktop.
2.  Find another folder to `cd` into, and keep going until you have run out of directories to traverse downwards.
3.  Start moving your way back up with `cd ../`.  What happens when you try to `cd ../../`?
4.  Start over again at your home directory, and pick a place on your filesystem to jump to using the absolute path.
5.  Pick another one, far away from that place, and jump to it using `cd`.
6.  Make sure to use `pwd` to check your current location if you get lost.
