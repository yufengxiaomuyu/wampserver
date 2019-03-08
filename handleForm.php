<?php
	print_r($_GET);
	echo "<br />";

	if(isset($_GET['fname'])) {
		$name = $_GET['fname'];
		echo $name;
	}
?>
