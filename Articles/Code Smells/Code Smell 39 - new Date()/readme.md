# Code Smell 39 - new Date()

![Code Smell 39 - new Date()](81Q7-vLhU7L_SL1500_.jpg)

*70s first tutorial: getCurrentDate(). Piece of Cake. We are in the 20s Time is global no more*

# Problems

- Coupling

- Fragile Tests

- Timezone Problems

# Solutions

1. Use Dependency injection to decouple time source.

# Sample Code

## Wrong

[Gist Url]: # (https://gist.github.com/mcsee/272ba8ead8cb11037d97f6a0cd473ef2)
```javascript
var today = new Date();
```

## Right

[Gist Url]: # (https://gist.github.com/mcsee/51f09b9c56f077aa2954745c1f43da2c)
```javascript
var ouagadougou = new Location(); 

var today = myTimeSource.currentDateIn(ouagadougou);

function testTimePasses() {
 
  $mockTime = new MockedDate(new Date(1,1,2021));
  myDomainSystem = new TimeSystem(new MockedTime());
  // ..
  
  $mockTime.moveDateTo(new Date(1,1,2022));
  
  // ...
  this.assert(10, myDomainSystem.accuredInterests());  
  
}
```

# Detection

We should forbid global functions policies. We need to couple to accidental and pluggable time sources.

# Conclusion

```Date.today() , Time.now()```,  and other global system calls are coupling smell. 

Since **tests must be in full environmental control**. We should easily set up time, moved it back and forth etc.

**Date** and **Time** classes should only create immutable instances. It is not their responsibility to give the actual time. This violates Single Responsibility Principle.

The passage of time is always scorned by programmers. This makes objects mutable and designs poor and coupled.

# Relations

[Code Smell 18 - Static Functions](https://maximilianocontieri.com/code-smell-18-static-functions)

# More info

[The Evil Power of Mutants](https://maximilianocontieri.com/the-evil-powers-of-mutants)

# Tags

- Globals

* * *

> In programming, the hard part isn't solving problems, but deciding what problems to solve.

_Paul Graham_

[Software Engineering Great Quotes](Quotes\Software Engineering Great Quotes)

* * *

This article is part of the CodeSmell Series.

[How to Find the Stinky parts of your Code](Unsorted\How to Find the Stinky parts of your Code)