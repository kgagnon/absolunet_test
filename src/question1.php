<?php
class Product {
  private $quantity;

  function __construct($initialQuantity = 10) {
        $this->quantity = $initialQuantity;
  }

  public function iDecreaseQuantity() {
      --$this->quantity;
  }

  public function getQuantity() {
    return ($this->quantity === 0) ? "Out of Stock" : strval($this->quantity);
  }
}
