<?php

Yii::import('application.models._base.BaseErpMaValoresTipo');

class ErpMaValoresTipo extends BaseErpMaValoresTipo{
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }
    
            public function getCategoriaTipo()
    {
        return $this->idCategoria->nombre.' - '.$this->nombre; // Concatena el Nombre de la Categoria con el tipo de valor
    }

            public function getCategoria()
    {
        return $this->idCategoria->nombre; // Muestra el nombre de la Categoria para el tipo de valor
    }
}