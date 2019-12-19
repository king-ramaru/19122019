<?
class log_work{
    
    function create_log($buf){
    $log = date('Y-m-d H:i:s')."\n".json_encode($_POST)."\n".$buf."\n";
    file_put_contents(__DIR__ . '/log.dat', $log."\n", FILE_APPEND);
    }

}
?>