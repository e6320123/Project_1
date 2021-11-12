<?php

// 這裡要加header 上機就不用了
header('Access-Control-Allow-Origin: *');

session_start();
 

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    regist();
    exit();
}
else
{
    login();
    exit();
}
 

function regist(){

    $user = $_POST['username'];
    
    $pwd = $_POST['password'];
    
    $sql_data = check_member($user, $pwd, 'check');

    if (count($sql_data) == 1) 
    {
        echo "failed... username repeat";
    }
    else
    {
        #新增會員
        try { 
            
            $db = new PDO('mysql:host=localhost;dbname=test','root','');
            
            $sql = "INSERT INTO members (user,pwd) VALUES('{$user}','{$pwd}');";

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
    
    $sql_data = check_member($user,$pwd,'login');

    if (count($sql_data) == 1) 
    {
        $_SESSION['login'] = 'yes';
        $_SESSION['user'] = $sql_data[0]['user'];
        echo 'success';
    } 
   
}

#檢查是否有此會員 與 檢查帳號密碼
function check_member($user,$pwd,$check_or_login){
     try {
        $sql;

        $db = new PDO('mysql:host=localhost;dbname=test','root','');

        if($check_or_login == 'login')
        {
            $sql = "SELECT * FROM members WHERE user LIKE '{$user}' AND pwd LIKE '{$pwd}';";
        }
        else
        {
            $sql = "SELECT * FROM members WHERE user LIKE '{$user}';";
        }
    
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





// SELECT * FROM members WHERE user LIKE 'ben' AND pwd LIKE '1234';






?>