<?php 
include 'log.php';

class work extends log_work{

    const server = "localhost", user_name = "root", db_name = "mybd";
  
    function connect(){
        mysql_connect(self::server,self::user_name) or die("connection to MySQL failed");
        mysql_select_db(self::db_name) or die("selection Data failed");
        
        if($this->valid_data()){
            mysql_query("insert into tab_users set lastname='".$_POST['secondName']."',
                firstname='".$_POST['firstName']."',
                age=".$_POST['age'].", 
                address='".$_POST['address']."',
                phone_number='".$_POST['telNum']."',
                email='".$_POST['email']."'") ? $this->create_log("success") : $this->create_log("fail");

            mail($_POST['email'], "Сайт", "Запись успешно добавлена!");
            
        }
        else $this->create_log("fail: #error validation");
        
        header('Location: http://lv2');
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