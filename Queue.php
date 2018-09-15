<?php

require 'Node.php';

class Queue {
  private $start = null;
  private $last = null;
  const MAX_SIZE = 3;

  private function isEmpty() {
      return ($this->start === null);
  }

  public function getSize() {
      $size = 0;
      for ($ptr = $this->start; $ptr != null; $ptr = $ptr->getNext()) {
          $size = $size + 1;
      }
      return $size;
  }

  function popLast() {
  	if ($this->isEmpty()) {
  		echo "\nQueue is empty\n";
  		return;
  	}

  	echo "\Popped: ".$this->last->getValue()."\n";
  	$this->last = $this->last->getPrev();
  	if (!$this->last) {
  		$this->start = $this->last;
  	}      
  }
  
  function enqueue($value) {
     $n = new Node($value);
     $n->setNext($this->start);
     $n->setPrev(null);

     if (!$this->isEmpty()) {
         $this->start->setPrev($n);
     } else {
         $this->last = $n;
     }
     $this->start = $n;
  }

  function popAndEnqueue($value) {
      echo "\npopAndEnqueue($value)";
      if ($this->isEmpty()) {
          $this->enqueue($value);
          return;
      }
      if ($this->start->getValue() == $value) {
          return;
      }

      for ($ptr = $this->start; $ptr != null; $ptr = $ptr->getNext()) {
          if ($ptr->getValue() === $value) {
              break;
          }
      }

      if ($ptr == null) {
          //$this->popLast();
          $this->enqueue($value);
          return;
      } else {
          $ptr->getPrev()->setNext($ptr->getNext());
          $ptr->getNext()->setPrev($ptr->getPrev());
          $this->enqueue($value);
      }

  }

  function printQ() {
      echo "\nSize of the queue: ".$this->getSize();
      echo "\nContents of the queue: {";
      for ($p = $this->start; $p != null; $p = $p->getNext()) {
              echo $p->getValue().", ";
      }
      echo "} \n";
    }
}

?>
