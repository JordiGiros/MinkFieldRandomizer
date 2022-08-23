<?php

/**
 * @file
 * Feature context Behat testing.
 */

use Behat\Behat\Context\Context;
use Behat\Mink\Exception\ExpectationException;
use Behat\MinkExtension\Context\MinkContext;
use MinkFieldRandomizer\Context\FieldRandomizerTrait;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context
{

    use FieldRandomizerTrait;

    /**
     * Go to the test page.
     *
     * @Given /^(?:|I )am on (?:|the )test page$/
     * @When /^(?:|I )go to (?:|the )test page$/
     */
    public function goToTestPage()
    {
        $this->visitPath('form.html');
    }

    /**
     * @Then /^(?:|I )see fields "(?P<field1>(?:[^"]|\\")*)" and "(?P<field2>(?:[^"]|\\")*)" contain the same values$/
     *
     * @param string $field1
     *   The first field.
     * @param string $field2
     *   The second field.
     */
    public function thenTwoFieldsShouldContainSameValues($field1, $field2)
    {
        $field1 = $this->getSession()->getPage()->findField($field1);
        if (!$field1) {
            throw new RuntimeException(sprintf('Unable to find first field "%s"', $field1));
        }
        $field2 = $this->getSession()->getPage()->findField($field2);
        if (!$field2) {
            throw new RuntimeException(sprintf('Unable to find second field "%s"', $field2));
        }

        $value1 = $field1->getValue();
        $value2 = $field2->getValue();

        if ($value1 !== $value2) {
            throw new \Exception(sprintf('Value from first field "%s" is not equal to value from second field "%s"', $value1, $value2));
        }
    }

    /**
     * Checks, that form field with specified id|name|label|value doesn't have a value matching anoter value.
     * Example: Then the "username" field should not match "batman"
     * Example: And the "username" field should not match "batman"
     *
     * @Then /^the "(?P<field>(?:[^"]|\\")*)" field should not match "(?P<value>(?:[^"]|\\")*)"$/
     */
    public function assertFieldNotMatches($field, $value)
    {
        $field = $this->fixStepArgument($field);
        $value = $this->fixStepArgument($value);

        $assertSession = $this->assertSession();
        $node = $assertSession->fieldExists($field);
        $actual = $node->getValue();
        $message = sprintf('The field "%s" value "%s" has a match for "%s", but it should not.', $field, $actual, $value);
        if (strpos($actual, $value) !== false) {
            throw new ExpectationException($message, $this->getSession()->getDriver());
        }
    }
}
