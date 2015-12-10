<?php
class Test{

  protected $a = null;

  public function __set( $name, $value ){
    $this->name=$value;
  }

  public function __get($name){

    echo $name;
  }

  public function __call($name , $arguments){
    echo $name;
    print_r($arguments);
  }

  public static function __callStatic($name, $arguments)
  {
      // 注意: $name 的值区分大小写
      echo "Calling static method '$name' "
           . implode(', ', $arguments). "\n";
  }


  public function text()
  {
    $a = function($ad){
      return $ad;
    };
    echo $a(22322);
  }
}
 $a = new Test();
 //echo $a->text();


class NoFoundException extends Exception{

}

class No2FoundException extends Exception{

}

class model{
  public function get()
  {
    throw new NoFoundException('sdfsdfsdfdsf');
  }
}


 try {
    $model = new model();
    $model->get();

} catch (No2FoundException $e) {
    echo 'Caught exception: ',  $e->getMessage(),'<br>';
}

// 继续执行
echo 'Hello World';
