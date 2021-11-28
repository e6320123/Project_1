<?php   

include 'info.php';

$news_id = $_GET['newsID'];

try{
	$db = new PDO($PDO_host,$PDO_user,$PDO_pwd);
    $sql = "SELECT p.htmlstr FROM news n JOIN pages p ON (n.page_id = p.id) WHERE n.id={$news_id} ;";
    $statement = $db->query($sql);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo $result[0]['htmlstr'];
    
}catch(PDOException $e){
    echo "<br>";
    echo $e->getMessage();
    die();
}


?>