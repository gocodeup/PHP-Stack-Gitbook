# Moving Files

Occasionally we want to move files from one location to another. We can use the following command, and our path, to accomplish this.

## mv

`mv` needs two pieces of information, or arguments, to work. The first is the original file you want to move, the second is the location where you want to move it.

```
$ mv ~/newfile.txt ~/Desktop/newfile.txt
```

This command moves our `newfile.txt` from the home directory, and puts it on our Desktop. What if you only want to use relative paths?  Let's say you were already in your home directory:

```
$ pwd
/Users/john
```

You run `ls` to see what files are in there:

```
$ ls -a
.
..
newfile.txt
```

Now, we know where we are, and we know where we want to go, so let's specify our current file and the location to move it to using relative paths.

```
$ mv newfile.txt ../newfile.txt
```

This would move the file up one directory from our current location.

`mv` can also rename files with a slight variation in our syntax:

```
$ mv current_filename.txt new_filename.txt
```

This would not actually move our file from its current directory, but it would rename it inside of our current directory.

## Exercise
1.  Create a new file on your desktop called "move_it.txt".
2.  Move this file into your home directory.
3.  Now move it into your documents folder, where it belongs.
4.  Change the name of the file, within your documents folder, to Move_It.txt.
