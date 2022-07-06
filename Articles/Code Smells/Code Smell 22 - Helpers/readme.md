# Code Smell 22 - Helpers

![Code Smell 22 - Helpers](Ghostbusters.jpg)

*Do you need help? Who are you gonna call?*

> TL;DR: Helpers don't help. They are a non-cohesive bunch of messy subroutines.

# Problems

- Readability

- The Least surprise principle

- [Bijection](Theory\The One and Only Software Design Principle) Fault

- Static methods

[What exactly is a name — Part II Rehab](Theory\What exactly is a name — Part II Rehab)

# Solutions

1. Find a suitable name

2. If the helper is a library, break all the services as different methods.

3. Methods should always be fulfilled by objects. [Static methods](Code Smells\Code Smell 18 - Static Functions) are another code smell.

4. Avoid extracting the helpers to [Anonymous Functions](Code Smells\Code Smell 21 - Anonymous Functions Abusers).

# Sample Code

## Wrong

[Gist Url]: # (https://gist.github.com/mcsee/0fcfc27f845835533e1853384bc2f4da)
```javascript
export default class UserHelpers {
  static getFullName(user) {
    return `${user.firstName} ${user.lastName}`;
  }

  static getCategory(userPoints) {
    return userPoints > 70 ? 'A' : 'B';
  }
}
```

Notice *static* methods.

[Gist Url]: # (https://gist.github.com/mcsee/f049135c8043e628551a40844bef0983)
```javascript
import UserHelpers from './UserHelpers';

const alice = {
  firstName: 'Alice',
  lastName: 'Gray',
  points: 78,
};

const fullName = UserHelpers.getFullName(alice);
const category = UserHelpers.getCategory(alice);
```

## Right

[Gist Url]: # (https://gist.github.com/mcsee/bd0982f4c86a3523cd5a956196214b9c)
```javascript
class UserScore {  
  // This is anemic class and should have better protocol
  
  constructor(name, lastname, points) {
    this._name = name;
    this._lastname = lastname;
    this._points = points;
  }
  name() {
    return this._name;
  }
  lastname() {
    return this._lastname;
  }
  points() {
    return this._points;
  }
}

class FullNameFormatter {
  constructor(userscore) { 
    this._userscore = userscore;
      
 }
  fullname() {
    return `${this._userscore.name()} ${this._userscore.lastname()}`;
  }
}

class CategoryCalculator{
  constructor(userscore1) {
     this._userscore = userscore1;
 }
  display() {
    return this._userscore.points() > 70 ? 'A' : 'B';
  }
}
  
  
let alice = new UserScore('Alice', 'Gray', 78);

const fullName = new FullNameFormatter(alice).fullname();
const category = new CategoryCalculator(alice).display();
```

or we can make the former *Helper* stateless for reuse...

[Gist Url]: # (https://gist.github.com/mcsee/b6550c193e41862ed8a84cbe885d989d)
```javascript
class UserScore {  
  // This is anemic class and should have better protocol
  
  constructor(name, lastname, points) {
    this._name = name;
    this._lastname = lastname;
    this._points = points;
  }
  name() {
    return this._name;
  }
  lastname() {
    return this._lastname;
  }
  points() {
    return this._points;
  }
}

class FullNameFormatter {      
  fullname(userscore) {
    return `${userscore.name()} ${userscore.lastname()}`;
  }
}

class CategoryCalculator {
  display(userscore) {
    return userscore.points() > 70 ? 'A' : 'B';
  }
}  
  
let alice = new UserScore('Alice', 'Gray', 78);

const fullName = new FullNameFormatter().fullname(alice);
const category = new CategoryCalculator().display(alice);
```

# Detection

- Code naming standards should forbid classes with this name on them.

# Tags

- Namings

# Conclusion

This is a well established cultural name and a legacy habit from structured programming.

Most developers are reluctant to let old habits go. 

We must be aware of the damage this kind of names are bringing us.

# Relations

[Code Smell 18 - Static Functions](Code Smells\Code Smell 18 - Static Functions)

[Code Smell 21 - Anonymous Functions Abusers](Code Smells\Code Smell 21 - Anonymous Functions Abusers)

# Also known as

- Utils

# More Info

[How to Decouple a Legacy System](Theory\How to Decouple a Legacy System)

* * *

This article is part of the CodeSmell Series.

[How to Find the Stinky parts of your Code](Code Smell\How to Find the Stinky parts of your Code)