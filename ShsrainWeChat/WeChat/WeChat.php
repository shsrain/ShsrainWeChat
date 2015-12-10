<?php

use \Curl\Curl as Curl;
use \WeChat\Token as Token;

class WeChat{

  public static $token;

  public static $request;

  public static $response;

  public static $router;

  public static function getVersion()
  {
      return '1.0.0';
  }

  public static function getWeChatIp()
  {
    $api = 'https://api.weixin.qq.com/cgi-bin/getcallbackip';
    $url_query = '?access_token='.self::$token->getToken();

    $curl = new Curl();
    $curl->setOpt(CURLOPT_SSL_VERIFYPEER,FALSE);
    $curl->setOpt(CURLOPT_SSL_VERIFYHOST,FALSE);
    $curl->get($api.$url_query);

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
            die('未知错误');
            break;
        }
      }else
      {
         return $curl->response;
      }
    }
  }

  public static function factory($key)
  {
    $class = self::aliasesClass($key);

    return new $class(self::$token);
  }

  public static function aliasesClass($key)
  {
    $aliases = array(
      'User'=> "\WeChat\User\User",
      'Response'=> "\WeChat\Response\Response",
      'Request'=> "\WeChat\Request\Request",
      'Router'=> "\WeChat\Router\Router",
    );
    return $aliases[$key];
  }

  public static function autoload()
  {
    require_once __DIR__.'/../Curl/Curl.php';
    require_once __DIR__.'/../SimplePHPCache/cache.class.php';

    require_once __DIR__.'/../WeChat/Token.php';
    require_once __DIR__.'/../WeChat/Contracts/User/UserInterface.php';
    require_once __DIR__.'/../WeChat/User/User.php';
    require_once __DIR__.'/../WeChat/Contracts/Response/ResponseInterface.php';
    require_once __DIR__.'/../WeChat/Response/Response.php';
    require_once __DIR__.'/../WeChat/Contracts/Request/RequestInterface.php';
    require_once __DIR__.'/../WeChat/Request/Request.php';
    require_once __DIR__.'/../WeChat/Contracts/Router/RouterInterface.php';
    require_once __DIR__.'/../WeChat/Router/Router.php';
  }

  public static function run($config)
  {
    self::autoload();
    self::$token = new \WeChat\Token($config);
    self::$request = self::factory('Request');
    self::$response = self::factory('Response');
    self::$router = self::factory('Router');
  }
}
