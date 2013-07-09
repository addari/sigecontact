<?php

Yii::import('application.models._base.BaseErpMaContactValor');

class ErpMaContactValor extends BaseErpMaContactValor{
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }
    

    public function getMultiModelForm()
    {
    //Can be a config file that returns the configuration too
    // return 'pathtoformconfig.formconfig';

    return array(
        'elements'=>array(
            'id_tipo_valor'=>array(
                'type'=>'dropdownlist',
                'items'=>CHtml::encodeArray(CHtml::listData(ErpMaValoresTipo::model()->findAll(), 'id', 'categoriaTipo')),
                ),
            'valor'=>array(
                'type'=>'text',
                'maxlength'=>40,
                ),
            )
        );
    }
}