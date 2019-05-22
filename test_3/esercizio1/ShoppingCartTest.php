<?php
/**
 * Created by PhpStorm.
 * User: giulio.bosco
 * Date: 15.05.2019
 * Time: 08:40
 */

include_once "Product.php";
include_once "ShoppingCart.php";
include_once "vendor\autoload.php";
use PHPUnit\Framework\TestCase;

class ShoppingCartTest extends TestCase
{
    protected $shoppingCart;

    protected function setUp()
    {
        $this->shoppingCart = new ShoppingCart();
    }

    public function testEmpty() {
        $this->setUp();
        assertTrue($this->shoppingCart->getItemCount() == 0);
    }

    /**
     * @depends testEmpty
     */
    public function testAddItem() {
        $item  = new Product("Prodotto 1", 100);
        $this->shoppingCart->addItem($item);

        assertTrue($this->shoppingCart->getBalance() == 100);
    }

    /**
     * @depends testAddItem
     */
    public function testRemoveItem() {
        $this->shoppingCart->removeItemByTitle("Prodotto 1");
        assertTrue($this->shoppingCart->getItemCount() == 0);
        assertTrue($this->shoppingCart->getBalance() == 0);
    }

    public function testRemoveItemNotInCart() {
        $this->expectException(ProductNotFoundException::class);
        $this->shoppingCart->removeItemByTitle("Prodotto non esistente");
    }

}