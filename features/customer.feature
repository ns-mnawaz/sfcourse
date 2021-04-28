Feature: List of customers
  In order to retrieve the list of customers
  As a user
  I must visit the customers page

  Scenario: I want a list of customers
    Given I am an unauthenticated user
    When I request a list of customers from "http://localhost:8000/health"
    Then The results should include a customer with ID 123
