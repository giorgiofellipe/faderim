<?php
namespace Faderim\Framework\Controller;

/**
 * Description of Main
 *
 * @author Ricardo
 */
class Main
{
    public function __construct()
    {
        $pageName   = (string) (isset($_GET['p'])) ? $_GET['p'] : 'index';
        $actionName = (string) (isset($_GET['a'])) ? $_GET['a'] : 'default';
        $processName = (string) (isset($_GET['pr'])) ? $_GET['pr'] : null;
        $ActionPage = new \Faderim\Framework\Model\ActionPage();
        $ActionPage->getPage()->setName($pageName);
        $ActionPage->getAction()->setName($actionName);
        //$ActionPage->setProcess($processName);
        if($ActionPage->storage()->get()) {
            $sCtrlName = $ActionPage->getControllerName();
            if(!\Faderim\Core\Engine::getInstance()->getLoader()->classExists($sCtrlName)) {
                $sCtrlName = $ActionPage->getControllerDefaultForAction();
            }
            $oController = new $sCtrlName($ActionPage);
            if($processName) {
                $oController->$processName();
            }
            $oController->render();
        }
        else {
            throw new \Exception('No action Page found!');
        }
    }
}