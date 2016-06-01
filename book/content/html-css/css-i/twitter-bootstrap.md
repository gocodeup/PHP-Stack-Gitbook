# Twitter Bootstrap

Twitter Bootstrap is a front-end framework that provides CSS styling along with some JavaScript components. It allows you to build responsive web pages quickly and easily, and it is a great starting point for web application development. The documentation for Twitter Bootstrap is excellent, providing easy to follow examples. We will be discussing how to download, install, and begin using Twitter Bootstrap in this lesson.

## Twitter Bootstrap Setup

There are two primary ways to setup Twitter Bootstrap with your project. The first is to go to the homepage and download the zip file. You can then place the files on your server and link to them in your HTML. The alternative to this is using Twitter Bootstrap code that is hosted on a Content Delivery Network (CDN).

### Downloading Twitter Bootstrap

To download Twitter Bootstrap, go to [http://getbootstrap.com/](http://getbootstrap.com/). Next, locate and download the "compiled and minified CSS, JavaScript, and fonts" version.

Once downloaded, extract the zip file. It will contain 3 folders: css, fonts, and js. Place these folders in your web root `~/vagrant-lamp/sites/codeup.dev/public`. Once you have the downloaded files in the proper location, add the code below to the head of your HTML document.

```html
<link rel="stylesheet" href="/css/bootstrap.min.css">
<script src="/js/bootstrap.min.js"></script>
```

You can now use Twitter Bootstrap styles and components in your web page.

### Including Twitter Bootstrap from a CDN

Including Twitter Bootstrap from a CDN is very easy, and it actually has some benefits over hosting it from your own server. First of all, any bandwidth used for downloading the css files will not come from your server, so your overall server load will be decreased. Also, since the Twitter Bootstrap files from the CDN are used on many sites, it is much more likely that they will be cached in any given users web browser. This means that your page load time will be decreased. The main disadvantage of using a CDN is lack of control. For example, if the CDN server goes down, any users viewing your site will not see any of the page styles resulting in a bad user experience.

Okay, now that we know the pros and cons, let us see how to include Twitter Bootstrap from a CDN:

```html
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
```

Just place the lines above in the `head` of your HTML page. This will give you access to Twitter Bootstrap version 3.1.1 compliments of netdna.bootstrapcdn.com. Wow, that really was easy!

## Getting Started with Twitter Bootstrap

A great way to start out using Twitter Bootstrap is by viewing and/or using the code found in the getting-started examples found here: [http://getbootstrap.com/getting-started/#examples](http://getbootstrap.com/getting-started/#examples). As mentioned earlier, the documentation is quite good and you can also simply paste the examples in your HTML to try them out.

## Additional Resources

- [Bootsnip](http://bootsnipp.com/) for Bootstrap code snippets and User Interface UI goodies
- [Bootswatch](http://bootswatch.com/) to see how versatile Bootstrap can be when overwritten
- [Start Bootstrap](http://startbootstrap.com/) to see and use complete Bootstrap themes
- [W3 Schools Bootstrap Tutorials](http://www.w3schools.com/bootstrap) for further documentation and explanation.

## Exercises

For this lesson, perform the following tasks:

1. Create three new HTML files within the `~/vagrant-lamp/sites/codeup.dev/public` folder on your Mac. Name them `welcome.php`, `resume.php`, and `portfolio.php`. The HTML and CSS that you create for these pages will be used on your own personal page
1. As you build each page, keep a mind for shared HTML and CSS that each page will have in common. Footers, menus, and navigation bars are good candidates. Tie together the design elements and reusable code between `welcome.php`, `resume.php`, and `portfolio.php` so that you have a consistent presentation and coherent look across each page. Find and implement elements and designs that work together and flow well.
1. Using [http://getbootstrap.com/getting-started/#examples](Bootstrap Examples) and other Bootstrap resources, craft your `welcome.php` page so that its inviting and engaging. `welcome.php` should be a splash page or a welcome page. Use this opportunity to make your welcome page shine like a diamond!
1. Craft a `resume.php` page that reads like a professional "about me" page. It should answer interview-like questions such as "Why did you decide to become a software developer?", "What technical skills are you learning and have you already learned", "Demonstrate your professional background and approach". Take the time to make your `resume.php` something unique, interactive, and succinct.
1. Make your `portfolio.php` page such that it will present a layout of your future projects. Use placeholder images and lorem ipsum text as necessary in order to create the structure and presentation for the page that will feature all of your projects created at Codeup and beyond! This will be a page that you'll revisit often in order to add your new content and feature your projects.
1. Make sure that you have links between each page. View the results in your browser to test for the expected output.

Great work! Our next exercises will go into further depth and have you build more re-usable code for later!
