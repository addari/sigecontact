<?php
class ErpMaContactController extends Controller {

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
        $dataProvider = new CActiveDataProvider('ErpMaContact');
        $this->render('index', array(
                'model' => $dataProvider,
        ));
    }*/
        
//    public function actionView($id) {
//        $this->render('view', array(
//                'model' => $this->loadModel($id),
//        ));
//    }
        
    public function actionView($id) {
            $idmember = $_GET['id'];
            $dataProviderMember = new CActiveDataProvider(ErpMaContactValor::model(), array(
                    #'keyAttribute' => 'id_contact',
                    'criteria' => array(
                        'condition' => 'id_contact=' . $idmember,
                    ),
            ));

        $this->render('view', array(
            'model' => $this->loadModel($id), 'dataProviderMember' => $dataProviderMember
        ));
    }
        
//    public function actionCreate() {
//        $model = new ErpMaContact;
//                if (isset($_POST['ErpMaContact'])) {
//            $model->setAttributes($_POST['ErpMaContact']);
//
//                
//                try {
//                    if($model->save()) {
//                    if (isset($_GET['returnUrl'])) {
//                            $this->redirect($_GET['returnUrl']);
//                    } else {
//                            $this->redirect(array('view','id'=>$model->id));
//                    }
//                }
//                } catch (Exception $e) {
//                        $model->addError('nombre', $e->getMessage());
//                }
//        } elseif(isset($_GET['ErpMaContact'])) {
//                        $model->attributes = $_GET['ErpMaContact'];
//        }
//
//        $this->render('create',array( 'model'=>$model));
//    }
    
    public function actionCreate() {
        Yii::import('ext.multimodelform.MultiModelForm');

        $model = new ErpMaContact;

        $member = new ErpMaContactValor;
        $validatedMembers = array();  //ensure an empty array

        if (isset($_POST['ErpMaContact'])) {
            $model->attributes = $_POST['ErpMaContact'];

            if (//validate detail before saving the master
                    MultiModelForm::validate($member, $validatedMembers, $deleteItems) &&
                    $model->save()
            ) {
//the value for the foreign key 'groupid'
                $masterValues = array('id_contact' => $model->id);
                if (MultiModelForm::save($member, $validatedMembers, $deleteMembers, $masterValues))
                    $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
            //submit the member and validatedItems to the widget in the edit form
            'member' => $member,
            'validatedMembers' => $validatedMembers,
        ));
    }

//    public function actionUpdate($id) {
//        $model = $this->loadModel($id);
//        
//        if(isset($_POST['ErpMaContact'])) {
//            $model->setAttributes($_POST['ErpMaContact']);
//                try {
//                    if($model->save()) {
//                        if (isset($_GET['returnUrl'])) {
//                                $this->redirect($_GET['returnUrl']);
//                        } else {
//                                $this->redirect(array('view','id'=>$model->id));
//                        }
//                    }
//                } catch (Exception $e) {
//                        $model->addError('nombre', $e->getMessage());
//                }
//
//            }
//
//        $this->render('update',array(
//                'model'=>$model,
//                ));
//    }
    
    public function actionUpdate($id) {
        Yii::import('ext.multimodelform.MultiModelForm');

        $model = $this->loadModel($id); //the Group model

        $member = new ErpMaContactValor;
        $validatedMembers = array(); //ensure an empty array

        if (isset($_POST['ErpMaContact'])) {
            $model->attributes = $_POST['ErpMaContact'];

//the value for the foreign key 'groupid'
            $masterValues = array('id_contact' => $model->id);

            if (//Save the master model after saving valid members
                    MultiModelForm::save($member, $validatedMembers, $deleteMembers, $masterValues) &&
                    $model->save()
            )
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
            //submit the member and validatedItems to the widget in the edit form
            'member' => $member,
            'validatedMembers' => $validatedMembers,
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
        $model = new ErpMaContact('search');
        $model->unsetAttributes();

        if (isset($_GET['ErpMaContact']))
                $model->setAttributes($_GET['ErpMaContact']);

        $this->render('index', array(
                'model' => $model,
        ));
    }
    
    
    public function loadModel($id) {
            $model=ErpMaContact::model()->findByPk($id);
            if($model===null)
                    throw new CHttpException(404,Yii::t('app', 'The requested page does not exist.'));
            return $model;
    }
public function actionGenerateExcel()
	{
            $session=new CHttpSession;
            $session->open();		
            
             if(isset($session['ErpMaContact_records']))
               {
                $model=$session['ErpMaContact_records'];
               }
               else
                 $model = ErpMaContact::model()->findAll();

		
		#Yii::app()->request->sendFile(date('YmdHis').'.xls',
		Yii::app()->request->sendFile('ErpMaContact.xls',
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

             if(isset($session['ErpMaContact_records']))
               {
                $model=$session['ErpMaContact_records'];
               }
               else
                 $model = ErpMaContact::model()->findAll();



		$html = $this->renderPartial('expenseGridtoReport', array(
			'model'=>$model
		), true);
		
		//die($html);
		
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('ErpMaContact');
		$pdf->SetSubject('ErpMaContact');
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
		$pdf->Output("ErpMaContact.pdf", "I");
	}

}