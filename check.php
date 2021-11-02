<?php


header('Access-Control-Allow-Origin: *');

session_start();
 

$user = $_GET['username'];

$pwd = $_GET['password'];


#檢查是否有此會員
try {
	$db = new PDO('mysql:host=localhost;dbname=test','root','');

    $sql = "SELECT * FROM members WHERE user LIKE '{$user}' AND pwd LIKE '{$pwd}';";

	$statement = $db->query($sql); 

    $rows = $statement->rowCount();

    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    if ($rows ==1) {
        $_SESSION['login'] = 'yes';
        $_SESSION['user'] = $results[0]['user'];
    }

    echo $rows; 
}
catch (PDOException $e) {
  echo "<br>";
  echo $e->getMessage();
  die();
}





// SELECT * FROM members WHERE user LIKE 'ben' AND pwd LIKE '1234';






?>