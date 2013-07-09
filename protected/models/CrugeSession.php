<?php

Yii::import('application.models._base.BaseCrugeSession');

class CrugeSession extends BaseCrugeSession{
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }
}