<?php

namespace WeChat\Contracts\Datacube;

class UserDatacubeInterface{

  // 用户分析数据接口
  public function getusersummary($begin_date,$end_date);

}
