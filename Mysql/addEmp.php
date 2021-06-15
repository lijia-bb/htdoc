<?php
header('content-type:text/html;charset="utf-8"');
/* 定义返回数据格式 */
$response=array('code'=>0,'message'=>'');
$link=mysql_connect("localhost","root","123456");
/* 1.连接数据库 */
	/* 
	第一个参数，连接数据库的ip 如果是本地数据库：直接填locahost
	第二个参数：数据库用户名
	第三个参数：数据库密码
	*/
	$link=mysql_connect("localhost","root","123456");
	/* 判断是否连接成功 */
	if(!$link){
		$response['code']=1;
		$response['message']='数据库连接失败';
		echo json_encode($response);
		exit; /* 终止后续所有代码*/
	}
	
	/* 3.设置字符集 */
	mysql_set_charset('utf8');
	
	/* 4.选择数据库 */
	mysql_select_db('xxx');
	
	/* 5.准备sql语句 */
	$sql="insert into employee (name,salary,sex,position) values ('{$_POST['name']}','{$_POST['salary']}','{$_POST['sex']}','{$_POST['position']}')";
	/* 6.发送sql语句 返回值：true或false*/
	$res=mysql_query($sql);
	/* 7.处理数据 */
	if($res){
		$response['message']='数据插入成功';
		echo json_encode($response);
	}else{
		$response['code']=2;
		$response['message']='数据插入失败';
		echo json_encode($response);
	}
	/* 8.关闭数据库 */
	mysql_close($link);
?>