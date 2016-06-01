# File Paths

Before we examine the entire filesystem, let's examine some concepts that we need to be aware of when navigating our computers via the command line.

## Paths and Directory Separators

A file path is a line of text that specifies a unique location in a file system. A path points to a file system location by specifying the hierarchy of directories leading to where that location is. For example, `Documents/Secret_Diary/My_Crush.txt` indicates that the file `My_Crush.txt` is in the directory `Secret_Diary`, which in turn is in the folder `Documents`. We separate each directory (or "folder") with the `/` character. Those of you with a background in Windows may be more familiar with the `\` for this purpose, however that character has a different meaning in UNIX systems, and in most programming languages.

## The Root Directory

The `/` character separates one directory from another in a path, so `Parent_Directory/Child_Directory` represents one folder nested inside of another. But what about just the `/` on it's own? When used by itself, the `/` represents what is called the "root" directory. Remember that directories form a hierarchy. If we were to think of that hierarchy as a tree that branches up and out into child directories (and grandchild, and great-grandchild, etc), the `/` would be the root of that tree. Thus, using just the `/` on its own will take you to the absolute base, or "root", of your filesystem.

## Absolute and Relative File Paths

There are two ways to represent any given location within our filesystem: the **absolute** path, and the **relative** path.

You can think of these in the following way. Let's say you had a house, and you wanted to give your friend directions to the guest bedroom. You could do that in the following way:

> Starting at the front door, go up the main stairs, down the hallway to your left, and enter the last room on the right. That is the guest bedroom.

What if instead you were trying to tell them how to find the guest bathroom? It is inside the guest bedroom. You could give them all the same directions over again:

> Starting at the front door, go up the main stairs, down the hallway to your left, enter the last room on the right, and go in the first door to the right. That is the guest bathroom.

These are both examples of "absolute" paths. You are giving your friend directions to a room from a fixed point of entry in your house (the front door). Thus, you are giving them *absolute* directions. But what if your friend is already in the guest bedroom? Giving an absolute path then would be rather excessive. In that case, you would probably say:

> Go in the first door to the right. That is the guest bathroom.

This is a "relative" path. You are giving your friend direction to a room *relative* to where they currently are.

Applying these concepts to the filesystem, let's say that we are currently in our home directory, whose path is:

```
/Users/john/
```

If we wanted to point to the `Documents` directory in there, we could give the **absolute** path to it:

```
/Users/john/Documents
```

Or we could use the **relative** path:

```
Documents
```

Because we are in `/Users/john`, both these paths point to the same `Documents` directory.

Remember that:

- The **absolute** path will tell you where you are according to the root of the filesystem. It will *not* change, because the root of the filesystem will always be in the same place.
- The **relative** path *will* change depending on your current location. It changes because your current location within the filesystem will change as you move around it.

## The Home Directory

In the previous example, we mentioned a "home" directory. Every user on a UNIX based computer has a home directory. This is a place where that user can store their personal files and settings. In Linux, users' home directories are typically stored inside of `/home`. The home directory for a user named `steve` would be:

```
/home/steve
```

Mac OS X does things a little bit differently. The home directory on your laptop is inside of `/Users`. If your username is `billy`, then your home directory would be:

```
/Users/billy
```

In either case though, you will use your home directory a lot. In fact, you refer to it so often, that people developed a shortcut for it: `~`. The `~` points to your home directory, on whatever system you are on, no matter what your username is. So, a path like the following:

```
~/Movies
```

refers to a directory called `Movies` inside of your home directory.
