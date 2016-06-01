# Whack-A-Mole

[http://en.wikipedia.org/wiki/Whac-A-Mole](http://en.wikipedia.org/wiki/Whac-A-Mole) is a popular game created in the 1970s.  The game randomly has plastic (or wooden) moles pop out of holes, and the object of the game is to hit the moles and have them go back in their hole.

## Building Whack-A-Mole

We will be building an online version of the Whack-A-Mole game using HTML, CSS, and jQuery.

To see a sample game in action, view the following video:

{%youtube%}IlQs7uzULs0{%endyoutube%}

First, we must setup a new local site in our vagrant environment.

1. From within the `~/vagrant-lamp` directory on your Mac, run the following command: `ansible-playbook ansible/playbooks/vagrant/site/static.yml`. Use `whackamole.dev` as the domain name.
1. Edit your host file with: `subl /etc/hosts`. Add another line with `192.168.77.77 whackamole.dev `
1. Inside your new `whackamole.dev` directory execute `git init`.
1. Create your remote repository on GitHub, call it `Whack-a-Mole` and add it as your remote origin.
1. Create a file inside of `public` called `index.html`, this will be where your game will be written.

To build this game, follow these steps:

1. Create your HTML markup and CSS to position your holes.  These will be element that your mole will pop in and out of.
1. Randomly select a hole on page load and change its background color to red. You may want to nest another element, and use an animated method like `.fadeIn()`.
1. Change the red background to use an image.  This could be a mole, or any other image you'd like to use.
1. Update the code to remove the mole when it is clicked.
1. Add score.  Each time the mole is successfully clicked, increase the displayed score by 1.

### Bonus

1. Add a start button.  Don't start the game until the button is pressed.

1. Add a timer. Only allow clicks during the period.  If the timer is 30 seconds, the game should quit recording clicks after 30 seconds, and should activate the start button.  Clicking the start button should reset the game.

1. Keep the high score for the round.  This does not need to persist between page loads, although it could if you wanted it to.

1. Make the moles appear more often after each click.
