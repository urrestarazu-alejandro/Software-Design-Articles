# Code Smell 08 - Long Chains Of Collaborations

![Code Smell 08 - Long Chains Of Collaborations](chewy-nPRK_w6tcQ4-unsplash.jpg)

*Making long chains generate coupling and ripple effect.
Any chain change breaks the code.*

> TL;DR: Just sent messages to your acquaintances. 

# Problems

- Coupling

- Break encapsulation

# Solutions

- Create intermediate methods.
- Think about [Law of Demeter](https://en.wikipedia.org/wiki/Law_of_Demeter).
- Create higher level messages.

# Sample Code

## Wrong

[Gist Url]: # (https://gist.github.com/mcsee/de702945b0bb7cd80f696f8cbe19c91c)
```javascript
class Dog {
   constructor(feet) {
     this.feet = feet;    
  }
  getFeet() {    
    return this.feet;
  }  
}

class Foot {
  move() {
    // ..
  }
}

feet = [new Foot(), new Foot(), new Foot(), new Foot()];
dog = new Dog(feet);

for (var foot of dog.getFeet()) {
  foot.move(); 
}
```

## Right

[Gist Url]: # (https://gist.github.com/mcsee/b3b7d73ffb6554df2c06fce3b93a134f)
```javascript
class Dog {
   constructor(feet) {
     this.feet = feet;    
  }
  walk() {
    for (var foot of this.feet) {
      foot.move(); 
    }
  }
}

class Foot {
  move() {
    // ..
  }
}

feet = [new Foot(), new Foot(), new Foot(), new Foot()];
dog = new Dog(feet);
dog.walk();
```

# Detection

 Automatic detection is possible using parsing trees.

# Also Known as

- Message Chains

- Law of Demeter

# Relations

[Code Smell 67 - Middle Man](Code Smells\Code Smell 67 - Middle Man)

# More Info

- [Refactoring Guru](https://refactoring.guru/es/smells/message-chains)
 
# Tags

- Declarative

- Encapsulation

# Conclusion

Avoid successive message calls. Try to hide the intermediate collaborations and create new protocols. 

# Credits

Photo by [Chewy](https://unsplash.com/@chewy) on [Unsplash](https://unsplash.com/s/photos/dog)

* * *

This article is part of the CodeSmell Series.

[How to Find the Stinky parts of your Code](Code Smell\How to Find the Stinky parts of your Code)