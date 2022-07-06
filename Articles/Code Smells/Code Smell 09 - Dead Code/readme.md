# Code Smell 09 - Dead Code

![Code Smell 09 - Dead Code](grim-reaper-5535651_1920.jpg)

*Code that is no longer used or needed.*

TL;DR: Do not keep code "just in case I need it".

# Problems

- Maintainability

# Solutions

- Remove the code
- [KISS](https://en.wikipedia.org/wiki/KISS_principle)

# Examples

- Gold plating code or [Yagni](https://en.wikipedia.org/wiki/You_aren%27t_gonna_need_it) code.

# Exceptions

- Avoid metaprogramming. When used, it is very difficult to find references to the code.

[Lazyness I - Metaprogramming](Theory\Lazyness I - Metaprogramming)

# Sample Code

## Wrong

[Gist Url]: # (https://gist.github.com/mcsee/9e793df7489a96dc27d29d0f4e963bdf)
```javascript
class Robot {   
  walk() {
    // ...
    }
  serialize() {
    // ..
  }
  persistOnDatabase(database) {
    // ..
  }
}

```

## Right

[Gist Url]: # (https://gist.github.com/mcsee/e1075cc971b5f7af28e37d29b492735d)
```javascript
class Robot {   
  walk() {
    // ...
    }  
}
```

# Detection

Coverage tools can find dead code (uncovered) if you have a great suite of tests.

# Tags

- Unnecessary

# Conclusion

Remove dead code for simplicity.
If you are uncertain of your code, you can temporarily disable it using [Feature Toggle](https://en.wikipedia.org/wiki/Feature_toggle).
Removing code is always more rewarding than adding.

# More info

- [Laziness I: Metaprogramming](Theory\Lazyness I - Metaprogramming)

# Credits

Photo by <a href="https://pixabay.com/es/users/ray_shrewsberry-7673058/">Ray Shrewsberry</a> on <a href="https://pixabay.com/">Pixabay</a>

* * *

This article is part of the CodeSmell Series.

[How to Find the Stinky parts of your Code](Code Smell\How to Find the Stinky parts of your Code)