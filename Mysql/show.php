<?php
	header('content-type:text/html;charset="utf-8"');
	/* 连接数据库 */
	/* 1.连接数据库 */
	/* 
	第一个参数，连接数据库的ip 如果是本地数据库：直接填locahost
	第二个参数：数据库用户名
	第三个参数：数据库密码
	*/
	$link=mysql_connect("localhost","root","123456");
	/* 判断是否连接成功 */
	if(!$link){
		echo  '连接失败';
		exit; /* 终止后续所有代码*/
	}
	
	/* 3.设置字符集 */
	mysql_set_charset('utf8');
	
	/* 4.选择数据库 */
	mysql_select_db('xxx');
	
	/* 5.准备sql语句 */
	$sql='select * from employee';
	
	/* 6.发送sql语句 */
	$res=mysql_query($sql);
	// var_dump($res);
	
	//设置表头
	echo '<table border=1 >';
	echo '<tr><th>员工工号</th><th>员工姓名</th><th>员工工资</th><th>员工性别</th><th>员工职位</th></tr>';
	
	/* 7.处理结果 */
	/* 执行几次mysql_fetch_assoc 获取到的就是第几条数据 */
	// $row=mysql_fetch_assoc($res);
	// var_dump($row);
	// /* 优化：只要mysql_fetch_assoc($res)存在，就会不断输出 */
	while($row=mysql_fetch_assoc($res)){
		echo '<tr>';
		foreach($row as $key => $value){
			echo "<td>{$value}</td>";
		}
		echo '</tr>';
	}
	echo '</table>';
	
	/*8.关闭数据库  */
	mysql_close($link);
?>