<?php
$master="me2mafia";//���� ��ȸ���� ���̵�
//$master="mafiatest";//���� ��ȸ���� ���̵�
function master_user() //��ȸ�� ��ü ��ȯ
{
	global $master;
	return new Me2AuthenticatedUser('me2mafia', "62391712");
//	return new Me2AuthenticatedUser('mafiatest', "49911568");
}
function deploy()//(�̱���)�ٸ� �����ͷ� �ΰ��ϴ� �Լ�
{
	global $master;
}
?>