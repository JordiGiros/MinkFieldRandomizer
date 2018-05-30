Feature: HTML screenshots

  Ensure that screenshots for HTML-base driver can be captured.

  @phpserver
  Scenario: Capture a screenshot using HTML-based driver
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
