<?php

class Experience
{
  protected $name;
  protected $position;
  protected $start          = 'UNKNOWN';
  protected $stop           = NULL;
  protected $htmlContent    = '<em>Nothing so far...</em>';
  
  public function __construct($name, $position, $start, $stop = NULL)
  {
    $this->name     = $name;
    $this->position = $position;
    $this->start    = $start;
    $this->stop     = $stop;
    
    return $this;
  }
  
  public function getName()
  {
    return $this->name;
  }
  
  public function getPosition()
  {
    return $this->position;
  }
  
  public function getStart()
  {
    return $this->start;
  }
  
  public function getEnd()
  {
    return $this->getStop();
  }
  
  public function getStop()
  {
    return ( !empty($this->stop) ? $this->stop : 'Present' );
  }
  
  public function getContent()
  {
    return $this->htmlContent;
  }
  
  public function setContent($newContent)
  {
    $this->htmlContent = $newContent;
    return $this;
  }
  
  public function setFileContent($filePath)
  {
    if ( !is_file($filePath) )
    {
      throw new \Exception('No file for '.__CLASS__.' at "'.$filePath.'"');
    }
    else if ( !is_readable($filePath) )
    {
      throw new \Exception('!is_readable for '.__CLASS__.' at "'.$filePath.'"');
    }
    
    return $this->setContent(@file_get_contents($filePath));
  }
}

