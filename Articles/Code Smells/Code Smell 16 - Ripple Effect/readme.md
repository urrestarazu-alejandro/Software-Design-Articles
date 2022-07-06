# Code Smell 16 - Ripple Effect

![Code Smell 16 - Ripple Effect](jack-tindall-Vh7u1vga0UU-unsplash.jpg)

*Small changes yield unexpected problems.*

> TL;DR: If small changes have big impact, you need to decouple your system.

# Problems

- Coupling

[Coupling - The one and only software design problem](Theory\Coupling - The one and only software design problem)

# Solutions

1. Decouple.
2. Cover with tests.
3. Refactor and isolate what is changing.
4. Depend on interfaces.

[How to Decouple a Legacy System](Theory\How to Decouple a Legacy System)

# Examples

- Legacy Systems

# Sample Code

## Wrong

[Gist Url]: # (https://gist.github.com/mcsee/3861429b0a02eb2a3906d0f939cc1809)
```javascript
class Time {
   constructor(hour, minute, seconds) {
     this.hour = hour;    
     this.minute = minute;  
     this.seconds = seconds;  
  }
    now() {
      // call operating system
    }  
}

// Adding a TimeZone will have a big Ripple Effect
// Changing now() to consider timezone will also bring the effect
```

## Right

[Gist Url]: # (https://gist.github.com/mcsee/7fbceedcae6aae7f15d392c9bbe0ffa1)
```javascript
class Time {
   constructor(hour, minute, seconds, timezone) {
     this.hour = hour;    
     this.minute = minute;  
     this.seconds = seconds;  
     this.timezone = timezone;  
  }  
  // Removed now() since is invalid without context
}

class RelativeClock {
   constructor(timezone) {
     this.timezone = timezone;
   }
   now(timezone) {
     var localSystemTime = this.localSystemTime();
     var localSystemTimezone = this.localSystemTimezone();
     // Do some math translating timezones
     // ...
     return new Time(..., timezone);     
   }  
}
```

# Detection

- It is not easy to detect problems before they happen. [Mutation Testing](https://en.wikipedia.org/wiki/Mutation_testing) and root cause analysis of [single points of failures](https://en.wikipedia.org/wiki/Single_point_of_failure) may help.

# Tags

- Legacy

# Conclusion

There are multiple strategies to deal with Legacy and coupled systems. We should deal with this problem before it explodes under our eyes.

# Relations

- [Code Smell 08 - Long Chains Of Collaborations](Code Smells\Code Smell 08 - Long Chains Of Collaborations)

# More info

- [How to Decouple a Legacy System](Theory\How to Decouple a Legacy System)
 
# Credits

Photo by [Jack Tindall](https://unsplash.com/@jtindall) on [Unsplash](https://unsplash.com/s/photos/big-wave)

* * *

> Architecture is the tension between coupling and cohesion.

_Neal Ford_

[Software Engineering Great Quotes](Quotes\Software Engineering Great Quotes)

* * *

This article is part of the CodeSmell Series.

[How to Find the Stinky parts of your Code](Code Smell\How to Find the Stinky parts of your Code)