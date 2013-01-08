<?php

namespace Coffee;

Interface Coffee
{
    public function getCost();
    public function getIngredients();
}

/**
 * A simple cofee, no extra ingredients.
 */
class SimpleCoffee implements Coffee
{
    public function getCost()
    {
        return 1;
    }
    public function getIngredients()
    {
        return "Coffee";
    }
}

/**
 * Abstract decorator class.
 */
abstract class CoffeeDecorator implements Coffee
{
    protected $decoratedCoffee;
    protected $ingredientSeparator = ", ";

    public function __construct(Coffee $decoratedCoffee)
    {
        $this->decoratedCoffee = $decoratedCoffee;
    }

    public function getCost()
    {
        return $this->decoratedCoffee->getCost();
    }

    public function getIngredients()
    {
        return $this->decoratedCoffee->getIngredients();
    }
}

/**
 * Mix milk with coffee.
 */
class Milk extends CoffeeDecorator
{

    public function __construct(Coffee $decoratedCoffee)
    {
        parent::__construct($decoratedCoffee);
    }

    public function getCost()
    {
        return parent::getCost() + 0.5;
    }

    public function getIngredients()
    {
        return parent::getIngredients() . $this->ingredientSeparator . "Milk";
    }
}

/**
 * Mix whipped cream with coffee.
 */
class Whip extends CoffeeDecorator
{

    public function __construct(Coffee $decoratedCoffee)
    {
        parent::__construct($decoratedCoffee);
    }

    public function getCost()
    {
        return parent::getCost() + 0.7;
    }

    public function getIngredients()
    {
        return parent::getIngredients() . $this->ingredientSeparator . "Whipped Cream";
    }
}

/**
 * Mix sprinkles with coffee.
 */
class Sprinkles extends CoffeeDecorator
{

    public function __construct(Coffee $decoratedCoffee)
    {
        parent::__construct($decoratedCoffee);
    }

    public function getCost()
    {
        return parent::getCost() + 0.2;
    }

    public function getIngredients()
    {
        return parent::getIngredients() . $this->ingredientSeparator . "Sprinkles";
    }
}

$c = new SimpleCoffee();
echo 'Cost: ' . $c->getCost() . '; ' . $c->getIngredients() . "\n";

$c = new Milk($c);
echo 'Cost: ' . $c->getCost() . '; ' . $c->getIngredients() . "\n";

$c = new Sprinkles($c);
echo 'Cost: ' . $c->getCost() . '; ' . $c->getIngredients() . "\n";

$c = new Whip($c);
echo 'Cost: ' . $c->getCost() . '; ' . $c->getIngredients() . "\n";

$c = new Sprinkles($c);
echo 'Cost: ' . $c->getCost() . '; ' . $c->getIngredients() . "\n";
