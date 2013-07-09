<?php

/**
 * This is the model base class for the table "erp_ma_valores_tipo".
 *
 * Columns in table "erp_ma_valores_tipo" available as properties of the model:
 
      * @property integer $id
      * @property integer $id_categoria
      * @property string $nombre
      * @property string $validacion
 *
 * Relations of table "erp_ma_valores_tipo" available as properties of the model:
 * @property ErpMaContactValor[] $erpMaContactValors
 * @property ErpMaValoresTipoCateg $idCategoria
 */
abstract class BaseErpMaValoresTipo extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'erp_ma_valores_tipo';
    }

    public function rules() {
        return array(

        			array('id_categoria, nombre', 'required'),
			array('validacion', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id_categoria', 'numerical', 'integerOnly' => true),
			array('nombre', 'length', 'max' => 64),
			array('validacion', 'length', 'max' => 256),
                        // The following rule is used by search().
                        // Please remove those attributes that should not be searched.
                        array('id, id_categoria, nombre, validacion', 'safe', 'on'=>'search'),   
        );
    }
    
    public function __toString() {
        return (string) $this->nombre;
    }

    public function behaviors() {
        return array(
        'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
);
    }

    public function relations() {
        return array(
            'erpMaContactValors' => array(self::HAS_MANY, 'ErpMaContactValor', 'id_tipo_valor'),
            'idCategoria' => array(self::BELONGS_TO, 'ErpMaValoresTipoCateg', 'id_categoria'),
        );
    }

    public function attributeLabels() {
        return array(
'id' => Yii::t('label','ErpMaValoresTipo.id'),
'id_categoria' => Yii::t('label','ErpMaValoresTipo.id_categoria'),
'nombre' => Yii::t('label','ErpMaValoresTipo.nombre'),
'validacion' => Yii::t('label','ErpMaValoresTipo.validacion'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('id_categoria', $this->id_categoria);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('validacion', $this->validacion, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}