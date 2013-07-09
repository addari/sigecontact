<h1><?php echo CrugeTranslator::t("Recuperar la clave"); ?></h1>

<?php if(Yii::app()->user->hasFlash('pwdrecflash')): ?>
<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('pwdrecflash'); ?>
</div>
<?php else: ?>
<div class="form">
<?php  $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'htmlOptions'=>array('class'=>'well'),
	'id'=>'pwdrcv-form',
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

    <div class="control-group">
		<?php //echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textFieldRow($model,'username'); ?>
		<?php //echo $form->error($model,'username'); ?>

    </div>
	<?php if(CCaptcha::checkRequirements()): ?>
 <div class="control-group">
		<?php //echo $form->labelEx($model,'verifyCode'); ?>
		
		<?php $this->widget('CCaptcha'); ?>
 </div>
    <div class="control-group">
		<?php echo $form->textFieldRow($model,'verifyCode'); ?>
    </div>
		<div class="control-group">
		<div class="hint"><?php echo CrugeTranslator::t("por favor ingrese los caracteres o digitos que vea en la imagen");?></div>
		<?php echo $form->error($model,'verifyCode'); ?>
                </div>
	<?php endif; ?>
	
	<div class="form-actions">
		                <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'success',
        'icon' => 'ok white',
        'label' => Yii::t('app', 'Recuperar Clave'),
            )
    );
    ?>
                            <a class="btn btn-warning" href="index.php?r=cruge/ui/login"><i class="icon-warning-sign icon-white"></i> Iniciar Sesion</a>

	</div>

	
<?php $this->endWidget(); ?>
</div>
<?php endif; ?>