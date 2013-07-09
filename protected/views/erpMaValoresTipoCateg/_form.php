<div class="form">
    <div class='well well-small'>
        <?php echo Yii::t('app','Fields with') ?> <span class="required">*</span> <?php echo Yii::t('app','are required') ?>. </div>


 <?php
 $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
 'type' => 'horizontal',
 'id'=>'erp-ma-valores-tipo-categ-form',
 'enableAjaxValidation'=>false,
 'enableClientValidation'=>true,
 ));

 echo $form->errorSummary($model);
 ?>
 
    <div class="control-group">
        <?php echo $form->labelEx($model,'nombre',array('class'=>'control-label')) ; ?>
        <div class="controls">
          <?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>64,'class'=>'span5')); ?>
          <div class="help-inline"><?php echo $form->error($model,'nombre'); ?>
</div>
      </div>
  </div>
  
<div class="form-actions">
    <?php
    echo CHtml::submitButton(Yii::t('app', 'Save'),array('class'=>'btn btn-success'));
    echo '&nbsp;';
    echo CHtml::Button(Yii::t('app', 'Cancel'), array(
     'submit' => 'javascript:history.go(-1)',
     'class'  => 'btn btn-inverse'
     )
);
$this->endWidget(); ?>
</div>
</div> <!-- form -->