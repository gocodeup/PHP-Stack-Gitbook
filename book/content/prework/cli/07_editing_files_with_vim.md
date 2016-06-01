# Editing Files

Sometimes the only way you have access to edit a file is through a command-line editor, like [vim](http://en.wikipedia.org/wiki/Vim_%28text_editor%29).

## vim

Most command line interfaces in linux systems come with `vim` installed.  Vim stands for "Vi IMproved".

We can use vim like this:

```
$ vim newfile.txt
```

You're going to see the prompt change at this point, because you enter vim's interface for editing a file.

You can use your arrow keys to move around, and press `i` when you're ready to enter the mode in which content can be modified.  When you have finished modifying the file, you can press `:w` and `enter` to write the changes.  Then you are safe to press `:q` and `enter` to exit the interface.

***Note:*** In our bootcamp we'll use a program called Sublime to edit text much more efficiently.  Just know that vim can edit files directly from the command line, and in some cases - it might be the only editor to which you have access.

## Exercise

Check out this interactive tutorial for learning the vim command:

```
  http://vim-adventures.com/
```
It uses the same basic commands you would use to navigate in vim.  Once you've got those down, you can check out this more advanced tutorial:

```
  http://www.openvim.com/tutorial.html
```