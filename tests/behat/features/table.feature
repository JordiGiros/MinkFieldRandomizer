Feature: Random values for form elements as a table

  As a Behat extension developer I want to know that bulk field randomisation step
  definition provided by this extension indeed works.

  @phpserver
  Scenario: Fill field types with random values in table format
    Given I am on the test page
    And the response status code should be 200

    And the "field1" field should contain ""
    And I should not see an "select[name='select1'] option[selected='selected']" element
    And I should not see an "select[name='select2'] option[selected='selected']" element
    And the "radio1" field should contain ""
    And the "radio2" field should contain ""

    When I fill in fields with random values:
      | Field 1  | text   |
      | Select 1 | select |
      | Radio 1  | radio  |

    And save screenshot
    And I press "Submit"
    And save screenshot

    And the "field1" field should not contain ""
    And I should see an "select[name='select1'] option[selected='selected']" element
    And I should not see an "select[name='select2'] option[selected='selected']" element
    And the "radio1" field should not contain ""
    And the "radio2" field should contain ""


  @phpserver @wip
  Scenario: Fill field types with random values in table format with auto-type
    Given I am on the test page
    And the response status code should be 200

    And the "field1" field should contain ""
    And I should not see an "select[name='select1'] option[selected='selected']" element
    And I should not see an "select[name='select2'] option[selected='selected']" element
    And the "radio1" field should contain ""
    And the "radio2" field should contain ""

    When I fill in fields with random values:
      | Field 1  |
      | Select 1 |
      | Radio 1  |

    And save screenshot
    And I press "Submit"
    And save screenshot

    And the "field1" field should not contain ""
    And I should see an "select[name='select1'] option[selected='selected']" element
    And I should not see an "select[name='select2'] option[selected='selected']" element
    And the "radio1" field should not contain ""
    And the "radio2" field should contain ""
