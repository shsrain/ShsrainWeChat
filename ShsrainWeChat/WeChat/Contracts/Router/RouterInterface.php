<?php

namespace WeChat\Contracts\Router;
use \WeChat\Request\Request as Request;
interface RouterInterface{

  // 获取用户输入的关键词
  public function text($keywords,$listener,Request $request,$arguments = array());

}
