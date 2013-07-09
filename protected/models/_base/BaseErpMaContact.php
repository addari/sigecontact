<?php

/**
 * This is the model base class for the table "erp_ma_contact".
 *
 * Columns in table "erp_ma_contact" available as properties of the model:
 
      * @property integer $id
      * @property string $nombre
 *
 * Relations of table "erp_ma_contact" available as properties of the model:
 * @property ErpMaContactValor[] $erpMaContactValors
 */
abstract class BaseErpMaContact extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'erp_ma_contact';
    }

    public function rules() {
        return array(

        			array('nombre', 'required'),
			array('nombre', 'length', 'max' => 64),
                        // The following rule is used by search().
                        // Please remove those attributes that should not be searched.
                        array('id, nombre', 'safe', 'on'=>'search'),   
        );
    }
    
    public function __toString() {
        return (string) $this->nombre;
    }

    public function behaviors() {
        return array(
        'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
);
    }

    public function relations() {
        return array(
            'erpMaContactValors' => array(self::HAS_MANY, 'ErpMaContactValor', 'id_contact'),
        );
    }

    public function attributeLabels() {
        return array(
'id' => Yii::t('label','ErpMaContact.id'),
'nombre' => Yii::t('label','ErpMaContact.nombre'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('nombre', $this->nombre, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}