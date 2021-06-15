<?php
	header('content-type=text/html;charset=utf-8');
	$news=array(
	array('title'=>'新闻1','date'=>'2000-10-16'),
	array('title'=>'新闻2','date'=>'2000-10-16'),
	array('title'=>'新闻3','date'=>'2000-10-16'),
	array('title'=>'新闻4','date'=>'2000-10-16'),
	array('title'=>'新闻5','date'=>'2000-10-16'),
	array('title'=>'新闻6','date'=>'2000-10-16'),
	array('title'=>'新闻7','date'=>'2000-10-16'),
	array('title'=>'新闻8','date'=>'2000-10-16'),
	array('title'=>'新闻9','date'=>'2000-10-16'),
	);
	echo json_encode($news);
?>