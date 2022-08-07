# Code Smell 02 - Constants and Magic Numbers

![Code Smell 02 - Constants and Magic Numbers](kristopher-roller-PC_lbSSxCZE-unsplash.jpg)

*A method makes calculations with lots of numbers without describing their semantics*

> TL;DR: Avoid Magic numbers without explanation.  We don't know their source and we are very afraid of changing them.

# Problems

- [Coupling](Theory\Coupling - The one and only software design problem)
- Low testability
- Low readability

# Solutions
1) Rename the constant with a semantic and name (meaningful and intention revealing).

2) Replace constants with parameters, so you can mock them from the outside.

3) The constant definition is often a different object than the constant (ab)user.

# Examples
- Algorithms Hyper Parameters

# Sample Code

## Wrong

[Gist Url]: # (https://gist.github.com/mcsee/dec9856bf69a06c367d2e683b179577a)
```ruby
def energy(mass)
    mass * 299792458 ** 2
end
```

## Right

[Gist Url]: # (https://gist.github.com/mcsee/2e4c88a516078500ce833dbfbd3d9b0e)
```ruby
# Storing magnitudes without units is another smell
class PhysicsConstants
   LIGHT_SPEED = 299792458.freeze
end

def energy(mass)
    mass * PhysicsConstants::LIGHT_SPEED ** 2
end
```

# Detection

Many linters can detect number literals in attributes and methods.

# Tags
- Hard coded
- Constants

# More info
- [Refactoring Guru](https://refactoring.guru/es/replace-magic-number-with-symbolic-constant)
- [How to Decouple a Legacy System](Theory\How to Decouple a Legacy System)

# Credits

Photo by [Kristopher Roller](https://unsplash.com/@krisroller) on [Unsplash](https://unsplash.com/s/photos/magic)

* * *

> In a purely functional program, the value of a [constant] never changes, and yet, it changes all the time! A paradox!

_Joel Spolsky_

[Software Engineering Great Quotes](Quotes\Software Engineering Great Quotes)

* * *

This article is part of the CodeSmell Series.

[How to Find the Stinky parts of your Code]()