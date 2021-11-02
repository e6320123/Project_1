<?php


header('Access-Control-Allow-Origin: *');

try {
	$db = new PDO('mysql:host=localhost;dbname=test','root','');
	$sql = "select * from games;";
	$statement = $db->query($sql); 
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results, JSON_UNESCAPED_UNICODE);
    echo $json; 
}
catch (PDOException $e) {
  echo "<br>";
  echo $e->getMessage();
  die();
}








?>