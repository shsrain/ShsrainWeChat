<?php

namespace WeChat\Contracts\Response;

class CustomResponseInterface{

    // 回复文本消息
    public function send($content);

    // 回复图片消息
    public function image($media_id);

    // 回复语音消息
    public function voice($media_id);

    // 回复视频消息
    public function video($media_id,$title,$description);

    // 回复音乐消息
    public function music($musicURL,$HQMusicUrl,$thumbMediaId,$description);

    // 回复图文消息
    public function news($articleCount,$articles,$title,$description,$picUrl,$url);
}
