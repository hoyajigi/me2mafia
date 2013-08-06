<?php
$DONNEEDLOGIN=1;
include_once("lib.php");
?>

<!DOCTYPE html PUBLIC
    "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
<meta name="imagetoolbar" content="no" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>미투 마피아게임</title>
</head>
<body>
<?
if($state!=0){
?>
<p>지금은 참가신청 기간이 아닙니다.</p>
<?
}
else{
?>
<p>미투마피아 게임을 즐기기 위해서는 간단한 인증을 해야 합니다.<br />
아래 참가신청 버튼을 클릭하면 마피아게임으로 누가 게임을 하고 싶어 하는지 전송 됩니다.<br />
전송된 정보는 게임 진행을 제외한 어떤 이유로도 사용되지 않습니다.</p>
<h1><a href="http://me2toy.hoyajigi.com/me2mafia/apply_ok.php">참가신청</a></h1>
<h2>현재 <?=count_all()?>분이 참가신청하셨습니다.</h2>
<?}?>
</body>
</html>