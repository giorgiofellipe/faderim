<?php
namespace Faderim\DataBase;
class RelationalStorage extends Storage
{
    public function insert()
    {
        $oQuery = $this->getConnection()->getQuery();
        //$oQuery->setSql('delete from tbcar');
        $aDados = Array();

        foreach($this->getModelInfo()->getData() as /** @var \Faderim\DataBase\ModelDataInfo */$Model) {
            $sCol = $Model->getColName();
            $xProp = $this->getModel()->beanGetProperty($Model->getModelName());
            $aDados[$sCol] = $xProp;
        }
        $oQuery->mountInsert($this->getModelInfo()->getTable(),$aDados);
        return $oQuery->execute();
    }

    public function save()
    {

    }

    public function delete()
    {

    }
}