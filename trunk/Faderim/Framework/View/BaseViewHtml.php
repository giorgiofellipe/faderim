<?php
namespace Faderim\Framework\View;

/**
 * Description of BaseController
 *
 * @author Ricardo
 */
abstract class BaseViewHtml
{
    protected $language = 'pt-br';
    protected $charset  = 'utf-8';
    protected $pageTitle = 'Faderim View';
    
    public function show() {
        $this->createDocType();                        
        echo '<html lang="'.$this->language.'">'.PHP_EOL;
        $this->createHead();
        $this->createBody();
        echo '</html>';               
    }
    
    protected function createHead() {
        echo '<head>'.PHP_EOL;
        $this->createMeta();
        echo '  <title>'.$this->pageTitle.'</title>'.PHP_EOL;
        $this->createCss();
        $this->createScript();        
        echo '</head>'.PHP_EOL;
    }
    
    protected function createCss() {
        foreach($this->getCssFiles() as $sFileName) {
            echo '<link rel="stylesheet" type="text/css" href="'.$sFileName.'.css" />'.PHP_EOL;            
        }   
        $this->createCssInline();
    }
    
    protected function createScript() {
        foreach($this->getJsFiles() as $sFileName) {
            echo '<script type="text/javascript" src="'.$sFileName.'"></script>'.PHP_EOL;
        }   
        
    }
    
    protected function createCssInline() {
     
        
    }
    
    /**
     * @return Array[String]
     */
    protected function getCssFiles() {
        return Array();
    }
    
    /**
     * @return Array[String]
     */    
    protected function getJsFiles() {
           return Array();
    }
    
    protected function createMeta() {
        ?>    
        <meta http-equiv="X-UA-Compatible" content="chrome=1;" />
        <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->charset;?>" />
        <meta charset="<?php echo $this->charset;?>" />
        <?php
    }


    protected function createDocType() {
        ?>
        <!DOCTYPE html!>     
        <?php
    }
    
    protected function createBody() {
        ?>
        <body>
        </body>
        <?php
    }
}