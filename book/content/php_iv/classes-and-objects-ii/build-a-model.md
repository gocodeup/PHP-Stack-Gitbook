# What is a Model

A model is a class built to make communication with a database table easier. Each model is a representation of a record or records from the database.

All models in your application will be children of a base `Model` class. The base model has all of the shared behavior of your models defined within it. For example, the base model could have `save()` and `find()` methods built in, which would allow your descendant models to use those methods.

Within each of your models you will define the logic, relationships, and rules necessary to represent information from the database within your application. If you were making a blog, you would create `User` and `Post` models. These classes would each define their relationship to the other. You might also define a rule to determine if a `User` is allowed to modify a `Post` based on ownership. To find out if the `User` has ownership of the `Post`, you would check the `User` record's relationship to the `Post` record.

We use models to help our application and the database work smoothly together without having to duplicate a lot of our code. Looking at our existing National Parks project, here is an example of how our code work:

~~~php
$dbc = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$insert = 'INSERT INTO parks (name, description, area_in_acres, date_established, location)
           VALUES (:name, :description, :area_in_acres, :date_established, :location)';

$stmt = $dbc->prepare($insert);

$stmt->bindValue(':name',             $name,            PDO::PARAM_STR);
$stmt->bindValue(':description',      $description,     PDO::PARAM_STR);
$stmt->bindValue(':area_in_acres',    $areaInAcres,     PDO::PARAM_STR);
$stmt->bindValue(':date_established', $dateEstablished, PDO::PARAM_STR);
$stmt->bindValue(':location',         $location,        PDO::PARAM_STR);

$stmt->execute();

$insertedId = $dbc->lastInsertId();

$stmt = $dbc->prepare('SELECT * FROM parks WHERE id = ?');
$stmt->execute([$insertedId]);

$insertedPark = $stmt->fetch(PDO::FETCH_ASSOC);
~~~

If we were to refactor the National Parks project to use a model, it might look like the following:

~~~php
// Setup of the DB connection is done within the base model for our application and not
// required here. Instead we just require the file holding our Park model
require_once 'Park.php';

// We create a new instance of our model to represent this new record
$park = new Park();

// Set all the properties of the model
// These property names are taken from the column names in the database
$park->name             = $name;
$park->description      = $description;
$park->area_in_acres    = $areaInAcres;
$park->date_established = $dateEstablished;
$park->location         = $location;

// Add the new record to the database. Save will do either insert or update
// depending on whether the record already exists in the database.
$park->save();

// We do not need to get the last inserted id because the save method handles that for us
~~~

## Exercise

* Use [`Model.php`](../../examples/php/Model.php) to build a `Model` class that uses `__get()` and `__set()` to manage attributes that can be saved to a DB

* Now create a `User` model that extends the base model starting with our [`User.php`](../../examples/php/User.php) example.

* Now test your new User model.
    1. Create a new user using the User model.
    1. Find the new user by its id.
    1. Update the found user to have new values.
    1. Verify the update executed in the DB.
    1. Create another new user.
    1. Retrieve all users from the DB.
    1. Add a method to delete a record in the Model class.
    1. Delete a user using the new method added to the base class.

### Bonus

* Use `PDO::FETCH_CLASS` when fetching data from your DB
    - `PDO::FETCH_CLASS` will return an object of the specified class instead of an associative array like `PDO::FETCH_ASSOC`
* Update your National Parks project to use a `Park` model to communicate with the database.
