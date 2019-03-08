<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

//创建连接
$conn = mysqli_connect($servername,$username,$password,$dbname);

//检测连接
if(!$conn) {
	die ("Connetcted failed: ".mysqli_connect_error());
}
echo "Connetcted successfully <br />";

//创建数据库
// $sql = "CREATE DATABASE myDB";
// if(mysqli_query($conn,$sql)) {
// 	echo "Datbase create successfully!";
// } else {
// 	echo "Error creating database: ".mysqli_error($conn)."<br />";
// }

//创建数据表
// $sql = "CREATE TABLE MyGuests (
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// firstname VARCHAR(30) NOT NULL,
// lastname VARCHAR(30) NOT NULL,
// email  VARCHAR(50),
// reg_date TIMESTAMP
// )";

// if(mysqli_query($conn,$sql)) {
// 	echo "Table MyGuests created successfully!";
// } else {
// 	echo "Error creating table: ".mysqli_error($conn);
// }

//插入数据
// $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John','Doe','john@example.com')";
// if(mysqli_query($conn,$sql)) {
// 	echo "New record created successfully! <br />";
// } else {
// 	echo "Error: ".mysqli_error($conn)."<br />";
// }

//插入多条数据
// $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John','Doe','john@example.com');";
// $sql .= "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Mary', 'Moe', 'mary@example.com');";
// $sql .= "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Julie', 'Dooley', 'julie@example.com')";
// if(mysqli_multi_query($conn,$sql)) {
// 	echo "New record created successfully! <br />";
// } else {
// 	echo "Error: ".mysqli_error($conn)."<br />";
// }

//使用预处理语句插入数据
//初始化statement对象,预处理语句准备
// $stmt = mysqli_stmt_init($conn);
// $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES (?,?,?)";
// if(mysqli_stmt_prepare($stmt,$sql)) {
// 	//绑定参数
// 	mysqli_stmt_bind_param($stmt, 'sss', $firstname, $lastname, $email);

// 	//设置参数，并执行
// 	$firstname = 'John';
// 	$lastname = 'Doe';
// 	$email = 'john@example.com';
// 	mysqli_stmt_execute($stmt);

// 	$firstname = 'Mary';
// 	$lastname = 'Moe';
// 	$email = 'mary@example.com';
// 	mysqli_stmt_execute($stmt);

// 	$firstname = 'Julie';
// 	$lastname = 'Dooley';
// 	$email = 'julie@example.com';
// 	mysqli_stmt_execute($stmt);
// }

//查询数据
// $sql = "SELECT id, firstname, lastname FROM MyGuests";

//面向对象
// $result = $conn->query($sql);
// print_r($result);

// if ($result->num_rows > 0) {
//     // 输出每行数据
//     while($row = $result->fetch_assoc()) {
//         echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"];
//     }
// } else {
//     echo "0 results";
// }

//面向过程
// $result = mysqli_query($conn, $sql);
// if (mysqli_num_rows($result)> 0) {
// 	while($row = mysqli_fetch_assoc($result)) {
// 		echo "id: ". $row["id"]. " Name: ". $row["firstname"]. " " . $row["lastname"]."<br />";
// 	}
// }  else {
//     echo "0 results";
// }

//运用where查询
// $sql = "SELECT * FROM MyGuests WHERE firstname='John'";

// $result = mysqli_query($conn, $sql);
// if (mysqli_num_rows($result)> 0) {
// 	while($row = mysqli_fetch_array($result)) {
// 		echo $row['firstname'] . " " . $row['lastname']."<br />";
// 	}
// }  else {
//     echo "0 results";
// }



//更新数据
$sql = "UPDATE MyGuests SET id=20 WHERE firstname='John' AND lastname='Doe'";
mysqli_query($conn,$sql);

//删除数据
$sql = "DELETE FROM MyGuests WHERE firstname='John'";
mysqli_query($conn,$sql);

//使用order by排序
$sql = "SELECT * FROM MyGuests ORDER BY id DESC";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
	echo $row['id']." ".$row['firstname'] . " " . $row['lastname']."<br />";
}

//关闭连接
mysqli_close($conn);
// mysqli_query("INSERT INTO `wx_user` (`id`,`openid`,`username`,`telephone`) VALUES (NULL,'o7Lp5t6n59DeX3U0C7Kric9qEx-Q', '方倍', '15987654321')");
// mysqli_query("INSERT INTO `wx_user` (`id`,`openid`,`username`,`telephone`) VALUES (NULL,'o7Lp5t6n59De2380C3Kxkc93E2x3', '李四', '13412341234')");
// mysqli_close($con);
?>