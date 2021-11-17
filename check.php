<?php

include 'info.php';


session_start();


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    regist();
}
else
{
    login();
}
 


function regist(){

    global $PDO_host;
    global $PDO_user;
    global $PDO_pwd;

    $user = $_POST['username'];
    
    $pwd = $_POST['password'];
    
    $sql_data = check_member($user, $pwd);

    if (count($sql_data) == 1) 
    {
        echo "failed... username repeat";
    }
    else
    {
        $pwd_hash = password_hash($pwd, PASSWORD_DEFAULT);

        #新增會員
        try {
            $db = new PDO($PDO_host,$PDO_user,$PDO_pwd);
            
            $sql = "INSERT INTO members (user,pwd) VALUES('{$user}','{$pwd_hash}');";

            $statement = $db->query($sql); 
         
        }
        catch (PDOException $e) {
            echo "<br>";
            echo $e->getMessage();
            die();
        }
        echo "success";
    }

}

function login(){ 
    $user = $_GET['username'];
    
    $pwd = $_GET['password'];

    $sql_data = check_member($user,$pwd);

    if (count($sql_data) == 1) 
    {
        $pwd_hash = $sql_data[0]['pwd'];  

        if(password_verify($pwd,$pwd_hash))     #密碼驗證(明碼,hash碼)
        {     
            $_SESSION['login'] = 'yes';
            $_SESSION['user'] = $sql_data[0]['user'];
            echo 'success';
        }
        else
        {
            echo'pwd wrong';
        }
    } 
    else if(count($sql_data) == 0)
    {
        echo 'user wrong';
    } 
}

#檢查是否有此會員帳號
function check_member($user,$pwd){

    global $PDO_host;
    global $PDO_user;
    global $PDO_pwd;
 
     try {

        $db = new PDO($PDO_host,$PDO_user,$PDO_pwd);

        $sql = "SELECT * FROM members WHERE user LIKE '{$user}';";

        $statement = $db->query($sql); 
        
        $rows = $statement->rowCount();
        
        $results = $statement->fetchAll(PDO::FETCH_ASSOC); 

        return $results; 
    }
    catch (PDOException $e) {
      echo "<br>";
      echo $e->getMessage();
      die();
    }
}






?>