# Code Smell 86 - Mutable Const Arrays

*Const declares something to be constant. Can it mutate?*

![Code Smell 86 - Mutable Const Arrays](zorik-d-Xe7fo6aO3uo-unsplash.jpg)

> TL;DR: Don't rely on languages cheating about directives.

# Problems

- Unexpected side effects

- Accidental complexity

# Solutions

1. Use better languages

2. Use [spread operator](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators/Spread_syntax)

# Sample Code

## Wrong

[Gist Url]: # (https://gist.github.com/mcsee/03563ad0268ac240336fcab195f8da29)
```javascript
const array = [1, 2];

array.push(3)

//array => [1, 2, 3]
//Wasn't it constant ?
//constant != immutable ?
```

## Right

[Gist Url]: # (https://gist.github.com/mcsee/c1610a6305aa2a1f3b9add686652d0b7)
```javascript
const array = [1, 2];

const newArray = [...array,3 ]

//array => [1, 2] Didn't mutate
//newArray = [1, 2, 3]
```

# Detection

Since this is a "language feature", we can explicitly forbid it.

# Tags

- Mutability

- JavaScript

# Conclusion

We should always favour immutability on our designs and take extra care with side effects.

# More Info

- [The evil power of mutants](https://maximilianocontieri.com/the-evil-powers-of-mutants)

# Credits

Photo by [Zorik D](https://unsplash.com/@justzorik) on [Unsplash](https://unsplash.com/s/photos/zombie)  

[Twitter](https://twitter.com/1430154471921922049)

* * *

> Correctness is clearly the prime quality. If a system does not do what it is supposed to do, then everything else about it matters little.

_Bertrand Meyer_
 
[Software Engineering Great Quotes](Software Engineering Great Quotes)

* * *

This article is part of the CodeSmell Series.

[How to Find the Stinky parts of your Code](https://maximilianocontieri.com/how-to-find-the-stinky-parts-of-your-code)