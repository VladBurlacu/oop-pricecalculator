# Title: PHP Price Calculator challenge

- Team challenge : `pairs`

## Our learning objectives
- Apply basic OOP principles
- Import data with a database
- Learn to use an MVC

## The Mission
Today and in the next following few days Vlad and I are going to combine our newly required OOP powers with a database.
We will put our heads together and make this challenge our own.
The challenge will require read access and not write access, this is to give us some time to get familiar with databases.

Our price calculator needs the following entities:
- Customer (Firstname, Lastname)
- A customer group (Name)
- A product (product name, price in cents)

*Notice that the price is in cents stored as an integer, not as a float. This is because you should _never store currency as a float_. The reason for this is that they store the number with unexpected rounding behavior. For example, it will store 5 as 4.999999999999999999 (scientific fraction), making pennies appear and disappear, once you start to do calculations with multiple floats.*

*Don't forget to divide by 100 in your PHP code to show the pennies again!*

A customer belongs to a customer group, which can also belong to another group (infinite).
You don't need to worry for infinite loops in this exercise.

Both a customer and a group can have a discount, which can be a percentage or a fixed amount.

#### To calculate the price:
- For the customer group: In case of variable discounts look for highest discount of all the groups the user has.
- If some groups have fixed discounts, count them all up.
- Look which discount (fixed or variable) will give the customer the most value.
- Now look at the discount of the customer.
- In case both customer and customer group have a percentage, take the largest percentage.
- First subtract fixed amounts, then percentages!
- A price can never be negative.

### Importing the data
With this exercise you can find an [SQL file](resources/import.sql) you can import into a database, the previous exercise has shown you the command to do this.
If done successfully, will create 3 different tables (Customer, Group, Product) with some data inside it.

### What is an MVC?
MVC is a classic web design pattern consistent of three levels, and is an extension of the principle of **separation of concerns**:

- The **Controller** responds to user actions and invokes changes on the model or view as appropriate.
- The **Model** represents the information on which the application operates--its business logic.
- The **View** renders the model into a web page suitable for interaction with the user.

For now you should create 3 different directories:
- [ ] **Controller/**: has access to GET/POST vars, receives the Request
- [ ] **Model/**: Most of your code should be here, for example the Product and Customer class.
- [ ] **View/**: Your HTML files.

While splitting up the Controller & Model is quite intuitive, splitting up the View from the Controller might require a larger change in how you write code. Let us look at some example:

````php
<?php
//oldcode.php
if($_GET['age'] > 18) {
    echo '<h1>You are an adult!</h1>';
} else {
    echo '<h1>You are a child!</h1>';
}
````
We can split this up into two files:
````php
<?php
//view.php
$sentence = ($_GET['age'] > 18) ? 'You are an adult!' : 'You are a child!';
require 'view.php';
````

````php
<!-- view.php-->
<h1><?php echo $sentence?></h1>
````

## Must-have features
- [ ] A dropdown where you can select a Product and a Customer and you get the basic information of the product + the price.
- [ ] Use a [MVC pattern](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller). You can use the [MVC Boilerplate](https://github.com/becodeorg/php-mvc-boilerplate).
- [ ] Use separate objects for importing the entities with SQL, and for managing the entities.

## Nice to have features
- [ ] An actual login page for a customer
- [ ] A table where you can see in detail how the price is calculated
- [ ] The possibility to have different prices for different quantities (look, 1 EUR per item for 1, 0.9 EUR per item for 100, ...)
- [ ] A category page for the different products

### Discussion for friday
- Do you prefer procedural code or object oriented one? Why?
- What is the use of an MVC? Do you prefer another way of structuring your code?

## Some TO-DO logic we got from Sicco
- [ ] TODO explore what is MVC? Why is everything a class? Research!
- [ ] TODO make a DataBase
- [ ] TODO make connection between CONTROLLER/MODEL and DB
- [ ] TODO display data to test connection
- [ ] TODO DO IT ALL ON HOMEPAGE FOR TESTING REFACTOR LATER