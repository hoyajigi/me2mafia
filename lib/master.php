<?php
$master="me2mafia";//현재 사회자의 아이디
//$master="mafiatest";//현재 사회자의 아이디
function master_user() //사회자 객체 반환
{
	global $master;
	return new Me2AuthenticatedUser('me2mafia', "62391712");
//	return new Me2AuthenticatedUser('mafiatest', "49911568");
}
function deploy()//(미구현)다른 마스터로 인계하는 함수
{
	global $master;
}
?>