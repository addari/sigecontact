<?php

/**
 * This is the model base class for the table "sourcemessage".
 *
 * Columns in table "sourcemessage" available as properties of the model:
 
      * @property integer $id
      * @property string $category
      * @property string $message
 *
 * Relations of table "sourcemessage" available as properties of the model:
 * @property Message[] $messages
 */
abstract class BaseSourcemessage extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'sourcemessage';
    }

    public function rules() {
        return array(

        			array('category, message', 'default', 'setOnEmpty' => true, 'value' => null),
			array('category', 'length', 'max' => 32),
			array('message', 'safe'),
                        // The following rule is used by search().
                        // Please remove those attributes that should not be searched.
                        array('id, category, message', 'safe', 'on'=>'search'),   
        );
    }
    
    public function __toString() {
        return (string) $this->category;
    }

    public function behaviors() {
        return array(
        'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
);
    }

    public function relations() {
        return array(
            'messages' => array(self::HAS_MANY, 'Message', 'id'),
        );
    }

    public function attributeLabels() {
        return array(
'id' => Yii::t('label','Sourcemessage.id'),
'category' => Yii::t('label','Sourcemessage.category'),
'message' => Yii::t('label','Sourcemessage.message'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('category', $this->category, true);
        $criteria->compare('message', $this->message, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}