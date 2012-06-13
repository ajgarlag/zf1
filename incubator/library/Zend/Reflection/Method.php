<?php

require_once 'Zend/Reflection/Parameter.php';

class Zend_Reflection_Method extends ReflectionMethod
{

    /**
     * Enter description here...
     *
     * @throws Zend_Reflection_Exception
     * @return Zend_Reflection_Docblock
     */
    public function getDocblock()
    {
        if ($this->getDocComment() != '') {
            return new Zend_Reflection_Docblock($this);
        }
        
        throw new Zend_Reflection_Exception($this->getName() . ' does not have a Docblock.');
        
    }
    
    /**
     * Enter description here...
     *
     * @param bool $includeDocComment
     * @return int
     */
    public function getStartLine($includeDocComment = false)
    {
        if ($includeDocComment) {
            if ($this->getDocComment() != '') {
                return $this->getDocblock()->getStartLine();
            }
        }
        
        return parent::getStartLine();
    }
    
    /**
     * Enter description here...
     *
     * @return Zend_Reflection_Class
     */
    public function getDeclaringClass()
    {
        $phpReflection = parent::getDeclaringClass();
        $zendReflection = new Zend_Reflection_Class($phpReflection->getName());
        unset($phpReflection);
        return $zendReflection;
    }
    
    /**
     * Enter description here...
     *
     * @return Zend_Reflection_Parameter
     */
    public function getParameters()
    {
        $phpReflections = parent::getParameters();
        $zendReflections = array();
        while ($phpReflections && ($phpReflection = array_shift($phpReflections))) {
            $zendReflections[] = new Zend_Reflection_Parameter(array($this->getDeclaringClass()->getName(), $this->getName()), $phpReflection->getName());
            unset($phpReflection);
        }
        unset($phpReflections);
        return $zendReflections;
    }
    
    /**
     * Enter description here...
     *
     * @param bool $includeDocblock
     * @return string
     */
    public function getContents($includeDocblock = true)
    {
        $fileContents = file($this->getFileName());
        $startNum = $this->getStartLine($includeDocblock);
        $endNum = ($this->getEndLine() - $this->getStartLine());
        
        return implode("\n", array_splice($fileContents, $startNum, $endNum, true));
    }
    
    /**
     * Enter description here...
     *
     * @return string
     */
    public function getBody()
    {
        $lines = array_slice(file($this->getDeclaringClass()->getFileName()), $this->getStartLine(), ($this->getEndLine() - $this->getStartLine()), true);
        
        $firstLine = array_shift($lines);

        if (trim($firstLine) !== '{') {
            array_unshift($lines, $firstLine);
        }
        
        $lastLine = array_pop($lines);
        
        if (trim($lastLine) !== '}') {
            array_push($lines, $lastLine);
        }

        // just in case we had code on the braket lines
        return rtrim(ltrim(implode("\n", $lines), '{'), '}');
    }
    
}

