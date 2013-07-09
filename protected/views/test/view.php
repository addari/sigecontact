<?php
/** @var TestController $this */
/** @var Test $model */
$this->breadcrumbs=array(
	'Tests'=>array('index'),
	$model->id,
);

$this->menu=array(
    //array('label' => Yii::t('AweCrud.app', 'List') . ' ' . Test::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . Test::label(), 'icon' => 'plus', 'url' => array('create')),
	array('label' => Yii::t('AweCrud.app', 'Update'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t('AweCrud.app', 'Delete'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => Yii::t('AweCrud.app', 'Are you sure you want to delete this item?'))),
    array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <legend><?php #echo Yii::t('AweCrud.app', 'View') . ' ' . Test::label(); ?> <?php #echo CHtml::encode($model) ?></legend>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data' => $model,
	'attributes' => array(
        'id',
        'nombre',
        array(
                'name'=>'email',
                'type'=>'email'
            ),
        array(
                'name'=>'image',
                'type'=>'image'
            ),
        array(
                'name'=>'url',
                'type'=>'url'
            ),
        array(
                'name'=>'descripcion',
                'type'=>'ntext'
            ),
	),
)); ?>
</fieldset>