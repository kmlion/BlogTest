Feature: Authentification
  Sign In et Log in test


  Scenario: Log in with bad credentials
    Given I am on "/login"
    When I fill in the following:
      | username | bar |
      | password | foo |
    And I press "Connexion"
    Then I should be on "/login"
    And I should see "Bad credentials"

  Scenario: Sign up
    Given I am on "/register"
    When I fill in the following:
      | user_username | foo |
      | user_password | bar |
      | user_email | foo@test.com |
    And I press "user_sign_in"
    Then I should be on "/"
    And I should see "Account created."

  Scenario: Log in with Foo
    Given A user named "foo" with password "bar"
    And I am on "/login"
    When I fill in the following:
      | username | foo |
      | password | bar |
    And I press "Connexion"
    Then I should be on "/"
    And I should see "Logout"

  Scenario: Logout
    Given I am logged in as "foo"
    And I go to "/logout"
    Then I should be on "/"

  Scenario: Log in with admin
    Given I am on "/login"
    When I fill in the following:
      | username | admin |
      | password | admin |
    And I press "Connexion"
    And I go to "/admin"
    Then I should be on "/admin"
    And I should see "espace admin"