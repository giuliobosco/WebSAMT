<?php

 class ShoppingCart
 {
     private $items;

     function __construct()
     {
         $this->items = array();
     }

     function getBalance():float
     {
         $balance = 0.00;
         foreach ($this->items as $item) {
             if($item instanceof Product){
                 $balance += $item->getPrice();
             }
         }
         return $balance;
     }

     function addItem(Product $item): void
     {
         $this->items[] = $item;
     }

     function removeItemByTitle(string $title): void
     {
         $index=0;
         foreach( $this->items as $item){
             if (($title==$item->getTitle()))
             {
                 unset( $this->items[$index] );
             }
             else{
                 throw new ProductNotFoundException();
             }
             $index++;
         }
     }

     function getItemCount(): int
     {
         return count($this->items);
     }

     function setEmpty():void
     {
         unset($this->items);
         $this->items = array();
     }
}