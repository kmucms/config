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
    return self::$data[$this->type][$this->className][$name];
  }

  public function getGlobal(string $name){
    return self::$data['global'][$name];
  }

}
