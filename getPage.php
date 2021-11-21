<?php   

include 'info.php';

$game_id = $_GET['gameID'];

try{
	$db = new PDO($PDO_host,$PDO_user,$PDO_pwd);
    $sql = "SELECT p.htmlstr FROM games g JOIN pages p ON (g.page_id = p.id) WHERE g.id={$game_id} ;";
    $statement = $db->query($sql);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo $result[0]['htmlstr'];
    
}catch(PDOException $e){
    echo "<br>";
    echo $e->getMessage();
    die();
}


?>