<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('app', 'Load File');
$this->breadcrumbs = array(
    Yii::t('app', 'Load File'),
);
?>

<h1><?php Yii::t('app', 'Load URL'); ?></h1>
<iframe src="air/kappa_insert.php" frameborder="0" width="960px" height="500px"></iframe>