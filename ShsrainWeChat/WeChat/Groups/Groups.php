<?php

namespace WeChat\Groups;
use \Curl\Curl;
use \WeChat\WeChatToken;

class Groups{

  protected $token;

  public function __construct( WeChatToken $token, $config = array() )
  {
    $this->token = $token;
  }

  public function getToken()
  {
    return $this->token;
  }

  // 创建分组
  public function create($name)
  {
    $api = 'https://api.weixin.qq.com/cgi-bin/groups/create';
    $url_query = '?access_token='.$this->getToken()->getToken();
    $data = array(
      'name'=>$name,
    );
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
