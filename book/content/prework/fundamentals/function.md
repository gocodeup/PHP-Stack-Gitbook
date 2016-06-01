# Functions

Throughout our examples, we have tried to use relatively clear and simple english to describe the steps for building an awesome sandwich. Many of these instructions really have some subtle steps built into them&mdash;steps that you and I as human beings probably understand, but which a computer may not. Consider the process of getting a slice of bread. You have to open the pantry, unwrap the loaf of bread, take out however many slices you need, rewrap the loaf, and then close the pantry. Imagine if we had to write out all of these steps for each slice of bread we needed. For a regular sandwich that might not seem like that big of a deal, but what about a club? Or, heaven forbid, a [dagwood][dagwood-img]? At this point you could probably use a function or two.

When the computer reads our program, it will follow all of our instructions in order, top to bottom. A function is a way of taking a subset of those instructions out of that flow. We take some steps in our process, give them a name, and then tell the computer "only do these steps when I say their name." This means that if we have some repeated series of instructions that get used over and over again, we can take them out of the main portion of our program and replace them with a shorter and simpler call to the function. Going back to our original example, we could create a function similar to:

> the `function` grab bread `is to`
>> open the pantry
>>
>> unwrap the loaf
>>
>> take out a piece of bread
>>
>> rewrap the loaf
>>
>> close the pantry
>>
>> `return with` the piece

Now in our main program, we can tell the computer to "grab bread" and it will follow our instructions as if they were inserted right where the function was called. Notice the last step in our function. Many functions will have what is called a "return statement." This tells the computer that we want something to come back from the function (in this case, the slice of bread).

Remember the very beginning of this section though? We did not have just one generic kind of bread; there were many different types! How does our function know what kind of bread to pick? The answer is that we need a way to tell it what kind. In essence, we need a variable in our function that we can fill in with some value when it is called. This is called "passing" a variable; the value is given (or "passed") to the function. Now our function may look something like this:

> the `function` grab **bread** `is to`
>> open the pantry
>>
>> unwrap the loaf of **bread**
>>
>> take out a piece
>>
>> rewrap the loaf of **bread**
>>
>> close the pantry
>>
>> `return with` the piece

The text in **bold** is now a variable (**bread**) So when we call this function, our program will unwrap whatever kind of bread we instruct it to. These variables&mdash;that are defined in our function but filled in when it is called&mdash;are called "parameters." A function can actually define as many parameters as it needs. For example, right now this function will only grab one slice each time it is called. Instead, what if we added second parameter that dictated how many slices to get? This seems like a great opportunity to use a loop as well!

> the `function` grab **slices** of **bread** `is to`
>> open the pantry
>>
>> unwrap the loaf of **bread**
>>
>> `continue` taking out pieces `until` there are **slices**
>>
>> rewrap the loaf of **bread**
>>
>> close the pantry
>>
>> `return with` the pieces

We might now be able to call the function in our main code in the following manner:

> grab *2* **slices** of *rye* **bread**

When reading that instruction, the computer now knows to follow all the steps in our function, replacing the parameter variables with whatever value we have passed.

Again, we have only started to scratch the surface on this topic, but that is ok. There is so much power and complexity to functions, and they are by far the most complicated concept we are covering in this introductory material. By the time you make your way through Codeup however, you will be a function writing maven! At this point though, you should understand that

- Programs are a set of step by step instructions for a computer to follow
- A variable is a way to store some value for later use
- An if statement is a way for the computer to decide whether or not to read some instruction(s)
- A loop allows the computer to do a set of instructions over and over again until some condition is met
- A function is a set of instruction we can set off to the side for the computer to run separately by calling its name

Codeup will cover the specifics of each of these items in turn and go in depth into how to use them and what they can do. Until then, we look forward to seeing you in class!

[dagwood-img]: http://commons.wikimedia.org/wiki/File:Dagwood_sandwich.jpg#mediaviewer/File:Dagwood_sandwich.jpg
