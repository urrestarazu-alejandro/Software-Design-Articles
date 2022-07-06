# Code Smell 111 - Modifying Collections While Traversing

![Code Smell 111 - Modifying Collections While Traversing](christine-roy-ir5MHI6rPg0-unsplash.jpg)

*Changing a collection while traversing might lead to unexpected errors*

> TL;DR: Do not modify collections while traversing them

# Problems

- Unexpected Results 

- Concurrency problems

# Solutions

1. Avoid altering the collections 

2. Make collection copies

# Context

We over-optimize our solutions with the prejudice that copying collections is expensive. 

This is not true for small and medium-size collections. 

Languages iterate collections in many different ways. 

Modifying them is generally not safe.

# Sample Code

## Wrong

[Gist Url]: # (https://gist.github.com/mcsee/9d66e179c57495aa7c2080ee34152c11)
```java
Collection<Integer> people = new ArrayList<>();
// here we add elements to the collection...
  
for (Object person : people) {
    if (condition(person)) {
        people.remove(person);
    }
}
// We iterate AND remove elements
```

## Right

[Gist Url]: # (https://gist.github.com/mcsee/18369eb8798462ef04372be56827c9d6)
```java
Collection<Integer> people = new ArrayList<>();
// Here we add elements to the collection...

List<Object> iterationPeople = ImmutableList.copyOf(people);
    
for (Object person : iterationPeople) {
    if (condition(person)) {
        people.remove(person);
    }
}
// We iterate a copy and remove it from original

coll.removeIf(currentIndex -> currentIndex == 5);
// Or use language tools (if available)
```

# Detection

[X] Semi Automatic 

Many languages provide control both in compile and run-time

# Tags

- Fail Fast

# Conclusion

This is something we learn in our first courses.

It happens a lot in the industry and real-world software

# Relations

[Code Smell 53 - Explicit Iteration](Code Smells\Code Smell 53 - Explicit Iteration)

# More Info

- [Stack Overflow](https://stackoverflow.com/questions/223918/iterating-through-a-collection-avoiding-concurrentmodificationexception-when-re)

# Credits

Photo by [Christine Roy](https://unsplash.com/@agent_illustrateur) on [Unsplash](https://unsplash.com/s/photos/travel)
  
* * *

Bugs are bugs. You write code with bugs because you do. If it’s a safe language in the sense of run-time safe, the operating system crashes instead of doing a buffer overflow in a way that’s exploitable.

_Ken Thompson_
 
[Software Engineering Great Quotes](Quotes\Software Engineering Great Quotes)

* * *

This article is part of the CodeSmell Series.

[How to Find the Stinky parts of your Code](Code Smell\How to Find the Stinky parts of your Code)