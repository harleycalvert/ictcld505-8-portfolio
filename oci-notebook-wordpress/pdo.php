<?php

	//this file should live outside of the HTTP/HTTPS server directory
    $host = "10.0.1.242";
    $dbname = "pets";
    $username = "bob";
    $password = "EO750FAS7F6Tvpzx";
    
    try {
      $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }

?>
