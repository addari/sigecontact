<?php
$this->breadcrumbs=array(
	Yii::t('title','ErpMaContacts')=>array('index'),
	$model->nombre,
);
?>
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
<h2><?php echo Yii::t('app','View').' '.Yii::t('title','ErpMaContact').': '.$model->nombre; ?></h2>
<!--<hr />-->
<?php
    // Detalle del Encabezado
$this->widget('bootstrap.widgets.TbGroupGridView',array(
	'id'=>'member-grid',
        #'fixedHeader'=>true,
	'dataProvider'=>$dataProviderMember,
        #'type'=>'striped bordered',
        #'type'=>'striped',
        'type'=>'bordered',
        #'type'=>'condensed',
        'mergeColumns' => array('id_tipo_valor.categoria'),
        'responsiveTable' => true,
        #'template'=>'{summary}{pager}{items}{pager}',
        'template' => "{items}",
        'columns'=>array(
		array(
			'name'=>'id_tipo_valor.categoria',
			'value'=>'$data->idTipoValor->categoria',
		),
		array(
			'name'=>'id_tipo_valor.nombre',
			'value'=>'$data->idTipoValor->nombre',
		),
//		array(
//			'name'=>'id_tipo_valor',
//			'value'=>'$data->idTipoValor->categoriaTipo',
//		),
		array(
                        'header'=>Yii::t('label','ErpMaContactValor.valor'),
			#'name'=>'valor',
			'value'=>'$data->valor',
		),
	),
));
?>
</div>
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
<!--<h4><?php echo Yii::t('app','ErpMaContactValors');?></h4>-->
<?php
//    if (is_array($model->erpMaContactValors)) foreach($model->erpMaContactValors as $valores) { 
//        #echo CHtml::link($foreignobj->valor, array('/erpMaContactValor/view','id'=>$foreignobj->id));
//        echo '<strong>'.$valores->idTipoValor->categoriaTipo.': </strong>'.$valores->valor;
//        echo '</br>';
//    }
?>