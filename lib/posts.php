<?php

//자동기능함수

function reset_users()
{
	$sql = 'TRUNCATE TABLE `users`';
	query($sql);
}

function post_gamemake()
{
	$user=master_user();
	$user->post("마피아 게임을 하실분을 모집합니다. 왼쪽 아이콘을 누르시고 참가신청을 하세요.","마피아게임 10명이상 모이면 게임이 시작됩니다.","http://me2toy.hoyajigi.com/me2mafia/apply.php");
	reset_users();
}

function post_startgame()
{
	$user=master_user();
	$user->post("1분 후 마피아게임을 시작하겠습니다.","마피아게임 마피아는 핸드폰으로 마피아임을 통보합니다.","http://me2toy.hoyajigi.com/me2mafia/");
}

function choose_mafia()
{
	$ca=count_all();
	for($i=0;$i<$ca/3;$i++){
		$randn=rand(0,$ca-1);
		$sql = 'SELECT * FROM `users` LIMIT '.$randn.', 1 ';
		$row=mysql_fetch_array(query($sql));
		$sql = 'UPDATE `me2mafia`.`users` SET `ismafia` = \'1\' WHERE `me2id` = \''.$row[0].'\' LIMIT 1;';
		query($sql);
	}
}

function list_of_mafia()
{
	$list="";
	$sql = 'SELECT * FROM `users` WHERE `ismafia` = 1'; 
	$r=query($sql);
	while($row=mysql_fetch_array($r)){
		$p=new Me2Person($row["me2id"]);
		$list=$list.$p->nick." ";
	}
	return $list;
}

function notice_mafia()
{
	$user=master_user();
	$mafias=list_of_mafia();
	$sql = 'SELECT * FROM `users` WHERE `ismafia` = 1'; 
	$r=query($sql);
	while($row=mysql_fetch_array($r)){
		$p=new Me2Person($row["me2id"]);
		$user->post("@".$p->nick." 당신은 마피아(MAFIA)로 선정되었습니다. 동료마피아는 ".$mafias."입니다.","","");
	}
	$sql='SELECT * FROM `users` WHERE `ismafia`=0';
	$r=query($sql);
	while($row=mysql_fetch_array($r)){
		$p=new Me2Person($row["me2id"]);
		$user->post("@".$p->nick." 마피아게임이 시작 되었습니다. 당신은 시민(CIVILIAN)입니다.","","");
	}
}

function kill($id)
{
	$sql = 'UPDATE `me2mafia`.`users` SET `isdead` = \'1\' WHERE `me2id` = \''.$id.'\' LIMIT 1;';
	query($sql);
}

function reset_vote()
{
	$sql = 'UPDATE `me2mafia`.`users` SET `didvote` = \'0\', `gotvote` = \'0\';';
	query($sql);
}

function post_day()
{
	$user=master_user();
	$user->post("낮이 되었습니다. 모두 댓글로 토의하고 누구를 죽일지 투표해 주세요. 투표는 왼쪽 아이콘을 클릭하고 죽일 사람을 고르시면 됩니다.","마피아게임 모두가 투표를 하거나 5분이 지나면 밤이 됩니다.","http://me2toy.hoyajigi.com/me2mafia/vote.php");
}

function post_day_kill()
{
	$user=master_user();
	$sql = 'SELECT `me2id` FROM `users` WHERE isdead=0 ORDER BY `gotvote` DESC LIMIT 1'; 
	$row=mysql_fetch_array(query($sql));
//	echo $sql;
	$p=new Me2Person($row[0]);
	if(if_mafia($row[0])){
		//마피아인경우
		$user->post($p->nick."님이 처형되었습니다. ".$p->nick."님은 마피아였습니다.","마피아게임","");
	}
	else{//마피아가 아닌경우
		$user->post($p->nick."님이 처형되었습니다. ".$p->nick."님은 시민이였습니다.","마피아게임","");
	}
	kill($row[0]);
	reset_vote();
}

function post_night()
{
	$user=master_user();
	$user->post("밤이 되었습니다. 마피아는 누구를 죽일지 투표해 주세요. 마피아 모두가 투표를 하거나 3분이 지나면 낮이 됩니다.","마피아게임","http://me2toy.hoyajigi.com/me2mafia/vote.php");
}

function post_night_kill()
{
	$user=master_user();
	$sql = 'SELECT `me2id` FROM `users` WHERE isdead=0 ORDER BY `gotvote` DESC LIMIT 0, 1 '; 
	$row=mysql_fetch_array(query($sql));
	$p=new Me2Person($row[0]);
	$user->post("밤 동안 ".$p->nick."님이 살해되었습니다.","마피아게임","");
	kill($row[0]);
	reset_vote();
}

function if_keep_game()
{
//	echo count_civil();
//	echo count_mafia();
	 if(count_civil()<=count_mafia()){
	 	end_game();
	 	return 0;
	 }
	 if(count_mafia()==0){
	 	end_game();
	 	return 0;
	 }
	 return 1;
}

function end_game()
{
	$user=master_user();
	//마피아소탕
	if(count_mafia()==0){
		$user->post("이제 미투데이에 마피아는 사라졌습니다.","마피아게임","");
	}
	if(count_civil()<=count_mafia()){
		$user->post("이제 미투데이는 마피아가 지배합니다.","마피아게임","");
	}
	
}
?>
