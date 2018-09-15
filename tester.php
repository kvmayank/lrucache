#!/usr/bin/php

<?php

require 'Queue.php';

$q = new Queue();
$q->popAndEnqueue(12);
$q->popAndEnqueue(13);
$q->printQ();

$q->popLast();
$q->popLast();
$q->printQ();

?>
