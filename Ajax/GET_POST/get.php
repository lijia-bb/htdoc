<?php
	header('content-type:text/html;charset="utf-8"');
	var_dump ($_GET);
	echo('<br />');
	$username=$_GET["username"];
	$age=$_GET["age"];
	$password=$_GET["password"];
	echo "用户名:{$username}年龄:{$age}密码:${password}";
?>