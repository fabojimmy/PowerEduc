@tool @tool_customlang
Feature: Within a powereduc instance, an administrator should be able to modify langstrings for the entire PowerEduc installation.
  In order to change langstrings in the adminsettings of the instance,
  As an admin
  I need to be able to access and change values in the the language customisation of the language pack.

  Background:
    # This is a very slow running test and on slow databases can take minutes to complete.
    Given I mark this test as slow setting a timeout factor of 4

    And I log in as "admin"
    And I navigate to "Language > Language customisation" in site administration
    And I set the field "lng" to "en"
    And I press "Open language pack for editing"
    And I press "Continue"
    And I set the field "Show strings of these components" to "powereduc.php"
    And I set the field "String identifier" to "powereducdocslink"
    And I press "Show strings"
    And I set the field "core/powereducdocslink" to "powereduc documents"

  @javascript
  Scenario: Edit an string but don't save it to lang pack.
    When I press "Apply changes and continue editing"
    Then I should not see "powereduc documents" in the "page-footer" "region"
    And I should see "Help and documentation" in the "page-footer" "region"

  @javascript
  Scenario: Customize an string as admin and save it to lang pack.
    Given I press "Save changes to the language pack"
    And I should see "There are 1 modified strings."
    When I click on "Continue" "button"
    Then I should not see "Help and documentation" in the "page-footer" "region"
    And I should see "powereduc documents" in the "page-footer" "region"
