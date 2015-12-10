<?php

namespace WeChat\Request;

use \Curl\Curl as Curl;
use \WeChat\Contracts\Request\RequestInterface as RequestInterface;

class Request implements RequestInterface{

    // 文本消息
    const MSGTYPE_TEXT = 'TEXT';

    // 图片消息
    const MSGTYPE_IMAGE = 'IMAGE';

    // 语音消息
    const MSGTYPE_VOICE = 'VOICE';

    // 视频消息
    const MSGTYPE_VIDEO = 'VIDEO';

    // 小视频消息
    const MSGTYPE_SHORTVIDEO = 'SHORTVIDEO';

    // 地理位置消息
    const MSGTYPE_LOCATION = 'LOCATION';

    // 链接消息
    const MSGTYPE_LINK = 'LINK';

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

    // 文本消息
    public function text($key)
    {
      return $this->request->$key;
    }

    // 图片消息
    public function image($key)
    {
      return $this->request->$key;
    }

    // 语音消息
    public function voice($key)
    {
      return $this->request->$key;
    }

    // 视频消息
    public function video($key)
    {
      return $this->request->$key;
    }

    // 小视频消息
    public function shortvideo($key)
    {
      return $this->request->$key;
    }

    // 地理位置消息
    public function location($key)
    {
      return $this->request->$key;
    }

    // 链接消息
    public function link($key)
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
