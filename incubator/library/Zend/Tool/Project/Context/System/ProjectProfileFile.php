<?php

require_once 'Zend/Tool/Project/Context/Filesystem/File.php';
require_once 'Zend/Tool/Project/Context/System/ISystem.php';
require_once 'Zend/Tool/Project/Context/System/INotOverwritable.php';
require_once 'Zend/Tool/Project/Profile/FileParser/Xml.php';

class Zend_Tool_Project_Context_System_ProjectProfileFile 
    extends Zend_Tool_Project_Context_Filesystem_File
    implements Zend_Tool_Project_Context_System_ISystem,
               Zend_Tool_Project_Context_System_INotOverwritable
{

    protected $_filesystemName = '.zfproject.xml';
    
    protected $_profile = null;
    
    public function getName()
    {
        return 'ProjectProfileFile';
    }
    
    public function setProfile($profile)
    {
        $this->_profile = $profile;
    }
    
    public function getContents()
    {
        
        //$isTraverseEnabled = Zend_Tool_Project_Profile::isTraverseEnabled();
        //Zend_Tool_Project_Profile::setTraverseEnabled(true);
        
        $parser = new Zend_Tool_Project_Profile_FileParser_Xml();
        $profile = $this->_resource->getProfile();
        $xml = $parser->serialize($profile);
        
        //Zend_Tool_Project_Profile::setTraverseEnabled($isTraverseEnabled);
        return $xml;
    }
    
}
