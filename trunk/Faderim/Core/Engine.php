<?php
namespace Faderim\Core;
class Engine implements Singleton
{

    protected static $Instance;
    private $path;
    //private $Engine;
    private $aConnection = Array();
    private $defaultConnection;
    private $Main;
    /**
     *
     * @var \SplClassLoader 
     */
    private $Loader;


    protected function __construct()
    {

    }

    /**
    *@return Faderim\Core\Engine
    */
    static public function getInstance()
    {
        if(!isset(self::$Instance)) {
            self::$Instance = new self();
        }
        return self::$Instance;
    }


    public function engineStart(\SplClassLoader $Loader)
    {
        $this->Loader = $Loader;
        $oEngine = new \Faderim\Config\EngineStart();
        $oEngine->parseEngine();        
        $this->Main = new \Faderim\Framework\Controller\Main();
    }
    
   /**
    *
    * @return \SplClassLoader 
    */
    public function getLoader() {
        return $this->Loader;
    }

    public function addConnection($sCnxName,\Faderim\DataBase\BaseConnection $oCnx,$bDefault = false )
    {
        $this->aConnection[$sCnxName] = $oCnx;
        if($bDefault) {
            $this->setDefaultConnection($oCnx);
        }
    }

    public function setDefaultConnection(\Faderim\DataBase\BaseConnection $oCnx )
    {
        $this->defaultConnection = $oCnx;
    }
    

    public function getConnection($sConName = false)
    {
        if($sConName) {
            return $this->aConnection[$sConName];
        }
        else {
            return $this->getDefaultConnection();
        }
    }


    public function getDefaultConnection()
    {
        return $this->defaultConnection;
    }

}
