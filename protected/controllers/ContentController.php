
<?php

class ContentController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $activeMenu = 'create';
    public $enable_add_more_meta = true;
    public $layout='//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl' // perform access control for CRUD operations
            //'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
//    public function accessRules()
//    {
//        return array(
//            array('allow',  // allow all users to perform 'index' and 'view' actions
//                'actions'=>array('index','view','adduser','ajax'),
//                'users'=>array('@'),
//            ),
//            array('allow', // allow authenticated user to perform 'create' and 'update' actions
//                'actions'=>array('create','update'),
//                'users'=>array('@'),
//            ),
//            array('allow', // allow admin user to perform 'admin' and 'delete' actions
//                'actions'=>array('admin','delete'),
//                'users'=>array('@'),
//            ),
//            array('deny',  // deny all users
//                'users'=>array('*'),
//            ),
//        );
//    }



    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));

    }

    public function actionAngular()
        {

            $this->render('angular');

        }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $Cmodel=new Content;
        $Mmodel=new ContentMeta();
        $Mclass=new MetaClass();
        $this->activeMenu = 'create';

        $this->enable_add_more_meta = true;


        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($Cmodel);

        if(isset($_POST['Content']['meta'])){
            $ser = serialize($_POST['Content']['meta']);
            $Cmodel->meta = $ser;
        }

        if(isset($_POST['Content']))
        {
            $uploadedFile=CUploadedFile::getInstance($Cmodel,'image');

            $Cmodel->attributes=$_POST['Content'];
            $Cmodel->type = 'training';

            if($Cmodel->save(false)){

                if($uploadedFile !='' && !empty($uploadedFile)){

                    $rnd = rand(0,9999);  // generate random number between 0-9999
                    $fileName = "{$rnd}-{$uploadedFile->name}";  // random number + file name
                    $Cmodel->image = $fileName;
                    $_POST['Content']['image'] = $fileName;
//                    $uploadedFile->saveAs(Yii::app()->basePath.'/images/'.$fileName);
                    $Cmodel->save(false);

                    $awsSave = new AwsClass;
                    $result = $awsSave->saveObj($fileName, $uploadedFile->tempName);

                }
            }
        }


//        $id = Yii::app()->db->getLastInsertID();

        //$Mclass->insert($id , 'description' , $Mmodel['desc']);
//        $Mclass->insert($id , 'description' ,'ooooo');
//        echo $id;
//        exit();

        $this->render('create',array(
            'Cmodel'=>$Cmodel,
//            'Mmodel'=>$Mmodel->findAllByAttributes(array(),'', $params=array ( ))
            'Mmodel' => $Mmodel
        ));

    }

    public function actionCtype(){

        if(isset($_POST['type']))
        {
            $type = $_POST['type'];
            $dataArr = Yii::app()->db->createCommand('
               SELECT idtype, title FROM content_type
               WHERE type = "'.$type.'"')
                ->queryAll();

            $data['opt'] = $dataArr;

            if(isset($_POST['sel'])){
                $data['sel'] = $_POST['sel'];
            }


            $this->renderPartial('_ajaxCtype', array('data'=>$data), false, true);
            //$this->render('login',array('model'=>$model));

        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    //******** OLD ***********
    public function actionUpdate($id)
    {
        $Cmodel=$this->loadModel($id);
        $Mmodel=new ContentMeta;
        $Mclass=new MetaClass();
        $this->activeMenu = 'update';



// ********************* Meta Table *********************

        // Uncomment the following line if AJAX validation is needed $Mmodel['desc']

        if(isset($_POST['Content']) )
        {
            if(isset($_POST['Content']['meta'])){
                $ser = serialize($_POST['Content']['meta']);
                $Cmodel->meta = $ser;
            }

            $_POST['Content']['image'] = $Cmodel->image;
            $uploadedFile=CUploadedFile::getInstance($Cmodel,'image');

            $Cmodel->attributes=$_POST['Content'];

            if($Cmodel->save(false)){

                if(!empty($uploadedFile) && $uploadedFile != '')  // check if uploaded file is set or not
                {
                    $awsSave = new AwsClass;
                    $fileName = $id.'_'.$uploadedFile->name;
                    if(isset($Cmodel->image)) {
                        $delOld = $awsSave->deleteObj($Cmodel->image);
                    }
                    $result = $awsSave->saveObj($fileName, $uploadedFile->tempName);
                    $Cmodel->image = $fileName;
                    $Cmodel->save(false);
                }
            }
        }

        //$Cmodel->id;
//        $Mmodel['meta_key']['description'] =
//        $metaDesc = $Mclass->get($id  ,'description');
//        print_r($metaDesc['meta_value']);
//        $Mclass->insert($id, 'description', $Mmodel['description']);
//        insert($content_id = 0, $meta_key= '', $meta_value = '');
//        $Mmodeldes = $Mmodel->findAllByAttributes(array(),'idcontent='.$id, $params=array ());


        $this->render('update',array(
            'Cmodel'=>$Cmodel,
            'Mmodel'=>$Mmodel->findAllByAttributes(array(),'idcontent='.$id, $params=array ())
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $Cmodel=$this->loadModel($id);
        if(isset($Cmodel->image)) {
            $awsSave = new AwsClass;
            $delOld = $awsSave->deleteObj($Cmodel->image);
        }
        $Cmodel->delete();
//        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider=new CActiveDataProvider('Content');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

    public function  actionAws() {
        $aws = new AwsClass();
        $result = $aws->getObj();
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new Content('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Content']))
            $model->attributes=$_GET['Content'];

        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Content the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=Content::model()->with('contentmeta')->findbyPk($id);
        //$model=Content::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Content $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='content-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
