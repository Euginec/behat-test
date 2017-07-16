<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use PHPUnit\Framework\Assert;

class BackgroundContext implements SnippetAcceptingContext
{
    /**
     * @Given a global administrator named :arg1
     */
    public function aGlobalAdministratorNamed($arg1)
    {
        Assert::assertEquals(
            $arg1,
            "Greg"
        );
    }

    /**
     * @Given a blog named :arg1
     */
    public function aBlogNamed($arg1)
    {
        Assert::assertEquals(
            $arg1,
            "Greg's anti-tax rants"
        );
    }

    /**
     * @Given a customer named :arg1
     */
    public function aCustomerNamed($arg1)
    {
        Assert::assertEquals(
            $arg1,
            "Wilson"
        );
    }

    /**
     * @Given a blog named :arg1 owned by :arg2
     */
    public function aBlogNamedOwnedBy($arg1, $arg2)
    {
        Assert::assertEquals(
            $arg1,
            "Expensive Therapy"
        );
        Assert::assertEquals(
            $arg2,
            "Wilson"
        );
    }

    /**
     * @Given I am logged in as :arg1
     */
    public function iAmLoggedInAs($arg1)
    {
        Assert::assertContains(
            $arg1,
            ["Wilson", "Greg"]
        );        
    }

    /**
     * @When I try to post to :arg1
     */
    public function iTryToPostTo($arg1)
    {
        Assert::assertEquals(
            $arg1,
            "Expensive Therapy"
        );
    }

    /**
     * @Then I should see :arg1
     */
    public function iShouldSee($arg1)
    {
        Assert::assertEquals(
            $arg1,
            "Your article was published."
        );
    }
}
