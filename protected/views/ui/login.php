<h2><?php echo Yii::t('app', "Login"); ?></h2>
<?php if (Yii::app()->user->hasFlash('loginflash')): ?>
    <div class="flash-error">
        <?php echo Yii::app()->user->getFlash('loginflash'); ?>
    </div>
<?php else: ?>
<p><?php echo Yii::t('app','Please fill out the following form with your login credentials:') ?></p>

    <div class="form">
        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            //'type' => 'horizontal',
            'id' => 'logon-form',
            'enableClientValidation' => false,
            'htmlOptions'=>array('class'=>'well'),
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        ));
        ?>

<?php echo $form->textFieldRow($model, 'username', array('class'=>'span3')); ?>
<?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span3')); ?>
<?php echo $form->checkboxRow($model, 'rememberMe'); ?>

    <!--    <div class="control-group">
            <?php echo $form->labelEx($model, 'username'); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'username'); ?>
                <div class="help-inline">
                    <?php echo $form->error($model, 'username'); ?>
                </div>
            </div>
        </div>


        <div class="control-group">
            <?php echo $form->labelEx($model, 'password'); ?>
            <div class="controls">
                <?php echo $form->passwordField($model, 'password'); ?>
                <div class="help-inline">
                    <?php echo $form->error($model, 'password'); ?>
                </div>
            </div>
        </div>

        <div class="control-group">
            <?php echo $form->checkBox($model, 'rememberMe'); ?>
            <div class="controls">
                <?php echo $form->label($model, 'rememberMe'); ?>
                <div class="help-inline">
                    <?php echo $form->error($model, 'rememberMe'); ?>
                </div>
            </div>
        </div>-->

        <div class="form-actions">
                <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'success',
        'icon' => 'ok white',
        'label' => Yii::t('app', 'Login'),
            )
    );
    ?>
            <?php //Yii::app()->user->ui->tbutton(CrugeTranslator::t('logon', "Login")); ?>
            <a class="btn btn-warning" href="index.php?r=cruge/ui/pwdrec"><i class="icon-warning-sign icon-white"></i><?php echo Yii::t('app', 'Recover Password');?></a>
            <?php //echo Yii::app()->user->ui->passwordRecoveryLink; ?>
            <?php
            /*if (Yii::app()->user->um->getDefaultSystem()->getn('registrationonlogin') === 1)
                echo Yii::app()->user->ui->registrationLink;*/
            ?>
        </div>
        
        <?php
//	si el componente CrugeConnector existe lo usa:
//
        if (Yii::app()->getComponent('crugeconnector') != null) {
            if (Yii::app()->crugeconnector->hasEnabledClients) {
                ?>
                <div class='crugeconnector'>
                    <span><?php echo Yii::t('app', 'You also can login with'); ?>:</span>
                    <ul>
                        <?php
                        $cc = Yii::app()->crugeconnector;
                        foreach ($cc->enabledClients as $key => $config) {
                            $image = CHtml::image($cc->getClientDefaultImage($key));
                            echo "<li>" . CHtml::link($image, $cc->getClientLoginUrl($key)) . "</li>";
                        }
                        ?>
                    </ul>
                </div>
                <?php
            }
        }
        ?>


        <?php $this->endWidget(); ?>
    </div></div>
<?php endif; ?>
