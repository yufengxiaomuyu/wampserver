<?php
header("Content-Type: text/html; charset=utf-8");

//get the parameter form url
$q = $_GET['q'];

//set xml according to $q
if ($q === 'Google') {
	$url = 'http://news.google.com/news?ned=us&topic=h&output=rss';
} else if ($q === 'MSNBC') {
	$url = 'http://rss.msnbc.msn.com/id/3032091/device/rss/rss.xml';
}

//create a DOMDocument instance and load file
$xml = new DOMDocument();
$xml -> load($url);

//get elements form '<channel>'
$channel = $xml -> getElementByTag('channel') -> item(0);
$channel_title = $channel -> getElementsByTag('title') -> item(0) -> childNodes -> item(0) -> nodeValue;
$channel_link = $channel -> getElementsByTag('link') -> item(0) -> childNodes -> item(0) -> nodeValue;
$channel_desc= $channel -> getElementsByTag('description') -> item(0) -> childNodes -> item(0) -> nodeValue;

//output elements from '<channel>'
echo '<h2><a hrf="'.$channel_link.'">'.$channel_title.'</a></h2>';
echo '<p>'.$channel_desc.'</p>';


?>