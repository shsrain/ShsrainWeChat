<?php

namespace WeChat\Contracts\User;

interface UserInterface{

  // 获取用户列表
  public function get();

  // 获取用户基本信息（包括UnionID机制）
  public function info($openid = null,$lang='zh_CN');

  // 设置备注名
  public function updateremark($openid,$remark);
}
