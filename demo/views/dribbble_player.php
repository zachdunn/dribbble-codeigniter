<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>

	<title>Dribbble Player</title>
	<style>
	body{}
		h1{font:24px "Helvetica Neue", Heletica, Arial, sans-serif; font-weight:lighter;}
		p{font:13px/1.4em "Lucida Grande", Helvetica, Arial, sans-serif; color:#333;}
	</style>
</head>
<body>
	<h1><?php echo $player->name; ?></h1>
	<p><?php echo $player->shots_count . ' shots / ' . $player->location; ?></p>
	
	<p>Output of <code>$player</code></p>
	<pre>
	<?php echo var_dump($player); ?>
	</pre>
	
	<p>Output of <code>$latest_shots</code></p>
	<pre>
	<?php echo var_dump($latest_shots); ?>
	</pre>
	
</body>
</html>