<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>

	<title>Dribbble API Library</title>
	
	<style>
	body{}
		h1{font:24px "Helvetica Neue", Heletica, Arial, sans-serif; font-weight:lighter;}
		p{font:13px/1.4em "Lucida Grande", Helvetica, Arial, sans-serif; color:#333;}
	</style>
	
</head>
<body>
	<h1>Dribbble Library</h1>
	<p>Sandbox for CodeIgniter Dribbble library.</p>
	
	<?php
		foreach($popular_shots as $shot) :
			echo sprintf('<img src="%s" alt="%s"/>', $shot->image_url, $shot->title);
		endforeach; 
	?>
</body>
</html>