<?php

/**
 * This is the model base class for the table "message".
 *
 * Columns in table "message" available as properties of the model:
 
      * @property integer $id
      * @property string $LANGUAGE
      * @property string $translation
 *
 * Relations of table "message" available as properties of the model:
 * @property Sourcemessage $id0
 */
abstract class BaseMessage extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'message';
    }

    public function rules() {
        return array(

        			array('id, LANGUAGE, translation', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id', 'numerical', 'integerOnly' => true),
			array('LANGUAGE', 'length', 'max' => 16),
			array('translation', 'safe'),
                        // The following rule is used by search().
                        // Please remove those attributes that should not be searched.
                        array('id, LANGUAGE, translation', 'safe', 'on'=>'search'),   
        );
    }
    
    public function __toString() {
        return (string) $this->translation;
    }

    public function behaviors() {
        return array(
        'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
);
    }

    public function relations() {
        return array(
            'id0' => array(self::BELONGS_TO, 'Sourcemessage', 'id'),
        );
    }

    public function attributeLabels() {
        return array(
'id' => Yii::t('label','Message.id'),
'LANGUAGE' => Yii::t('label','Message.LANGUAGE'),
'translation' => Yii::t('label','Message.translation'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('LANGUAGE', $this->LANGUAGE, true);
        $criteria->compare('translation', $this->translation, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}