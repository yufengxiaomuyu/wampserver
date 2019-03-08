<?php
//获取查询数据
$q = $_GET['q'];

//新建xmlDOM实例
$xmlDoc = new DOMDocument();

//加载xml文档
$xmlDoc -> load('cd_catalog.xml');
// echo gettype($xmlDoc -> load('cd_catalog.xml'));
// print_r($xmlDoc -> load('cd_catalog.xml'));

//获取所有标签名为'ARTIST'的DOMNodeList
$x = $xmlDoc -> getElementsByTagName('ARTIST');

//遍历DOMNodeList,查找与$q匹配的DOMNode
for ($i = 0;$i < $x -> length;$i++) {
	 //Process only element nodes
	if ($x -> item($i) -> nodeType === 1)
	{
		if ($x -> item($i) -> childNodes -> item(0) -> nodeValue === $q)
		{
			$y = ($x -> item($i) -> parentNode);
		}
	}
}

//返回符合查询条件的数据
$cd = ($y->childNodes);
for ($l = 0;$l < $cd -> length;$l++) {
	//Process only element nodes
	if($cd -> item($l) -> nodeType === 1) {
		echo "<b>".$cd -> item($l) -> nodeName.":</b>";
		echo $cd -> item($l) -> childNodes -> item(0) -> nodeValue;
		echo "<br />";
	}
}

?>