<?php
function count_civil() //시민수 세기
{
	$sql = 'SELECT count(*) FROM `users` WHERE ismafia=0 AND isdead=0'; 
	$row=mysql_fetch_row(query($sql));
	return $row[0];
}

function count_mafia() //마피아수 세기
{
	$sql = 'SELECT count(*) FROM `users` WHERE ismafia=1 AND isdead=0';
	$row=mysql_fetch_row(query($sql));
	return $row[0];
}

function count_all() //게임인원세기
{
	$sql = 'SELECT count(*) FROM `users` WHERE isdead=0';
//	echo $sql;
	$row=mysql_fetch_row(query($sql));
	return $row[0];
}

function count_vote() //투표수 세기
{
	$sql = 'SELECT count(*) FROM `users` WHERE didvote=1 AND isdead=0';
//	echo $sql;
	$row=mysql_fetch_row(query($sql));
	return $row[0];
}
?>