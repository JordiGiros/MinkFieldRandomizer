<?php

namespace Suntransfers\BehatContext\Context;

use Behat\Gherkin\Node\TableNode;
use Behat\Mink\Exception\ElementNotFoundException;
use Filter\FilterEngine;
use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Behat\Context\SnippetAcceptingContext;
use Exception;

class FilterContext implements Context
{

    private $mail;

    private $phone;

    private $name;

    private $surname;

    private $featureContext;

    private $javascriptContext;

    /**
     * @BeforeScenario
     * @param BeforeScenarioScope $scope
     */
    public function gatherContexts(BeforeScenarioScope $scope)
    {
        $environment = $scope->getEnvironment();

        $this->featureContext = $environment->getContext('Suntransfers\BehatContext\Context\FeatureContext');
        $this->javascriptContext  = $environment->getContext(JavascriptContext::class);
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
        return $this;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setSurname($Surname)
    {
        $this->surname = $Surname;
        return $this;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function filterValue($value)
    {
        return (new FilterEngine())->filter($value);
    }

    /**
     * @Then Fill :field with a random mail
     * @param $field
     */
    public function fillFieldWithRandomMail($field)
    {
        $value = $this->filterValue('{RandomEmail}');
        $this->setMail($value);
        $this->fillField($field, $value);
    }

    /**
     * @Then Fill :field with a existent mail
     * @param $field
     */
    public function fillFieldWithExistentMail($field)
    {
        $this->fillField($field, $this->getMail());
    }

    /**
     * @Then Fill :field with a random phone
     * @param $field
     */
    public function fillFieldWithRandomPhone($field)
    {
        $value = $this->filterValue('{RandomPhone(9)}');
        $this->setPhone($value);
        $this->fillField($field, $value);
    }

    /**
     * @Then Fill :field with a existent phone
     * @param $field
     */
    public function fillFieldWithExistentPhone($field)
    {
        $this->fillField($field, $this->getPhone());
    }

    /**
     * @Then Fill :field with a random name
     * @param $field
     */
    public function fillFieldWithRandomName($field)
    {
        $value = $this->filterValue('{RandomName}');
        $this->setName($value);
        $this->fillField($field, $value);
    }

    /**
     * @Then Fill :field with a existent name
     * @param $field
     */
    public function fillFieldWithExistentName($field)
    {
        $this->fillField($field, $this->getName());
    }

    /**
     * @Then Fill :field with a random surname
     * @param $field
     */
    public function fillFieldWithRandomSurname($field)
    {
        $value = $this->filterValue('{RandomSurname}');
        $this->setSurname($value);
        $this->fillField($field, $value);
    }

    /**
     * @Then Fill :field with a existent surname
     * @param $field
     */
    public function fillFieldWithExistentSurname($field)
    {
        $this->fillField($field, $this->getSurname());
    }

    /**
     * Checks, that form field with specified id|name|label|value has registered value.
     *
     * @Then /^the "(?P<field>(?:[^"]|\\")*)" field should contains "(?P<value>(?:[^"]|\\")*)" value$/
     * @param $field
     * @param $value
     */
    public function assertFieldContainsValue($field, $value)
    {
        $value = $this->{$value};
        return $this->featureContext->assertSession()->fieldValueEquals($field, $value);
    }

    public function assertFieldValue($field, $value)
    {
        return $this->fieldValueEquals($field, $value);
    }

    public function fieldValueEquals($field, $value)
    {
        $container = $this->featureContext->getSession()->getPage()->findField($field);
        $actual = $container->getValue();
        $regex = '/^'.preg_quote($value, '/').'$/ui';

        return preg_match($regex, $actual);
    }

    /**
     * @param $field
     * @param $value
     */
    public function fillField($field, $value)
    {
        $this->featureContext->fillField($field, $this->filterValue($value));
    }

    /**
     * Fills in form fields with provided table.
     */
    public function fillFilteredFields(TableNode $fields)
    {
        foreach ($fields->getRowsHash() as $field => $value) {
            $this->fillField($field, $value);
        }
    }

    /**
     * Selects option in select field with specified id|name|label|value.
     *
     * @Then I select :arg1 option from :arg2
     *
     * @param $select
     * @param $option
     * @throws ElementNotFoundException
     */
    public function iSelectOptionFrom($option, $select)
    {
        $this->featureContext->getSession()->getPage()->selectFieldOption($select, $this->filterValue($option));
    }
}