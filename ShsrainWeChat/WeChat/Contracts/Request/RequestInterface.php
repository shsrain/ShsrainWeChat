<?php

namespace WeChat\Contracts\Request;

interface RequestInterface{

    // 文本消息
    public function text($key);

    // 图片消息
    public function image($key);

    // 语音消息
    public function voice($key);

    // 视频消息
    public function video($key);

    // 小视频消息
    public function shortvideo($key);

    // 地理位置消息
    public function location($key);

    // 链接消息
    public function link($key);

    // 开发者微信号
    public function getToUserName();

    // 发送方帐号（一个OpenID）
    public function getFromUserName();

    // 消息创建时间 （整型）
    public function getCreateTime();

    // 消息类型
    public function getMsgType();
}
