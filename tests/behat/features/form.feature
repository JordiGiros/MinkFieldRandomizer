Feature: Random values for form elements

  As a Behat extension developer I want to know that field randomisation step
  definitions provided by this extension indeed work.

  @phpserver
  Scenario: Fill field types with random data
    Given I am on the test page
    And the response status code should be 200
    And the "field1" field should contain ""
    And the "field2" field should contain ""

    # Checking that initial field filling and clearing works as expected.
    When I fill in "field1" with "test1"
    Then the "field1" field should contain "test1"
    When I fill in "field2" with "test2"
    Then the "field2" field should contain "test2"
    Then I save screenshot
    When I fill in "field1" with ""
    And the "field1" field should contain ""
    And I fill in "field2" with ""
    And the "field2" field should contain ""

    When I fill in "field1" with a random loremipsum
    And  I fill in "field2" with an existent loremipsum
    And  I fill in "field3" with an existent loremipsum
    Then I see fields "field1" and "field2" contain the same values
    Then I see fields "field1" and "field3" contain the same values
    Then I see fields "field2" and "field3" contain the same values

    When I fill in "field1" with a random name
    And  I fill in "field2" with an existent name
    And  I fill in "field3" with an existent name
    Then I see fields "field1" and "field2" contain the same values
    Then I see fields "field1" and "field3" contain the same values
    Then I see fields "field2" and "field3" contain the same values

    When I fill in "field1" with a random surname
    And  I fill in "field2" with an existent surname
    And  I fill in "field3" with an existent surname
    Then I see fields "field1" and "field2" contain the same values
    Then I see fields "field1" and "field3" contain the same values
    Then I see fields "field2" and "field3" contain the same values

    When I fill in "field1" with a random number
    And  I fill in "field2" with an existent number
    And  I fill in "field3" with an existent number
    Then I see fields "field1" and "field2" contain the same values
    Then I see fields "field1" and "field3" contain the same values
    Then I see fields "field2" and "field3" contain the same values

    When I fill in "field1" with a random mail
    And  I fill in "field2" with an existent mail
    And  I fill in "field3" with an existent mail
    Then I see fields "field1" and "field2" contain the same values
    Then I see fields "field1" and "field3" contain the same values
    Then I see fields "field2" and "field3" contain the same values

    When I fill in "field1" with a random phone
    And  I fill in "field2" with an existent phone
    And  I fill in "field3" with an existent phone
    Then I see fields "field1" and "field2" contain the same values
    Then I see fields "field1" and "field3" contain the same values
    Then I see fields "field2" and "field3" contain the same values

    When I fill in "field1" with a random text
    And  I fill in "field2" with an existent text
    And  I fill in "field3" with an existent text
    Then I see fields "field1" and "field2" contain the same values
    Then I see fields "field1" and "field3" contain the same values
    Then I see fields "field2" and "field3" contain the same values

    When I fill in "textarea1" with a random text
    And  I fill in "textarea2" with an existent text
    And  I fill in "textarea3" with an existent text
    Then I see fields "textarea1" and "textarea2" contain the same values
    Then I see fields "textarea1" and "textarea3" contain the same values
    Then I see fields "textarea2" and "textarea3" contain the same values

    When I fill in fields with provided table:
      | field1 | {RandomEmail} |
    Then the "field1" field should not contain ""

    When I fill in fields with provided table:
      | field1 | {RandomName} |
    Then the "field1" field should not contain ""

    When I fill in fields with provided table:
      | field1 | {RandomSurname} |
    Then the "field1" field should not contain ""

    When I fill in fields with provided table:
      | field1 | {RandomNumber} |
    Then the "field1" field should not contain ""

    When I fill in fields with provided table:
      | field1 | {RandomNumber(2,4)} |
    Then the "field1" field should not contain ""

    When I fill in fields with provided table:
      | field1 | {RandomPhone} |
    Then the "field1" field should not contain ""

    When I fill in fields with provided table:
      | field1 | {RandomPhone(13)} |
    Then the "field1" field should not contain ""

    When I fill in fields with provided table:
      | field1 | {RandomText} |
    Then the "field1" field should not contain ""

    When I fill in fields with provided table:
      | field1 | {RandomLoremIpsum} |
    Then the "field1" field should not contain ""

    And I should not see an "select[name='select1'] option[selected='selected']" element
    And I should not see an "select[name='select2'] option[selected='selected']" element
    When I select random value from "Select 1" field
    And save screenshot
    And I press "Submit"
    And save screenshot
    And I should see an "select[name='select1'] option[selected='selected']" element
    And I should not see an "select[name='select2'] option[selected='selected']" element
    And save screenshot

    And the "radio1" field should contain ""
    And the "radio2" field should contain ""
    When I check random radio from "Radio 1" field
    And save screenshot
    And I press "Submit"
    And the "radio1" field should not contain ""
    And the "radio2" field should contain ""
    And save screenshot

