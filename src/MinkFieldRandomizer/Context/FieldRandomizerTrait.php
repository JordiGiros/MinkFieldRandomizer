<?php

namespace MinkFieldRandomizer\Context;

use Behat\Gherkin\Node\TableNode;
use MinkFieldRandomizer\Filter\FilterEngine;

trait FieldRandomizerTrait
{

    protected $frtLoremipsum;

    protected $frtMail;

    protected $frtPhone;

    protected $frtName;

    protected $frtSurname;

    protected $frtNumber;

    protected $frtText;

    public function setFrtLoremIpsum($frtLoremipsum)
    {
        $this->frtLoremipsum = $frtLoremipsum;

        return $this;
    }

    public function getFrtLoremIpsum()
    {
        return $this->frtLoremipsum;
    }

    public function setFrtMail($frtMail)
    {
        $this->frtMail = $frtMail;

        return $this;
    }

    public function getFrtMail()
    {
        return $this->frtMail;
    }

    public function setFrtPhone($frtPhone)
    {
        $this->frtPhone = $frtPhone;

        return $this;
    }

    public function getFrtPhone()
    {
        return $this->frtPhone;
    }

    public function setFrtName($frtName)
    {
        $this->frtName = $frtName;

        return $this;
    }

    public function getFrtName()
    {
        return $this->frtName;
    }

    public function setFrtSurname($frtSurname)
    {
        $this->frtSurname = $frtSurname;

        return $this;
    }

    public function getFrtSurname()
    {
        return $this->frtSurname;
    }

    public function setFrtNumber($frtNumber)
    {
        $this->frtNumber = $frtNumber;

        return $this;
    }

    public function getFrtNumber()
    {
        return $this->frtNumber;
    }

    public function setFrtText($frtText)
    {
        $this->frtText = $frtText;

        return $this;
    }

    public function getFrtText()
    {
        return $this->frtText;
    }

    public function frtFilterValue($value)
    {
        return (new FilterEngine())->filter($value);
    }

    /**
     * @When /^(?:|I )fill in "(?P<field>(?:[^"]|\\")*)" with a random loremipsum$/
     */
    public function frtFillFieldWithRandomLoremIpsum($field)
    {
        $value = $this->frtFilterValue('{RandomLoremIpsum}');
        $this->setFrtLoremIpsum($value);
        $this->frtFillRandomField($field, $value);
    }

    /**
     * @When /^(?:|I )fill in "(?P<field>(?:[^"]|\\")*)" with an existent loremipsum$/
     */
    public function frtFillFieldWithExistentLoremIpsum($field)
    {
        $this->frtFillRandomField($field, $this->getFrtLoremIpsum());
    }

    /**
     * @When /^(?:|I )fill in "(?P<field>(?:[^"]|\\")*)" with a random mail$/
     */
    public function frtFillFieldWithRandomMail($field)
    {
        $value = $this->frtFilterValue('{RandomEmail}');
        $this->setFrtMail($value);
        $this->frtFillRandomField($field, $value);
    }

    /**
     * @When /^(?:|I )fill in "(?P<field>(?:[^"]|\\")*)" with an existent mail$/
     */
    public function frtFillFieldWithExistentMail($field)
    {
        $this->frtFillRandomField($field, $this->getFrtMail());
    }

    /**
     * @When /^(?:|I )fill in "(?P<field>(?:[^"]|\\")*)" with a random phone$/
     */
    public function frtFillFieldWithRandomPhone($field)
    {
        $value = $this->frtFilterValue('{RandomPhone(9)}');
        $this->setFrtPhone($value);
        $this->frtFillRandomField($field, $value);
    }

    /**
     * @When /^(?:|I )fill in "(?P<field>(?:[^"]|\\")*)" with an existent phone$/
     */
    public function frtFillFieldWithExistentPhone($field)
    {
        $this->frtFillRandomField($field, $this->getFrtPhone());
    }

    /**
     * @When /^(?:|I )fill in "(?P<field>(?:[^"]|\\")*)" with a random name$/
     */
    public function frtFillFieldWithRandomName($field)
    {
        $value = $this->frtFilterValue('{RandomName}');
        $this->setFrtName($value);
        $this->frtFillRandomField($field, $value);
    }

    /**
     * @When /^(?:|I )fill in "(?P<field>(?:[^"]|\\")*)" with an existent name$/
     */
    public function frtFillFieldWithExistentName($field)
    {
        $this->frtFillRandomField($field, $this->getFrtName());
    }

    /**
     * @When /^(?:|I )fill in "(?P<field>(?:[^"]|\\")*)" with a random surname$/
     */
    public function frtFillFieldWithRandomSurname($field)
    {
        $value = $this->frtFilterValue('{RandomSurname}');
        $this->setFrtSurname($value);
        $this->frtFillRandomField($field, $value);
    }

    /**
     * @When /^(?:|I )fill in "(?P<field>(?:[^"]|\\")*)" with an existent surname$/
     */
    public function frtFillFieldWithExistentSurname($field)
    {
        $this->frtFillRandomField($field, $this->getFrtSurname());
    }

    /**
     * @When /^(?:|I )fill in "(?P<field>(?:[^"]|\\")*)" with a random number$/
     */
    public function frtFillFieldWithRandomNumber($field)
    {
        $value = $this->frtFilterValue('{RandomNumber}');
        $this->setFrtNumber($value);
        $this->frtFillRandomField($field, $value);
    }

    /**
     * @When /^(?:|I )fill in "(?P<field>(?:[^"]|\\")*)" with an existent number$/
     */
    public function frtFillFieldWithExistentNumber($field)
    {
        $this->frtFillRandomField($field, $this->getFrtNumber());
    }

    /**
     * @When /^(?:|I )fill in "(?P<field>(?:[^"]|\\")*)" with a random text$/
     */
    public function frtFillFieldWithRandomText($field)
    {
        $value = $this->frtFilterValue('{RandomText}');
        $this->setFrtText($value);
        $this->frtFillRandomField($field, $value);
    }

    /**
     * @When /^(?:|I )fill in "(?P<field>(?:[^"]|\\")*)" with an existent text$/
     */
    public function frtFillFieldWithExistentText($field)
    {
        $this->frtFillRandomField($field, $this->getFrtText());
    }

    /**
     * Checks, that form field with specified id|name|label|value has registered value.
     *
     * behat
     */
    public function frtAssertFieldContainsValue($field, $value)
    {
        $value = $this->{$value};

        return $this->assertSession()->fieldValueEquals($field, $value);
    }

    /**
     * @When /^(?:|I )fill in "(?P<field>(?:[^"]|\\")*)" with :value$/
     */
    public function frtFillRandomField($field, $value)
    {
        $this->fillField($field, $this->frtFilterValue($value));
    }

    /**
     * Fills in form fields with provided table.
     *
     * @When I fill in fields with provided table:
     */
    public function frtFillFilteredFields(TableNode $fields)
    {
        foreach ($fields->getRowsHash() as $field => $value) {
            $this->frtFillRandomField($field, $value);
        }
    }

    protected function frtAssertFieldValue($field, $value)
    {
        return $this->fieldValueEquals($field, $value);
    }

    protected function frtFieldValueEquals($field, $value)
    {
        $container = $this->getSession()->getPage()->findField($field);
        $actual = $container->getValue();
        $regex = '/^'.preg_quote($value, '/').'$/ui';

        return preg_match($regex, $actual);
    }
}
