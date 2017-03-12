
# Motion Picture Solutions

## Introduction
This exercise can be completed solely in PHP. i.e. there’s no requirement for HTML, etc. Your solution should work with the PHP CLI and/or a PHP enabled web server, and be compatible with PHP 5.5 or above.

There is no requirement to access a database or use any other form of persistent data storage.

You have 60 minutes​ to complete the exercise. The main purpose of the assessment is to demonstrate your approach. As such credit will still be given as appropriate, even if all of the task has not been completed. Working code without full functionality is preferred over buggy code with an attempt at full functionality.

Once finished please tar/zip your solution and email it to the person who originally sent you this
document.

## Question
The task is to implement a supermarket checkout class that calculates the total price for a number of items. Items are priced individually. In addition, some items have special offers allowing you to buy N of them for a specific cost X. For example, item strawberries might cost 50 individually, but this week we have a special offer: buy 3 strawberries and they’ll cost you
130. Offers can be applied multiple times, so for example, 7 strawberries will cost you (130 * 2) + 50.

The price and offer table is:


| Item          | Price     | Offer         |
|-------------- |-------    |-----------    |
| Strawberries  | 50        | 3 for 130     |
| biscuits      | 30        | 2 for 45      |
| bread         | 20        |               |
| bananas       | 15        |               |


You will need to include a scan and a checkout method. Scan accepts one item at a time in any order, so that if we scan a ‘biscuits’, a ‘bananas’, and another ‘biscuits’, we’ll recognise the two ‘biscuits’ items and price them at 45 (for a total price so far of 60). Checkout returns the basket total, taking into account any offers.

Things we will be looking for are:
● How you structure and layout your code, including good objected oriented design.
● How easy your solution is for another developer to read and understand.
● What methods you have used for testing.

## Testing Data

Below is a table with each row representing a basket of items, with the correct total shown at the
end. You can use these values to check your solution.

| Strawberries  | Biscuits  | Bread     | Bananas   | Total     |
|-------------- |---------- |-------    |---------  |-------    |
| 1             | 1         | 1         | 1         | 115       |
| 2             | 1         | 3         | 4         | 250       |
| 3             | 2         | 2         | 2         | 245       |
| 6             | 5         | 3         | 2         | 470       |

