<?php

// 载入 WeChat 帮助类
require_once __DIR__.'/ShsrainWeChat/WeChat/WeChat.php';
WeChat::run(array('grant_type'=>'client_credential','appid'=>'','secret'=>''));

//echo WeChat::$response->news(WeChat::$request->getFromUserName(),'youpaiyunzhi',time(),1,array('title'=>'你好呀','description'=>'hellohellohello','url'=>'http://www.baidu.com'));
WeChat::$router->text('text',function() {
  echo WeChat::$response->text(WeChat::$request->getFromUserName(),'youpaiyunzhi',time(),'你好呀');
},WeChat::$request);

WeChat::$router->text('hello',function() {
  echo WeChat::$response->news(WeChat::$request->getFromUserName(),'youpaiyunzhi',time(),1,array('title'=>'你好呀','description'=>'hellohellohello','url'=>'http://www.baidu.com'));
},WeChat::$request);

WeChat::$router->text('活动',function() {
  echo WeChat::$response->text(WeChat::$request->getFromUserName(),'youpaiyunzhi',time(),'我们的活动有很多哦');
},WeChat::$request);

WeChat::$router->text('抽奖',function(){
  echo WeChat::$response->text(WeChat::$request->getFromUserName(),'youpaiyunzhi',time(),'我们的抽奖抽到手软哦');
},WeChat::$request);
echo WeChat::$response->text(WeChat::$request->getFromUserName(),'youpaiyunzhi',time(),'回复：1：活动；2：抽奖；3：笑话');

WeChat::$eventRequest->scanEvent(function(){
  
});
