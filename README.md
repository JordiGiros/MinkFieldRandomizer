# MinkFieldRandomizer
MinkFieldRandomizer is a random (with sense) information generator for filling browser form fields in Behat/Mink/Selenium tests. It brings the option to run your tests in a more realistic way changing the information you use to fill in the forms in every test you run.

# Add it using composer
Add the next line in require-dev to your composer.json file:
"jordigiros/MinkFieldRandomizer": "dev-master"

# How to use it
MinkFieldRandomizer includes a file called FilterContext.php that containes a PHP trait class. This class has some extra methods that will permit you to randomize your features involving forms.

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

Under construction...
