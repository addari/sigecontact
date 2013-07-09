

<?php  $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
        'id'=>'search-erp-ma-valores-tipo-categ-form',
         'type' => 'horizontal',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
));  ?>
<div class="well well-small">
  <strong><?php echo Yii::t('app','Information');?>:</strong> <?php echo Yii::t('app','You may optionally enter a comparison operator');?> (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
<?php echo Yii::t('app','or');?> <b>=</b>) <?php echo Yii::t('app','at the beginning of each of your search values to specify how the comparison should be done.');?></div>


  <div class="control-group">
    <?php echo $form->labelEx($model,'id',array('class'=>'control-label')) ; ?>
    <div class="controls">
      <?php echo $form->textField($model,'id'); ?>
    </div>
  </div>

  <div class="control-group">
    <?php echo $form->labelEx($model,'nombre',array('class'=>'control-label')) ; ?>
    <div class="controls">
      <?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>64,'class'=>'span5')); ?>
    </div>
  </div>

  <div class="control-group">
    <?php echo $form->labelEx($model,'timestamp',array('class'=>'control-label')) ; ?>
    <div class="controls">
      <?php $this->widget('CJuiDateTimePicker',
       array(
        'model'=>$model,
        'name'=>'ErpMaValoresTipoCateg[timestamp]',
                            //'language'=> substr(Yii::app()->language,0,strpos(Yii::app()->language,'_')),
                            //'language'=> Yii::app()->language,
                            //'language'=> '',
        'language'=> Yii::app()->params['dataPickerLanguage'],
        'value'=>$model->timestamp,
        'htmlOptions'=>array('readonly'=>'readonly'),
        'mode' => 'datetime',
        'options'=>array(
            'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
            'showButtonPanel'=>true,
            'changeYear'=>true,
            'changeMonth'=>true,
            'dateFormat'=>Yii::app()->params['dateFormat'],
            ),
    )
    );
    ; ?>
    </div>
  </div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'icon'=>'search white',
			'label'=>Yii::t('app','Search')
			)
		); ?>
    	<?php $this->widget('bootstrap.widgets.TbButton', array(
    		#'buttonType'=>'button',
        	'buttonType'=>'reset',
        	#'icon'=>'icon-remove-sign white',
        	'icon'=>'remove',
        	'label'=>Yii::t('app','Reset'),
        	#'htmlOptions'=>array(
        	#	'class'=>'btnreset btn-small'
        	#	)
        	)
    	); ?>
	</div>

<?php $this->endWidget(); ?>


<?php $cs = Yii::app()->getClientScript();
$cs->registerCoreScript('jquery');
$cs->registerCoreScript('jquery.ui');
$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/bootstrap/jquery-ui.css');
?>	
   <script>
	$(".btnreset").click(function(){
		$(":input","#search-erp-ma-valores-tipo-categ-form").each(function() {
		var type = this.type;
		var tag = this.tagName.toLowerCase(); // normalize case
		if (type == "text" || type == "password" || tag == "textarea") this.value = "";
		else if (type == "checkbox" || type == "radio") this.checked = false;
		else if (tag == "select") this.selectedIndex = "";
	  });
	});
   </script>

