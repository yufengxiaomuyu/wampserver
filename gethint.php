<?php
//设置初始数组
$names = array('Anna','Brittany','Cinderella','Diana','Eva','Fiona','Gunda','Hege','Inga','Johanna','Kitty','Linda','Nina','Ophelia','Petunia','Amanda','Raquel','Cindy','Doris','Eve','Evita','Sunniva','Tove','Unni','Violet','Liza','Elizabeth','Ellen','Wenche','Vicky');

//从请求url地址中获取 q 参数
$q = $_GET['q'];

//匹配查询值，处理提示
if (strlen($q) > 0) {
	$hint = '';
	for ($i = 0;$i < count($names);$i++) {
		if (strtolower($q) === strtolower(substr($names[$i],0,strlen($q)))) {
			if ($hint === '') {
				$hint = $names[$i]."<br />";
			} else {
				$hint .=  $names[$i]."<br />";
			}
		}
	}
}

//根据查询结果，处理反馈值
if($hint === '') {
	$response = 'No suggestion!';
} else {
	$response = $hint;
}
echo $response;

?>