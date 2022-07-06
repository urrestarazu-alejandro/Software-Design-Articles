# Code Smell 144 - Fungible Objects

![Code Smell 144 - Fungible Objects](andrey-metelev-yscrM1AOEKI-unsplash.jpg)

*We have heard a lot about NFTs. Now we master the Fungible concept*

> TL;DR: Respect the [MAPPER](Theory\What is (wrong with) software). Make fungible what is Fungible in real-world and vice-versa.

# Problems

- [Bijection](Theory\The One and Only Software Design Principle) Fault

- Over Design

# Solutions

1. Identify fungible elements on your domains

2. Model them as interchangeable

# Context

According to [Wikipedia](https://en.wikipedia.org/wiki/Fungibility)

> Fungibility is the property of a good or a commodity whose individual units are essentially interchangeable and each of whose parts is indistinguishable from another part.

In software, we can replace fungible objects with others.

When [mapping](Theory\What is (wrong with) software) our objects with real ones, we sometimes forget about the *partial* model and build over design. 


![Fungible Model](fungible.drawio.png) 

# Sample Code

## Wrong

[Gist Url]: # (https://gist.github.com/mcsee/3fc2c7089aa88088a73138ee6b62e675)
```java
public class Person implements Serializable {
    private final String firstName;
    private final String lastName;

    public Person(String firstName, String lastName) {
        this.firstName = firstName;
        this.lastName = lastName;
    }
}

shoppingQueueSystem.queue(new Person('John', 'Doe'));
```

## Right

[Gist Url]: # (https://gist.github.com/mcsee/97a8fd4467d51b6769f7ba63210dddee)
```java
public class Person  { 
} 

shoppingQueueSystem.queue(new Person());
// The identity is irrelevant for queue simulation 
```

# Detection

[X] Manual

This is a semantic smell.

We need to understand the model to check whether it is right or not.

# Tags

- Over Design

# Conclusion

Make fungible what is fungible and vice-versa.

Sounds easy but requires design skills and avoiding accidental complexity.

# Credits

Photo by [Andrey Metelev](https://unsplash.com/@metelevan) on [Unsplash](https://unsplash.com/s/photos/nft)
  
* * *

> People think that computer science is the art of geniuses but the actual reality is the opposite, just many people doing things that build on each other, like a wall of mini stones.

_Donald Knuth_
 
[Software Engineering Great Quotes](Quotes\Software Engineering Great Quotes)

* * *

This article is part of the CodeSmell Series.

[How to Find the Stinky parts of your Code](Code Smell\How to Find the Stinky parts of your Code)