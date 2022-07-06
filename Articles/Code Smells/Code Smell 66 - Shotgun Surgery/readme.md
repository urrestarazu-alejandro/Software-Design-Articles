# Code Smell 66 - Shotgun Surgery

![Code Smell 66 - Shotgun Surgery](william-isted-WPeyLo0enFs-unsplash.jpg)

*Say it only once*

# Problems

- Bad Responsibilities Assignments
 
- Code Duplication

- Maintainability

- [Single Responsibility](https://en.wikipedia.org/wiki/Single-responsibility_principle) Violation.

- Copy-pasted code.

# Solutions

1. Refactor

# Sample Code

## Wrong

[Gist Url]: # (https://gist.github.com/mcsee/cb3d9eb1ede5297a16006a1453009867)
```php
<?

final class SocialNetwork {

    function postStatus(string $newStatus) {
        if (!$user->isLogged()) {
            throw new Exception('User is not logged');
        }
        // ...
    }

    function uploadProfilePicture(Picture $newPicture) {
        if (!$user->isLogged()) {
            throw new Exception('User is not logged');
        }
        // ...
    }

    function sendMessage(User $recipient, Message $messageSend) {
        if (!$user->isLogged()) {
            throw new Exception('User is not logged');
        }
        // ...
    }
}
```

## Right

[Gist Url]: # (https://gist.github.com/mcsee/23a8649a28ec56db1d0874c1a32b4fc7)
```php
<?

final class SocialNetwork {

    function postStatus(string $newStatus) {
        $this->assertUserIsLogged();
        // ...
    }

    function uploadProfilePicture(Picture $newPicture) {
        $this->assertUserIsLogged();
        // ...
    }

    function sendMessage(User $recipient, Message $messageSend) {
        $this->assertUserIsLogged();
        // ...
    }

    function assertUserIsLogged() {
        if (!$this->user->isLogged()) {
            throw new Exception('User is not logged');
            // This is just a simplification to show the code smell
            // Operations should be defined as objects with preconditions etc.
        }
    }
}
```

# Detection

Some modern linters can detect repeated patterns (not just repeated code) and also while performing our code reviews we can easily detect this problem and ask for a refactor.

# Tags

- Code Duplication

# Conclusion

Adding a new feature should be straightforward it our model maps 1:1 to real world and our responsibilities are in the correct places. 
We should be alert for small changes spanning in several classes.

# More info

(Wikipedia)[https://en.wikipedia.org/wiki/Shotgun_surgery]

(Refactoring Guru)[https://refactoring.guru/es/smells/shotgun-surgery]

(NDpend Blog)[https://blog.ndepend.com/shotgun-surgery]

(Dzone)[https://dzone.com/articles/code-smell-shot-surgery]

# Credits

Photo by [William Isted](https://unsplash.com/@williamisted) on [Unsplash](https://unsplash.com/s/photos/shotgun)
    
* * *

> Duplication is the primary enemy of a well-designed system.

_Robert Martin_
 
* * *
 
[Software Engineering Great Quotes](Quotes\Software Engineering Great Quotes)

* * *

This article is part of the CodeSmell Series.

[How to Find the Stinky parts of your Code](Code Smell\How to Find the Stinky parts of your Code)