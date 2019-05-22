<?php

include_once "Product.php";
include_once "ShoppingCart.php";
include_once "vendor\autoload.php";

use PHPUnit\Framework\TestCase;

/**
 * Class ShoppingCartTest
 *
 * @author giuliobosco
 * @version 1.1 (2019-05-15 - 2019-05-15)
 */
class ShoppingCartTest extends TestCase {

	protected $shoppingCart;
	protected $book;

	protected function setUp() {
		$this->shoppingCart = new ShoppingCart();
	}

	public function testEmpty() {
		$this->book = new Product("Unit testing", 29.95);
		$this->shoppingCart->setEmpty();
		$this->assertEquals(0, $this->shoppingCart->getItemCount());
	}

	public function testAddItem() {
		$item = new Product("Prodotto 1", 100);
		$this->shoppingCart->addItem($item);
		$expectedBalance = $this->book->getPrice() + $item->getPrice();
		$this->assertEquals($expectedBalance, $this->shoppingCart->getBalance());
	}

	public function testRemoveItem() {
		$this->shoppingCart->removeItemByTitle($this->book->getTitle());
		$this->assertEquals(0, $this->shoppingCart->getItemCount());
		$this->assertEquals(0, $this->shoppingCart->getBalance());
	}

	public function testRemoveItemNotInCart() {
		$this->expectException(ProductNotFoundException::class);
		$notExistentProduct = new Product("prodotto non esistente", 29.95);
		$this->shoppingCart->removeItemByTitle($notExistentProduct->getTitle());
	}

}