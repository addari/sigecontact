<?php

/**
 * This is the model base class for the table "test".
 *
 * Columns in table "test" available as properties of the model:
 
      * @property integer $id
      * @property string $nombre
      * @property string $email
      * @property string $image
      * @property string $url
      * @property string $descripcion
 *
 * There are no model relations.
 */
abstract class BaseTest extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'test';
    }

    public function rules() {
        return array(

        			array('nombre', 'required'),
			array('email, image, url, descripcion', 'default', 'setOnEmpty' => true, 'value' => null),
			array('email', 'email'),
			array('url', 'url', 'defaultScheme' => 'http'),
			array('nombre', 'length', 'max' => 64),
			array('email', 'length', 'max' => 32),
			array('image', 'length', 'max' => 256),
			array('url', 'length', 'max' => 128),
			array('descripcion', 'safe'),
                        // The following rule is used by search().
                        // Please remove those attributes that should not be searched.
                        array('id, nombre, email, image, url, descripcion', 'safe', 'on'=>'search'),   
        );
    }
    
    public function __toString() {
        return (string) $this->nombre;
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
'id' => Yii::t('label','Test.id'),
'nombre' => Yii::t('label','Test.nombre'),
'email' => Yii::t('label','Test.email'),
'image' => Yii::t('label','Test.image'),
'url' => Yii::t('label','Test.url'),
'descripcion' => Yii::t('label','Test.descripcion'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('descripcion', $this->descripcion, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}