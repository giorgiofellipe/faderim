<?php
namespace Faderim\Core;
class Init
{
    const HEART_PATH = 'heart/';
    const SERVER_DIR = 'server/';
    const SYSTEM_DIR = 'system/';
    const CLASS_FILE = '.inc';
    const SMARTY_TEMPLATE = '.tpl';
    const REGEXP_PACKAGE = '/^(\w+)\.([model|view]+)$/';

    static function autoLoadClass($sClassName)
    {
        $sFilePart = self::fromCamelCase($sClassName);
        if(substr($sFilePart,0,7)=='faderim') {
            try {
                include_once(self::HEART_PATH.self::SERVER_DIR.'class_'.$sFilePart.'.inc');
            }
            catch(Exception $e) {
                print_r($e);
                echo 'n incluiu';
            }
        }
    }
    static function getEnderecoFile($sSystem,$sType,$sFileName)
    {
        return self::getFilePath($sSystem,$sType).$sFileName;
    }

    static function getFilePath($sSystem,$sType)
    {
        return self::SYSTEM_DIR.$sSystem.'/'.$sType.'/';
    }

    static function getFileName($sSystem,$sType,$sNome,$sExtension)
    {
        return strtolower($sSystem).'_'.strtolower($sType).'_'.self::fromCamelCase($sNome).$sExtension;
    }

    static function load($sClassName,$sPackage,$args = Array(),$xStatic = false)
    {
        $sTipo     = self::getClassType($sPackage);
        $sSystem   = self::getClassSystem($sPackage);
        $sNovoNome = self::toCamelCase($sTipo).self::toCamelCase($sSystem) .self::toCamelCase($sClassName);
        $bClassExist = false;
        if(class_exists($sNovoNome,false)) {
            $bClassExist = true;
        }
        else {
            $sFileName = self::getEnderecoFile($sSystem,$sTipo,$sNovoNome,self::CLASS_FILE);
            if(file_exists($sFileName)) {
                require_once($sFileName);
                if(class_exists($sNovoNome,false)) {
                    $bClassExist = true;
                }
                else {
                    throw new Exception('Classe '.$sNovoNome.' n�o existe no arquivo '.$sFileName);
                }
            }
            else {
                throw new Exception('N�o foi poss�vel incluir o arquivo '.$sFileName);
            }
        }
        if($bClassExist) {
            if($xStatic===false) {
                $reflexao = new ReflectionClass($sNovoNome);
                if(sizeof($args)==0) {
                    $oInstancia  = $reflexao->newInstance();
                }
                else {
                    if(is_array($args)) {
                        $oInstancia = $reflexao->newInstanceArgs($args);
                    }
                    else {
                        $oInstancia = $reflexao->newInstanceArgs(Array($args));
                    }
                }
                return $oInstancia;
            }
            else {
                return call_user_func_array(Array($sNovoNome,$xStatic),$args);
            }
        }
    }

    static function getClassType($sLine)
    {
        return (preg_match(self::REGEXP_PACKAGE,$sLine,$aMatch)) ? $aMatch[2] : false;
    }


    static function getClassSystem($sLine)
    {
        return (preg_match(self::REGEXP_PACKAGE,$sLine,$aMatch)) ? $aMatch[1] : false;
    }


    static function errorHandler($iErroNumber, $sErro, $sFileName, $iLineNumber)
    {
        $aErros = Array(E_WARNING => 'Perigo',
                        E_NOTICE => 'Noticia',
                        E_USER_ERROR=> 'Erro do Usu�rio',
                        E_USER_WARNING=> 'Perigo do Usu�rio',
                        E_USER_NOTICE=> 'Not�cia do Usu�rio',
                        E_STRICT=> 'Strict',
                        E_RECOVERABLE_ERROR=>'Recoverable Error');
        echo('<b>['.$aErros[$iErroNumber].']</b> '.$sErro.
                            '. <b>Arquivo:</b>'.$sFileName.'. <b>Linha:</b>'.$iLineNumber);
        return null;
    }


    static function main()
    {
        /*
        set_error_handler(Array('FaderimInit','errorHandler'));
        spl_autoload_register(Array('FaderimInit','autoLoadClass'));
        $oFaderim = Faderim::getInstance();
        $oFaderim->setPath(dirname(__FILE__));
        $oFaderim->engineStart();
        */
    }


    static function fromCamelCase($sConvert)
    {
        $sConvert[0] = strtolower($sConvert[0]);
        return strtolower(preg_replace('/([a-z])([A-Z])/e','"$1_".strtolower("$2")',$sConvert));
    }


    static function toCamelCase($sConvert,$bFirstMaiuscula = true)
    {
        $sConvert = preg_replace('/_(\w)/e','strtoupper("$1")',$sConvert);
        return ($bFirstMaiuscula) ? $sConvert = ucfirst($sConvert) : $sConvert;
    }
}