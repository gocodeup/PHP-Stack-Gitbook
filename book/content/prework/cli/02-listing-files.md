# Listing Files

The primary use for BASH is to manage files. But how do we know what files are around for us do anything with? The key to this is the command `ls`. `ls` is short for "list" and that is what it does: it lists the contents of a directory. So if we wanted to see what files are in the directory we are currently in, it is as simple as the following:

```
$ ls
```

If your home directory looks something like this:

![Codeup home directory](/content/img/prework/home-folder.png)

The output we see in the terminal would be:

```
$ ls
Desktop        Downloads    Movies      Pictures
Documents      Library      Music       Public
$
```

## Specifying a Directory

By default, `ls` lists the contents of whatever directory we are currently in. What if instead we wanted to see what was in a different directory? We can tell `ls` to show the contents of a different place simply by adding that as an argument. Suppose we wanted to see what was in our `Documents` folder. We would use the following command:

```
$ ls Documents
```

My Documents folder only has four files in it, so the output I see is:

```
$ ls Documents
File 1  File 2  File A  File B
$
```

Yours will surely be different.

**Note: The Mac filesystem is *not* case sensitive. That means that it sees `Documents` and `documents` as the same folder. Most other systems do not behave this way and would treat those as two different folders. Be careful when writing out the names of files and folders. In general, programmers tend to avoid capital letters in filenames whenever possible.**

## Flags

Most CLI commands can take in what are called "flags". Flags are options that can somehow change the way a command behaves. Typically a flag takes the format of a `-` followed by a single letter or number, or two `--` and a word. `ls` can take in several different flags that change its output, some common ones are:

```
-a : all files
-l : long format
-h : human readable output
```

If we wanted to see the contents of our current directory in "long" format, we would do the following:

```
$ ls -l
```

That output would look something like:

```
$ ls -l
total 0
drwx------+  4 user  staff   136 Jan  5 01:40 Desktop
drwx------+  7 user  staff   238 Jan  5 16:20 Documents
drwx------+  3 user  staff   102 Nov  5 01:12 Downloads
drwx------+ 42 user  staff  1428 Jan  5 01:37 Library
drwx------+  3 user  staff   102 Nov  5 01:03 Movies
drwx------+  3 user  staff   102 Nov  5 01:03 Music
drwx------+  3 user  staff   102 Nov  5 01:03 Pictures
drwxr-xr-x+  5 user  staff   170 Nov  5 01:03 Public
$
```

The long format outputs the directory listing in a series of columns, kind of like a table. Much of the information `ls` displays in this table is beyond the scope of what we can cover here, but the last three columns in particular are the file size in bytes (ex: `136`), the last time the file was modified (`Jan  5 01:40`) and its name just like before (`Desktop`).

You can also use two or more flags together. For example, if you wanted to see *all* the files in a directory in long format, you could run:

```
$ ls -l -a
```

However, short flags can be combined together, so rather than listing each flag individually you could simply type

```
$ ls -la
```

That syntax will behave exactly the same as the previous example.

## Exercises
1. Try each of the flags for `ls` individually. One of the flags may not change the output on its own.
1. Combine two or more flags together. Now that you are using multiple flags together, can you figure out what each one of the flags does? (In particular, what does "human readable output" mean?)
1. List the contents of some other directories. Can you combine both flags and a different directory?
1. What happens if you try to list the contents of two or more directories?
