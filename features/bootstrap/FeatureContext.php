<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use PHPUnit\Framework\Assert;

class FeatureContext implements SnippetAcceptingContext
{
    private $shelf;
    private $basket;
    private $cucumber;

    public function __construct()
    {
        $this->shelf = new Shelf();
        $this->basket = new Basket($this->shelf);
        
        $this->cucumber = new Cucumber();
    }

    /**
     * @Given there is a :product, which costs £:price
     */
    public function thereIsAWhichCostsPs($product, $price)
    {
        $this->shelf->setProductPrice($product, floatval($price));
    }

    /**
     * @When I add the :product to the basket
     */
    public function iAddTheToTheBasket($product)
    {
        $this->basket->addProduct($product);
    }

    /**
     * @Then I should have :count product(s) in the basket
     */
    public function iShouldHaveProductInTheBasket($count)
    {
        Assert::assertCount(
            intval($count),
            $this->basket
        );
    }

    /**
     * @Then the overall basket price should be £:price
     */
    public function theOverallBasketPriceShouldBePs($price)
    {
        Assert::assertSame(
            floatval($price),
            $this->basket->getTotalPrice()
        );
    }

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
