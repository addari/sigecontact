<?php

/**
 * This is the model base class for the table "cruge_user".
 *
 * Columns in table "cruge_user" available as properties of the model:
 
      * @property integer $iduser
      * @property string $regdate
      * @property string $actdate
      * @property string $logondate
      * @property string $username
      * @property string $email
      * @property string $password
      * @property string $authkey
      * @property integer $state
      * @property integer $totalsessioncounter
      * @property integer $currentsessioncounter
 *
 * Relations of table "cruge_user" available as properties of the model:
 * @property CrugeAuthitem[] $crugeAuthitems
 * @property CrugeFieldvalue[] $crugeFieldvalues
 */
abstract class BaseCrugeUser extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'cruge_user';
    }

    public function rules() {
        return array(

        			array('regdate, actdate, logondate, username, email, password, authkey, state, totalsessioncounter, currentsessioncounter', 'default', 'setOnEmpty' => true, 'value' => null),
			array('state, totalsessioncounter, currentsessioncounter', 'numerical', 'integerOnly' => true),
			array('email', 'email'),
			array('regdate, actdate, logondate', 'length', 'max' => 30),
			array('username, password', 'length', 'max' => 64),
			array('email', 'length', 'max' => 45),
			array('authkey', 'length', 'max' => 100),
                        // The following rule is used by search().
                        // Please remove those attributes that should not be searched.
                        array('iduser, regdate, actdate, logondate, username, email, password, authkey, state, totalsessioncounter, currentsessioncounter', 'safe', 'on'=>'search'),   
        );
    }
    
    public function __toString() {
        return (string) $this->regdate;
    }

    public function behaviors() {
        return array(
        'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
);
    }

    public function relations() {
        return array(
            'crugeAuthitems' => array(self::MANY_MANY, 'CrugeAuthitem', 'cruge_authassignment(userid, itemname)'),
            'crugeFieldvalues' => array(self::HAS_MANY, 'CrugeFieldvalue', 'iduser'),
        );
    }

    public function attributeLabels() {
        return array(
'iduser' => Yii::t('label','CrugeUser.iduser'),
'regdate' => Yii::t('label','CrugeUser.regdate'),
'actdate' => Yii::t('label','CrugeUser.actdate'),
'logondate' => Yii::t('label','CrugeUser.logondate'),
'username' => Yii::t('label','CrugeUser.username'),
'email' => Yii::t('label','CrugeUser.email'),
'password' => Yii::t('label','CrugeUser.password'),
'authkey' => Yii::t('label','CrugeUser.authkey'),
'state' => Yii::t('label','CrugeUser.state'),
'totalsessioncounter' => Yii::t('label','CrugeUser.totalsessioncounter'),
'currentsessioncounter' => Yii::t('label','CrugeUser.currentsessioncounter'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('iduser', $this->iduser);
        $criteria->compare('regdate', $this->regdate, true);
        $criteria->compare('actdate', $this->actdate, true);
        $criteria->compare('logondate', $this->logondate, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('authkey', $this->authkey, true);
        $criteria->compare('state', $this->state);
        $criteria->compare('totalsessioncounter', $this->totalsessioncounter);
        $criteria->compare('currentsessioncounter', $this->currentsessioncounter);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}