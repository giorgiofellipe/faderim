<?php
class SplClassLoader
{
    private $_fileExtension = '.php';
    private $_namespace;
    private $_includePath;
    private $_namespaceSeparator = '\\';

    public function __construct($ns = null,$includePath = null)
    {
        $this->_namespace = $ns;
        $this->_includePath = $includePath;
    }
    public function register()
    {
        spl_autoload_register(Array($this,'loadClass'));
    }

    public function unregister()
    {
        spl_autoload_unregister(Array($this,'loadClass'));
    }

    public function loadClass($className)
    {
          require ($this->fileName($className));
    }
    
    public function classExists($className) {
        return file_exists($this->fileName($className));
    }
    
    public function fileName($className) {
        if (null === $this->_namespace || $this->_namespace.$this->_namespaceSeparator===substr($className,0,strlen($this->_namespace.$this->_namespaceSeparator))) {
            $fileName = '';
            $namespace = '';
            if (false !== ($lastNsPos = strripos($className,$this->_namespaceSeparator))) {
                $namespace = substr($className,0,$lastNsPos);
                $className = substr($className, $lastNsPos + 1);
                $fileName = str_replace($this->_namespaceSeparator, DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
            }
            $fileName .= str_replace('_',DIRECTORY_SEPARATOR,$className). $this->_fileExtension;
            return (null !== $this->_includePath ? $this->_includePath.DIRECTORY_SEPARATOR : '') . $fileName;
        }        
    }

}


