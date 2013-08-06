<?php
	include_once('lib.php');
	$r=vote($_GET['whotokill']);
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
<title>미투마피아</title>
</head>
<body>
<script>
alert("<?
if($r==0)
echo "투표를 완료했습니다.";
if($r==1)
echo "이미 투표하셨습니다.";
if($r==2)
echo "자기자신에게 투표 할 수 없습니다.";
if($r==3)
echo "마피아는 마피아를 죽일 수 없습니다.";
if($r==4)
echo "지금은 밤이므로 마피아만 투표할 수 있습니다.";
if($r==5)
echo "게임 참가자만 투표할 수 있습니다.";
if($r==6)
echo "죽은자는 투표할 수 없습니다.";
?>");
location.href="http://me2day.net/<?=$master?>";
</script>

</body>
</html>