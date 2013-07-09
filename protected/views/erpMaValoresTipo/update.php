<?php
$this->breadcrumbs=array(
	Yii::t('title','ErpMaValoresTipos')=>array('index'),
	$model->nombre=>array('view','id'=>$model->id),
	Yii::t('app','Update'),
);

?>

<h1><?php echo Yii::t('app','Update').' '.Yii::t('title','ErpMaValoresTipo').': '.$model->nombre; ?></h1>
<hr/>

<?php 
$this->beginWidget('zii.widgets.CPortlet', array(
	'htmlOptions'=>array(
		'class'=>''
	)
));
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		array('label'=>'Create', 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array()),
                array('label'=>Yii::t('app','List'), 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'), 'linkOptions'=>array()),
                array('label'=>Yii::t('app','Update'), 'icon'=>'icon-edit', 'url'=>Yii::app()->controller->createUrl('update',array('id'=>$model->id)),'active'=>true, 'linkOptions'=>array()),
	),
));
$this->endWidget();
?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>