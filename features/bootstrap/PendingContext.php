<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use PHPUnit\Framework\Assert;

class PendingContext implements SnippetAcceptingContext
{
    /**
     * @Given Execute this scenario                                                                                                                                                                                                          
     */                                                                                                                                                                                                                                      
    public function executeThisScenario()                                                                                                                                                                                                    
    {                                                                                                                                                                                                                                        
        throw new PendingException();                                                                                                                                                                                                        
    }                                                                                                                                                                                                                                        

    /**
     * @When This is run
     */
    public function thisIsRun()
    {
        throw new PendingException();
    }

    /**
     * @Then Throw the pending exception
     */
    public function throwThePendingException()
    {
        throw new PendingException();
    }
}
