<?php

/**
 * This is the model base class for the table "cruge_authitemchild".
 *
 * Columns in table "cruge_authitemchild" available as properties of the model:
 
      * @property string $parent
      * @property string $child
 *
 * Relations of table "cruge_authitemchild" available as properties of the model:
 * @property CrugeAuthitem $parent0
 * @property CrugeAuthitem $child0
 */
abstract class BaseCrugeAuthitemchild extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'cruge_authitemchild';
    }

    public function rules() {
        return array(

        			array('parent, child', 'required'),
			array('parent, child', 'length', 'max' => 64),
                        // The following rule is used by search().
                        // Please remove those attributes that should not be searched.
                        array('parent, child', 'safe', 'on'=>'search'),   
        );
    }
    
    public function __toString() {
        return (string) $this->parent;
    }

    public function behaviors() {
        return array(
        'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
);
    }

    public function relations() {
        return array(
            'parent0' => array(self::BELONGS_TO, 'CrugeAuthitem', 'parent'),
            'child0' => array(self::BELONGS_TO, 'CrugeAuthitem', 'child'),
        );
    }

    public function attributeLabels() {
        return array(
'parent' => Yii::t('label','CrugeAuthitemchild.parent'),
'child' => Yii::t('label','CrugeAuthitemchild.child'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('parent', $this->parent);
        $criteria->compare('child', $this->child);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}