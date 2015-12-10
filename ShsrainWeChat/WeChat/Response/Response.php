<?php

namespace WeChat\Response;

use  WeChat\Contracts\Response\ResponseInterface as ResponseInterface;

class Response implements ResponseInterface{

    public function __construct()
    {
      $this->init();
    }

    public function init()
    {
      return;
    }

    // 回复文本消息
    public function text($toUserName,$fromUserName,$createTime,$content)
    {
      return "<xml>
        <ToUserName><![CDATA[{$toUserName}]]></ToUserName>
        <FromUserName><![CDATA[{$fromUserName}]]></FromUserName>
        <CreateTime>{$createTime}</CreateTime>
        <MsgType><![CDATA[text]]></MsgType>
        <Content><![CDATA[{$content}]]></Content>
        </xml>";
    }

    // 回复图片消息
    public function image($toUserName,$fromUserName,$createTime,$mediaId)
    {
      return "<xml>
        <ToUserName><![CDATA[{$toUserName}]]></ToUserName>
        <FromUserName><![CDATA[{$fromUserName}]]></FromUserName>
        <CreateTime>{$createTime}</CreateTime>
        <MsgType><![CDATA[image]]></MsgType>
        <Image>
        <MediaId><![CDATA[{$mediaId}]]></MediaId>
        </Image>
        </xml>";
    }

    // 回复语音消息
    public function voice($toUserName,$fromUserName,$createTime,$mediaId)
    {
      return "<xml>
        <ToUserName><![CDATA[{$toUserName}]]></ToUserName>
        <FromUserName><![CDATA[{$fromUserName}]]></FromUserName>
        <CreateTime>{$createTime}</CreateTime>
        <MsgType><![CDATA[voice]]></MsgType>
        <Voice>
        <MediaId><![CDATA[{$mediaId}]]></MediaId>
        </Voice>
        </xml>";
    }

    // 回复视频消息
    public function video($toUserName,$fromUserName,$createTime,$mediaId,$title,$description)
    {
      return "<xml>
        <ToUserName><![CDATA[{$toUserName}]]></ToUserName>
        <FromUserName><![CDATA[{$fromUserName}]]></FromUserName>
        <CreateTime>{$createTime}</CreateTime>
        <MsgType><![CDATA[video]]></MsgType>
        <Video>
        <MediaId><![CDATA[{$mediaId}]]></MediaId>
        <Title><![CDATA[{$title}]]></Title>
        <Description><![CDATA[{$description}]]></Description>
        </Video>
        </xml>";
    }

    // 回复音乐消息
    public function music($toUserName,$fromUserName,$createTime,$title,$description,$musicURL,$HQMusicUrl,$thumbMediaId)
    {
      return "<xml>
        <ToUserName><![CDATA[{$toUserName}]]></ToUserName>
        <FromUserName><![CDATA[{$fromUserName}]]></FromUserName>
        <CreateTime>{$createTime}</CreateTime>
        <MsgType><![CDATA[music]]></MsgType>
        <Music>
        <Title><![CDATA[{$title}]]></Title>
        <Description><![CDATA[{$description}]]></Description>
        <MusicUrl><![CDATA[{$musicURL}]]></MusicUrl>
        <HQMusicUrl><![CDATA[{$HQMusicUrl}]]></HQMusicUrl>
        <ThumbMediaId><![CDATA[{$thumbMediaId}]]></ThumbMediaId>
        </Music>
        </xml>";
    }

    // 回复图文消息
    public function news($toUserName,$fromUserName,$createTime,$articleCount,$items = array())
    {
      return "<xml>
        <ToUserName><![CDATA[{$toUserName}]]></ToUserName>
        <FromUserName><![CDATA[{$fromUserName}]]></FromUserName>
        <CreateTime>{$createTime}</CreateTime>
        <MsgType><![CDATA[news]]></MsgType>
        <ArticleCount>{$articleCount}</ArticleCount>
        <Articles>
        <item>
        <Title><![CDATA[{$items['title']}]]></Title>
        <Description><![CDATA[{$items['description']}]]></Description>
        <PicUrl><![CDATA[{$items['picurl']}]]></PicUrl>
        <Url><![CDATA[{$items['url']}]]></Url>
        </item>
        </Articles>
        </xml> ";
    }
}
