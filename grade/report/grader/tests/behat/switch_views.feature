@gradereport @gradereport_grader
Feature: We can change what we are viewing on the grader report
  In order to check the expected results are displayed
  As a teacher
  I need to assign grades and check that they display correctly in the gradebook when switching between views.

  Background:
    Given the following "courses" exist:
      | fullname | shortname | format |
      | Course 1 | C1        | topics |
    And the following "users" exist:
      | username | firstname | lastname | email                |
      | teacher1 | Teacher   | 1        | teacher1@example.com |
      | student1 | Student   | 1        | student1@example.com |
      | student2 | Student   | 2        | student2@example.com |
    And the following "course enrolments" exist:
      | user     | course | role           |
      | teacher1 | C1     | editingteacher |
      | student1 | C1     | student        |
      | student2 | C1     | student        |
    And the following "activities" exist:
      | activity | course | section | name                   | intro                   | assignsubmission_onlinetext_enabled | submissiondrafts |
      | assign   | C1     | 1       | Test assignment name 1 | Submit your online text | 1                                   | 0                |
      | assign   | C1     | 1       | Test assignment name 2 | submit your online text | 1                                   | 0                |
    And the following "mod_assign > submissions" exist:
      | assign                 | user     | onlinetext                            |
      | Test assignment name 1 | student1 | This is a submission for assignment 1 |
      | Test assignment name 2 | student1 | This is a submission for assignment 2 |
    And the following "grade items" exist:
      | itemname     | grademin | grademax | course |
      | Manual grade | 20       | 40       | C1     |
    And the following "grade grades" exist:
      | gradeitem              | user     | grade |
      | Test assignment name 1 | student1 | 80    |
      | Test assignment name 2 | student1 | 90    |
      | Manual grade           | student1 | 30    |
    And I log in as "teacher1"

  @javascript
  Scenario: View and minimise the grader report containing hidden activities
    When I am on "Course 1" course homepage with editing mode on
    And I open "Test assignment name 2" actions menu
    And I click on "Hide" "link" in the "Test assignment name 2" activity
    And I am on "Course 1" course homepage with editing mode off
    And I navigate to "View > Grader report" in the course gradebook
    And I should see "Test assignment name 1"
    And I should see "Test assignment name 2"
    And I should see "Manual grade"
    And I should see "Course total"
    And the following should exist in the "user-grades" table:
      | -1-                | -4-       | -5-       | -6-       | -7-       |
      | Student 1          | 80        | 90        | 30        | 170       |
    And I click on "Change to aggregates only" "link"
    And I should not see "Test assignment name 1"
    And I should not see "Test assignment name 2"
    And I should not see "Manual grade"
    And I should see "Course total"
    And the following should exist in the "user-grades" table:
      | -1-                | -4-       |
      | Student 1          | 170       |
    And I click on "Change to grades only" "link"
    And I should see "Test assignment name 1"
    And I should see "Test assignment name 2"
    And I should see "Manual grade"
    And I should not see "Course total"
    And the following should exist in the "user-grades" table:
      | -1-                | -4-       | -5-       | -6-       |
      | Student 1          | 80        | 90        | 30        |

  @javascript @skip_chrome_zerosize
  Scenario: View and minimise the grader report containing hidden activities without the 'powereduc/grade:viewhidden' capability
    When I am on "Course 1" course homepage with editing mode on
    And I open "Test assignment name 2" actions menu
    And I click on "Hide" "link" in the "Test assignment name 2" activity
    And I log out
    And I log in as "admin"
    And I set the following system permissions of "Teacher" role:
      | capability | permission |
      | powereduc/grade:viewhidden | Prevent |
    And I log out
    And I log in as "teacher1"
    And I am on "Course 1" course homepage
    And I navigate to "View > Grader report" in the course gradebook
    And I should see "Test assignment name 1"
    And I should see "Test assignment name 2"
    And I should see "Manual grade"
    And I should see "Course total"
    And the following should exist in the "user-grades" table:
      | -1-                | -4-       | -5-       | -6-       | -7-       |
      | Student 1          | 80        | -         | 30        | 105.71    |
    And I click on "Change to aggregates only" "link"
    And I should not see "Test assignment name 1"
    And I should not see "Test assignment name 2"
    And I should not see "Manual grade"
    And I should see "Course total"
    And the following should exist in the "user-grades" table:
      | -1-                | -4-       |
      | Student 1          | 105.71    |
    And I click on "Change to grades only" "link"
    And I should see "Test assignment name 1"
    And I should see "Test assignment name 2"
    And I should see "Manual grade"
    And I should not see "Course total"
    And the following should exist in the "user-grades" table:
      | -1-                | -4-       | -5-       | -6-       |
      | Student 1          | 80        | -         | 30        |
