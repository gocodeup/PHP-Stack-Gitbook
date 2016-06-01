# Hangman Game

We are going to use all the technologies we have learned so far to build ourselves a game! Our goal is to build the classic game of [hangman](https://en.wikipedia.org/wiki/Hangman_%28game%29). This is an opportunity for you to experiment and practice your skills with HTML, CSS, JavaScript, and jQuery. This is also a chance to show your creative side, whether it is creating a custom layout designed with CSS, or designing unique game logic; make your game into something that will express your individuality.

The game will begin by picking a random word and displaying a series of blanks for each letter in the word. To play, the user will guess a letter they think might be in the word by typing it on their keyboard. Your game will determine what letter was pressed and whether or not it was correct. If the user was right, the letter will be displayed in the appropriate blank-space(s). If the user was wrong, the letter will be added to a field for "incorrect" guesses, and part of a hanging man is revealed. The game is over when the user has either guessed the complete word, or the entire man is shown and the user is out of guesses. At that point, the user may choose to start a new game and the process repeats.

To help you hit the ground running, we have created a template JavaScript file. In this file we have provided a `Hangman` object with several methods and properties. These methods are just stubs however; there is nothing in them! It is up to you to fill out the body of these methods and make your game work. Some methods could be as short as one line, some will be much longer. The method stubs we created are the ones we predict will be the most common to build this game, however we could be wrong! Depending on how your game works, you may not use some functions entirely, or you could create new ones of your own. The method stubs are just a starting point.

## Project

Because this is a larger project, we want it to stand on its own and not get mixed in with the rest of our exercises. To accomplish this, we are going to create a new site in our development environment and a new repository on GitHub. This will help our games stand out to potential employers and help keep all our projects and exercises organized.

### Create a Site and Repository

1. Navigate to GitHub and click the [New Repository button](https://github.com/new).
1. Name your repository `Hangman-Game`. As before, leave the rest of the options at their default. Make a note of the URL for your repository; we will need it momentarily.
1. Open your terminal and navigate to `~/vagrant-lamp` with the following command:
    ```bash
    cd ~/vagrant-lamp
    ```
1. To manage our sites we use a utility called [Ansible](http://www.ansible.com). We have provided multiple "playbooks" that do various things in our development environment, from creating sites using different languages to managing databases. To create a new site, we will need to run the following command:
    ```bash
    ansible-playbook ansible/playbooks/vagrant/site/static.yml
    ```
    You will be prompted for a new domain name for your site. Type in `hangman.dev` and hit "Return".
1. Ansible will create the folder `hangman.dev` in your `sites` directory and a `public` directory inside of it. It will also configure our web server to properly serve files in `hangman.dev`.
1. With our server all set up, we still need to tell our Macs how to find `hangman.dev`. To do this, we will edit our `hosts` file. This is a file your computer uses to help it find sites without using [DNS](https://en.wikipedia.org/wiki/Domain_Name_System). Open your `hosts` file in SublimeText using the following:
    ```bash
    subl /etc/hosts
    ```
    Add a new line to the end of the file:

        192.168.77.77 hangman.dev

    Save your changes and close the file. You will be asked for your computer's password upon saving.
1. Move into your `hangman.dev` folder with `cd ~/vagrant-lamp/hangman.dev` and create your git repository using `git init`.
1. Follow the instructions on GitHub to add the `origin` remote to your new local repository.

### Build Your Game

1. In your new `hangman.dev`'s public directory create folders for `css` and `js`.
1. Download the [`hangman.js`](../examples/javascript/hangman.js) file and put it in the `js` directory.
1. Create `index.html` inside of `public`. Fill out a basic HTML structure and include `hangman.js` in a `<script>` tag.
1. Go to http://hangman.dev and make sure your new `index.html` page comes up.
1. Begin filling in the rest of the functions in `hangman.js` and start building your game!
