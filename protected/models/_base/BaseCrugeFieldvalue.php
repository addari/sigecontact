<?php

/**
 * This is the model base class for the table "cruge_fieldvalue".
 *
 * Columns in table "cruge_fieldvalue" available as properties of the model:
 
      * @property integer $idfieldvalue
      * @property integer $iduser
      * @property integer $idfield
      * @property string $value
 *
 * Relations of table "cruge_fieldvalue" available as properties of the model:
 * @property CrugeUser $iduser0
 * @property CrugeField $idfield0
 */
abstract class BaseCrugeFieldvalue extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'cruge_fieldvalue';
    }

    public function rules() {
        return array(

        			array('iduser, idfield', 'required'),
			array('value', 'default', 'setOnEmpty' => true, 'value' => null),
			array('iduser, idfield', 'numerical', 'integerOnly' => true),
			array('value', 'safe'),
                        // The following rule is used by search().
                        // Please remove those attributes that should not be searched.
                        array('idfieldvalue, iduser, idfield, value', 'safe', 'on'=>'search'),   
        );
    }
    
    public function __toString() {
        return (string) $this->value;
    }

    public function behaviors() {
        return array(
        'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
);
    }

    public function relations() {
        return array(
            'iduser0' => array(self::BELONGS_TO, 'CrugeUser', 'iduser'),
            'idfield0' => array(self::BELONGS_TO, 'CrugeField', 'idfield'),
        );
    }

    public function attributeLabels() {
        return array(
'idfieldvalue' => Yii::t('label','CrugeFieldvalue.idfieldvalue'),
'iduser' => Yii::t('label','CrugeFieldvalue.iduser'),
'idfield' => Yii::t('label','CrugeFieldvalue.idfield'),
'value' => Yii::t('label','CrugeFieldvalue.value'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('idfieldvalue', $this->idfieldvalue);
        $criteria->compare('iduser', $this->iduser);
        $criteria->compare('idfield', $this->idfield);
        $criteria->compare('value', $this->value, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}