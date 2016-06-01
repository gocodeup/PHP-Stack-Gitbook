# Simple Simon Game

Simple Simon is a game with 4 colors that play randomly and continue to add one color to the sequence at each turn. You must then select the correct order back to the game for as many rounds as you can. Please view the video below to see how it works:

{%youtube%}6Wk7fT6vNEA?{%endyoutube%}

## Setup

First, we must setup a new local site in our vagrant environment.

1. From within the `~/vagrant-lamp` directory on your Mac, run the following command:

    ```bash
    ansible-playbook ansible/playbooks/vagrant/site/static.yml
    ```

1. Name your new site `simplesimon.dev`.
1. Edit your hosts file by running `subl /etc/hosts`. Add a new entry for your site that looks like the following:

    ```
    192.168.77.77 simplesimon.dev
    ```

1. Inside your new `sites/simplesimon.dev` directory execute `git init`.
1. Create your remote repository on GitHub, call it `Simple-Simon` and add it as your remote origin.
1. Create a file inside of `sites/simplesimon.dev/public` called `index.html`, this will be where your game will be written.

## Steps

To build this game, follow these steps:

1. Create your HTML markup and CSS to position your square or shape.  These will be the colors that are randomly selected for the game.
1. Randomly select a square and fade that color in then out.
1. Allow the user to click on the square that was selected.
1. Continue randomly selecting colored square/shapes adding the new random selection to be added to the previous selection. Eventually you will end up with a random sequence of selected colors.
1. Each time a new color is added to the sequence allow the user to enter (click) the sequence in the order as it was played.
1. If the user continues to get the order correct then proceed to adding another color to the collection until the user gets the order incorrectly.
1. Keep track of how many rounds the user is able to go.
