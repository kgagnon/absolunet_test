<?php

/*************
* Question 1 *
*************/
require "question1.php";
$product = new Product(15);

$product->iDecreaseQuantity();
$product->iDecreaseQuantity();

print($product->getQuantity() . "<br>");
// Will print 13

/*************
* Question 2 *
*************/
// See the question2.php file but note that I did not run the code since
// I do not have a mysql server running. So there might be interpretation errors.

// Also, there are many more things that we could do to make this better,
// especially on the architectural level but I went with the quick wins to make
// this procedural script a bit more efficient.

/*************
* Question 3 *
*************/
// I added a pdf called question3.pdf representing a very very rought schema of
// the tables with the minimum requirements from the question. Note that the
// favorite payment is not stored anywhere because I assumed that a decent system
// would call a some-kind-of-whatever-service to get that information instead.

// I did not expand on the internal attributes of each table except for the Users
// to mark that a user could have many shipping address
// (as marked by the relationship indicators) but could also have a simple
// addressId as its favorite.


/*************
* Question 4 *
*************/

// Well this is going to be hard to answer because there could be many things
// at the root cause of this issue and different approach could lead to varying results
// but I think that first I would make sure that the indexing on the tables are
// made correctly.

// then I would try to see if it's possible to shard the data by logical shells
// i.e.: make tables per months, per distributor, and so forth and update the code
// to know that factor before hand.

// Also I would look at what kind of data is being pulled. 1 million entries for
// a mysql table shout NOT be problematic (like, not even close), so maybe the data
// being pulled is too heavy, or part of it is, and could be moved to a service.
// with data on an online storage with a small service pulling it for you.
// i.e: aws s3 data served by a lambda plugged on a CDN.

// Then, if it's simple and logical, maybe the DB is being called too often to
// get redundant data therefor caching that data and requesting it from the cache
// instead of the database could help.

// If none of these are applicable, then following the official mysql guidelines
// to optimize your tables could help:
// https://dev.mysql.com/doc/refman/5.7/en/optimization.html

// It's really hard to find a concrete solution to a non specific problem.
// I'm sure I could have different ideas if I had a specific situation in front
// of me.

/*************
* Question 5 *
*************/

// I left comments in the code as notes to the person reviewing my test.
// I want to let you know that I would never put comments in my code.
// I'm a strong believer of the documentation as code pattern.

// Also, there is no files structure, everything is dumped in a folder.
// Again, this is not something I would consider to be okay in a real life
// work scenario but I decided to go that way to save time and focus on what's
// important for the test.
require('question5/ErrorHandler.php');
require('question5/Emailer.php');
require('question5/Logger.php');

$emailer = new Emailer("gagnon.k59@gmail.com");
$logger = new Logger("./output.txt");

$errorHandler = new ErrorHandler($emailer, $logger);

$errorMessage = "This is an error message beep boop";

$errorHandler->handleError($errorMessage);

?>
