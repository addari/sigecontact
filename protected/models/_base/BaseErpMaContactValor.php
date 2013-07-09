<?php

/**
 * This is the model base class for the table "erp_ma_contact_valor".
 *
 * Columns in table "erp_ma_contact_valor" available as properties of the model:
 
      * @property integer $id
      * @property integer $id_contact
      * @property integer $id_tipo_valor
      * @property string $valor
 *
 * Relations of table "erp_ma_contact_valor" available as properties of the model:
 * @property ErpMaValoresTipo $idTipoValor
 * @property ErpMaContact $idContact
 */
abstract class BaseErpMaContactValor extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'erp_ma_contact_valor';
    }

    public function rules() {
        return array(

                #array('id_contact, id_tipo_valor, valor', 'required'),
                array('id_contact, id_tipo_valor', 'numerical', 'integerOnly' => true),
                array('valor', 'length', 'max' => 256),
                // The following rule is used by search().
                // Please remove those attributes that should not be searched.
                array('id, id_contact, id_tipo_valor, valor', 'safe', 'on'=>'search'),   
        );
    }
    
    public function __toString() {
        return (string) $this->valor;
    }

    public function behaviors() {
        return array(
        'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
);
    }

    public function relations() {
        return array(
            'idTipoValor' => array(self::BELONGS_TO, 'ErpMaValoresTipo', 'id_tipo_valor'),
            'idContact' => array(self::BELONGS_TO, 'ErpMaContact', 'id_contact'),
        );
    }

    public function attributeLabels() {
        return array(
'id' => Yii::t('label','ErpMaContactValor.id'),
'id_contact' => Yii::t('label','ErpMaContactValor.id_contact'),
'id_tipo_valor' => Yii::t('label','ErpMaContactValor.id_tipo_valor'),
'valor' => Yii::t('label','ErpMaContactValor.valor'),
'id_tipo_valor.categoria' => Yii::t('label','ErpMaContactValor.id_tipo_valor.categoria'), //Linea agregada
'id_tipo_valor.nombre' => Yii::t('label','ErpMaContactValor.id_tipo_valor.nombre'), //Linea agregada
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('id_contact', $this->id_contact);
        $criteria->compare('id_tipo_valor', $this->id_tipo_valor);
        $criteria->compare('valor', $this->valor, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}