<?php
	header('content-type:text/html;charset="utf-8"');
	var_dump ($_POST);
	$username=$_POST['username'];
	$age=$_POST['age'];
	$password=$_POST['password'];
	echo "用户名:{$username}年龄:{$age}密码:{$password}"
?>