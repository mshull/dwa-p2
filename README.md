# CSCI E-15: P2
**By Michael Shull**

**[mshull@g.harvard.edu](mailto:mshull@g.harvard.edu)**

## Live URL
[https://p2.shullworks.com](https://p2.shullworks.com)

## Description
This projects contains my xkcd Password Generator. It has 4 options and 1 restriction. For options it allows you to enter the number of words, include a random number, include a random special character, and select from a list of separating options. For a restriction the number of words must be 10 or less.

## Demo
[https://youtu.be/PPVC78x07Ic](https://youtu.be/PPVC78x07Ic)

## Details for Teaching Team

1. Words are scraped from [http://www.paulnoll.com/Books/Clear-English/words-29-30-hundred.html](http://www.paulnoll.com/Books/Clear-English/words-29-30-hundred.html).

2. I generate the password by default using the default settings.

3. If a post is detected then the default settings are updated.

4. If an error occurs (ex. a non numeric value is entered in # of words), the password area is then replaced with the error message.

5. I used a few arrays which are shuffled to get the final results.

## Outside Code

1. This project uses the [Bootstrap framework](http://getbootstrap.com) as it's front-end foundation. 

2. This project uses the [Starter Template Bootstrap Template](http://getbootstrap.com/getting-started/) for it's layout, with a few customizations added.

3. This project uses content scraped from [http://www.paulnoll.com/Books/Clear-English/words-29-30-hundred.html](http://www.paulnoll.com/Books/Clear-English/words-29-30-hundred.html).