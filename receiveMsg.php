<?php

// 载入 WeChat 帮助类
require_once __DIR__.'/wexin/ShsrainWeChat/WeChat/WeChat.php';
WeChat::run(array('grant_type'=>'client_credential','appid'=>'','secret'=>''));

//echo WeChat::$response->news(WeChat::$request->getFromUserName(),'youpaiyunzhi',time(),1,array('title'=>'你好呀','description'=>'hellohellohello','url'=>'http://www.baidu.com'));
WeChat::$router->text('笑话',function() {
  echo WeChat::$response->text(WeChat::$request->getFromUserName(),'youpaiyunzhi',time(),joke());
},WeChat::$request);

WeChat::$router->text('hello',function() {
  echo WeChat::$response->news(WeChat::$request->getFromUserName(),'youpaiyunzhi',time(),1,array('title'=>'你好呀','description'=>'hellohellohello','url'=>'http://www.baidu.com'));
},WeChat::$request);

WeChat::$router->text('活动',function() {
  echo WeChat::$response->text(WeChat::$request->getFromUserName(),'youpaiyunzhi',time(),'近期活动已经结束啦');
},WeChat::$request);

WeChat::$router->text('抽奖',function(){
  echo WeChat::$response->text(WeChat::$request->getFromUserName(),'youpaiyunzhi',time(),'抽奖活动已经结束啦');
},WeChat::$request);

$contentStr = "欢迎关注优派健康。\n";
$contentStr .= "<a href='https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxca232ac09f1798ef&redirect_uri=http://api.didijiankang.cn/weixin/index.php/Home/Index/bindingAccountForm&response_type=code&scope=snsapi_base&state=123#wechat_redirect'>注册-绑定优派账号</a>。\n";
$contentStr.="已绑定账号-<a href='https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxca232ac09f1798ef&redirect_uri=http://api.didijiankang.cn/weixin/index.php/Home/Index/displayMyConcern&response_type=code&scope=snsapi_base&state=123#wechat_redirect'>我的关注</a>。";
echo WeChat::$response->text(WeChat::$request->getFromUserName(),'youpaiyunzhi',time(),$contentStr." \n".'回复：1：活动；2：抽奖；3：笑话');


function joke(){
  $content =  array(
    '老夫妇去拍照，摄影师问：“大爷，您是要侧光，逆光，还是全光？"，大爷腼腆的说：“我是无所谓，能不能给你大妈留条裤衩？"',
    '老婆语录：允许你喝醉，允许你勾妹，但晚上必须给老娘归队，如果你敢伤我的心，伤我的肺，老娘一定把你的第三条腿打残废，让你的鸟鸟永远打嗑睡。',
    '两个饺子结婚了，送走客人后新郎回到卧室，竟发现床上躺着一个肉丸子！新郎大惊，忙问新娘在哪？肉丸子害羞的说：讨厌，人家脱了衣服你就不认识啦！',
    '俩老夫妻某日吃晚饭时突发奇想：裸餐！找找从前的感觉！脱光后老太婆道：我还有反应耶！乳房还和年轻时一样发热！老头斜了一眼道：耷拉到汤里了！',
    '四只老鼠吹牛：甲：我每天都拿鼠药当糖吃；乙：我一天不踩老鼠夹脚发痒；丙：我每天不过几次大街不踏实；丁：时间不早了，回家抱猫去咯。 ',
    '天是蓝的，海是深的，男人的话没一句是真的；爱是永恒的，血是鲜红的，男人不打是不行的；男人如果是有钱的，和谁都是有缘的，男人靠的住，猪都会爬树。',
    '一群蚂蚁爬上了大象的背，但被摇了下来，只有一只蚂蚁死死地抱着大象的脖子不放，下面的蚂蚁大叫：掐死他，掐死他，小样，还他妈反了！',
    '小孩把妓院养的鹦鹉偷回家，一进门，鹦鹉便叫：搬家啦！看见他妈妈又叫：老板也换啦！看见他姐姐又叫：小姐也换了！看见他爸爸又叫：我cao还是老客！',
    '漫漫人生路，谁不错几步！家庭要照顾，情人也得处！家里有个做饭的，外面养个心善的，对桌坐个好看的，远方有个思念的！保住二，守住一，发展三四五六七！',
    '一只小狗爬上你的餐桌，向一只烧鸡爬去，你大怒道：你敢对那只烧鸡怎样，我就敢对你怎样，结果小狗舔了一下鸡屁股，你昏倒，小狗乐道：小样看谁狠。',
    '传说今晚，阴魂不散，死光又现，鬼魂四处转！愿鬼听到我的呼唤，半夜来到你庆头，苍白的脸，幽绿的眼，干枯的手抚摸你的脸，代我向你说一句：晚安！',
    '男人，总是笑容满面，两眼放电，不是发病犯贱，就是坑蒙拐骗！女人丰胸细腰，放荡风骚，不是掏你腰包，就是放你黑刀！这年月男怪女妖，小心中招啊！',
    '你走在路上，一母狗扑向你从你的脚上咬了一块肉，迅速吞下去，你伸脚正要踢它的时候，狗含着泪说：你打吧，反正我肚里已经有了你的骨肉！',
    '老鼠没女朋友特别郁闷，终于一只蝙蝠答应嫁给他，老鼠十分高兴。别人笑他没眼光，老鼠：你们懂什么，她好歹是个空姐。',
    '朋友问蝙蝠怎么会下嫁给老鼠，蝙蝠眼含泪花，意味深长：唉！那天他吃了伟哥，火力壮，一下蹦上天花板，让他得了手。',
    '我花一毛钱发这条短信给你，是为了告诉你——我并不是一个一毛不拔的人。比如这一毛钱的短信就是我送你的生日礼物。',
    '蚂蚁懒洋洋地躺在土里，伸出一只腿，朋友问你干嘛呢？蚂蚁：待会大象来了，绊他一跟头。',
    '喜鹊来，妈妈说这是喜鸟是客；燕子来，妈妈说这是益鸟是客；乌鸦来，孩子问你也是客人吗？乌鸦叫：Yes，吾乃黑客！',
    '某美女发现口红太重，拿湿纸巾擦拭后扔到路上。一老头拣起，端详半天突然醒悟，追上说：姑娘，这超薄的就是容易掉呀！',
    '黄瓜失恋痛哭，茄子安慰她：爱情不单只是甜美、只是沉醉，还有心碎、还有流泪。唉！谁让你爱上洋葱的？ ',
    '昨天梦见上帝说可满足我一个愿望我拿出地球仪说要世界和平，他说太难换一个吧，我拿出你的照片说要这人变漂亮，他沉思了一下说拿地球仪我再看看。',
    '一女奇丑，嫁不出去，希望被拐卖。终于梦想成真，却半月卖不出去。绑匪将其送回，她坚决不下车，绑匪咬牙一跺脚：走，车不要了',
    '20年前爸爸抱着你等车，人都笑话孩子长得难看，爸爸哭了。一卖香蕉的老大爷拍拍爸爸说：“大兄弟别哭了，拿只香蕉给猴子吃吧！真可怜，饿的都没毛了。”',
    '飞机上，一只鹦鹉对空姐说：“给爷来杯水”，猪也学鹦鹉，对空姐说：“给爷来杯水”，空姐大怒，将鹦鹉和猪都扔下了飞机。这时鹦鹉对猪说：“傻B了吧，爷会飞。”',
    '好累了，不想讲了，看到你就像是一个笑话，呵呵哒。',
    '如何你看到我讲了几个重复的笑话，那是我在暗示，我累啦，不要让我讲笑话啦。',
  );
  return $content[rand(0,25)];
}

/**
  * wechat php test
  */

//define your token
/*define("TOKEN", "youpaiyunzhi");
$wechatObj = new wechatCallbackapiTest();
$wechatObj->valid();*/

$wechatObj = new wechatCallbackapiTest();

$wechatObj->responseMsg();
class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
                libxml_disable_entity_loader(true);
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
				if(!empty( $keyword ))
                {
              		$msgType = "text";
                	//$contentStr = "Welcome to wechat world!您的openID：$fromUsername";
                	$contentStr = "欢迎关注优派健康。\n";
                	$contentStr .= "<a href='https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxca232ac09f1798ef&redirect_uri=http://api.didijiankang.cn/weixin/index.php/Home/Index/bindingAccountForm&response_type=code&scope=snsapi_base&state=123#wechat_redirect'>注册-绑定优派账号</a>。\n";
                        $contentStr.="已绑定账号-<a href='https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxca232ac09f1798ef&redirect_uri=http://api.didijiankang.cn/weixin/index.php/Home/Index/displayMyConcern&response_type=code&scope=snsapi_base&state=123#wechat_redirect'>我的关注</a>。";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                }else{
                	echo "Input something...";
                }

        }else {
        	echo "";
        	exit;
        }
    }

	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }

        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );

		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}

?>
