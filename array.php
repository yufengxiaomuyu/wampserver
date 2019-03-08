<!DOCTYPE html>
<html>
<head>
	<title>PHP demo array</title>
	<style>

</style>
</head>
<body>
	<?php
	$cars = array(
		array("Volvo",22,18),
		array("BMW",15,13),
		array("Saab",5,2),
		array("Land Rover",17,15)
	);
	$title = array ("品牌","库存","销量");

	echo "<ul>";
	echo "<li>".$cars[0][0]." ".$title[1].$cars[0][1]." ".$title[2].$cars[0][2]."</li>";
	echo "<li>".$cars[1][0]." ".$title[1].$cars[1][1]." ".$title[2].$cars[1][2]."</li>";
	echo "<li>".$cars[2][0]." ".$title[1].$cars[2][1]." ".$title[2].$cars[2][2]."</li>";
	echo "<li>".$cars[3][0]." ".$title[1].$cars[3][1]." ".$title[2].$cars[3][2]."</li>";
	echo "</ul>";

	echo "<p>利用for循环展示</p>";
	echo "<ul>";
	for ($i=0;$i<count($cars);$i++) {
		echo "<li>".$cars[$i][0]." ".$title[1].$cars[$i][1]." ".$title[2].$cars[$i][2]."</li>";
	}
	echo "</ul>";

	echo "<table>";
	echo "<tr>";
	for ($l=0;$l<count($title);$l++) {
		echo "<th>$title[$l]</th>";
	}
	echo "</tr>";
	for ($m=0;$m<count($cars);$m++) {
		echo "<tr>";
		for ($n=0;$n<count($cars[$m]);$n++) {
			echo "<td>".$cars[$m][$n]."</td>";
		}
		echo "</tr>";
	}
	echo "</table>";

	?>

</body>
</html>