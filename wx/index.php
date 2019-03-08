<?php
header('Content-type:text');

define('TOKEN','xiaomuyuweixin');
$wechatObj = new wechatCallbackapiTest();
if(isset($_GET['echostr'])) {
	$wechatObj -> valid();
}	else {
	$wechatObj -> responseMsg();
}

class wechatCallbackapiTest {
	//验证签名
	public function valid() {
		$echoStr = $_GET['echostr'];
		$signature = $_GET['signature'];
		$timestamp = $_GET['timestamp'];
		$nonce = $_GET['nonce'];
		$token = TOKEN;
		$tmpArr = array($token,$timestamp,$nonce);
		sort($tmpArr,SORT_STRING);
		$tmpStr = implode($tmpArr);
		$tmpStr = sha1($tmpStr);
		if ($tmpStr === $signature) {
			echo $echoStr;
			exit;
		}
	}

	//响应消息
	public function responseMsg() {
		// $postStr = $GLOBALS['HTTP_RAW_PSOT_DATA'];
		$postStr = file_get_contents('php://input');
		if (!empty($postStr)) {
			$postObj = simplexml_load_string($postStr, 'SimpleXMLElement',LIBXML_NOCDATA);
			$formUsername = $postObj -> FormUserName;
			$toUsername = $postObj -> ToUserName;
			$keyword = trim($postObj -> Content);
			$time = time();
			$textTpl = "<xml>
			<ToUserName><![CDATA[%S]]></ToUserName>
			<FromUserName><![CDATA[%S]]></FromUserName>
			<CreateTime><![CDATA[%S]]></CreateTime>
			<MsgType><![CDATA[%S]]></MsgType>
			<Content><![CDATA[%S]]></Content>
			<FuncFlag>0</FuncFlag>
			</xml>";

			if ($keyword == '?' || $keyword == '？') {
				$MsgType = 'text';
				$content = date('Y-m-d H:i:s', time());
				$result = sprintf($textTpl,$frmeUsername,$toUsername,$time,$MsgType,$content);
				echo $result;
			} else {
				echo '';
				exit;
			}
		}
	}
}
?>