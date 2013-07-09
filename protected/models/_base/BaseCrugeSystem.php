<?php

/**
 * This is the model base class for the table "cruge_system".
 *
 * Columns in table "cruge_system" available as properties of the model:
 
      * @property integer $idsystem
      * @property string $name
      * @property string $largename
      * @property integer $sessionmaxdurationmins
      * @property integer $sessionmaxsameipconnections
      * @property integer $sessionreusesessions
      * @property integer $sessionmaxsessionsperday
      * @property integer $sessionmaxsessionsperuser
      * @property integer $systemnonewsessions
      * @property integer $systemdown
      * @property integer $registerusingcaptcha
      * @property integer $registerusingterms
      * @property string $terms
      * @property integer $registerusingactivation
      * @property string $defaultroleforregistration
      * @property string $registerusingtermslabel
      * @property integer $registrationonlogin
 *
 * There are no model relations.
 */
abstract class BaseCrugeSystem extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'cruge_system';
    }

    public function rules() {
        return array(

        			array('name, largename, sessionmaxdurationmins, sessionmaxsameipconnections, sessionreusesessions, sessionmaxsessionsperday, sessionmaxsessionsperuser, systemnonewsessions, systemdown, registerusingcaptcha, registerusingterms, terms, registerusingactivation, defaultroleforregistration, registerusingtermslabel, registrationonlogin', 'default', 'setOnEmpty' => true, 'value' => null),
			array('sessionmaxdurationmins, sessionmaxsameipconnections, sessionreusesessions, sessionmaxsessionsperday, sessionmaxsessionsperuser, systemnonewsessions, systemdown, registerusingcaptcha, registerusingterms, registerusingactivation, registrationonlogin', 'numerical', 'integerOnly' => true),
			array('name, largename', 'length', 'max' => 45),
			array('defaultroleforregistration', 'length', 'max' => 64),
			array('registerusingtermslabel', 'length', 'max' => 100),
			array('terms', 'safe'),
                        // The following rule is used by search().
                        // Please remove those attributes that should not be searched.
                        array('idsystem, name, largename, sessionmaxdurationmins, sessionmaxsameipconnections, sessionreusesessions, sessionmaxsessionsperday, sessionmaxsessionsperuser, systemnonewsessions, systemdown, registerusingcaptcha, registerusingterms, terms, registerusingactivation, defaultroleforregistration, registerusingtermslabel, registrationonlogin', 'safe', 'on'=>'search'),   
        );
    }
    
    public function __toString() {
        return (string) $this->name;
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
'idsystem' => Yii::t('label','CrugeSystem.idsystem'),
'name' => Yii::t('label','CrugeSystem.name'),
'largename' => Yii::t('label','CrugeSystem.largename'),
'sessionmaxdurationmins' => Yii::t('label','CrugeSystem.sessionmaxdurationmins'),
'sessionmaxsameipconnections' => Yii::t('label','CrugeSystem.sessionmaxsameipconnections'),
'sessionreusesessions' => Yii::t('label','CrugeSystem.sessionreusesessions'),
'sessionmaxsessionsperday' => Yii::t('label','CrugeSystem.sessionmaxsessionsperday'),
'sessionmaxsessionsperuser' => Yii::t('label','CrugeSystem.sessionmaxsessionsperuser'),
'systemnonewsessions' => Yii::t('label','CrugeSystem.systemnonewsessions'),
'systemdown' => Yii::t('label','CrugeSystem.systemdown'),
'registerusingcaptcha' => Yii::t('label','CrugeSystem.registerusingcaptcha'),
'registerusingterms' => Yii::t('label','CrugeSystem.registerusingterms'),
'terms' => Yii::t('label','CrugeSystem.terms'),
'registerusingactivation' => Yii::t('label','CrugeSystem.registerusingactivation'),
'defaultroleforregistration' => Yii::t('label','CrugeSystem.defaultroleforregistration'),
'registerusingtermslabel' => Yii::t('label','CrugeSystem.registerusingtermslabel'),
'registrationonlogin' => Yii::t('label','CrugeSystem.registrationonlogin'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('idsystem', $this->idsystem);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('largename', $this->largename, true);
        $criteria->compare('sessionmaxdurationmins', $this->sessionmaxdurationmins);
        $criteria->compare('sessionmaxsameipconnections', $this->sessionmaxsameipconnections);
        $criteria->compare('sessionreusesessions', $this->sessionreusesessions);
        $criteria->compare('sessionmaxsessionsperday', $this->sessionmaxsessionsperday);
        $criteria->compare('sessionmaxsessionsperuser', $this->sessionmaxsessionsperuser);
        $criteria->compare('systemnonewsessions', $this->systemnonewsessions);
        $criteria->compare('systemdown', $this->systemdown);
        $criteria->compare('registerusingcaptcha', $this->registerusingcaptcha);
        $criteria->compare('registerusingterms', $this->registerusingterms);
        $criteria->compare('terms', $this->terms, true);
        $criteria->compare('registerusingactivation', $this->registerusingactivation);
        $criteria->compare('defaultroleforregistration', $this->defaultroleforregistration, true);
        $criteria->compare('registerusingtermslabel', $this->registerusingtermslabel, true);
        $criteria->compare('registrationonlogin', $this->registrationonlogin);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}