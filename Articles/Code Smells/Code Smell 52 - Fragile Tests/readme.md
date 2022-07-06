# Code Smell 52 - Fragile Tests

![Code Smell 52 - Fragile Tests](jilbert-ebrahimi-pVEcNabAg9o-unsplash.jpg)

*Tests are our safety nets. If we don't trust on their integrity, we will be in great danger.*

TL;DR: Don't write non-deterministic tests.

# Problems

- Determinism

- Confidence loss

- Wasted time

# Solutions

1. Test should be in full control. There should be no space for erratic behavior and degrees of freedom.

2. Remove all tests coupling.

[Coupling - The one and only software design problem](Theory\Coupling - The one and only software design problem) 

# Examples

- Fragile, Intermittent, Sporadic or Erratic tests are common in many organizations. 

Nevertheless, they mine the developers trust. 

We must avoid them.

# Sample Code

## Wrong

[Gist Url]: # (https://gist.github.com/mcsee/20c94ec159e6333ddd5891b4af0d5688)
```java
import static org.junit.Assert.assertEquals;

import org.junit.Test;

import components.set.Set;
import components.set.Set1L;

public abstract class SetTest {
 
    protected abstract Set<String> constructor();
   
    @Test
    public final void testAddEmpty() {
        Set<String> s = this.constructor();
        s.add("green");
        s.add("blue");
        assertEquals("{green. blue}", s.toString());
       // This is fragile since it depends on set sort (which is not defined)
    }   
}
```

## Right

[Gist Url]: # (https://gist.github.com/mcsee/e89bdc655b7248598e0e8ccd3e94997d)
```java
import static org.junit.Assert.assertEquals;

import org.junit.Test;

import components.set.Set;
import components.set.Set1L;

public abstract class SetTest {
 
    protected abstract Set<String> constructor();
   
    @Test
    public final void testAddEmpty() {
        Set<String> s = this.constructor();
        s.add("green");
        assertEquals("{green}", s.toString());
    }   

    @Test
    public final void testEntryAtSingleEntry() {
        Set<String> s = this.createFromArgs("red");
        Boolean x = s.contains("red");
        assertEquals(true, x);
    } 
}
```

# Detection

Detection can be done with test run statistics. 

It is very hard to put some test in maintenance since we are removing a safety net.

# More Info

https://softwareengineering.stackexchange.com/questions/109703/how-to-avoid-fragile-unit-tests

# Relations

[Code Smell 76 - Generic Assertions](Code Smells\Code Smell 76 - Generic Assertions)

# Tags

- Coupling

- Determinism

# Conclusion

Fragile tests show system coupling and not deterministic or erratic behavior.

Developers spend lots of time and effort fighting against this false positives.
 
# Credits

Photo by [Jilbert Ebrahimi](https://unsplash.com/@jilburr) on [Unsplash](https://unsplash.com/s/photos/glass-broken)

* * *

 > The amateur software engineer is always in search of magic. 

_Grady Booch_

[Software Engineering Great Quotes](Quotes\Software Engineering Great Quotes)

* * * 

This article is part of the CodeSmell Series.

[How to Find the Stinky parts of your Code](Code Smell\How to Find the Stinky parts of your Code)