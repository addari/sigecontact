<?php

/**
 * This is the model base class for the table "cruge_authassignment".
 *
 * Columns in table "cruge_authassignment" available as properties of the model:
 
      * @property integer $userid
      * @property string $bizrule
      * @property string $data
      * @property string $itemname
 *
 * There are no model relations.
 */
abstract class BaseCrugeAuthassignment extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'cruge_authassignment';
    }

    public function rules() {
        return array(

        			array('userid, itemname', 'required'),
			array('bizrule, data', 'default', 'setOnEmpty' => true, 'value' => null),
			array('userid', 'numerical', 'integerOnly' => true),
			array('itemname', 'length', 'max' => 64),
			array('bizrule, data', 'safe'),
                        // The following rule is used by search().
                        // Please remove those attributes that should not be searched.
                        array('userid, bizrule, data, itemname', 'safe', 'on'=>'search'),   
        );
    }
    
    public function __toString() {
        return (string) $this->bizrule;
    }

    public function behaviors() {
        return array();
    }

    public function relations() {
        return array(
        );
    }

    public function attributeLabels() {
        return array(
'userid' => Yii::t('label','CrugeAuthassignment.userid'),
'bizrule' => Yii::t('label','CrugeAuthassignment.bizrule'),
'data' => Yii::t('label','CrugeAuthassignment.data'),
'itemname' => Yii::t('label','CrugeAuthassignment.itemname'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('userid', $this->userid);
        $criteria->compare('bizrule', $this->bizrule, true);
        $criteria->compare('data', $this->data, true);
        $criteria->compare('itemname', $this->itemname);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}