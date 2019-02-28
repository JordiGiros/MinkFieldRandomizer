# Behat Mink Field Randomizer
`MinkFieldRandomizer` is a random (with sense) information generator for filling form fields in Behat Mink tests. 
It brings the option to run your tests in a more realistic way changing the information you use to fill in the forms 
in every test you run.

[![CircleCI](https://circleci.com/gh/integratedexperts/MinkFieldRandomizer.svg?style=shield)](https://circleci.com/gh/integratedexperts/MinkFieldRandomizer)

## Installing with Composer
```
composer require jordigiros/MinkFieldRandomizer
```

## How to use
`MinkFieldRandomizer` includes a trait `FieldRandomizerTrait` that has some extra methods that will permit you to randomize your features involving forms.

You only need to add that trait to your main `FeatureContext` Behat Context as follows:

```
class FeatureContext extends MinkContext {

    use FieldRandomizerTrait;

}
```

This way you can use the new steps added by the trait directly in the gherkin feature.

# Steps added by `MinkFieldRandomizer`

Documentation

## Common methods

### Generate and fill with new random values

 * When I fill in :field with a random mail
 * When I fill in :field with a random name
 * When I fill in :field with a random surname
 * When I fill in :field with a random phone
 * When I fill in :field with a random number
 * When I fill in :field with a random text
 * When I fill in :field with a random loremipsum

### Fill in with previously generated random values

 * When I fill in :field with an existent mail
 * When I fill in :field with an existent name
 * When I fill in :field with an existent surname
 * When I fill in :field with an existent phone
 * When I fill in :field with an existent number
 * When I fill in :field with an existent text
 * When I fill in :field with an existent loremipsum

Note: If you didn't generate the random information previously (Generate and fill with new random information) they won't work.

### Filling multiple fields with a TableNode object:

 * Fills in form fields with provided table. 

Gherkin:
```
When I fill in fields with provided table:
| f_outbound_accommodation_name 			| {RandomName} 		|
| f_outbound_accommodation_phone_number 	| {RandomNumber} 	|
| f_outbound_accommodation_address_1 		| {RandomText(10)}	|
````

PHP:
```
$hotel = new TableNode ([  
    ['f_outbound_accommodation_name', '{RandomName}'],
    ['f_outbound_accommodation_phone_number', '{RandomNumber}'],
    ['f_outbound_accommodation_address_1', '{RandomText(10)}'],   
]);
$this->fillFilteredFields($hotel);
```

#### Checking that a field has an specific previous random generated information:

Gherkin:
```
Then the ":field" field should contains ":value" value
```
PHP:
```
$this->frtAssertFieldContainsValue('f_customer_first_name', 'name');
```

It will fail if field contains a value different than the one given.

### Filling a field with a custom random value
Gherkin:
```
When I fill in :field with :value
```
PHP:
```
When I fill in "#text" with "{RandomText(100)}"
```

It brings the option to customize some properties of the random values.


# Values and customization

| Name          | Value                                             | Comment                               |
|---------------|---------------------------------------------------|---------------------------------------|
|`Email`        |`{RandomEmail}`<br/>`{RandomEmail(domain)}`          |RandomEmail accepts at most a parameter, the domain for the random email address - if none is given gmail.com is provided.|
|`Name`         |`{RandomName}`                                     |RandomName does not accept parameters  |
|`Surname`      |`{RandomSurname}`                                  |RandomSurname does not accept parameters|
|`Number`       |`{RandomNumber}`<br/>`{RandomNumber(N,M)}`         |RandomNumber accepts at most two parameters, returns a random number between the two given or between 0 and 9 if no params given.|
|`Phone`        |`{RandomPhone}`<br/>`{RandomPhone(N)}`             |RandomPhone accepts at most a parameter, the number of numbers in the string. If no parameter is given, it will return a 15 digits number.|
|`Text`         |`{RandomText}`<br/>`{RandomText(N)}`               |RandomText accepts at most a parameter, the number of characters in the string.If no parameter is given, it will return a 15 chars string.|
|`LoremIpsum`   |`{RandomLoremIpsum}`<br/>`{RandomLoremIpsum(N)}`   |RandomLoremIpsum accepts at most a parameter, the number of paragraphs in the string. If no parameter is given, it will return a 2 paragraphs string.|


# Copyright

Copyright (c) 2016 Jordi Girós Guerrero. See LICENSE for details.
Contributors: Jordi Bisbal, Alex Skrypnyk.
