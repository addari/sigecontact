<?php

/**
 * This is the model base class for the table "cruge_field".
 *
 * Columns in table "cruge_field" available as properties of the model:
 
      * @property integer $idfield
      * @property string $fieldname
      * @property string $longname
      * @property integer $position
      * @property integer $required
      * @property integer $fieldtype
      * @property integer $fieldsize
      * @property integer $maxlength
      * @property integer $showinreports
      * @property string $useregexp
      * @property string $useregexpmsg
      * @property string $predetvalue
 *
 * Relations of table "cruge_field" available as properties of the model:
 * @property CrugeFieldvalue[] $crugeFieldvalues
 */
abstract class BaseCrugeField extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'cruge_field';
    }

    public function rules() {
        return array(

        			array('fieldname', 'required'),
			array('longname, position, required, fieldtype, fieldsize, maxlength, showinreports, useregexp, useregexpmsg, predetvalue', 'default', 'setOnEmpty' => true, 'value' => null),
			array('position, required, fieldtype, fieldsize, maxlength, showinreports', 'numerical', 'integerOnly' => true),
			array('fieldname', 'length', 'max' => 20),
			array('longname', 'length', 'max' => 50),
			array('useregexp, useregexpmsg', 'length', 'max' => 512),
			array('predetvalue', 'safe'),
                        // The following rule is used by search().
                        // Please remove those attributes that should not be searched.
                        array('idfield, fieldname, longname, position, required, fieldtype, fieldsize, maxlength, showinreports, useregexp, useregexpmsg, predetvalue', 'safe', 'on'=>'search'),   
        );
    }
    
    public function __toString() {
        return (string) $this->fieldname;
    }

    public function behaviors() {
        return array(
        'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
);
    }

    public function relations() {
        return array(
            'crugeFieldvalues' => array(self::HAS_MANY, 'CrugeFieldvalue', 'idfield'),
        );
    }

    public function attributeLabels() {
        return array(
'idfield' => Yii::t('label','CrugeField.idfield'),
'fieldname' => Yii::t('label','CrugeField.fieldname'),
'longname' => Yii::t('label','CrugeField.longname'),
'position' => Yii::t('label','CrugeField.position'),
'required' => Yii::t('label','CrugeField.required'),
'fieldtype' => Yii::t('label','CrugeField.fieldtype'),
'fieldsize' => Yii::t('label','CrugeField.fieldsize'),
'maxlength' => Yii::t('label','CrugeField.maxlength'),
'showinreports' => Yii::t('label','CrugeField.showinreports'),
'useregexp' => Yii::t('label','CrugeField.useregexp'),
'useregexpmsg' => Yii::t('label','CrugeField.useregexpmsg'),
'predetvalue' => Yii::t('label','CrugeField.predetvalue'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('idfield', $this->idfield);
        $criteria->compare('fieldname', $this->fieldname, true);
        $criteria->compare('longname', $this->longname, true);
        $criteria->compare('position', $this->position);
        $criteria->compare('required', $this->required);
        $criteria->compare('fieldtype', $this->fieldtype);
        $criteria->compare('fieldsize', $this->fieldsize);
        $criteria->compare('maxlength', $this->maxlength);
        $criteria->compare('showinreports', $this->showinreports);
        $criteria->compare('useregexp', $this->useregexp, true);
        $criteria->compare('useregexpmsg', $this->useregexpmsg, true);
        $criteria->compare('predetvalue', $this->predetvalue, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}