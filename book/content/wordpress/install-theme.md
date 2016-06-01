# Install a WordPress Themes

WordPress has a huge number of [themes](https://wordpress.org/themes) available. Many of these themes are free, but others are sold as premium products. They may even include plugins you will need for them to function properly.

## Lets Find a Theme

We are going to be sticking with a free theme for our lesson. [Mobile Friendly](https://wordpress.org/themes/mobile-friendly) is the theme we are going to use for our example, so go ahead and download it.

## Move the Downloaded Theme

Once downloaded, unzip the contents of the file by double clicking on the zip file. Next move the whole folder `mobile-friendly` to the `~/vagrant-lamp/sites/myblog.dev/public/wp-content/themes` folder. Your themes folder should now have a folder called `mobile-friendly` inside of it along with the default themes that came with the WordPress install.

## Install the Theme

After the folder is in the correct location, go to the admin dashboard area in WordPress. Select `Appearance > Themes` from the menu on the left and you will see your new theme's screenshot. You can preview your new theme and activate it when you are ready. Once you activate the theme you can now go the to home page and view your changes.

## Theme Caution

As mentioned before, some themes will require additional plugins for them to work correctly. Some themes also come with plugins that do content building which can sometimes get confusing. They will give you most of what you need to edit the theme, insert content, or insert html without you having to know any code. For a regular user this can be very helpful but for a developer it can be a bit of an obstacle to get around. Also some of the premium themes may come with an XML file that gives you settings and fake data to load at first. After that install then you can trim out what you do not need. Just always remember, if one theme and/or plugin does not work, there are always more to choose from.

## Exercise

1. Search for a new free theme and install it.
1. Add a test blog post and view your results.
1. Add a page to WordPress and view your results in the browser.
1. Open the theme directory file starting with the `index.php`. Read the code for this and start looking at some of the other files in the directory.
