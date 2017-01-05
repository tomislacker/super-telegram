<?php

class ResumeSkill
{
  protected $header;
  protected $content;
  
  public function __construct($header, $content = NULL)
  {
    $this->header   = $header;
    
    if ( !empty($content) )
    {
      return $this->setRawContent($content);
    }
    
    return $this;
  }
  
  public function getHeader()
  {
    return $this->header;
  }
  
  public function setContent($content)
  {
    $this->rawContent = htmlentities($content);
    return $this;
  }
  
  public function setRawContent($content)
  {
    $this->content = $content;
    return $this;
  }
  
  public function getContent()
  {
    return $this->getContents();
  }
  
  public function getContents()
  {
    return $this->getRawContent();
  }
  
  public function getRawContent()
  {
    return $this->content;
  }
}

