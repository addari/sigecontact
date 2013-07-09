<?php

Yii::import('application.models._base.BaseCrugeUser');

class CrugeUser extends BaseCrugeUser{
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }
}