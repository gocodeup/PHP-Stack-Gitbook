# Programming Languages

## How Does a Computer Understand a Programming Language?

Up to this point, we have learned the basics about how computers store data and make decisions, but how do computers know so many languages? Well, when it comes right down to it, the CPU (Central Processing Unit), often called the processor, holds the official language of the computer known as its instruction set. Surprisingly enough, there are not all that many instructions. However, a combination of these core instructions, executed millions of times per second, can do some pretty amazing things.

Pretty cryptic stuff, right? You can actually write programs using the processors instruction set directly, but it is not easy.

### Low vs High Level Languages

When you get into programming, you may hear terms like *high level language* or *low level language*. Just remember that the closer you are to writing machine code using the processor instruction set, the lower the level of the language is. For example, Assembly language is a very low level language, and it often has a one-to-one mapping with the processor instruction set. The lower the level, the more granular the control you have over how things work, which in turn offers opportunities to improve the performance of your code.

As you get into high level languages like C#, Java, PHP, Ruby, JavaScript, etc., you will find that programming gets much easier. There are lots of layers below your code that provide helpers and support functionality. Occasionally, you may find a need to optimize a particular part of your code by stepping down to a lower level language, but for standard web applications this is almost never the case.  In most cases, your first task will be to get it working correctly and then worry about optimizing.

### Compiled and Interpreted Languages

Code will sometimes go through a step called compilation prior to being run. On the other hand, sometimes an interpreter will allow you to run the code as it is read. Both sides have their advantages and disadvantages. Compilers find some code errors even before running the code (compile-time errors). However, certain errors can only be detected at run-time (run-time errors).

The line between code requiring a compiler vs an interpreter were easier to draw in times past (based on programming language), but now, you will find that the same language may be interpreted OR compiled, depending upon the implementation. Do not fret; you really just need to understand the terms and know that they are different.

Another useful bit is that when you compile code, you generally compile it for a certain computer architecture and operating system. There are always exceptions, though. In the case of a language like Java, the code is compiled to something called intermediate language. The intermediate language is then run in a VM (virtual machine), and the VM has to be compiled specifically for each platform it runs on.

### Server-Side vs Client-Side Code

Let's talk about what the difference between server-side code and client side code is in web applications. First, when we say server, we are talking about a web server. Think of a computer running in a cold room somewhere far away. Any code running there will be server-side code. Web application code you write in PHP or Ruby would be an example of server-side code.

Client-side code is code that runs on the client. Who is the client you ask? Well, anyone that accesses a particular web site is a client of that web site. As a client, you use your web browser to access the web, so code running in your web browser on your computer is client-side code. An example of client side code is JavaScript.

### How Many Programming Languages Are There?

More than you ever want or need to know. Check out this list:

[All of the programming languages](http://en.wikipedia.org/wiki/List_of_programming_languages)

Seeing that list should make you feel good about choosing a school like Codeup to help you get on the right track learning just the things you need to know to build real software that solves real problems.

### Programming Methodologies

As you now know, there are a lot of programming languages out there. There are also a number of different programming methodologies. One methodology that is certainly worth knowing about is Agile development.

Here is a table from [Wikipedia](http://en.wikipedia.org/wiki/Agile_software_development#Adaptive_vs._Predictive) about three methodologies and how they differ from Agile development.

| Agile Methods | Plan-driven Methods | Formal Methods |
| -- | -- | -- |
| Low criticality | High criticality | Extreme criticality |
| Senior developers | Junior developers | Senior developers |
| Requirements change often | Requirements do not change often | Limited requirements, limited features |
| Small number of developers | Large number of developers | Requirements that can be modeled |
| Culture that responds to change | Culture that demands order | Extreme quality |

