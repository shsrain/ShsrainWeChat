<?php

namespace WeChat\Router;

use \Curl\Curl as Curl;
use \WeChat\Token as Token;
use \WeChat\Request\Request as Request;
use \WeChat\Contracts\Router\RouterInterface as RouterInterface;

class Router implements RouterInterface{

  protected $token;

  public function __construct( Token $token, $config = array() )
  {
    $this->token = $token;
  }

  public function getToken()
  {
    return $this->token;
  }

  // 获取用户输入的关键词
  public function text($keywords,$listener,Request $request,$arguments = array())
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
}
