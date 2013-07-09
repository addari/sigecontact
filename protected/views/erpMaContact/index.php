<?php
$this->breadcrumbs=array(
	Yii::t('title','ErpMaContacts'),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('erp-ma-contact-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

?>

<h2><?php echo Yii::t('title','ErpMaContacts'); ?></h2>
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
        array('label'=>Yii::t('app','List'), 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'),'active'=>true, 'linkOptions'=>array()),
		array('label'=>Yii::t('app','Search'), 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'search-button')),
		array('label'=>Yii::t('app','Export to PDF'), 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GeneratePdf'), 'linkOptions'=>array('target'=>'_blank'), 'visible'=>true),
		array('label'=>Yii::t('app','Export to CSV'), 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GenerateExcel'), 'linkOptions'=>array('target'=>'_blank'), 'visible'=>true),
	),
));
$this->endWidget();
?>



<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php 
$provider=$model->search();
$provider->pagination->pageSize=10;
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
'id' => 'erp-ma-contact-grid',
'type'=>'striped bordered condensed',
'dataProvider' => $provider,
'filter' => $model,
'columns' => array(
array(
            #'header'=>'id',
            'name' =>'id',
            'value'=>'$data->id',
            #'filter'=>'false',
            #'htmlOptions' => array('style' => 'text-align:center;min-width:20px;')
            ),
array(
            #'header'=>'nombre',
            'name' =>'nombre',
            'value'=>'$data->nombre',
            #'filter'=>'false',
            #'htmlOptions' => array('style' => 'text-align:center;min-width:20px;')
            ),
array(
            #'header'=>'timestamp',
            'name' =>'timestamp',
            'value'=>'$data->timestamp',
            #'filter'=>'false',
            #'htmlOptions' => array('style' => 'text-align:center;min-width:20px;')
            ),
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
'htmlOptions'=>array('style'=>'width: 55px'),
),
),
)); ?>
