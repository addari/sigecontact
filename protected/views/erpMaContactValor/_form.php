<div class="form">
    <div class='well well-small'>
        <?php echo Yii::t('app','Fields with') ?> <span class="required">*</span> <?php echo Yii::t('app','are required') ?>. </div>


 <?php
 $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
 'type' => 'horizontal',
 'id'=>'erp-ma-contact-valor-form',
 'enableAjaxValidation'=>false,
 'enableClientValidation'=>true,
 ));

 echo $form->errorSummary($model);
 ?>
 
    <div class="control-group">
        <?php echo $form->labelEx($model,'id_contact',array('class'=>'control-label')) ; ?>
        <div class="controls">
          <?php     $this->widget('ext.select2.ESelect2', array(
                'model' => $model,
                'attribute' => 'idContact',
                'data' => CHtml::encodeArray(CHtml::listData(ErpMaContact::model()->findAll(), 'id', 'nombre')),
                'htmlOptions' => array(
                    'class' => 'span4',
                    ),
'options' => array(
    'placeholder' => Yii::t('app', 'Select'),
    'allowClear' => true,
    'asDropDownList' => true,
    ),
)); ?>
          <div class="help-inline"><?php echo $form->error($model,'id_contact'); ?>
</div>
      </div>
  </div>
  
    <div class="control-group">
        <?php echo $form->labelEx($model,'id_tipo_valor',array('class'=>'control-label')) ; ?>
        <div class="controls">
          <?php     $this->widget('ext.select2.ESelect2', array(
                'model' => $model,
                'attribute' => 'idTipoValor',
                'data' => CHtml::encodeArray(CHtml::listData(ErpMaValoresTipo::model()->findAll(), 'id', 'categoriaTipo')),
                'htmlOptions' => array(
                    'class' => 'span4',
                    ),
'options' => array(
    'placeholder' => Yii::t('app', 'Select'),
    'allowClear' => true,
    'asDropDownList' => true,
    ),
)); ?>
          <div class="help-inline"><?php echo $form->error($model,'id_tipo_valor'); ?>
</div>
      </div>
  </div>
  
    <div class="control-group">
        <?php echo $form->labelEx($model,'valor',array('class'=>'control-label')) ; ?>
        <div class="controls">
          <?php echo $form->textField($model,'valor',array('size'=>60,'maxlength'=>256,'class'=>'span5')); ?>
          <div class="help-inline"><?php echo $form->error($model,'valor'); ?>
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