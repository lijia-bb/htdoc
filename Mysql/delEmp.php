<?php
	header('content-type:text/html;charset="utf-8"');
	/* 1.连接数据库 */
	$link=mysql_connect('localhost','root','123456');
	$response=array('code'=>200,'message'=>'');
	/* 2.判断是否连接成功 */
	if(!$link){
		$response['code']=1;
		$response['message']='数据库连接失败';
		echo json_encode($response);
		exit;
	}
	/* 3.设置字符集 */
	mysql_set_charset('utf8');
	/* 4.选择数据库 */
	mysql_select_db('xxx');
	/* 5.准备sql语句 */
	$sql="delete from employee where name='{$_GET['name']}'";
	/* 6.发送sql语句 返回值1（删除成功）或*/
	$res=mysql_query($sql);
	/* 7.处理返回的数据 */
	if($res){
		$response['message']='数据删除成功';
		echo json_encode($response);
		exit;
	}
?>