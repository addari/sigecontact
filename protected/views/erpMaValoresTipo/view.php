<?php
$this->breadcrumbs=array(
	Yii::t('title','ErpMaValoresTipos')=>array('index'),
	$model->nombre,
);
?>
<h2><?php echo Yii::t('app','View').' '.Yii::t('title','ErpMaValoresTipo').': '.$model->nombre; ?></h2>
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
			'label'=>'ErpMaValoresTipo.id',
		),
		array(
			'name'=>'id_categoria',
			#'value'=>'',
			#'type'=>'html',
			'value'=>($model->idCategoria !== null)?CHtml::link($model->idCategoria->nombre, array('id/view','id'=>$model->idCategoria->id)).' ':'n/a',
			'type'=>'html',
			'label'=>'ErpMaValoresTipo.id_categoria',
		),
		array(
			'name'=>'nombre',
			'value'=>$model->nombre,
			'type'=>'html',
			'label'=>'ErpMaValoresTipo.nombre',
		),
		array(
			'name'=>'validacion',
			'value'=>$model->validacion,
			'type'=>'html',
			'label'=>'ErpMaValoresTipo.validacion',
		),
		array(
			'name'=>'timestamp',
			'value'=>$model->timestamp,
			'type'=>'html',
			'label'=>'ErpMaValoresTipo.timestamp',
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
<h3><?php echo CHtml::link(Yii::t('app','ErpMaContactValors'), array('/erpMaContactValor'));?></h3>
<ul>
			<?php if (is_array($model->erpMaContactValors)) foreach($model->erpMaContactValors as $foreignobj) { 

					echo '<li>';
					echo CHtml::link($foreignobj->valor, array('/erpMaContactValor/view','id'=>$foreignobj->id));
							
					}
						?></ul>