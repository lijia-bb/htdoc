<?php
	header('content-type:text/html;charset="utf_8"');
	if(!$_GET['username']){
		$responseData['code']=1;
		$responseData['message']='用户名不能为空';
		echo json_encode($responseData);
		exit;
	}
	if(!$_GET['password']){
		$responseData['code']=2;
		$responseData['message']='密码不能为空';
		echo json_encode($responseData);
		exit;
	}
	
	/* 统一回复格式 */
	$responseData=array('code'=>0,'message'=>'');
	/* 1.连接数据库 */
	$link=mysql_connect('localhost','root','123456');
	/* 2.判断连接是否成功 */
	if(!$link){
		$responseData['code']=3;
		$responseData['message']='数据库连接失败';
		echo json_encode($responseData);
		exit;
	}
	/* 3.设置字符集 */
	mysql_set_charset('utf8'); 
	/* 4.选择数据库 */
	mysql_select_db('user');
	/* 5.设置sql语句 */
	/* 用户名并不能重复 */
	$sql="select * from usertable where username='{$_GET['username']}' and id!={$_GET['id']}";
	$res=mysql_query($sql);
	// echo json_encode($sql);
	if($row=mysql_fetch_assoc($res)){
		$responseData['code']=6;
		$responseData['message']='用户名不能重复';
		echo json_encode($responseData);
		exit;
	}
	/* md加密 */
	$str=md5(md5(md5($_GET['password']).'xxx').'yyy');
	$sql="update usertable set username='{$_GET['username']}',password='{$str}',create_time='{$_GET['create_time']}' where id={$_GET['id']}";
	
	/* 6.发送sql语句 */
	$res=mysql_query($sql);
	/* 7.处理结果 */
	if(!$res){
		$responseData['code']=5;
		$responseData['message']='更新失败';
		echo json_encode($responseData);
		exit;
	}else{
		$responseData['message']='更新成功';
		echo json_encode($responseData);
		exit;
	}
	mysql_close($link);
?>