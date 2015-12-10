<?php

namespace WeChat\Contracts\Response;

interface ResponseInterface{

  // 回复文本消息
  public function text($toUserName,$fromUserName,$createTime,$content);

  // 回复图片消息
  public function image($toUserName,$fromUserName,$createTime,$mediaId);

  // 回复语音消息
  public function voice($toUserName,$fromUserName,$createTime,$mediaId);

  // 回复视频消息
  public function video($toUserName,$fromUserName,$createTime,$mediaId,$title,$description);

  // 回复音乐消息
  public function music($toUserName,$fromUserName,$createTime,$title,$description,$musicURL,$HQMusicUrl,$thumbMediaId);

  // 回复图文消息
  public function news($toUserName,$fromUserName,$createTime,$articleCount,$items = array());

}
