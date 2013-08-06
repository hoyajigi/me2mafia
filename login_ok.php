<?php
$DONNEEDLOGIN=1;
include_once('lib.php');
if ($_GET["result"]) {
	$_SESSION['me2id'] = $_GET["user_id"];
	$_SESSION['me2key'] = $_GET["user_key"];
	if($state==0)
		header('Location: http://me2toy.hoyajigi.com/me2mafia/apply_ok.php');
	else
		header('Location: http://me2toy.hoyajigi.com/me2mafia/vote.php');
}
else{
	echo "로그인 실패";
}
?>