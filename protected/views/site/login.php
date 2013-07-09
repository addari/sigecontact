<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - '.Yii::t('app','Login');
$this->breadcrumbs=array(
	Yii::t('app','Login'),
);
?>

<h1><?php Yii::t('app','Login');?></h1>

<p><?php echo Yii::t('app','Please fill out the following form with your login credentials:') ?></p>

<div class="form">


<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
)); ?>
<div class="control-group">
    <?php echo $form->textFieldRow($model, 'username', array('class'=>'span3')); ?>
    <?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span3')); ?>

    <?php #echo $form->checkboxRow($model, 'rememberMe'); ?>
    <?php #$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Login')); ?>
</div>
    
<!--<div class="form-actions">-->
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'icon' => 'ok white',
        'label' => Yii::t('app', 'Login'),
            )
    );
    ?>
<!--</div>-->
 
<?php $this->endWidget(); ?>
</div><!-- form -->
