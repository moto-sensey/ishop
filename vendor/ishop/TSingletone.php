<?php

namespace ishop;

trait TSingletone {
  
  private static ?self $instance = null;

  private function __construct(){}
  
  public static function getInstance(): static {
    return static::$instance ?? static::$instance = new static();
  }
}