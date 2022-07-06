# Code Smell 146 - Getter Comments

![Code Smell 146 - Getter Comments](reimond-de-zuniga-vHwjDFwQC-M-unsplash.jpg)

*Comments are a code Smell. Getters are another code smell. Guess what?*

> TL;DR: Don't use getters. Don't comment getters

# Problems

- Comment Abusers

- Readability

- Getters

# Solutions

1. Remove getter comments

2. Remove getters

# Context

A few decades ago, we used to comment on every method. Even trivial ones

Comment should describe only a critical design decision.

# Sample Code

## Wrong

[Gist Url]: # (https://gist.github.com/mcsee/29cd4411aa32467291998e467e6ef503)
```solidity
pragma solidity >=0.5.0 <0.9.0;

contract Property{
    int public price;   

    function getPrice() public view returns(int){
           
           /* returns the Price  */

        return price;
    }
}
```

## Right

[Gist Url]: # (https://gist.github.com/mcsee/bf1ab1d44b078d797796d19554032591)
```solidity
pragma solidity >=0.5.0 <0.9.0;

contract Property{
    int public _price;   

    function price() public view returns(int){        
        return _price;
    }
}
```

# Detection

[X] Semi-Automatic

We can detect if a method is a getter and has a comment. 

# Exceptions

The function needs a comment, that is accidentally a getter and the comment is related to a design decision

# Tags

- Comments

# Conclusion

Don't comment getters. 

They add no real value and bloat your code.

# Relations

[Code Smell 05 - Comment Abusers](Code Smells\Code Smell 05 - Comment Abusers)

[Code Smell 68 - Getters](Code Smells\Code Smell 68 - Getters)

[Code Smell 01 - Anemic Models](Code Smells\Code Smell 01 - Anemic Models)

# Credits

Photo by Reimond de Zuñiga on Unsplash

* * *

> Code should be remarkably expressive to avoid most of the comments. There'll be a few exceptions, but we should see comments as a 'failure of expression' until proven wrong.

_Robert Martin_

[Software Engineering Great Quotes](Quotes\Software Engineering Great Quotes)

* * *

This article is part of the CodeSmell Series.

[How to Find the Stinky parts of your Code](Code Smell\How to Find the Stinky parts of your Code)