<?php

namespace Faderim\Framework\View;

/**
 * Description of Index
 *
 * @author Ricardo
 */
class Index extends BaseViewHtml {

    const EXT_JS_DIR = '../ext-4.0.7-gpl';

    //put your code here

    protected function getCssFiles() {
        return Array(self::EXT_JS_DIR . '/resources/css/ext-all');
    }

    protected function getJsFiles() {
        return Array(self::EXT_JS_DIR . '/bootstrap.js');
    }

    protected function createBody() {
        ?>
        <body>
            <script type="text/javascript">

                var Faderim = {

                    getObjectLoader:function(sPageName,sActionName) {
                        return {'url':'?p='+sPageName+'&a='+sActionName+'&pr=renderView',renderer:'component'};
                    }

                }
                Ext.require(['*']);

                Ext.onReady(function(){/*
                    var PanelLateral = Ext.create("Panel",{"name":"lateral","id":"lateral","region":"west","width":200,"collapsible":true,"split":true,"margins":"0 0 5 5","title":"Menu","layout":"accordion","loader":Ext.create("Ext.ComponentLoader",{"name":"loader_lateral","id":"loader_lateral","autoLoad":true,"url":"?p=index&a=data&pr=getDataMenu","renderer":"component"})});
                    var TabPanel = Ext.create("TabPanel",
                    {
                        name:"tab_menu",
                        id:"tab_menu",
                        region:"center",
                        margins:"0 0 5"
                    });
                    Ext.create("Viewport",
                    {
                        name:"view_principal",
                        id:"view_principal",
                        items:[
                            PanelLateral,
                            TabPanel
                        ],
                        layout:"border"
                    });
        */
                    //var oT = Ext.create("TreePanel",{selModel:selMod,"name":"menu_system_wow","id":"menu_system_3","root":{id:'aaa',"text":"Root","children":[],"leaf":true},"title":"Sample System"});
        <?php
        $oViewPort = new \Faderim\Ext\ViewPort("view_principal");
        $oTab = new \Faderim\Ext\TabPanel('tab_menu');
        $oTab->setRegion('center');
        $oTab->setMargins(0, 0, 5);
//$oTab->getLoader();
//$oTab->addChild(new SystemDefault());
//$oTab->addChild(new SystemDefault('2'));
        $oForm = new \Faderim\Framework\View\SystemForm();
        $oTab->addChild($oForm);
        $oGrid = new \Faderim\Framework\View\SystemGrid();
        $oTab->addChild($oGrid);

        $oCf = new \Faturamento\View\ClienteForm();
        $oTab->addChild($oCf);
//$oTab->setTitle('teste');

        $oLateral = new \Faderim\Ext\Panel('lateral');
        $oLateral->setRegion('west');
        $oLateral->setWidth(200);
        $oLateral->setCollapsible(true);
        $oLateral->setSplit(true);
        $oLateral->setMargins(0, 0, 5, 5);
        $oLateral->setTitle('Menu');
        $oLateral->setLayout('accordion');
        $oLoader = $oLateral->getLoader();
        $oLoader->setAutoLoad(true, '?p=index&a=data&pr=getDataMenu');

        $oViewPort->addChild($oLateral);
        $oViewPort->addChild($oTab);
        $oViewPort->setLayout('border');
        echo $oViewPort->create();
//echo $o->create(); */
        ?>

                //var oT = Ext.create("TreePanel",{selModel:selMod,"name":"menu_system_wow","id":"menu_system_3","root":{id:'aaa',"text":"Root","children":[],"leaf":true},"title":"Sample System"});
                var oTab = Ext.getCmp('tab_menu');
                //oTab.getLoader().load(Faderim.getObjectLoader('system', 'grid'));

            });
            </script>



        </body>
        <?php
    }

}
