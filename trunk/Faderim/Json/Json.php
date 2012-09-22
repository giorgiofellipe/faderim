<?php

namespace Faderim\Json;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Json
 *
 * @author Ricardo
 */
class Json {

    static public function encode($xValue) {
        if (is_scalar($xValue) or is_null($xValue)) {
            return json_encode($xValue);
        } else if (is_array($xValue)) {
            $bIsNumeric = array_key_exists(0, $xValue) || count($xValue) == 0;
            $sRet = $bIsNumeric ? '[' : '{';
            $aNewJs = Array();
            foreach ($xValue as $sPropKey => $xPropValue) {
                if ($bIsNumeric) {
                    $aNewJs[] = self::encode($xPropValue);
                } else {
                    $aNewJs[] = json_encode($sPropKey) . ':' . self::encode($xPropValue);
                }
            }
            $sRet .= implode(',', $aNewJs);
            $sRet.= $bIsNumeric ? ']' : '}';
            return $sRet;
        } else if (is_object($xValue)) {
            if ($xValue instanceof JsonSerializable) {
                $sValue = $xValue->getJsonFormat();
                if (is_string($sValue)) {
                    return $sValue;
                } else {
                    return self::encode($sValue);
                }
            } else {
                return 'lol';
            }
        }
    }

    //put your code here
}

