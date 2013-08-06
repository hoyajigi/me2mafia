<?php
function is_me2dayid($id)//입력 된 아이디가 미투데이에서 가능한 아이디인지 검증 SQL injection 방지
{
	return eregi("^[a-zA-Z0-9]+$",$id);
}
function query($query) //mysql query 날림
{
	mysql_connect("localhost","root","");
	mysql_select_db("me2mafia");
	return mysql_query($query);
}
//현재 게임의 진행 상태
$sql = 'SELECT * FROM `game` LIMIT 1'; 
$row=mysql_fetch_row(query($sql));
$state=$row[0];
$lasttime=strtotime($row[1]);
?>