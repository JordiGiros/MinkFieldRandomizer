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
     * @When /^(?:|I )select random value from "(?P<field>(?:[^"]|\\")*)" field$/
     */
    public function frtSelectRandomValue($field)
    {
        $field = $this->fixStepArgument($field);

        /** @var \Behat\Mink\Element\DocumentElement $page */
        $page = $this->getSession()->getPage();

        /** @var \Behat\Mink\Element\NodeElement $select */
        $select = $page->findField($field);
        if (!$select) {
            throw new \Exception(sprintf('Unable to find field "%s"', $field));
        }

        /** @var \Behat\Mink\Element\NodeElement [] $options */
        $options = $select->findAll('css', 'option');
        $optionValues = [];
        foreach ($options as $option) {
            if ($option->isSelected()) {
                continue;
            }
            $optionValues[] = $option->getValue();
        }

        shuffle($optionValues);
        $optionValue = reset($optionValues);

        $page->selectFieldOption($field, $optionValue);
    }

    /**
     * Select random radio value for field labeled with <label>.
     *
     * @When /^(?:|I )check random radio from "(?P<label>(?:[^"]|\\")*)" field$/
     */
    public function frtCheckRandomRadioValue($labelText)
    {
        $labelText = $this->fixStepArgument($labelText);

        /** @var \Behat\Mink\Element\DocumentElement $page */
        $page = $this->getSession()->getPage();

        /** @var \Behat\Mink\Element\NodeElement [] $radios */
        $radios = $page->findAll('css', 'input[type="radio"]');

        $filteredRadios = [];
        foreach ($radios as $radio) {
            $id = $radio->getAttribute('id');
            $name = $radio->getAttribute('name');
            /** @var \Behat\Mink\Element\NodeElement [] $labelsFromIds */
            $labelsFromIds = $page->findAll('css', 'label[for="'.$id.'"]');
            /** @var \Behat\Mink\Element\NodeElement [] $labelsFromNames */
            $labelsFromNames = $page->findAll('css', 'label[for="'.$name.'"]');
            /** @var \Behat\Mink\Element\NodeElement [] $labels */
            $labels = array_merge($labelsFromIds, $labelsFromNames);
            foreach ($labels as $label) {
                if ($label->getText() === $labelText) {
                    $filteredRadios[] = $radio;
                    continue;
                }
            }
        }

        if (empty($filteredRadios)) {
            throw new \Exception("No matching radios were found for label with text {$labelText}");
        }

        shuffle($filteredRadios);
        /** @var \Behat\Mink\Element\NodeElement $radio */
        $radio = reset($filteredRadios);

        $page->selectFieldOption($radio->getAttribute('id'), $radio->getAttribute('value'));
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

    /**
     * Fills in form fields with provided table.
     *
     * @When I fill in fields with random values:
     *
     * @example
     * When I fill in fields with random values:
     *   | Field 1  | text   |
     *   | Select 1 | select |
     *   | Radio 1  | radio  |
     */
    public function frtFillRandomFields(TableNode $fields)
    {
        foreach ($fields->getRowsHash() as $field => $type) {
            $field = $this->fixStepArgument($field);
            if (empty($type)) {
                $type = $this->frtGuessFieldType($field);
            }

            switch ($type) {
                case 'text':
                case 'textarea':
                    $value = '{RandomText}';
                    $this->frtFillRandomField($field, $value);
                    break;

                case 'select':
                    $this->frtSelectRandomValue($field);
                    break;

                case 'radio':
                    $this->frtCheckRandomRadioValue($field);
                    break;

                default:
                    throw new \RuntimeException(sprintf('Provided type "%s" for field "%s" is not supported', $type, $field));
            }
        }
    }

    protected function frtGuessFieldType($field)
    {
        /** @var \Behat\Mink\Element\DocumentElement $page */
        $page = $this->getSession()->getPage();
        $found = $page->findField($field);
        if (!$found) {
            throw new \Exception(sprintf('Unable to find field "%s"', $field));
        }

        $tag = $found->getTagName();
        switch ($tag) {
            case 'input':
                $type = $found->getAttribute('type');
                break;

            case 'textarea':
            case 'select':
                $type = $tag;
                break;

            default:
                throw new \Exception(sprintf('Unsupported tag "%s" for a filed provided whet trying to guess type for field "%s"', $tag, $field));
        }


        if (empty($type)) {
            throw new \Exception(sprintf('Unable to guess type for field "%s"', $field));
        }

        return $type;
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
