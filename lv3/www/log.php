<?
class log_work{
    
    function create_log($buf){
    $log = date('Y-m-d H:i:s')."\n".json_encode($_POST)."\n".$buf."\n";
    file_put_contents($_SERVER['DOCUMENT_ROOT'].'/log.dat', $log."\n", FILE_APPEND);
    }
}
?>