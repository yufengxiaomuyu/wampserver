<!DOCTYPE html>
<html>
<head>
	<title>PHP demo date</title>
	<style>

</style>
</head>
<body>
	<?php
		date_default_timezone_set("Asia/Shanghai");
		echo "今天是".date("Y")."年,".date("m")."月,".date("d")."日,"."星期".date("l");
		echo "<br />";
		echo "现在是".date("h:i:s a");
		echo "<br />";

		echo "今天是 ".date("Y/m/d");
		echo "<br />";
		echo "今天是 ".date("Y.m.d");
		echo "<br />";
		echo "今天是 ".date("Y-m-d");
		echo "<br />";
		echo "今天是 ".date("l");
		echo "<br />";

		$d = mktime(5,4,3,7,6,2008);
		echo "创建的日期是".date("Y-m-d h:i:s a",$d);

		$d2 = strtotime("2:34am May 28 2016");
		echo "<br />";
		echo "创建日期".date("Y-m-d h:i:s a",$d2);





	?>
	<p>版权所： 2008-<?php echo date("Y") ?></p>

</body>
</html>