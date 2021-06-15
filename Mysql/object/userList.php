<?php
	header('content-type:text/html;charset="utf_8"');
	/* 同意回复格式 */
	$responseData=array('code'=>0,'message'=>'');
	/* 1.连接数据库 */
	$link=mysql_connect('localhost','root','123456');
	/* 2.判断连接是否成功 */
	if(!$link){
		$responseData['code']=1;
		$responseData['message']='数据库连接失败';
		echo json_encode($responseData);
		exit;
	}
	/* 3.设置字符集 */
	mysql_set_charset('utf8');
	/* 4.选择数据库 */
	mysql_select_db('user');
	/* 5.设置sql语句 */
	$sql='select * from usertable';
	/* 6.发送sql语句 */
	$res=mysql_query($sql);
	$arr=array();
	/* 7.处理结果 */
	while($row=mysql_fetch_assoc($res)){
		array_push($arr,$row);
	}
	echo json_encode($arr);
	mysql_close($link);
?>