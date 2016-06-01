# Boolean Logic

## How Do Computers Make Decisions?

Boolean logic provides the foundation for decision making in computers. This means that the computer will make decisions based on combinations of true or false values.

In our early examples, we will use something called pseudocode. Pseudocode is an informal description of computer instructions that will be easy for someone unfamiliar with programming to read.

### Conditionals

In the very simplest case of a conditional, we can tell the computer to take an action if something is true.

Let's take the following example:

> If it is dark, then turn on the street light.

Seems simple enough. Based on a true or false value, whether or not it is dark, we will make a decision and take action. We can take this a little further and say:

> If it is dark, then turn on the street light. Otherwise turn off the street light.

Here, we will take action whether it is dark or not.

### Comparisons

We can also make comparisons that result in a true or false value to make decisions:

> If my car has less than 1 gallon of fuel, then turn on the low fuel light.


### Combining Logical Conditions

Finally, we can combine multiple conditions to make a decision:

> If it is past noon and I haven't eaten lunch, then remind me to eat lunch.

When combining conditions, the following rules apply:

```
false and false = false
false and true  = false
true  and false = false
true  and true  = true

false or false = false
false or true  = true
true  or false = true
true  or true  = true
```

### Optimizing Combined Conditions

It is also useful to know that when processing logical combinations you should try to order the conditions so that the computer can make a decision without considering all the options. For example:

> If I win the lottery or it rains, then I will buy a new car.

Since we are using an `or` condition, we can see that any `true` value in the sequence will produce a `true` result. Therefore, the condition **most likely to be true** should be placed first. So the previous example would be more efficient if it were re-worded to:

> If it rains or I win the lottery, then I will buy a new car.

Unless you live in a place where it never rains, then the re-worded statement is a better choice. If we are combining conditions with the word `and`, we can also optimize the statement. Using the first example again:

> If I win the lottery and it rains, then I will buy a new car.

In the case of `and`, you should put the condition most likely to be `false` first, because any `false` value in the statement will produce a `false` result and the computer won't even have to bother looking at the rest of the conditions. The prospect of a new car isn't looking too good, is it?

### Inverting Conditions

What if we want to do something when a condition is `false`? Well, we can simply use the word `not` to change the statement. For example:

> If it is not Sunday, then go to work.

### Logical Operators

So far, we have just been using pseudocode in our examples. The actual operators/words/symbols used in programming languages to perform logical operations differ from language to language. Here are the most commonly used operators:

```
and      &&
or       ||
not      !
```

Some languages simply use the words `and`, `or`, and `not`. Some support both the symbols shown above and the words. Be careful though, when both are supported they sometimes don't act the same because of something called operator precedence. Now that you know the terminology though, it will be easy to google "operator precedence" or "logical operators" for the language you are working with to see just want you need to do.

### Comparison Operators

Here are some of the most commonly used operators for comparing values:

```
equal to                    ==
not equal to                !=
greater than                >
less than                   <
greater than or equal to    >=
less than or equal to       <=
```

There are others, but we will get to them later. Also, remember that these differ between languages, so just google "comparison operators" for the language you are using to find the list. Even seasoned programmers have to do this from time to time when learning a new language or switching between many different languages on assignments.

