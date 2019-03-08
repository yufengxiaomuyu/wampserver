<?php
	//定义变量，默认为空值
	class Site {
  /* 成员变量 */
   var $url;
  var $title;

  /* 成员函数 */
   function setUrl($par){
     $this ->url = $par;
  }

  function getUrl (){
     echo $this->url . PHP_EOL ;
  }

  function setTitle($par){
     $this ->title = $par;
  }

  function getTitle (){
     echo $this->title . PHP_EOL ;
  }
}

$youj = new Site;
$taobao = new  Site;
$google = new Site;

print_r($youj);

?>
