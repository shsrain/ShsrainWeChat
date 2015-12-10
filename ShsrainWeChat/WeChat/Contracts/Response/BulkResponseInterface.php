<?php

namespace WeChat\Contracts\Response;

class BulkResponseInterface{

    // 根据OpenID列表群发【订阅号不可用，服务号认证后可用】
    public function send();

}
