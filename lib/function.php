<?php
function if_mafia($id) //마피아인지 검출
{
	if(!is_me2dayid($id)){exit();}
	$sql = 'SELECT `ismafia` FROM `users` WHERE `me2id` LIKE \''.$id.'\' LIMIT 1';
	$row=mysql_fetch_row(query($sql));
	return $row[0];
}
function vote($whotokill)//투표하는 함수
{
	global $me2id,$state;
	if(!is_me2dayid($whotokill)){exit();}
	$sql='SELECT count(*) FROM `users` WHERE `me2id` LIKE \''.$me2id.'\' LIMIT 1';
	$row=mysql_fetch_array(query($sql));
	if($row[0]==0)
		return 5;
	$sql='SELECT `didvote` FROM `users` WHERE `me2id` LIKE \''.$me2id.'\' LIMIT 1';
	$row=mysql_fetch_row(query($sql));
	if($row[0]){
		return 1;
	}
	$sql='SELECT `isdead` FROM `users` WHERE `me2id` LIKE \''.$me2id.'\' LIMIT 1';
	$row=mysql_fetch_row(query($sql));
	if($row[0]){
		return 6;
	}
	if($whotokill==$me2id){
		return 2;
	}
	if(if_mafia($me2id)&&if_mafia($whotokill)){
		return 3;
	}
	if($state==3&&!if_mafia($me2id)){
		return 4;
	}
	$sql = 'UPDATE `me2mafia`.`users` SET `didvote` = \'1\' WHERE `users`.`me2id` = \''.$me2id.'\' LIMIT 1;';
	query($sql);
	$sql = 'SELECT `gotvote` FROM `users` WHERE `me2id` LIKE \''.$whotokill.'\' LIMIT 1';
	$row=mysql_fetch_row(query($sql));
	$votecount=$row[0];
	$votecount++;
	$sql = 'UPDATE `me2mafia`.`users` SET `gotvote` = \''.$votecount.'\' WHERE `me2id` = \''.$whotokill.'\' LIMIT 1;';
	query($sql);
	return 0;
}
function apply()
{
	global $me2id,$_SERVER,$state;
	if($state!=0){
		echo "지금은 참가신청을 할 수 없습니다.";
		return;
	}
	$sql = 'INSERT INTO `me2mafia`.`users` (`me2id`, `ismafia`, `isdead`, `didvote`, `gotvote`, `ip`) VALUES (\''.$me2id.'\', \'0\', \'0\', \'0\', \'0\', \''.$_SERVER["REMOTE_ADDR"].'\');'; 
	query($sql);
}



function get_listtokill()
{
	global $state,$me2id;
	$sql = 'SELECT * FROM `users` WHERE `ismafia` = 0 AND `isdead` = 0 LIMIT 0, 30 ';
	echo $sql;
	return mysql_fetch_row(query($sql));
}


function update_state()
{
	global $state;
	$sql = 'UPDATE `me2mafia`.`game` SET `state` = \''.$state.'\',`lasttime` = NOW( ) LIMIT 1;';
//	echo $sql;
	query($sql);
}



?>