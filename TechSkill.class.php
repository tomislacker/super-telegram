<?php

class TechSkill
{
  protected $name;
  
  public function __construct($name)
  {
    $this->name = $name;
    return $this;
  }
  
  public function getName()
  {
    return $this->name;
  }
}

