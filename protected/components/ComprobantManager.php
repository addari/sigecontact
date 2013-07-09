<?php  
yii::import('application.extensions.TabularInputManager');  
class StudentManager extends TabularInputManager {          
    protected $class='Student';          
    public function getItems() {                  
        if (is_array($this->_items))
            return $this->_items;
        
        else{
            return array(
                'n0' => new Student,
            );
        }
    }

    public function deleteOldItems($model, $itemsPk) {
        $criteria = new CDbCriteria;
        $criteria->addNotInCondition('id', $itemsPk);
        //Student has a attribute classroom: indicates which classroom s/he is in.
        $criteria->addCondition("classroom={$model->primaryKey}");

        Student::model()->deleteAll($criteria);
    }

    public static function load($model) {
        $return = new StudentManager;
        foreach($model->students as $item)
            $return->_items[$item->primaryKey]=$item;
        return $return;
    }

    public function setUnsafeAttribute($item, $model) {
        $item->classroom=$model->primaryKey;
    }
}

?>