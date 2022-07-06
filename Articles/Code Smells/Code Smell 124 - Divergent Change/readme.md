# Code Smell 124 - Divergent Change

![Code Smell 124 - Divergent Change](Divergente-final-television.jpg)

*You change something in a class. You change something unrelated in the same class*

> TL;DR: Classes should have just one responsibility and one reason to change.

# Problems

- [Coupling](Theory\Coupling - The one and only software design problem)

- Code Duplication

- Low Cohesion

- Single Responsibility Principle violation

# Solutions

1. Extract class

# Context

We create classes to fulfill responsibilities.

If an object does too much, it might change in different directions.

# Sample Code

## Wrong

[Gist Url]: # (https://gist.github.com/mcsee/398ed708b96ddabe79971b98edefce4a)
```javascript
class Webpage {
  
  renderHTML() {
    renderDocType();
    renderTitle();
    renderRssHeader();
    renderRssTitle();
    renderRssDescription();
   // ...
  }
  // HTML render can change

  renderRssDescription() {
   // ...
  }

  renderRssTitle() {
   // ...
  }

  renderRssPubDate() {
   // ...
  }
  // RSS Format might change

}
```

## Right

[Gist Url]: # (https://gist.github.com/mcsee/cb5736ef2d43863b8cae0ff060c1317a)
```javascript
class Webpage {
  
  renderHTML() {
    this.renderDocType();
    this.renderTitle();
    (new RSSFeed()).render();
    this.renderRssTitle();
    this.renderRssDescription();
   // ...
  }
  // HTML render can change
}

class RSSFeed {
  render() {
    this.renderDescription();
    this.renderTitle();
    this.renderPubDate();
    // ...
  }  
  // RSS Format might change
  // Might have unitary tests
  // etc
}
```

# Detection

[X] Semi Automatic

We can automatically detect large classes or track changes.

# Tags

- Coupling

# Conclusion

Classes must follow the Single Responsibility Principle and have just one reason to change.

If they evolve in different ways, they are doing too much.

# Relations

[Code Smell 34 - Too Many Attributes](Code Smells\Code Smell 34 - Too Many Attributes)

[Code Smell 94 - Too Many imports](Code Smells\Code Smell 94 - Too Many imports)

[Code Smell 14 - God Objects](Code Smells\Code Smell 14 - God Objects)

# More Info

- [Refactoring.guru](https://refactoring.guru/es/smells/divergent-change)

* * *

> A design that doesn’t take change into account risks major redesign in the future.

_Erich Gamma_
 
[Software Engineering Great Quotes](Quotes\Software Engineering Great Quotes)

* * *

This article is part of the CodeSmell Series.

[How to Find the Stinky parts of your Code](Code Smell\How to Find the Stinky parts of your Code)