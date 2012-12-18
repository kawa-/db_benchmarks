<?php

try {
        $mysql = "mysql:host=localhost;port=3307;dbname=benchmark";
        $user = "root";
		$pass = "root";
        //$pdo = new PDO($mysql, $user);
        $pdo = new PDO($mysql, $user, $pass, array(PDO::ATTR_PERSISTENT => true));
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);

        $stmt1 = $pdo->prepare("update increment set number = number +1");
        $stmt2 = $pdo->prepare("select number from increment");

        //$pdo->beginTransaction();
        $stmt1->execute();
        $stmt2->execute();
        //$pdo->commit();
        $row = $stmt2->fetch(PDO::FETCH_ASSOC);

        printf("counter: %s\n", $row["number"]);
} catch (PDOException $e) {
        printf("Error, could not connect MemSQL.\n");
        print $e->getMessage();
        die();
}
?>
