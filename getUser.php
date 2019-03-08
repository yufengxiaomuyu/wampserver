<?php
$q = $_GET['q'];
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'my_db';
$formname = 'user';

//连接数据库
$conn = mysqli_connect($servername, $username, $password, $dbname);

//检查连接是否成功
if (!$conn) {
	die ('Could not connected: '.mysqli_error($conn));
}

$sql = "SELECT * FROM user WHERE id = '".$q."'";
$result = mysqli_query($conn,$sql);

echo "<table border = '1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";

while ($row = mysqli_fetch_array($result)) {
	echo "<tr>";
	echo "<td>".$row['firstname']."</td>";
	echo "<td>".$row['lastname']."</td>";
	echo "<td>".$row['age']."</td>";
	echo "<td>".$row['hometown']."</td>";
	echo "<td>".$row['job']."</td>";
	echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>