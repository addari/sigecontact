<?php

/**
 * This is the model base class for the table "cruge_session".
 *
 * Columns in table "cruge_session" available as properties of the model:
 
      * @property integer $idsession
      * @property integer $iduser
      * @property string $created
      * @property string $expire
      * @property integer $status
      * @property string $ipaddress
      * @property integer $usagecount
      * @property string $lastusage
      * @property string $logoutdate
      * @property string $ipaddressout
 *
 * There are no model relations.
 */
abstract class BaseCrugeSession extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'cruge_session';
    }

    public function rules() {
        return array(

        			array('iduser', 'required'),
			array('created, expire, status, ipaddress, usagecount, lastusage, logoutdate, ipaddressout', 'default', 'setOnEmpty' => true, 'value' => null),
			array('iduser, status, usagecount', 'numerical', 'integerOnly' => true),
			array('created, expire, lastusage, logoutdate', 'length', 'max' => 30),
			array('ipaddress, ipaddressout', 'length', 'max' => 45),
                        // The following rule is used by search().
                        // Please remove those attributes that should not be searched.
                        array('idsession, iduser, created, expire, status, ipaddress, usagecount, lastusage, logoutdate, ipaddressout', 'safe', 'on'=>'search'),   
        );
    }
    
    public function __toString() {
        return (string) $this->created;
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
'idsession' => Yii::t('label','CrugeSession.idsession'),
'iduser' => Yii::t('label','CrugeSession.iduser'),
'created' => Yii::t('label','CrugeSession.created'),
'expire' => Yii::t('label','CrugeSession.expire'),
'status' => Yii::t('label','CrugeSession.status'),
'ipaddress' => Yii::t('label','CrugeSession.ipaddress'),
'usagecount' => Yii::t('label','CrugeSession.usagecount'),
'lastusage' => Yii::t('label','CrugeSession.lastusage'),
'logoutdate' => Yii::t('label','CrugeSession.logoutdate'),
'ipaddressout' => Yii::t('label','CrugeSession.ipaddressout'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('idsession', $this->idsession);
        $criteria->compare('iduser', $this->iduser);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('expire', $this->expire, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('ipaddress', $this->ipaddress, true);
        $criteria->compare('usagecount', $this->usagecount);
        $criteria->compare('lastusage', $this->lastusage, true);
        $criteria->compare('logoutdate', $this->logoutdate, true);
        $criteria->compare('ipaddressout', $this->ipaddressout, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}