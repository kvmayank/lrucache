<?php

class Node {
  private $value = 0;
  private $next = null;
  private $prev = null;
  
  function __construct($v) {
      $this->value = $v;
  }

  public function getValue() {
  	return $this->value;
  }

  public function setNext($n) {
      $this->next = $n;
  }

  public function getNext() {
  	return $this->next;
  }

  public function setPrev($p) {
      $this->prev = $p;
  }

  public function getPrev() {
  	return $this->prev;
  }
}

?>
