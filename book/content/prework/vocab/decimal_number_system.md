# Numbering Systems

## Decimal Number System

The number system we all use is called the decimal number system. The decimal system is also referred to as base 10, which comes from the Latin word decimus, meaning tenth.

Mathematically, what does base 10 actually mean? Let's take a decimal number like `123` as an example. In the ones place there is a `3`, in the tens place there is a `2`, and in the hundreds place there is a `1`. The number `123` can actually be written in the following way:

    (3 * 10^0) + (2 * 10^1) + (1 * 10^2) = 123

This is probably a review, but understanding this will help you to more easily grasp the other number systems that are used in computing.

## Binary Number System

Computers do not use the decimal system to count; instead, they use the binary number system. The word binary means composed of two parts. Think of a switch that is either off or on. A binary number can be either `0` or `1`, `off` or `on`.

We will use `1111011` as an example of a binary number. Believe it or not, in decimal, that number is equivalent to `123`. Since the binary system can only be one of two values, it is base 2. In the same way we broke down the decimal number `123` above, let's break down our example binary number.

    (1 * 2^0) + (1 * 2^1) + (0 * 2^2) + (1 * 2^3) + (1 * 2^4) + (1 * 2^5) + (1 * 2^6) = 123

Your understanding of binary is pretty important because all sorts of programming ideas depend on it. After all, your entire hard drive is filled with `0`s and `1`s. We will get into this more when we talk about bits and bytes.

## Hexadecimal Number System

Another common number system used in computing is the hexadecimal number system. Hexadecimal numbers are base 16 and are represented using the numbers `0-9` and the letters `A-F`.

Counting in hexadecimal goes like this:

    1, 2, 3, 4, 5, 6, 7, 8, 9, A, B, C, D, E, F, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 1A, 1B, 1C, 1D, 1E, 1F, 20... FF, 100, 101, 102...

As you can see, the numbers stop at 9 and then use letters up until the sixth letter of the alphabet: `F`.

We normally use the hexadecimal system when we are using colors in HTML and CSS. Web browsers, like Google Chrome, Mozilla Firefox, Internet Explorer, and Safari, use the color hex codes to render spcecific colors. For example, to make something the color black using HTML and CSS, you would use the hex code #000000 <span style="background-color:#000; border:1px solid #000; text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>. To make something white, you would use #FFFFFF <span style="background-color:#FFF; border:1px solid #000; text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>.

The browsers use the three primary colors and mix them to make other colors, as well. Red is represented as #FF0000 <span style="background-color:#F00; border:1px solid #000; text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>, green as #00FF00 <span style="background-color:#0F0; border:1px solid #000; text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>, and blue as #0000FF <span style="background-color:#00F; border:1px solid #000; text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>. You can also use a combination of those colors to create others, such as creating a golden orange: #FFAA33 <span style="background-color:#FA3; border:1px solid #000; text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>.

## Take Action!

After completing the reading for this module, please perform the following exercises:

- Learn to count to 15 in binary (write it out!).
- Convert the number 321 from decimal to binary.
- Why is the hexadecimal number system is used in computing?
- Convert the number 321 from decimal to hexadecimal.

**Fun fact**:

> There are 10 types of people in this world. Those who understand binary, and those who don't.

_hint: 10 is 2 in binary._

Consider yourself in the know!
