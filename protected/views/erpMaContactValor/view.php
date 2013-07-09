<?php
$this->breadcrumbs=array(
	Yii::t('title','ErpMaContactValors')=>array('index'),
	$model->valor,
);
?>
<h2><?php echo Yii::t('app','View').' '.Yii::t('title','ErpMaContactValor').': '.$model->valor; ?></h2>
<hr />
<?php 
$this->beginWidget('zii.widgets.CPortlet', array(
'htmlOptions'=>array(
'class'=>''
)
));
$this->widget('bootstrap.widgets.TbMenu', array(
'type'=>'pills',
'items'=>array(
array('label'=>Yii::t('app','Create'), 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array()),
array('label'=>Yii::t('app','List'), 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'), 'linkOptions'=>array()),
array('label'=>Yii::t('app','Update'), 'icon'=>'icon-edit', 'url'=>Yii::app()->controller->createUrl('update',array('id'=>$model->id)), 'linkOptions'=>array()),
//array('label'=>Yii::t('app','Search'), 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'search-button')),
array('label'=>Yii::t('app','Print'), 'icon'=>'icon-print', 'url'=>'javascript:void(0);return false', 'linkOptions'=>array('onclick'=>'printDiv();return false;')),

)));
$this->endWidget();
?>
<div class='printableArea'>

    <?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
    		array(
			'name'=>'id',
			'value'=>$model->id,
			'type'=>'html',
			'label'=>'ErpMaContactValor.id',
		),
		array(
			'name'=>'id_contact',
			#'value'=>'',
			#'type'=>'html',
			'value'=>($model->idContact !== null)?CHtml::link($model->idContact->nombre, array('id/view','id'=>$model->idContact->id)).' ':'n/a',
			'type'=>'html',
			'label'=>'ErpMaContactValor.id_contact',
		),
		array(
			'name'=>'id_tipo_valor',
			'value'=>($model->idTipoValor !== null)?CHtml::link($model->idTipoValor->nombre, array('id/view','id'=>$model->idTipoValor->id)).' ':'n/a',
			'type'=>'html',
			'label'=>'ErpMaContactValor.id_tipo_valor',
		),
		array(
			'name'=>'valor',
			'value'=>$model->valor,
			'type'=>'html',
			'label'=>'ErpMaContactValor.valor',
		),
		array(
			'name'=>'timestamp',
			'value'=>$model->timestamp,
			'type'=>'html',
			'label'=>'ErpMaContactValor.timestamp',
		),
)));?></div>
<style type="text/css" media="print">
    body {visibility:hidden;}
    .printableArea{visibility:visible;} 
</style>
<script type="text/javascript">
    function printDiv()
    {

        window.print();

    }
</script>
