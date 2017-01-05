<?php
  
  require_once('Resume.class.php');
  
  /***
   * BASIC RESUME SETUP
   ***/
  $thisResume = new Resume(
    'Ben Tomasik',
    'Linux Administrator',
    'Linux & Network Administrator, Multilingual Developer',
    'no@email.com',
    '2125555555'
  );
  
  /***
   * SECTION: Profile
   ***/
  $thisResume
  ->setRawProfileContent(@file_get_contents('profile.html'));
  
  /***
   * SECTION: Skills
   ***/
  $thisResume
  ->addSkill(new ResumeSkill(
    'Driven',
    'Consistently striving for mission accomplishment. Embolded by an endless sense of ambition.'
  ))
  ->addSkill(new ResumeSkill(
    'Architectural',
    'Experienced & meticulous in developing scalable, extensible, and tested solutions.'
  ))
  ->addSkill(new ResumeSkill(
    'Project Direction',
    'Proven ability to lead and manage a wide variety of design and development projects in team and independent situations.'
  ));
  
  /***
   * SECTION: Technical
   ***/
  
  // Column setup
  $thisResume->
  setTechSkillColumns(3);
  
  // Technical skill additions
  $thisResume
  ->addTechSkill(array(
    'Linux (Debian, RH, Gentoo)',
    'Python',
    'Virtualization',
    'Containerization (Docker)',
    'Puppet',
    'VirtualBox',
    'PHP',
    'AWS Development',
    'Linux KVM',
    'VoIP (Asterisk)',
    'MySQL',
    'T.I. BeagleBone Black',
    'jQuery',
    'Ceph',
    'Managed Networking',
    'VCS (Git,SVN,GitLab,GitHub)',
    'IaaS / PaaS',
    'HTML/CSS',
    'Windows Server'
  ));
  
  /***
   * SECTION: Experience
   ***/

  $thisResume
  ->addExperience((new Experience(
    'Telkonet',
    'Applications Development Team Leader',
    'Apr 2015'))
    ->setFileContent('job.telkonet.leadappsdev.html'))
  ->addExperience((new Experience(
    'Telkonet',
    'Lead System Administrator',
    'Mar 2014',
    'Apr 2015'))
    ->setFileContent('job.telkonet.leadsysadmin.html'))
  ->addExperience((new Experience(
    'Telkonet',
    'System Administrator II',
    'Feb 2012',
    'Mar 2014'))
    ->setFileContent('job.telkonet.sysadmin2.html'))
  ->addExperience((new Experience(
    'Skye Financial Services',
    'IT Manager',
    'Dec 2005'))
    ->setFileContent('job.skye.html'))
  ->addExperience((new Experience(
    'CC&N',
    'Installation Technician',
    'Jul',
    'Oct 2008'
    ))
    ->setFileContent('job.ccn.html'))
  ->addExperience((new Experience(
    'Item Midwest',
    'External IT Consultant',
    'Feb 2008',
    'Nov 2011'))
    ->setFileContent('job.item.html'))
  ->addExperience((new Experience(
    'Timothy J Kitchen & Bath',
    'External IT Consultant',
    'Aug 2007',
    'Jun 2011'
    ))
    ->setFileContent('job.timothyj.html'))
  ->addExperience((new Experience(
    'BHS Underground',
    'Locator & Laborer',
    'Sept 2009',
    'April 2011'))
    ->setFileContent('job.bhs.html'));
    
    require_once('resume_content.html');

