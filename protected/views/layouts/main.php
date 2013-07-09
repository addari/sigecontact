<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="author" content="">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap-responsive.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/input-file.css" />
    </head>

    <body>


        <div id="header" >
            <div class="container-fluid" id="page">
                <!---Menu Superior -->
                <?php
//echo Yii::app()->user->getField('menulimitado');
                if (!Yii::app()->user->isGuest) {
                   if (!Yii::app()->user->getField('menulimitado')) {
                        $visible=true;
                        $visible_menu=false;
                    }else{
                       $visible=false;
                       $visible_menu=true;
                    }
                } else {
                    $visible=false;
                    $visible_menu=false;
                }
                
                $this->widget('bootstrap.widgets.TbNavbar', array(
                    'type' => 'inverse', // null or 'inverse'
                    //'htmlOptions'=>array('style'=>'background-color:red; background-image:none;'),
                    'brand' => CHtml::encode(Yii::app()->name),
                    //'fixed'=>'false',
                    'fixed' => 'top',
                    'fluid' => 'true',
                    'brandUrl' => '#',
                    'collapse' => true, // requires bootstrap-responsive.css
                    'items' => array(
                        array(
                            'class' => 'bootstrap.widgets.TbMenu',
                            'items' => array(//Inicio de Todos los Items
                                //array('label'=>'Dash', 'url'=>'index.php', 'icon'=>'home'),
                                //array('label'=>'Link', 'url'=>'#'),
                                array('label' => 'Asignar Status a Tracking', 'url' => 'index.php?r=trackTrStatusMovR/insert&status='.Yii::app()->user->id, 'icon' => 'globe white', 'visible' => $visible_menu),
                                array('label' => 'Maestros', 'url' => '#', 'icon' => 'globe white', 'visible' => $visible, 'items' => array(
                                        array('label' => Yii::t('app', 'Categorias de Tipos de Valores'), 'url' => 'index.php?r=erpMaValoresTipoCateg/index'),
                                        array('label' => Yii::t('app', 'Tipos de Valores'), 'url' => 'index.php?r=erpMaValoresTipo/index'),
                                        array('label' => Yii::t('app', 'Valores para Contacto'), 'url' => 'index.php?r=erpMaContactValor/index'),
                                        array('label' => Yii::t('app', 'Contactos'), 'url' => 'index.php?r=erpMaContact/index'),
                                        #array('label' => Yii::t('app', 'Tipo de Comprobante'), 'url' => 'index.php?r=contaTrCompbteT/index'),
                                        #array('label' => Yii::t('app', 'Periodo Contable'), 'url' => 'index.php?r=contaMaPeriodo/index'),
                                        #array('label' => Yii::t('app', 'Opcion'), 'url' => 'index.php?r=#/index'),
                                        #array('label' => Yii::t('app', 'Opcion'), 'url' => 'index.php?r=#/index'),
                                        #'---',
                                        #array('label' => Yii::t('app', 'Opcion'), 'url' => 'index.php?r=#/index'),
                                        #array('label' => Yii::t('app', 'Opcion'), 'url' => 'index.php?r=#/index'),
                                    )),
                                array('label' => 'Procesos', 'url' => '#', 'icon' => 'globe white', 'visible' => $visible, 'items' => array(
                                        #array('label' => Yii::t('app', 'Comprobantes'), 'url' => 'index.php?r=comprobante/index'),
                                        #array('label'=>Yii::t('app','Borrar datos para probar'), 'url'=>'index.php?r=site/page&view=borrar_datos'),
                                        #'---',
                                        #array('label' => Yii::t('app', 'Opcion'), 'url' => 'index.php?r=#/index'),
                                        #array('label' => Yii::t('app', 'Opcion'), 'url' => 'index.php?r=#/index'),
                                    )),

                                array('label'=>'Reportes', 'url'=>'#', 'icon'=>'globe white', 'visible'=>Yii::app()->user->isSuperAdmin,/*!Yii::app()->user->isGuest*/'items'=>array(
                                        array('label'=>Yii::t('app','Reporte1'), 'url'=>'index.php?r=erpMaReports/search&id=1'),
                                        array('label'=>Yii::t('app','Reporte2'), 'url'=>'index.php?r=erpMaReports/search&id=2'),
                                        array('label'=>Yii::t('app','Reporte3'), 'url'=>'index.php?r=#'),
                                        '---',
                                        array('label'=>Yii::t('app','Reporte4'), 'url'=>'index.php?r=#'),
                                        array('label'=>Yii::t('app','Reporte5'), 'url'=>'index.php?r=#'),
                                    )),
                            ),
                        // Fin de Todos los Items         
                        ),
                        /* '<form class="navbar-search pull-left" action=""><input type="text" class="search-query span3" placeholder="Buscar"></form>',
                         */
                        array(
                            'class' => 'bootstrap.widgets.TbMenu',
                            'htmlOptions' => array('class' => 'pull-right'),
                            'items' => array(
                                #array('label'=>(!Yii::app()->user->isGuest)?Yii::t('app','Logout').' ('.Yii::app()->user->name.')':Yii::t('app','Login'),'url'=> (!Yii::app()->user->isGuest)?'index.php?r=site/logout':'index.php?r=site/login', 'icon'=>'off white'),
                                array('label' => (!Yii::app()->user->isGuest) ? Yii::t('app', 'Logout') . ' (' . Yii::app()->user->name . ')' : Yii::t('app', 'Login'), 'url' => (!Yii::app()->user->isGuest) ? Yii::app()->user->ui->logoutUrl : Yii::app()->user->ui->getLoginUrl(), 'icon' => 'off white'),
                            /* array('label'=>'', 'url'=>'#', 'icon'=>'wrench', 'items'=>array(

                              //array('label'=>(!Yii::app()->user->isGuest)?'Salir('.Yii::app()->user->name.')':'login','url'=> (!Yii::app()->user->isGuest)?'index.php?r=site/logout':'index.php?r=site/login', 'icon'=>'off'),

                              array('label'=>'Idiomas', 'icon'=>'flag'),
                              array('label'=>'ES - Español', 'url'=>'#'),
                              array('label'=>'EN - English', 'url'=>'#'),
                              array('label'=>'FR - Français', 'url'=>'#'),

                              )), */
                            ),
                        ),
                        array(
                            'class' => 'bootstrap.widgets.TbMenu',
                            'htmlOptions' => array('class' => 'pull-right'),
                            'items' => array(
                                array('label' => 'Mantenimiento', 'url' => '#', 'icon' => 'globe white', 'visible' => Yii::app()->user->isSuperAdmin, 'items' => array(
                                        array('label' => Yii::t('app', 'Tipos de Identificación'), 'url' => 'index.php?r=contaMaIdentT/index'),
                                        array('label' => Yii::t('app', 'Mensajes de Origen'), 'url' => 'index.php?r=Sourcemessage/index'),
                                        array('label' => Yii::t('app', 'Traducción de Mensajes'), 'url' => 'index.php?r=Message/index'),
                                        #array('label' => Yii::t('app', 'Opcion'), 'url' => 'index.php?r=#/index'),
                                        '---',
                                        #array('label'=>'Administrar Usuarios', 'url'=>'index.php?r=cruge/ui/usermanagementadmin', 'visible'=>Yii::app()->user->isSuperAdmin),
                                        array('label' => 'Usuarios y Control de Acceso', 'url' => '#', 'items' => $items = Yii::app()->user->ui->adminItems, 'visible' => Yii::app()->user->isSuperAdmin),
                                    #array('label'=>'Administración de Acceso 2', 'url'=>Yii::app()->user->ui->userManagementAdminLink),
                                    )),
                            ),
                        ),
                    ),
                ));
                ?>
            </div>
            <div class="clear" ><br></div>
            <div class="clear" ><br></div>
            <div class="clear" ><br></div>
        </div>

        <div class="container-fluid"> 

            <div class="row-fluid">
                <div class="span12-fluid">
<?php if (isset($this->breadcrumbs)) { ?>
    <?php
    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
        'links' => $this->breadcrumbs,
    ));
    ?><!-- breadcrumbs -->
<?php } ?>
                <?php echo $content; ?>
                <?php echo Yii::app()->user->ui->displayErrorConsole(); ?> <!-- Muestra un mensaje con los errores de acceso si allowUserAlways es True -->
            </div></div>
            

            <!--<div class="clear"></div>-->


        </div>
            <?php if (Yii::app()->user->name == 'admin') { ?>
            <div class="container-fluid"> 
                <div class="row-fluid">
                    <div class="span12">
            <?php
                $translate = Yii::app()->translate; //shortcut
                echo $translate->dropdown()."</br>"; //in your layout add
                if ($translate->hasMessages()) { //adn this
                    //generates a to the page where you translate the missing translations found in this page
                    echo $translate->translateLink('Translate'); //or a dialog
                    #echo $translate->translateDialogLink('Translate', 'Translate page title')."</br>";
                }
                echo $translate->editLink('Edit translations page')."</br>"; //link to the page where you edit the translations
                echo $translate->missingLink('Missing translations page')."</br>"; //link to the page where you check for all unstranslated messages of the system
            ?>
                    </div>
                </div>
            </div>
            <?php } ?>
    </body>
</html>