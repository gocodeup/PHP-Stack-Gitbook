# Introduction to the CLI

In this section we will introduce some basic command-line concepts and get ourselves familiar with the interface. The command-line interface only interprets text commands. There are no buttons, or icons, or any point-and-click interaction whatsoever. Because of this, understanding what commands are available to you and how to use them is very important.

In order to access the command-line interface, you will need a terminal application. Your Mac came with a terminal application preinstalled, called Terminal.app. It is installed in your Applications folder, inside of Utilities. For the course however, we will be using a third party program called iTerm. iTerm can be downloaded and installed for free from [their website](http://iterm2.com).

## The Prompt

After you open either Terminal.app or iTerm, you should see a prompt. A prompt is just that: it prompts you, the user, for some input. The input you provide is a text-based command or series of commands to accomplish a desired goal. All the commands you type in will be prefixed by this prompt automatically. Your prompt should look something like:

```
Users-MacBook-Air:~ user$
```

The first part of this prompt the hostname, or the name of the machine you are working on currently. In this example it is `Users-MacBook-Air`. After that is a `:` and then the current working directory. In our example, the current working directory is `~`. We will cover your computer's directory structure, and what the `~` actually means in a later part of this section. The last part is your username, in our case it is `user`. Once again, your hostname and username will appear differently depending on your machine's configuration.

## Issuing Commands

Most text-based commands follow a set pattern. First you type out the actual command you would like to run. After that you type out whatever arguments that command needs. You separate the command and each of the arguments with just spaces. For this reason, most commands are single words all together, and in class we will try to avoid putting spaces in file names. Once we have a complete command typed out, in order to issue it to the computer we just press the `Return` or `Enter` key.

## BASH

The software which powers this prompt is called [BASH][wiki-bash]. BASH is started for you automatically as soon as you open your terminal, and will continue running in the background until you close the window. You can think of it as kind of like the Finder and the Dock for the command line (or Windows Explorer and the Start menu for those of you coming from the dark side). Let's start our exploration of the command line by finding out what version of BASH we are using. The command to do that is:

```
bash --version
```

Go ahead and type that in at your prompt, it should look something like this:

```
Users-MacBook-Air:~ user$ bash --version
```

Once that is done hit enter. You should see output printed to the window:

```
GNU bash, version 3.2.51(1)-release (x86_64-apple-darwin13)
Copyright (C) 2007 Free Software Foundation, Inc.
```

And after that, another prompt just like before. We provided BASH some input, it interpreted our command, gave us back some output, and now it is waiting for us to give it some more.

## The `$` Symbol

There was a last part of the prompt we didn't discuss: the `$` at the end. By convention this is there to let you know you are logged in as a regular user, as opposed to a superuser or "root". Remember though that the rest of the prompt will change depending on what your computer is named, what your username is, and even what directory you are currently in. Since the `$` is relatively constant, it is typically used to indicate commands to be typed into a prompt. So in future examples, rather than seeing:

```
Users-MacBook-Air:~ user$ bash --version
```

we will be using:

```
$ bash --version
```

[wiki-bash]: http://en.wikipedia.org/wiki/Bash_(Unix_shell)
