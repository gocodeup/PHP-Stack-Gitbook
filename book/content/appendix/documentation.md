# Documentation

Documentation of your program is not only an effective way to add clarity and readability to your code, it is also an expectation of programmers everywhere. Whether you are providing useful, and meaningful `README.md` files, or including DocBlocks in your source code - or simply writing guide to the touch points within your API; documentation can be one of the most pressing concerns for new software developers.

In this section we will be discussing some options on how best to document your code, write expressive `README.md` files, and detail the tools that you have created.

## README.md

    “Say what you mean, simply and directly.” - Brian Kernighan

A good `README.md` file should orient a new user to the directory and point to more detailed explanations of your application and perhaps offer a user guide. This means that a good Readme file should include descriptions of your application design, it's intentions as an application, and it's API access points - if any. These descriptions should be simply defined and contain useful, clear information spanning the expanse of your codes usefulness.

Given the shifts in development mentalities over the years documentation has grown to be considered an inconvenience by some, and even unnecessary by others. But the truth is that documentation is likely the most important part of your code. Utilizing a Readme file correctly can illuminate the best parts of your code and even offer you a guide to develop your application.

Tom Preston-Werner, co-founder of GitHub, wrote a beautiful [article](http://tom.preston-werner.com/2010/08/23/readme-driven-development.html) about using a `README.md` file as a guide to developing your applications. In it, he asserts that beginning your development process by writing your plans and ideas out in the form of a Readme file can not only allow for the unimpeded flow of creative ideas regarding your project, but also allow you to effectively work on a team when building larger projects; it can also encourage open debate around seemingly concrete ideas. This can allow everyone on the team to contribute to the initial design discussions regarding your application, and even offer you insight into your own project, as you can face the challenges of production with the confidence and excitement we all feel at the start of a new project.

    "Consider the process of writing the Readme for your project as the true act of creation.
    This is where all your brilliant ideas should be expressed. This document should stand on
    its own as a testament to your creativity and expressiveness. The Readme should be the
    single most important document in your codebase; writing it first is the proper thing
    to do." - Tom Preston-Werner

### Examples of README.md Files

1. [Jeffrey Way](https://github.com/JeffreyWay/Laravel-4-Generators) - Generators in Laravel 4
1. [Ben Batschelet](https://github.com/bbatsche/entrust/tree/2.1.0-beta.4) - Entrust User Permissions in Laravel 4
1. [Emerson Media](https://github.com/esensi/model) - Esensi Model Trait Package for Laravel 4

## PHPDocs & DocBlocks

PHPDocs is a tool utilized to help document your code from the source, allowing you to expose your API, and describe the functionality and control elements within your application. This will allow you to define, in clear detail, all of the different interactions within your application and simplify any complexity within your code. Below we will be exploring the format and anatomy of PHPDocs and DocBlocks. 

[PHPDoc](https://github.com/phpDocumentor/fig-standards/blob/master/proposed/phpdoc.md) is a section of documentation which provides information on aspects of a "Structural Element".
_Note: It is important to note that a PHPDoc and a DocBlock are two separate entities. The DocBlock is the combination of a DocComment, which is a type of comment, and a PHPDoc entity. It is the PHPDoc entity that contains the syntax as described in this specification such as the description and tags._

[Structural Elements](http://www.phpdoc.org/docs/latest/glossary.html#term-structural-elements) are a collection of programming constructs that should be preceded by DocBlocks.
_Note: It is recommended that these structures should be given a DocBlock where it is defined and not with each individual usage of the structure. Meaning that the implementation of functions, methods, classes, etc. **DO NOT** need to be preceded with DocBlocks. Instead, DocBlocks should be utilized at the point of definition of these structures._

They include:
    
* namespaces
* require(_once)
* include(_once)
* classes
* interfaces
* traits
* functions (including methods)
* properties
* constants
* variables, both local and global

### DocBlocks Formatting

As expressed above, PHPDocs and DocBlocks are two separate entities. The DocBlock is the outcome of a DocComment combined with a PHPDoc definition. A DocBlock consists of opening syntax and closing syntax - similar to a comment or multi-lined comment in PHP - as well as three primary parts; A required summary, a description of the Structural Elements, and any appropriate tags. We will take a closer look at this soon, so do not feel overwhelmed. We have discussed a bit about what PHPDocs are and what DocBlocks are. Now let's take a look at what a DocComment is.

#### DocComments

A DocComment is a special type of comment which must start with the character sequence `/**` followed by a whitespace character. It must also end with the character sequence `*/` and have zero or more lines in between the opening and closing character sequences. In the case that a DocComment spans multiple lines, every new line must start with an asterisk (`*`) and should be aligned with the first asterisk of the opening clause.

Single line example:

    /** <...> */

Multiline example:

    /**
     * <...>
     */

Okay, that was pretty simple right? 

#### DocBlock Examples

Now let's look at a series of DocBlocks:    

~~~php
<?php
    /**
     * This is a file-level DocComment
     */

    /**
     * This class acts as an example on where to position DocBlocks.
     */
    class Foo
    {
        /** @var string|null $title contains a title for the Foo with a maximum length of 24 characters */
        protected $title = null;

        /**
         * Sets a single-line title.
         *
         * @param string $title A text with a maximum of 24 characters.
         *
         * @return void
         */
        public function setTitle($title)
        {
            // there should be no DocBlock here
            $this->title = $title;
        }
    }
?>
~~~

#### Principles of a DocBlock

Here are the basic principles to keep in mind when creating DocBlocks:

1. A PHPDoc must be contained in a DocComment - those special comment character sequences from above; the combination of these two is called a "DocBlock".
1. A DocBlock must directly precede a "Structural Element".
    1. There is one exception to this principle called a File-level DocBlock. We will take a closer look at this specific type of DocBlock later, but for now, just know that this type of DocBlock belongs at the top of your PHP source code, just under the PHP tag (`<?php`).
1. A Summary is required in your DocBlock.
    1. A Summary must contain abstract information about the "Structural Element" it is detailing, defining the purpose of the element.
    1. It is recommended for Summaries to span a single line or at most two but not more than that.
    1. A Summary must end with either a full stop (.) followed by a line break or with two sequential line breaks.
    i. Because a Summary is comparable to a chapter title it is beneficial to use as little formatting as possible when creating them. This means it is not necessary nor recommended to use a mark-up language to format them.
1. A Description is optional for your DocBlock, but its use is encouraged when the "Structural Element" it is describing contains more operations, or more complex operations, than can be described in the Summary alone.
    1. Any application parsing the Description is recommended to support the Markdown mark-up language for this field so that it is possible for the author to provide formatting and a clear way of representing code examples.
    1. Common uses for the Description are (amongst others):
        * To provide more detail than the Summary on what this method does.
        * To specify of what child elements an input or output array, or object, is composed.
        * To provide a set of common use cases or scenarios in which the "Structural Element" may be applied.
1. A Tag  provides us a way for an author to supply concise meta-data regarding the "Structural Element" it precedes. 
    1. Each tag starts on a new line, followed by an at-sign (@) and a tag-name followed by white-space and meta-data (including a description). 
        * e.g.: `/** @var string This is a description */`
    1. If meta-data is provided, it may span multiple lines and could follow a strict format, and as such provide parameters, as dictated by the type of tag. The type of the tag can be derived from its name.
        * e.g.: `@param string $argument1 This is a parameter.` - This tag consists of a name ('`@param`') and meta-data ('`string $argument1 This is a parameter.`') where the meta-data is split into a "Type" ('`string`'), variable name ('`$argument1`') and description ('`This is a parameter`').
    1. The description of a tag must support Markdown as a formatting language. Due to the nature of Markdown it is legal to start the description of the tag on the same or the subsequent line and interpret it in the same way. So the following tags are semantically identical:
        * ~~~php
            /**
             * @var string This is a description.
             * @var string This is a
             *    description.
             * @var string
             *    This is a description.
             */
        ~~~

#### DocBlock Resources

1. [PHPDocumentor Documentation](https://github.com/phpDocumentor/fig-standards/blob/master/proposed/phpdoc.md#51-summary)
1. [PHPDoc Documentation](http://www.phpdoc.org/docs/latest/guides/docblocks.html)
1. [PHPDoc Cheatsheet](http://phpdoc2cheatsheet.com/)