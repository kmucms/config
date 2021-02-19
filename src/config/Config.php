<?php

namespace kmucms\config;

class Config{

  private static $data = [];

  public static function init(string $filePath){
    self::$data = require_once $filePath;
  }

  private $className = '';
  private $type      = '';

  public function __construct(string $ressouceId, string $ressourceType = 'class'){
    $this->className = $ressouceId;
    $this->type      = $ressourceType;
  }

  public static function getInstanceClass(string $className): self{
    return new self($className, 'class');
  }

  public function getConf(string $name){
    if(isset(self::$data[$this->type][$this->className][$name])){
      return self::$data[$this->type][$this->className][$name];
    }
    return null;
  }

  public function getConfAll(){
    if(isset(self::$data[$this->type][$this->className])){
      return self::$data[$this->type][$this->className];
    }
    return null;
  }

  public function getGlobal(string $name){
    if(isset(self::$data['global'][$name])){
      return self::$data['global'][$name];
    }
    return null;
  }

}
