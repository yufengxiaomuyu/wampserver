<!DOCTYPE html>
<html>
<head>
	<title>PHP demo</title>
	<style>
	.err {
		color: #ff0000;
	}
</style>
</head>
<body>
	<?php
	//定义变量，默认为空值
	$name = $email = $website = $comment = $gender = '';
	$nameErr = $emailErr = $websiteErr = $commentErr = $genderErr = '';


	//获取表单数据
	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		print_r($_POST);
		if(empty($_POST["name"])) {
			$nameErr = "名字不能为空！";
		} else{
			$name = test_input($_POST["name"]);
			if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
				$nameErr = "名字只能为字母和空格！";
			}
		}
		if(empty($_POST["email"])) {
			$emailErr = "邮箱不能为空！";
		} else{
			$email = test_input($_POST["email"]);
			if(!preg_match("/^[\w-]+@[\w-]+\.[\w-]+$/",$email)) {
				$emailErr = "无效的邮箱格式！";
			}
		}
		if(empty($_POST["website"])) {
			$websiteErr = "网址不能为空！";
		} else{
			$website = test_input($_POST["website"]);
			if(!preg_match("/^(?:(?:https?|ftp):\/\/|www\.)\S+/i",$website)) {
				$websiteErr = "无效的 URL！";
			}
		}
		$comment = $_POST["comment"];
		if(empty($_POST["gender"])) {
			$genderErr = "性别为必选项！";
		} else{
			$gender = test_input($_POST["gender"]);
		}
	}

	//处理表单数据
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	?>

	<h2>表单验证实例</h2>
	<p><span class="err">必填字段：*</span></p>
	<form method="POST" action="demo.php">
		名字：<input type="text" name="name" value="<?php echo $name ?>">
		<span class="err">* <?php echo $nameErr ?></span>
		<br /><br />
		E-mail：<input type="text" name="email" value="<?php echo $email ?>">
		<span class="err">* <?php echo $emailErr ?></span>
		<br /><br />
		网址：<input type="text" name="website" value="<?php echo $email ?>">
		<span class="err">* <?php echo $websiteErr ?></span>
		<br /><br />
		备注：<textarea name="comment" id="" cols="30" rows="10"><?php echo $comment ?></textarea>
		<br /><br />
		性别：<label><input type="radio" name="gender" value="female" <?php if(isset($gender) && $gender === "female") echo "checked" ?>>女</label>
		<label><input type="radio" name="gender" value="male" <?php if(isset($gender) && $gender === "male") echo "checked" ?>>男</label>
		<span class="err">* <?php echo $genderErr ?></span>
		<br /><br />
		<input type="submit">
	</form>

	<?php
	echo "<h2>您提交的表单数据是：</2>";
	echo "<br />";
	echo $name;
	echo "<br />";
	echo $email;
	echo "<br />";
	echo $website;
	echo "<br />";
	echo $comment;
	echo "<br />";
	echo $gender;
	echo "<br />";
	?>

</body>
</html>