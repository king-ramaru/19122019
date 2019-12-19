<?php
class work{

    const server = "localhost", user_name = "root", db_name = "mybd";
  
    function connect(){

        mysql_connect(self::server,self::user_name) or die("connection to MySQL failed");
        mysql_select_db(self::db_name) or die("selection Data failed");
        
            if(mysql_query("insert into tab_users set lastname='".$_POST['secondName']."',
                firstname='".$_POST['firstName']."',
                age=".$_POST['age'].", 
                address='".$_POST['address']."',
                phone_number='".$_POST['telNum']."',
                email='".$_POST['email']."'")) $buf="success"; 
            else $buf ="fail";

        $log = date('Y-m-d H:i:s')."\n".json_encode($_POST)."\n".$buf."\n";
        file_put_contents(__DIR__ . '/log.dat', $log."\n", FILE_APPEND);
        header('Location: http://lv1');
    }
}
$a = new work();
$a -> connect();

?>