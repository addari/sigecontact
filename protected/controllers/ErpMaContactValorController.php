<?php
class ErpMaContactValorController extends Controller {

   public function filters()
   {
      return array(array('CrugeAccessControlFilter'));
   }

	public function accessRules()
	{
		return array(
			array('allow',  // allow authenticated user to perform 'index' actions
				'actions'=>array('index'),
			),
			array('allow',  // allow authenticated user to perform 'view' actions
				'actions'=>array('view'),
			),
			array('allow', // allow authenticated user to perform 'create' actions
				'actions'=>array('create'),
			),
			array('allow',  // allow authenticated user to perform 'update' actions
				'actions'=>array('update'),
			),
			array('allow',  // allow authenticated user to perform 'GeneratePdf' actions
				'actions'=>array('GeneratePdf'),
			),
			array('allow',  // allow authenticated user to perform 'GenerateExcel' actions
				'actions'=>array('GenerateExcel'),
			),
			array('allow', // allow authenticated user to perform 'admin' actions
				'actions'=>array('admin'),
			),
			array('allow', // allow authenticated user to perform 'delete' actions
				'actions'=>array('delete'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

    /*public function actionIndex() {
        $dataProvider = new CActiveDataProvider('ErpMaContactValor');
        $this->render('index', array(
                'model' => $dataProvider,
        ));
    }*/
        
    public function actionView($id) {
        $this->render('view', array(
                'model' => $this->loadModel($id),
        ));
    }
        
    public function actionCreate() {
        $model = new ErpMaContactValor;
                if (isset($_POST['ErpMaContactValor'])) {
            $model->setAttributes($_POST['ErpMaContactValor']);

			 if (isset($_POST['ErpMaContactValor']['idTipoValor'])) $model->idTipoValor = $_POST['ErpMaContactValor']['idTipoValor'];
			 if (isset($_POST['ErpMaContactValor']['idContact'])) $model->idContact = $_POST['ErpMaContactValor']['idContact'];
                
                try {
                    if($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                            $this->redirect($_GET['returnUrl']);
                    } else {
                            $this->redirect(array('view','id'=>$model->id));
                    }
                }
                } catch (Exception $e) {
                        $model->addError('valor', $e->getMessage());
                }
        } elseif(isset($_GET['ErpMaContactValor'])) {
                        $model->attributes = $_GET['ErpMaContactValor'];
        }

        $this->render('create',array( 'model'=>$model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        
        if(isset($_POST['ErpMaContactValor'])) {
            $model->setAttributes($_POST['ErpMaContactValor']);
			$model->idTipoValor = $_POST['ErpMaContactValor']['idTipoValor'];
			$model->idContact = $_POST['ErpMaContactValor']['idContact'];
                try {
                    if($model->save()) {
                        if (isset($_GET['returnUrl'])) {
                                $this->redirect($_GET['returnUrl']);
                        } else {
                                $this->redirect(array('view','id'=>$model->id));
                        }
                    }
                } catch (Exception $e) {
                        $model->addError('valor', $e->getMessage());
                }

            }

        $this->render('update',array(
                'model'=>$model,
                ));
    }
                
               

    public function actionDelete($id) {
        if(Yii::app()->request->isPostRequest) {    
            try {
                $this->loadModel($id)->delete();
            } catch (Exception $e) {
                    throw new CHttpException(500,$e->getMessage());
            }

            if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
                            $this->redirect(array('admin'));
            }
        }
        else
            throw new CHttpException(400,
                Yii::t('app', 'Invalid request.'));
    }
                
    public function actionIndex() {
        $model = new ErpMaContactValor('search');
        $model->unsetAttributes();

        if (isset($_GET['ErpMaContactValor']))
                $model->setAttributes($_GET['ErpMaContactValor']);

        $this->render('index', array(
                'model' => $model,
        ));
    }
    
    
    public function loadModel($id) {
            $model=ErpMaContactValor::model()->findByPk($id);
            if($model===null)
                    throw new CHttpException(404,Yii::t('app', 'The requested page does not exist.'));
            return $model;
    }
public function actionGenerateExcel()
	{
            $session=new CHttpSession;
            $session->open();		
            
             if(isset($session['ErpMaContactValor_records']))
               {
                $model=$session['ErpMaContactValor_records'];
               }
               else
                 $model = ErpMaContactValor::model()->findAll();

		
		#Yii::app()->request->sendFile(date('YmdHis').'.xls',
		Yii::app()->request->sendFile('ErpMaContactValor.xls',
			$this->renderPartial('excelReport', array(
				'model'=>$model
			), true)
		);
	}
        public function actionGeneratePdf() 
	{
           $session=new CHttpSession;
           $session->open();
		Yii::import('ext.giiplus.bootstrap.*');
                require_once(Yii::getPathOfAlias('ext').'/tcpdf/tcpdf.php');
                require_once(Yii::getPathOfAlias('ext').'/tcpdf/config/lang/eng.php');

             if(isset($session['ErpMaContactValor_records']))
               {
                $model=$session['ErpMaContactValor_records'];
               }
               else
                 $model = ErpMaContactValor::model()->findAll();



		$html = $this->renderPartial('expenseGridtoReport', array(
			'model'=>$model
		), true);
		
		//die($html);
		
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('ErpMaContactValor');
		$pdf->SetSubject('ErpMaContactValor');
		#$pdf->SetKeywords('example, text, report');
		$pdf->SetHeaderData('', 0, "Report", '');
		#$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Example Report by ".Yii::app()->name, "");
		#$pdf->SetHeaderData("".Yii::app()->name, "");
		$pdf->SetHeaderData("".Yii::app()->params['imageLogo'], "");
		$pdf->setHeaderFont(Array('helvetica', '', 8));
		$pdf->setFooterFont(Array('helvetica', '', 6));
		$pdf->SetMargins(15, 18, 15);
		$pdf->SetHeaderMargin(5);
		$pdf->SetFooterMargin(10);
		$pdf->SetAutoPageBreak(TRUE, 0);
		$pdf->SetFont('dejavusans', '', 7);
		$pdf->AddPage();
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->LastPage();
		$pdf->Output("ErpMaContactValor.pdf", "I");
	}

}