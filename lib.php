<?
session_start();
error_reporting(E_ALL);
require_once 'lib/Me2.php';
Me2Api::$applicationKey = '';

$LEAST=5;

include_once("lib/master.php");//대략완료

include_once("lib/easylogin.php");

include_once("lib/mysql.php");//완료

include_once("lib/count.php");//완료

include_once("lib/function.php");

include_once("lib/posts.php");



?>