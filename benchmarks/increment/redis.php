<?php

$redis = new Redis();
if ($redis->connect('localhost', 6379)) {
        //print("redis connect OK");
} else {
        die("Connection to Redis Failed.");
}

printf("counter: %s\n", $redis->incr("counter"));

?>
