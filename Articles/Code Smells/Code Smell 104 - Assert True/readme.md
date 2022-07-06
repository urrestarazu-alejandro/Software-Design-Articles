# Code Smell 104 - Assert True

![Code Smell 104 - Assert True](joel-de-vriend-B4coIKuk55I-unsplash.jpg)

*Asserting against booleans makes error tracking more difficult.*

> TL;DR: Don't assert true unless you are checking a boolean

# Problems

- Fail Fast Principle

# Solutions

1. Check if the boolean condition can be rewritten better

2. Favor assertEquals

# Context

When asserting to a boolean our test engines cannot help us very much. 

They just tell us something failed.

Error tracking gets more difficult.

# Sample Code

## Wrong

[Gist Url]: # (https://gist.github.com/mcsee/c54f0b1ee42d6a1aff640507e0bdf625)
```php
<?

final class RangeUnitTest extends TestCase {
 
  function testValidOffset() {
    $range = new Range(1, 1);
    $offset = $range->offset();
    $this->assertTrue(10 == $offset);    
    // No functional essential description :(
    // Accidental description provided by tests is very bad
  }  
}

// When failing Unit framework will show us
//
// 1 Test, 1 failed
// Failing asserting true matches expected false :(
// () <-- no business description :(
//
// <Click to see difference> - Two booleans
// (and a diff comparator will show us two booleans)
```

## Right

[Gist Url]: # (https://gist.github.com/mcsee/edf0b1c3339451662bb000055ef5d782)
```php
<?

final class RangeUnitTest extends TestCase {
 
  function testValidOffset() {
    $range = new Range(1, 1);
    $offset = $range->offset();
    $this->assertEquals(10, $offset, 'All pages must have 10 as offset');    
    // Expected value should always be first argument
    // We add a functional essential description
    // to complement accidental description provided by tests
  }  
}

// When failing Unit framework will show us
//
// 1 Test, 1 failed
// Failing asserting 0 matches expected 10
// All pages must have 10 as offset <-- business description
//
// <Click to see difference> 
// (and a diff comparator will help us and it will be a great help
// for complex objects like objects or jsons)
```

# Detection

[X] Semi-Automatic 

Some linters warn us if we are checking against boolean after setting this condition.

We need to change it to a more specific check.

# Tags

- Test Smells

# Conclusion

Try to rewrite your boolean assertions and you will fix the failures much faster.

# Relations

[Code Smell 101 - Comparison Against Booleans](Code Smells\Code Smell 101 - Comparison Against Booleans)

[Code Smell 07 - Boolean Variables](Code Smells\Code Smell 07 - Boolean Variables)

# More Info

- [Fail Fast](Theory\Fail Fast)

# Credits

Photo by [Joël de Vriend](https://unsplash.com/@joeldevriend) on [Unsplash](https://unsplash.com/s/photos/truth)  

* * *

> I've finally learned what 'upward compatible' means. It means we get to keep all our old mistakes.

_Dennie van Tassel_
 
[Software Engineering Great Quotes](Quotes\Software Engineering Great Quotes)

* * *

This article is part of the CodeSmell Series.

[How to Find the Stinky parts of your Code](Code Smell\How to Find the Stinky parts of your Code)