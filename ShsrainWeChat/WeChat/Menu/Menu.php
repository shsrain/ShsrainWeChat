<?php

namespace WeChat\Menu;
use \Curl\Curl;
use \WeChat\WeChatToken;

class Menu{

  protected $token;

  public function __construct( WeChatToken $token, $config = array() )
  {
    $this->token = $token;
  }

  public function getToken()
  {
    return $this->token;
  }
  // todo...
}
