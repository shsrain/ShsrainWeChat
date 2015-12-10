<?php

namespace WeChat\Contracts\CustomService;

interface KfaccountInterface{

  // 添加客服帐号
  public function add($kf_account,$nickname,$password);

  // 修改客服帐号
  public function update($kf_account,$nickname,$password);

  // 删除客服帐号
  public function del($kf_account,$nickname,$password);

  // 设置客服帐号的头像
  public function uploadheadimg($uploadheadimg,$kf_account);

  // 获取所有客服账号
  public function getkflist();
}
