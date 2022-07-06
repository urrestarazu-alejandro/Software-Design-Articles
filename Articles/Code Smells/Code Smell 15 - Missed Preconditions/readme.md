# Code Smell 15 - Missed Preconditions

![Code Smell 15 - Missed Preconditions](jonathan-chng-rkp_-i5ABOE-unsplash.jpg)

*Assertions, Preconditions, Postconditions and invariants are our allies to avoid invalid objects. Avoiding them leads to hard-to-find errors.*

> TD;DR: If you turn off your assertions just in production your phone will ring at late hours.

# Problems
- Consistency
- Contract breaking
- Hard to debug
- Bad cohesion

# Solutions

- Create strong preconditions
- Raise exceptions
- Fail Fast
- Defensive Programming 

# Examples

- Constructors are an excellent first line of defense

- [Anemic Objects](Code Smells\Code Smell 01 - Anemic Models) lack these rules.

# Sample Code

## Wrong

[Gist Url]: # (https://gist.github.com/mcsee/61e95b5c7a8d697cb748cd49b43aab90)
```python
class Date:
  def __init__(self, day, month, year):
    self.day = day
    self.month = month
    self.year = year

  def setMonth(self, month):
    self.month = month

startDate = Date(3, 11, 2020)
# OK

startDate = Date(31, 11, 2020)
# Should fail

startDate.setMonth(13)
# Should fail
```

## Right

[Gist Url]: # (https://gist.github.com/mcsee/b5eebe620b66c510bafe04a7a4f8ef82)
```python
class Date:
  def __init__(self, day, month, year):
  	if month > 12:
    	raise Exception("Month should not exceed 12")
    #
    # etc ...
  
    self._day = day
    self._month = month
    self._year = year
 
startDate = Date(3, 11, 2020)
# OK

startDate = Date(31, 11, 2020)
# fails

startDate.setMonth(13)
# fails since invariant makes object immutable
```

# Detection

- It's difficult to find missing preconditions, as long with assertions and invariants.

# Tags

- Consistency

# Conclusion

Always be explicit on object integrity.

Turn on production assertions. 

Even if it brings performance penalties. 

Data and object corruption is harder to find.

Fail fast is a blessing.

[Fail Fast](Theory\Fail Fast)

# More info

- [Object-Oriented Software Construction (by Bertrand Meyer)](https://en.wikipedia.org/wiki/Object-Oriented_Software_Construction)

# Relations

[Code Smell 01 - Anemic Models](Code Smells\Code Smell 01 - Anemic Models)

# Credits

Photo by [Jonathan Chng](https://unsplash.com/@jon_chng) on [Unsplash](https://unsplash.com/s/photos/running-track)

* * *

> Writing a class without its contract would be similar to producing an engineering component (electrical circuit, VLSI (Very Large Scale Integration) chip, bridge, engine...) without a spec. No professional engineer would even consider the idea.

_Bertrand Meyer_

[Software Engineering Great Quotes](Quotes\Software Engineering Great Quotes)

* * *

This article is part of the CodeSmell Series.

[How to Find the Stinky parts of your Code](Code Smell\How to Find the Stinky parts of your Code)