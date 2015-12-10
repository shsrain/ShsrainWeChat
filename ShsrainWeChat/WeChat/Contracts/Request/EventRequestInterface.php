<?php

namespace WeChat\Contracts\Request;

interface EventRequestInterface{

    // 订阅事件推送
    public function subscribeEvent($key);

    // 取消订阅事件推送
    public function unsubscribeEvent($key);

    // 用户已关注时的事件推送
    public function scanEvent($key);

    // 上报地理位置事件
    public function locationEvent($key);

    // 点击菜单拉取消息时的事件推送
    public function clickEvent($key);

    // 点击菜单跳转链接时的事件推送
    public function viewEvent($key);

    // 开发者微信号
    public function getToUserName();

    // 发送方帐号（一个OpenID）
    public function getFromUserName();

    // 消息创建时间 （整型）
    public function getCreateTime();

    // 消息类型
    public function getMsgType();
}
