<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
    use Behat\MinkExtension\Context\MinkContext;
    
    /**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }
    
    /**
     * @Given /^A user named "([^"]*)" with password "([^"]*)"$/
     */
    public function aUserNamedWithPassword($arg1, $arg2)
    {
        
        throw new \Behat\Behat\Tester\Exception\PendingException();
    }
    
    /**
     * @Given /^I am logged in as "([^"]*)"$/
     */
    public function iAmLoggedInAs($arg1)
    {
        throw new \Behat\Behat\Tester\Exception\PendingException();
    }
}
