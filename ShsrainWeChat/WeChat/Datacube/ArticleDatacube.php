<?php

namespace WeChat\Datacube;
use \Curl\Curl;
use \WeChat\WeChatToken;

class ArticleDatacube{

  protected $token;

  public function __construct( WeChatToken $token, $config = array() )
  {
    $this->token = $token;
  }

  public function getToken()
  {
    return $this->token;
  }

  // 获取图文群发每日数据
  public function getarticlesummary($begin_date,$end_date)
  {

  }

  // 获取图文群发总数据
  public function getarticletotal($begin_date,$end_date)
  {

  }

  // 获取图文统计数据
  public function getuserread($begin_date,$end_date)
  {

  }

  // 获取图文统计分时数据
  public function getuserreadhour($begin_date,$end_date)
  {

  }

  // 获取图文分享转发数据
  public function getusershare($begin_date,$end_date)
  {

  }

  // 获取图文分享转发分时数据
  public function getusersharehour($begin_date,$end_date)
  {

  }

}
