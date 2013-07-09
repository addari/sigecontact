<div class="form">
    <div class='well well-small'>
        <?php echo Yii::t('app','Fields with') ?> <span class="required">*</span> <?php echo Yii::t('app','are required') ?>. </div>


 <?php
 $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
 'type' => 'horizontal',
 'id'=>'erp-ma-contact-form',
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
    
<?php

// Definición de Campos para Miembros del Grupo
        $memberFormConfig =array(
        'elements'=>array(
            'id_tipo_valor'=>array(
                'type'=>'dropdownlist',
                'items'=>CHtml::encodeArray(CHtml::listData(ErpMaValoresTipo::model()->findAll(), 'id', 'categoriaTipo')),
                ),
            'valor'=>array(
                'type'=>'text',
                'maxlength'=>40,
                ),
            )
        );
// Cargar de control de Miembros del Grupo
            $this->widget('ext.multimodelform.MultiModelForm', array(
            'id' => 'id_contact', //the unique widget id
            #'formConfig' => $member->MultiModelForm, //the form configuration array
            'formConfig' => $memberFormConfig, //the form configuration array
            'model' => $member, //instance of the form model
            'tableView' => true,
            'removeText' =>Yii::t('app','Remove'), 
            'addItemText' =>Yii::t('app','Add Items'),
            //if submitted not empty from the controller,
            //the form will be rendered with validation errors
            'validatedItems' => $validatedMembers,
            'bootstrapLayout' => true,
            //array of member instances loaded from db
            'data' => $member->findAll('id_contact=:groupId', array(':groupId' => $model->id)),
        ));
    ?>
  
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