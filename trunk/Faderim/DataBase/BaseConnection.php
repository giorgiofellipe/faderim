<?php
namespace Faderim\DataBase;


abstract class BaseConnection
{

    private $host;
    private $port;
    private $user;
    private $password;
    private $database;

    public function __construct($sServidor, $iPorta, $sUsuario, $sSenha, $sBanco, $bConecta = false)
    {
        $this->setHost($sServidor);
        $this->setPort($iPorta);
        $this->setUser($sUsuario);
        $this->setPassword($sSenha);
        $this->setDatabase($sBanco);
        if($bConecta) {
            $this->open();
        }
    }

    static public function factory($sType,$sServidor,$iPorta,$sUsuario,$sSenha,$sBanco,$bConecta = false)
    {
        $sClass = __NAMESPACE__.'\\'.$sType.'Connection';
        return new $sClass($sServidor,$iPorta,$sUsuario,$sSenha,$sBanco,$bConecta);
    }

    abstract public function open();
    abstract public function isOpened();
    abstract public function close();


    protected function afterConnect()
    {

    }

    public function setHost($host)
    {
        $this->host = $host;
    }

    public function setPort($port)
    {
        $this->port = $port;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function setPassword($pass)
    {
        $this->password = $pass;
    }

    public function setDatabase($database)
    {
        $this->database = $database;
    }

    public function getHost()
    {
        return $this->host;
    }

    public function getPort()
    {
        return $this->port;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getDatabase()
    {
        return $this->database;
    }

    public function __destruct()
    {
        $this->close();
    }
}
