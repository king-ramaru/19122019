<?php 
include 'log.php';

class work extends log_work{
    const server = "localhost:\home\lv3\www\DBA.FDB", login = "SYSDBA", password = "masterkey";
  
    function connect(){
        ibase_connect(self::server,self::login,self::password) or die("connection to MySQL failed");
        
        if($this->valid_data()){
            ibase_query ("insert into TAB_USERS ( lastname,firstname,age,address,phone_number,email) 
            values ('".$_POST['secondName']."','".$_POST['firstName']."',".$_POST['age'].",'".$_POST['address']."','".$_POST['telNum']."','".$_POST['email']."')") ? $this->create_log("success") : $this->create_log("fail");

            mail($_POST['email'], "Сайт", "Запись успешно добавлена!");
            
        }
        else $this->create_log("fail: #error validation");
        
    }

    function valid_data(){
        foreach($_POST as $elem)
            if (empty($elem)) return false;
        return true;
    }

}
$a = new work();
$a -> connect();
?>
