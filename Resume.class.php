<?php

require_once('ResumeSkill.class.php');
require_once('TechSkill.class.php');
require_once('Experience.class.php');

class Resume
{
  protected $name           = 'Ben Tomasik';
  protected $genericSTitle  = 'Linux Administrator';
  protected $genericTitle   = 'Linux & Network Administrator';
  protected $emailAddr      = 'b.tomasik@gmail.com';
  protected $phoneNum       = '4143365351';
  
  protected $profileContent = NULL;
  protected $skills         = array();
  protected $techSkills     = array();
  protected $techSkillCols  = 4;
  protected $experience     = array();
  
  public function __construct($name, $genericSTitle, $genericTitle, $emailAddr, $phoneNum)
  {
    $this->name           = $name;
    $this->genericSTitle  = $genericSTitle;
    $this->genericTitle   = $genericTitle;
    $this->emailAddr      = $emailAddr;
    $this->phoneNum       = $phoneNum;
    
    return $this;
  }
  
  public function getHTMLName()
  {
    return htmlentities($this->name);
  }
  
  public function getHTMLGenericTitle()
  {
    return htmlentities($this->genericTitle);
  }
  
  public function getHTMLGenericShortTitle()
  {
    return htmlentities($this->genericSTitle);
  }
  
  public function getHTMLEmailAddr()
  {
    return htmlentities($this->emailAddr);
  }
  
  public function getHTMLPhoneNum()
  {
    return
      htmlentities('('.substr($this->phoneNum, 0, 3).')')
      .'&nbsp;&nbsp;'
      .substr($this->phoneNum, 3, 3)
      .'-'.substr($this->phoneNum, 6,4);
  }
  
  /**
   * SECTION: Profile
   **/

  public function setRawProfileContent($content)
  {
    $this->profileContent = $content;
    return $this;
  }
  
  public function setProfileContent($content)
  {
    $this->profileContent = htmlentities($content);
    return $this;
  }
  
  public function getHTMLProfileContent()
  {
    return $this->profileContent;
  }
  
  /*****************************************************************************
   * SECTION: Skills
   ****************************************************************************/
  
  public function addSkill(ResumeSkill $rs)
  {
    $this->skills[] = $rs;
    return $this;
  }
  
  public function getSkills()
  {
    return $this->skills;
  }
  
  public function getSkillsCount()
  {
    return count($this->skills);
  }
  
  /*****************************************************************************
   * SECTION: Technical
   ****************************************************************************/
  
  public function addTechSkill()
  {
    $funcArgs = func_get_args();
    
    foreach ( $funcArgs as $funcArg )
    {
      if ( is_string($funcArg) )
      {
        $this->addTechSkillString($funcArg);
      }
      else if ( is_object($funcArg) && get_class($funcArg) == 'TechSkill' )
      {
        $this->addTechSkillObj($funcArg);
      }
      else if ( is_array($funcArg) )
      {
        if ( count($funcArg) > 0 )
        {
          foreach ( $funcArg as $funcArgArrElement )
          {
            $this->addTechSkill($funcArgArrElement);
          }
        }
      }
      else
      {
        // Invalid datatype
      }
    }
    return $this;
  }
  
  public function addTechSkillString($ts)
  {
    return $this->addTechSkillObj(
      new TechSkill($ts)
    );
  }
  
  public function addTechSkillObj(TechSkill $ts)
  {
    $this->techSkills[] = $ts;
    return $this;
  }
  
  public function getTechSkill($index)
  {
    return $this->techSkills[$index];
  }
  
  public function getTechSkills()
  {
    return $this->techSkills;
  }
  
  public function getTechSkillCount()
  {
    return count($this->techSkills);
  }
  
  public function getTechSkillRowCount()
  {
    return ceil($this->getTechSkillCount() / $this->getTechSkillColumns() );
  }
  
  public function getTechSkillColCount()
  {
    return $this->getTechSkillColumns();
  }
  
  public function setTechSkillColumns($cols)
  {
    $this->techSkillCols = $cols;
    return $this;
  }
  
  public function getTechSkillColumns()
  {
    return $this->techSkillCols;
  }
  
  public function getTechSkillCell($colIndex, $rowIndex)
  {
    $skillIndex = $colIndex + ( $rowIndex * $this->getTechSkillColCount() );
    
    return ( @is_object($this->techSkills[$skillIndex]) ? $this->techSkills[$skillIndex]->getName() : '' );
  }
  
  /*****************************************************************************
   * SECTION: Experience
   ****************************************************************************/
   
  public function addExperience(Experience $e)
  {
    $this->experience[] = $e;
    return $this;
  }
  
  public function getExperience()
  {
    return $this->experience;
  }
}

