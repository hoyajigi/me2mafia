<?php
$DONNEEDLOGIN=1;
include_once('lib.php');

//미투앱 로그인 되어 있지 않은 경우 현재 유저 출력시키고 로그인 시키는 버튼 출력.

//현재 낮이고 마피아가 아닌경우 투표
//마피아인경우 본인이 마피아임을 통보

//현재 밤인경우 마피아인경우 투표창
//시민일 경우 잠자도록


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
<div class="show_content_layer">
<?php
if($state==3)
	echo "<p>지금은 밤입니다. 마피아만 투표할 수 있습니다. 시민은 잠을 자세요</p>\n";
if($state==2)
	echo "<p>지금은 낮입니다.</p>\n";
echo "<h5>누구를 처형할 지 투표해 주세요.</h5><br />\n";
?>

<div class="cont_desc">
<?php
echo "<dl class=\"book\">\n";
$sql="SELECT * from users WHERE isdead=0";
$r=query($sql);
while($row=mysql_fetch_array($r)){
	$p=new Me2Person($row["me2id"]);
	echo "<dt><a href=\"http://me2toy.hoyajigi.com/me2mafia/vote_ok.php?whotokill=".$p->id."\">".$p->nick."</a></dt>\n<dd><a href=\"http://me2toy.hoyajigi.com/me2mafia/vote_ok.php?whotokill=".$p->id."\"><img src=\"".$p->face."\" alt=\"".$p->nick."\"/></a></dd>";
}
echo "</dl>\n</div>";
?>
  <div class="cont_footer">
    <div class="cont_me2day">  </div>
    <div class="btn"> </div>
</div>
</div>
</body>
</html>