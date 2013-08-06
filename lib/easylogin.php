<?php
$DONNEEDLOGIN=isset($DONNEEDLOGIN)?$DONNEEDLOGIN:0;
if(!$DONNEEDLOGIN){
	if(isset($_SESSION['me2id'])){
		$me2id=$_SESSION['me2id'];//현재 사용자의 아이디
	}
	else{
		header('Location: http://me2toy.hoyajigi.com/me2mafia/login.php');
		exit();
	}
}

?>