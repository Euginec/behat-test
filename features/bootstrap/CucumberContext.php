<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use PHPUnit\Framework\Assert;

class CucumberContext implements SnippetAcceptingContext
{
    private $cucumber;

    public function __construct() {
        $this->cucumber = new Cucumber();
    }

    /**
     * @Given there are :arg1 cucumbers
     */
    public function thereAreCucumbers($arg1)
    {
        $this->cucumber->setCountOfCucumbers($arg1);
    }

    /**
     * @When I eat :arg1 cucumbers
     */
    public function iEatCucumbers($arg1)
    {
        $this->cucumber->eatCucumbers($arg1);
    }

    /**
     * @Then I should have :arg1 cucumbers
     */
    public function iShouldHaveCucumbers($arg1)
    {
        Assert::assertEquals(
            $arg1,
            $this->cucumber->getLeftCucumbers()
        );
    }
}
