<?php

// there's not try~catch. because looks like PHP Memcached Lib doesn't have the memcached exception.
// Alternatively, this code uses if statement.

$m = new Memcached();
$m->addServer('localhost', 11211);

// When first driven, ↓ is must. after that, comment it out.
//$m->set('counter', 0);

if ($val = $m->increment('counter')){
	printf("counter: %s\n", $val);
}

?>
