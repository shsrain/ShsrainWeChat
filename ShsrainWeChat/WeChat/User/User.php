<?php

namespace WeChat\User;

use \Curl\Curl as Curl;
use \WeChat\Token as Token;
use \WeChat\Contracts\User\UserInterface as UserInterface;

class User implements UserInterface{

  protected $token;

  public function __construct( Token $token, $config = array() )
  {
    $this->token = $token;
  }

  public function getToken()
  {
    return $this->token;
  }

  // 获取用户列表
  public function get()
  {
    $api = 'https://api.weixin.qq.com/cgi-bin/user/get';
    $url_query = '?access_token='.$this->getToken()->getToken();
    $url_query .= '&next_openid=';

    $curl = new Curl();
    $curl->setOpt(CURLOPT_SSL_VERIFYPEER,FALSE);
    $curl->setOpt(CURLOPT_SSL_VERIFYHOST,FALSE);
    $curl->get($api.$url_query);

    if ($curl->error)
    {
        echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage;
    }
    else
    {
      if(isset($curl->response->errcode))
      {
        switch ($curl->response->errcode)
        {
          case '40001':
            die($curl->response->errmsg);
            break;
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
            die('未知错误');
            break;
        }
      }
      else
      {
         return $curl->response;
      }
    }
  }

  // 获取用户基本信息（包括UnionID机制）
  public function info($openid = null,$lang='zh_CN')
  {
    $api = 'https://api.weixin.qq.com/cgi-bin/user/info';
    $url_query = '?access_token='.$this->getToken()->getToken();
    $url_query .= '&openid='.$openid;
    $url_query .= '&lang='.$lang;

    $curl = new Curl();
    $curl->setOpt(CURLOPT_SSL_VERIFYPEER,FALSE);
    $curl->setOpt(CURLOPT_SSL_VERIFYHOST,FALSE);
    $curl->get($api.$url_query);

    if ($curl->error)
    {
        echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage;
    }
    else
    {
      if(isset($curl->response->errcode))
      {
        switch ($curl->response->errcode)
        {
          case '40001':
            die($curl->response->errmsg);
            break;
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
            die('未知错误');
            break;
        }
      }
      else
      {
         return $curl->response;
      }
    }

  }

  // 设置备注名
  public function updateremark($openid,$remark)
  {
    $api = 'https://api.weixin.qq.com/cgi-bin/user/info/updateremark';
    $url_query = '?access_token='.$this->getToken()->getToken();
    $data = array(
      'openid'=>$openid,
      'remark'=>$remark
    );

    $curl = new Curl();
    $curl->setOpt(CURLOPT_SSL_VERIFYPEER,FALSE);
    $curl->setOpt(CURLOPT_SSL_VERIFYHOST,FALSE);
    $curl->post($api.$url_query,json_encode($data));

    if ($curl->error)
    {
        echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage;
    }
    else
    {
      if(isset($curl->response->errcode))
      {
        switch ($curl->response->errcode)
        {
          case '40001':
            die($curl->response->errmsg);
            break;
          case '40002':
            die($curl->response->errmsg);
            break;
          case '40003 ':
            die($curl->response->errmsg);
            break;
          case '40013':
              die($curl->response->errmsg);
            break;
          case '40125':
            die($curl->response->errmsg);
            break;
          default:
            print_r($curl->response);die();
            break;
        }
      }
      else
      {
         return $curl->response;
      }
    }
  }
}
