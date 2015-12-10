<?php

namespace WeChat;

use \Curl\Curl;
use \WeChat\Exception\TokenExpiredException;

class Token{

  protected $grant_type = null;

  protected $appid;

  protected $secret;

  protected $token_api;

  protected $access_token;

  public function __construct( $config = array() )
  {
    $this->grant_type = $config['grant_type'];
    $this->appid = $config['appid'];
    $this->secret = $config['secret'];
    $this->token_api = 'https://api.weixin.qq.com/cgi-bin/token';
    $this->init();
  }

  // 初始化配置
  protected function init()
  {
    $cache = new \SimplePHPCache\Cache(array(
      'name'      => 'access_token',
      'path'      => 'cache/',
      'extension' => '.cache'
    ));
    $cache->eraseExpired();
    if($cache->retrieve('access_token')==null)
    {
      $token_data = $this->getAccessToken();
      $cache->store('access_token', $token_data->access_token,$token_data->expires_in);
    }
    $this->access_token = $cache->retrieve('access_token');

  }

  // 获取微信 access_token
  protected function getAccessToken()
  {
    $url_query = '?grant_type='.$this->grant_type;
    $url_query .= '&appid='.$this->appid;
    $url_query .= '&secret='.$this->secret;

    $curl = new Curl();
    $curl->setOpt(CURLOPT_SSL_VERIFYPEER,FALSE);
    $curl->setOpt(CURLOPT_SSL_VERIFYHOST,FALSE);
    $curl->get($this->token_api.$url_query);

    if ($curl->error) {
        echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage;
    }
    else {
      if(isset($curl->response->errcode))
      {
        switch ($curl->response->errcode)
        {
          case '40002':
            die($curl->response->errmsg);
            break;
          case '40013':
              die($curl->response->errmsg);
            break;
          case '40125':
            die($curl->response->errmsg);
            break;
          default:
            throw new TokenExpiredException("未知错误");
            break;
        }
      }else
      {
         return $curl->response;
      }
    }
  }

  public function getToken()
  {
    return $this->access_token;
  }
}
