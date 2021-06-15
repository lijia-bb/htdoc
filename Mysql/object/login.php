<?php
	header('content-type:text/html;charset="utf-8"');
	/* 返回统一的提示格式 */
	$responseData=array('code' => 200,'message'=>'');
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
	/*1.连接数据库  */
	$link=mysql_connect('localhost','root','123456');
	
	/* 2.判断数据库是否连接成功 */
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
	/* 5.准备sql语句 */
	/* md5密码加密 */
	$str=md5(md5(md5($_GET['password']).'xxx').'yyy');
	$sql1="select *  from usertable where username='{$_GET['username']}'";
	$sql2="select *  from usertable where username='{$_GET['username']}' and password='{$str}'";
	/* 6.发送sql语句 */
	$res1=mysql_query($sql1);
	$res2=mysql_query($sql2);
	/* 7.处理结果 */
	$row1=mysql_fetch_assoc($res1);
	$row2=mysql_fetch_assoc($res2);
	if(!$row1){
		$responseData['code']=2;
		$responseData['message']='用户名不存在';
		echo json_encode($responseData);
		exit;
	}else if(!$row2){
		$responseData['code']=3;
		$responseData['message']='密码错误'.$str.$_GET['password'];
		echo json_encode($responseData);
		exit;
	}else{
		$responseData['message']='登录成功';
		echo json_encode($responseData);
	}
	/* 8.关闭数据库 */
	mysql_close($link);
?>