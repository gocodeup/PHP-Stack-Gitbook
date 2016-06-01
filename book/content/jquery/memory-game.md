# Concentration Game

Now that you have built one game, we are going further practice our skills by&hellip;creating a second game! This time you will create the card game [Concentration](https://en.wikipedia.org/wiki/Concentration_%28game%29). Your page will display a grid of facedown cards randomly arranged. Whenever a user clicks on a card it will flip over showing its face. When the user clicks a second card, if they are the same then the cards will stay up and the user can look for an additional pair. If the cards were different then both flip back face down. The game continues until the user has found all the pairs.

Below is a video showing a sample of the gameplay.

{%youtube%}4XV_ajErFxo{%endyoutube%}
> After finding a match the pair of cards should stay face up, rather than flipping back over

## Project

Just like before we are going to be creating a dedicated site and git repository for this project.

### Setup

1. Create your new repository on GitHub, name it `Concentration-Game`.
1. Navigate to `~/vagrant-lamp` in the terminal and run:
    ```bash
    ansible-playbook ansible/playbooks/vagrant/site/static.yml
    ```
    Use `concentration.dev` as the domain name.
1. Edit your hosts file with the command:
    ```bash
    subl /etc/hosts
    ```
    Add the following to the end of the file:

        192.168.77.77 concentration.dev
1. Change to the directory `~/vagrant-lamp/sites/concentration.dev` and create your local repository with `git init`.
1. Add your new GitHub repository as the `origin` remote.

### Building the Game

1. Create your directory structure and `index.html`.
1. Start by building a basic layout with just four cards.
1. Build the code to have a single card flip over when it is clicked. For testing, make the card flip back when it is clicked a second time.
1. Start adding the logic to check if two flipped cards match. If they do not, flip them back face down. If they do, make sure they do not get changed again.
1. Create code to make sure the card positions are randomized when the game starts up.
1. Expand your game to have additional cards. Add some kind of "theme" to your game. Be creative with how your game looks or how it plays.
1. Above all else, have fun with this project!


