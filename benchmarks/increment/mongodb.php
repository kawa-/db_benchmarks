<?php

try {
        $link = new Mongo('localhost:27017');
        $db = $link->test;
        $col = $db->benchmarks;

        //When first driven, add these 2 lines. after that, comment them out.
		//$doc = array('key' => 'value', 'number' => 1);
        //$col->insert($doc);
        
        //increment
        $col->update(array('key' => 'value'), array('$inc' => array('number' => 1)));
        $obj = $col->findOne();
        printf("counter: %s\n", $obj['number']);
} catch (MongoConnectionException $e) {
        die('error');
}
