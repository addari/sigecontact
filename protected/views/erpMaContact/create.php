<?php
$this->breadcrumbs=array(
	Yii::t('title','ErpMaContacts')=>array('index'),
	Yii::t('app','Create'),
);

?>

<h2><?php echo Yii::t('app','Create').' '.Yii::t('title','ErpMaContact');?></h2>
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
		array('label'=>Yii::t('app','Create'), 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'),'active'=>true, 'linkOptions'=>array()),
        array('label'=>Yii::t('app','List'), 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'), 'linkOptions'=>array()),
		#array('label'=>Yii::t('app','Search'), 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'search-button')),
	),
));
$this->endWidget();
?>
<?php
//$this->renderPartial('_form', array(
//			'model' => $model,
//			'buttons' => 'create'));
echo $this->renderPartial('_form', array('model'=>$model, 'member'=>$member,'validatedMembers'=>$validatedMembers));

?>