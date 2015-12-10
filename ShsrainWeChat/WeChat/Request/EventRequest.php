<?php

namespace WeChat\Request;

use \Curl\Curl as Curl;
use \WeChat\Contracts\Request\EventRequestInterface as EventRequestInterface;

class EventRequest implements EventRequestInterface{

    // 事件消息
    const MSGTYPE_EVENT = 'EVENT';

    // 订阅事件
    const EVENT_SUBSCRIBE = 'SUBSCRIBE';

    // 取消订阅事件
    const EVENT_UNSUBSCRIBE = 'UNSUBSCRIBE';

    // 用户已关注时的事件推送
    const EVENT_SCAN = 'SCAN';

    // 上报地理位置事件
    const EVENT_LOCATION = 'LOCATION';

    // 点击菜单拉取消息时的事件推送
    const EVENT_CLICK = 'CLICK';

    // 点击菜单跳转链接时的事件推送
    const EVENT_VIEW = 'VIEW';

    // 原始输入流
    public $input_stream = null;

    //请求的xml对象
    public $request = null;

    // 开发者微信号
    public $toUserName = null;

    // 发送方帐号（一个OpenID）
    public $fromUserName = null;

    // 消息创建时间
    public $createTime = null;

    // 消息类型
    public $msgType = null;


    public function __construct()
    {
      $this->input_stream = file_get_contents('php://input', 'r');
      $this->init();
    }

    public function init()
    {
      libxml_disable_entity_loader(true);
      $xml = simplexml_load_string($this->input_stream, 'SimpleXMLElement', LIBXML_NOCDATA);
      $this->toUserName = $xml->ToUserName;
      $this->fromUserName = $xml->FromUserName;
      $this->createTime = $xml->CreateTime;
      $this->msgType = $xml->MsgType;
      $this->request = $xml;
    }

    // 获取请求的参数 type object
    function get()
    {
      return $this->request;
    }

    // 订阅事件推送
    public function subscribeEvent($key)
    {
      return $this->request->$key;
    }

    // 取消订阅事件推送
    public function unsubscribeEvent($key)
    {
      return $this->request->$key;
    }

    // 用户已关注时的事件推送
    public function scanEvent($listener,$arguments = array())
    {
      if (!is_callable($listener))
      {
          throw new \InvalidArgumentException('The provided listener was not a valid callable.');
      }
      else
      {
        if($keywords==$request->text('Content'))
        {
          call_user_func_array($listener, $arguments);
        }
      }
    }

    // 上报地理位置事件
    public function locationEvent($key)
    {
      return $this->request->$key;
    }

    // 点击菜单拉取消息时的事件推送
    public function clickEvent($key)
    {
      return $this->request->$key;
    }

    // 点击菜单跳转链接时的事件推送
    public function viewEvent($key)
    {
      return $this->request->$key;
    }

    // 开发者微信号
    public function getToUserName()
    {
      return $this->toUserName;
    }

    // 发送方帐号（一个OpenID）
    public function getFromUserName()
    {
      return $this->fromUserName;
    }

    // 消息创建时间 （整型）
    public function getCreateTime()
    {
      return $this->createTime;
    }

    // 消息类型
    public function getMsgType()
    {
      return strtoupper($this->msgType);
    }
}
