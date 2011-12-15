<?php
namespace Faturamento\View;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of System
 *
 * @author Ricardo
 */
class ClienteForm extends \Faderim\Framework\View\BaseViewForm
{
    
    public function getFormName() {
        return 'clienteForm';
    }
    
    public function createComponents() {
        $this->setTitle('Cadastro de Clientes');
        $this->criaInformacoesBasicas();
        $this->criaInformacoesContato();
        $this->criaInformacoesEndereco();
        return;
        
       
        
     
        
        
  
      
        
        $this->addChilds($oContainer,$FieldEndereco,$FieldContato,
                $InscEstadual,$Tributacao,
                $Contato,new \Faderim\Ext\Field\FormField('number','loll','Numerico',true,50)
                );
        
        
        return;              
    }    
    
    protected function criaInformacoesEndereco() {
        $FieldEndereco = new \Faderim\Ext\Fieldset('field_endereco');  
        $FieldEndereco->setTitle('Endereço');
        
        
        
        $Cidade = new \Faderim\Ext\Field\FormField('text','cidade','Cidade',true,20);
        $Endereco = new \Faderim\Ext\Field\FormField('text','endereco','Endereço',true,40);
        $Endereco->setFlexSize();
        $Bairro = new \Faderim\Ext\Field\FormField('text','bairro','Bairro',true,20);
       
        $Cep = new \Faderim\Ext\Field\FormField('text','cep','Cep',true,8);
        $Cep->setSize(10);
        $Estado = new \Faderim\Ext\Field\FormField('list','estado','Estado',true,2);
        $Estado->getTypeField()->getLocalStore()->addOption('SC','SC');
        $Estado->setSize(4);
        
        
        $FieldEndereco->addChilds($Endereco,$Bairro,$Cidade,$Cep,$Estado);
        $FieldEndereco->setLayout('hbox');
        $this->addChild($FieldEndereco);
    }
    
    protected function criaInformacoesContato() {
        $FieldContato = new \Faderim\Ext\Fieldset('field_contato');  
        $FieldContato->setTitle('Contato');
        $Fone = new \Faderim\Ext\Field\FormField('phone','fone','Telefone',true,14);       
        $Fone->setSize(14);
        $Fax = new \Faderim\Ext\Field\FormField('text','fax','Fax',true,14);
        $Fax->setSize(14);
        $EmailNfe = new \Faderim\Ext\Field\FormField('email','email_nfe','E-mail NFE',true,80);
        $EmailNfe->setFlexSize();
        $Email = new \Faderim\Ext\Field\FormField('email','email','E-mail',true,80);
        $Email->setFlexSize();
       
        $FieldContato->addChilds($Fone,$Fax,$EmailNfe,$Email);
        $FieldContato->setLayout('hbox');
        $this->addChild($FieldContato);
    }
    
    protected function criaInformacoesBasicas() {
        

                
        $FieldBasica = new \Faderim\Ext\Fieldset('field_basica'); 
        $FieldBasica->setTitle('Informações Básicas');
        $Codigo = new \Faderim\Ext\Field\FormField('text','id','Código',true,5);
        $Codigo->setDisabled(true);   
        $Codigo->setSize(2);
        
        $Nome = new \Faderim\Ext\Field\FormField('text','cliente','Nome',true,40);
        $Fantasia = new \Faderim\Ext\Field\FormField('text','fantasia','Fantasia',true,20);
        
        $oContainer1 = new \Faderim\Ext\Container('ctnnome');
        $oContainer1->addChilds($Codigo,$Nome,$Fantasia);
        $oContainer1->setLayout('hbox');
        
        $oContainer2 = new \Faderim\Ext\Container('ctndocs');
        $Cnpj = new \Faderim\Ext\Field\FormField('text','cnpj','CNPJ',true,14);
        $InscEstadual = new \Faderim\Ext\Field\FormField('text','inscr_estadual','Inscrição Estadual',true,16);
        $Tributacao = new \Faderim\Ext\Field\FormField('list','tributacao','Tributação',true,16);
        $Contato = new \Faderim\Ext\Field\FormField('text','contato','Pessoa de Contato',true,20);
        $Contato->setFlexSize();
        $oContainer2->addChilds($Cnpj,$InscEstadual,$Tributacao,$Contato );
        $oContainer2->setLayout('hbox');
        
        
        $FieldBasica->addChilds($oContainer1,$oContainer2);
        //$FieldBasica->setLayout('hbox');
        $Nome->setFlexSize(1);
        $Fantasia->setFlexSize(1);
        $this->addChild($FieldBasica);
        return;
    }
}