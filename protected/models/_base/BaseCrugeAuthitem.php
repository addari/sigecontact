<?php

/**
 * This is the model base class for the table "cruge_authitem".
 *
 * Columns in table "cruge_authitem" available as properties of the model:
 
      * @property string $name
      * @property integer $type
      * @property string $description
      * @property string $bizrule
      * @property string $data
 *
 * Relations of table "cruge_authitem" available as properties of the model:
 * @property CrugeUser[] $crugeUsers
 * @property CrugeAuthitemchild[] $crugeAuthitemchildren
 * @property CrugeAuthitemchild[] $crugeAuthitemchildren1
 */
abstract class BaseCrugeAuthitem extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'cruge_authitem';
    }

    public function rules() {
        return array(

        			array('name, type', 'required'),
			array('description, bizrule, data', 'default', 'setOnEmpty' => true, 'value' => null),
			array('type', 'numerical', 'integerOnly' => true),
			array('name', 'length', 'max' => 64),
			array('description, bizrule, data', 'safe'),
                        // The following rule is used by search().
                        // Please remove those attributes that should not be searched.
                        array('name, type, description, bizrule, data', 'safe', 'on'=>'search'),   
        );
    }
    
    public function __toString() {
        return (string) $this->description;
    }

    public function behaviors() {
        return array(
        'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
);
    }

    public function relations() {
        return array(
            'crugeUsers' => array(self::MANY_MANY, 'CrugeUser', 'cruge_authassignment(itemname, userid)'),
            'crugeAuthitemchildren' => array(self::HAS_MANY, 'CrugeAuthitemchild', 'parent'),
            'crugeAuthitemchildren1' => array(self::HAS_MANY, 'CrugeAuthitemchild', 'child'),
        );
    }

    public function attributeLabels() {
        return array(
'name' => Yii::t('label','CrugeAuthitem.name'),
'type' => Yii::t('label','CrugeAuthitem.type'),
'description' => Yii::t('label','CrugeAuthitem.description'),
'bizrule' => Yii::t('label','CrugeAuthitem.bizrule'),
'data' => Yii::t('label','CrugeAuthitem.data'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('name', $this->name, true);
        $criteria->compare('type', $this->type);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('bizrule', $this->bizrule, true);
        $criteria->compare('data', $this->data, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}