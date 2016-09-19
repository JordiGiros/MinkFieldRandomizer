# MinkFieldRandomizer
MinkFieldRandomizer is a random (with sense) information generator for filling browser form fields in Behat Mink Selenium tests. It brings the option to run your tests in a more realistic way changing the information you use to fill in the forms in every test you run.

Status: v1.0. Working.
Feel free to propose improvments.

## Add it using composer
Add the next line in require-dev to your composer.json file:
"jordigiros/MinkFieldRandomizer": "dev-master"

## How to use it
MinkFieldRandomizer includes a file called FilterContext.php that contains a PHP trait class. This class has some extra methods that will permit you to randomize your features involving forms.

You only need to add that trait to your main FeatureContext Behat Contaxt as follows:

```javascript
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{

    use FilterContext;
    
    ...
}
```

This way you can use the new steps added by the trait directly in the gherkin feature.

# Steps added By MinkFieldRandomizer

Documentation

### Common methods

#### Generate and fill with new random information

 * Fill :field with a random mail
 * Fill :field with a random name
 * Fill :field with a random surname
 * Fill :field with a random phone
 * Fill :field with a random number
 * Fill :field with a random text
 * Fill :field with a random loremipsum

#### Fill in with previous generated random information

 * Fill :field with an existent mail
 * Fill :field with an existent name
 * Fill :field with an existent surname
 * Fill :field with an existent phone
 * Fill :field with an existent number
 * Fill :field with an existent text
 * Fill :field with an existent loremipsum

Note: If you didn't generate the random information previously (Generate and fill with new random information) they won't work.

#### Other methods

##### Filling multiple fields with a TableNode object:

 * Fills in form fields with provided table. 

Gherkin:
```javascript
Then Fills in form fields with provided table
	| "f_outbound_accommodation_name" | "{RandomName}" |
	| "f_outbound_accommodation_phone_number" | "{RandomNumber}" |
	| "f_outbound_accommodation_address_1" | "{RandomText(10)}" |
````

PHP:
```javascript
$hotel = new TableNode (
    array(
        array("f_outbound_accommodation_name", "{RandomName}"),
        array("f_outbound_accommodation_phone_number", "{RandomNumber}"),
        array("f_outbound_accommodation_address_1", "{RandomText(10)}")
    )
);
$this->fillFilteredFields($hotel);
```

##### Checking that a field has an specific previous random generated information:

 * /^the "(?P<field>(?:[^"]|\\")*)" field should contains "(?P<value>(?:[^"]|\\")*)" value$/

```javascript
$this->assertFieldContainsValue("f_customer_first_name", "name");
```

It will fail if field contains a value different than the one given.

##### Filling a field with a custom random value

 * Fill :field with :value

```javascript
Then Fill "#text" with "{RandomText(100)}"
```

It brings the option to customize some properties of the random values.


# Values and customization

List of the posible values that can be used

#### Email
 * {RandomEmail}

RandomEmail does not accept parameters

#### Name
 * {RandomName}

RandomName does not accept parameters

#### Surname
 * {RandomSurname}

RandomSurname does not accept parameters

#### Number
 * {RandomNumber}

 * {RandomNumber(N,M)}

RandomNumber accepts at most two parameters, returns a random number between the two given or between 0 and 9 if no params given.

#### Phone
 * {RandomPhone}

 * {RandomPhone(N)}

RandomPhone accepts at most a parameter, the number of numbers in the string.
If no parameter is given, it will return a 15 digits number.

#### Text
 * {RandomText}

 * {RandomText(N)}

RandomText accepts at most a parameter, the number of characters in the string.
If no parameter is given, it will return a 15 chars string.

#### LoremIpsum
 * {RandomLoremIpsum}

 * {RandomLoremIpsum(N)}

RandomLoremIpsum accepts at most a parameter, the number of paragraphs in the string.
If no parameter is given, it will return a 2 paragraphs string.


# Copyright

Copyright (c) 2016 Jordi Girós Guerrero. See LICENSE for details.
