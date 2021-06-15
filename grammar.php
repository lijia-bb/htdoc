<?php
/* 规范代码格式 */
	header('content-type:text/html;charset="utf-8"');
	/* 输出函数 */
	// echo "<h1>hello world</h1>";
	// echo("<h1>hello world</h1>");
	// print "<h1>hello world</h1>";
	// print("<h1>hello world</h1>");
	// print_r("<h1>hello world</h1>");
	// var_dump("hello world");
	
	/* 定义变量 */
	// $name='猪猪boy';
	// $name2=18;
	// echo($name);
	// echo($name2);
	
	/* 字符串拼接 */
	/* 使用 . */
	// echo($name.'的年龄：'.$name2);
	/* 使用{} */
	// echo "{$name},的年龄：,{$name2}岁";
	
	// 条件语句
	// $isYear=true;
	// if($isYear){
	// 	echo '是  ';
	// }else{
	// 	echo '否';
	// }
	
	// switch ($isYear){
	// 	case 'true':{
	// 		echo '是+swicth';
	// 		break;
	// 	}
	// 	case 'false':{
	// 		echo '否+swicth';
	// 		break;
	// 	}
	// }
	
	//循环语句
	// for($num=0;$num<5;$num++){
	// 	echo $num.'<br />';
	// }
	
	//函数
	// function printHello(){
	// 	echo 'hello';
	// }
	// printHello()
	
	//数组
	// 1.索引数组
	// 声明
	// $cars=array('大众','别克','特斯拉');
	// var_dump($cars);
	// echo '<br />';
	// // 访问和数组长度获取
	// for($num=0;$num<count($cars);$num++){
	// 	echo $cars[$num].'<br/>';
	// }
	
	//2.键值数组 关联数组
	//声明
	// $cars=array('王五'=>'敲代码的','李四'=>'包工头','张三'=>'乞丐');
	// var_dump($cars);
	// echo '<br />';
	// //访问
	// echo $cars['李四'];
	// echo count($cars);
	// echo '<br />';
	// //遍历
	// foreach($cars as $key => $value){
	// 	var_dump($key.'..........'.$value);
	// 	echo '<br />';
	// }
	
	//3.二维数组
	// $car=array( 
	// array('name'=>'小白','chinese'=>80,'math'=>90), 
	// array('name'=>'小红','chinese'=>70,'math'=>75),
	// array('name'=>'小蓝','chinese'=>60,'math'=>100),
	// array('name'=>'小绿','chinese'=>50,'math'=>95),
	// );
	// for($num=0;$num<count($car);$num++){
	// 	foreach($car[$num] as $key => $value){
	// 		echo "{$key}:{$value} ";
	// 	}
	// 	echo '<br/>';
	// }
	
	
	// 数组的函数
	$cars=array('王五'=>'敲代码的','李四'=>'包工头','张三'=>'乞丐');
	print_r(array_values($cars)) ;
?>
