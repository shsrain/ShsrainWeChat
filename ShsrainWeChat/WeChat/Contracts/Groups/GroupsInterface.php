<?php

namespace WeChat\Contracts\Groups;

interface GroupsInterface{

  // 创建分组
  public function create($name);

  // 查询所有分组
  public function get();

  // 查询用户所在分组
  public function getid($openid);

  // 修改分组名
  public function update($id,$name);

  // 移动用户分组
  public function membersUpdate($openid,$to_groupid);

  // 批量移动用户分组
  public function membersBatchupdate($openid_list,$to_groupid);

  // 删除分组
  public function delete($group,$id);

}
