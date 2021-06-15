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
		$responseData['code']=3;
		$responseData['message']='数据库连接失败';
		echo json_encode($responseData);
		exit;
	}
	/* 3.设置字符集 */
	mysql_set_charset('utf8');
	/* 4.选择数据库 */
	mysql_select_db('user');
	/* 5.准备sql语句 */
	$sql="select * from usertable where username='{$_GET['username']}'";
	$res=mysql_query($sql);
	$row=mysql_fetch_assoc($res);
	if($row){
		$responseData['code']=4;
		$responseData['message']='用户名已存在';
		echo json_encode($responseData);
		exit;
	}
	/* md5加密 */
	$str=md5(md5(md5($_GET['password']).'xxx').'yyy');
	$sql="insert into usertable (username,password,create_time) values ('{$_GET['username']}','{$str}','{$_GET['create_time']}')";

	/* 6.发送sql语句 */
	$res=mysql_query($sql);
	/* 7.处理结果 */
	if(!$res){
		$responseData['code']=5;
		$responseData['message']='数据入库失败';
		echo json_encode($responseData);
		exit;
	}else{
		$responseData['message']='数据入库成功';
		echo json_encode($responseData);
	}
	/* 8.关闭数据库 */
	mysql_close($link);
?>