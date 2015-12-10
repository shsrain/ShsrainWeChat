<?php

namespace WeChat\Datacube;
use \Curl\Curl;
use \WeChat\WeChatToken;

class UserDatacube{

  protected $token;

  public function __construct( WeChatToken $token, $config = array() )
  {
    $this->token = $token;
  }

  public function getToken()
  {
    return $this->token;
  }

  // 用户分析数据接口
  public function getusersummary($begin_date,$end_date)
  {
    $api = 'https://api.weixin.qq.com/datacube/getusersummary';
    $url_query = '?access_token='.$this->getToken()->getToken();
    $data = array(
      'begin_date'=>$begin_date,
      'end_date'=>$end_date,
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

  // 查询所有分组
  public function get()
  {
    $api = 'https://api.weixin.qq.com/cgi-bin/groups/get';
    $url_query = '?access_token='.$this->getToken()->getToken();
  }

  // 查询用户所在分组
  public function getid($openid)
  {
    $api = 'https://api.weixin.qq.com/cgi-bin/groups/getid';
    $url_query = '?access_token='.$this->getToken()->getToken();
    $data = array(
      'openid'=>$openid,
    );
  }

  // 修改分组名
  public function update($id,$name)
  {
    $api = 'https://api.weixin.qq.com/cgi-bin/groups/update';
    $url_query = '?access_token='.$this->getToken()->getToken();
    $data = array(
      'openid'=>$openid,
      'name'=>$name,
    );
  }

  // 移动用户分组
  public function membersUpdate($openid,$to_groupid)
  {
    $api = 'https://api.weixin.qq.com/cgi-bin/groups/members/update';
    $url_query = '?access_token='.$this->getToken()->getToken();
    $data = array(
      'openid'=>$openid,
      'to_groupid'=>$to_groupid,
    );
  }

  // 批量移动用户分组
  public function membersBatchupdate($openid_list,$to_groupid)
  {
    $api = 'https://api.weixin.qq.com/cgi-bin/groups/members/batchupdate';
    $url_query = '?access_token='.$this->getToken()->getToken();
    $data = array(
      'openid_list'=>$openid_list,
      'to_groupid'=>$to_groupid,
    );
  }

  // 删除分组
  public function delete($group,$id)
  {
    $api = 'https://api.weixin.qq.com/cgi-bin/groups/delete';
    $url_query = '?access_token='.$this->getToken()->getToken();
    $data = array(
      'group'=>$group,
      'id'=>$id,
    );
  }

}
