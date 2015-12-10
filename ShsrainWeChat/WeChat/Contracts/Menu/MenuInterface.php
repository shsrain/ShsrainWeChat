<?php

namespace WeChat\Contracts\Menu;

interface MenuInterface{

  // 自定义菜单创建接口
  public function create($array = array());

  // 自定义菜单查询接口
  public function get();

  // 自定义菜单删除接口
  public function delete();

  // 自定义菜单事件推送
  public function pushMenuEvent();

  // 获取自定义菜单配置接口
  public function getCurrentSelfmenuInfo();
}
