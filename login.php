<?
$DONNEEDLOGIN=1;
include_once('lib.php');
$row=Me2Api::call("get_auth_url");
header('Location: '.$row->url);
?>