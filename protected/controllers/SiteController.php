<?php

class SiteController extends Controller
{
    /**
     * Declares class-based actions.
     */
    public $activeMenu = 'index';
//    public $tempImgUrl = '../../images/';
//    public $tempOliveImgUrl = '../images/olive/';
//    public $tempDesigns = '../images/designs/';
//    public $testiImgUrl = '../images/testimonials/';
//    public $trainingImgUrl = '../images/trainings/';
    public $topBubble = 'text top';
    public $share = '';


    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }

    public function actionAbout()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->activeMenu = 'about';
        $this->topBubble = 'Olive Sparrow presents contemporary learning concepts in a simple and crisp manner to get the best of you.';
        $this->render('about');

    }
    public function actionLearnmore()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
//        $this->activeMenu = 'about';
        $this->render('learnmore');

    }

    public function actionIndexr()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
//        $this->activeMenu = 'index2';
        $this->render('indexr');

    }

    public function actionIndex()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->topBubble = 'Essence of Olive Sparrow is to present contemporary learning concepts in a crisp manner to achieve results.';

        $Tarray = Yii::app()->db->createCommand('
                SELECT c.idcontent,c.title,c.description,c.image FROM content AS c
                WHERE c.type = "training" LIMIT 0,6')
            ->queryAll();

        $data['training'] = $Tarray;

//
//        echo '<pre>';
//        print_r($Tarray);
//        echo '<pre>';
//        die();

        $this->render('index',array(
            'data'=>$data
        ));

    }

    public function actionTestimonials()
    {
        $this->activeMenu = 'testimonials';
        $this->topBubble = 'text';
        $this->render('testimonials');
    }
    public function actionTraining()
    {
        $this->activeMenu = 'training';
        $this->topBubble = 'text';
        $this->render('training');
    }
    public function actionDesigns()
    {
        $this->activeMenu = 'designs';
        $this->render('designs');
    }
    public function actionInfographics()
    {
        $this->activeMenu = 'infographics';
        $this->render('infographics');
    }
    public function actionTrainings_grid()
    {
        $this->activeMenu = 'grid';
        $this->render('Trainings_grid');
    }

    public function actionTrainings()
    {
        $this->activeMenu = 'trainings';
        $this->topBubble = 'Trainings top bubble text'.

            //$Carray = array();
            //$Carray = Yii::app()->db->createCommand(' SELECT * from content LIMIT 9')->queryAll();

//        print_r(Yii::app()->db->createCommand(' SELECT * from content LIMIT 9')->queryAll());
//        die();
//        for($i = 0; $i < sizeof($Carray); $i++){
//            $arr[] = $Carray[$i];
//        }


        $this->render('trainings',array(
            'dataProvider'=>Yii::app()->db->createCommand(' SELECT * from content LIMIT 9')->queryAll(),
//            'dataProvider'=>Yii::app()->db->createCommand(' SELECT * from content where idcontent != NULL  LIMIT 9')->queryAll()
            //'dataProvider'=>$arr,
        ));
    }

    public function actionResources()
    {
        $this->activeMenu = 'resources';
        $this->topBubble = 'Find collection of inspiring videos,quotations and poems and to get you going.';

//        $Carray = Yii::app()->db->createCommand('
//        SELECT c.idcontent,c.title,c.description,c.image,c.meta FROM content AS c
//        WHERE c.type = "resource" GROUP BY c.idcontent')
//            ->queryAll();
        $Carray = Yii::app()->db->createCommand('
        SELECT c.idtype,c.title,c.type FROM content_type AS c
        WHERE c.type = "resource"')
            ->queryAll();

        $array = $Carray;

        $this->render('resources',array(
            'dataProvider'=>$array,
        ));
        //$this->render('resources');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact()
    {
        $this->activeMenu = 'contact';
        $this->topBubble = 'Contact us to provide you with customized Olive sparrow package  or just a simple advise to best meet your needs.';
        $model=new ContactForm;
        if(isset($_POST['ContactForm']))
        {
            $model->attributes=$_POST['ContactForm'];
            if($model->validate())
            {
                $name='=?UTF-8?B?'.base64_encode($model->name).'?=';
                $subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
                $headers="From: $name <{$model->email}>\r\n". // ORIGINAL --- "From: $name <{$model->email}>\r\n".
                    "Reply-To: {$model->email}\r\n".
                    "MIME-Version: 1.0\r\n".
                    "Content-type: text/plain; charset=UTF-8";


                mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
                Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
                //$this->refresh();
            }
        }
        $this->render('contact',array('model'=>$model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        $model=new LoginForm;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login',array('model'=>$model));
    }

    public function actionMedia()
    {
        $this->activeMenu = 'media';
        $this->render('media');

    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function loadModel($id)
    {
        $model=Content::model()->with('contentmeta')->findbyPk($id);

        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function actionView($id)
    {
        $page['next'] = $this->getNextOrPrevId($id,'next');
        $page['prev'] = $this->getNextOrPrevId($id,'prev');

        $data = $this->render('view',array(
            'data'=>$this->loadModel($id),
            'page'=> $page
        ));

    }

    public function getNextOrPrevId($currentId, $nextOrPrev)
    {
        $records=NULL;
        $order = "idcontent ASC";

        $records=Content::model()->findAll(
            array('select'=>'idcontent', 'order'=>$order, 'limit'=>'9')
        );

        foreach($records as $i=>$r){
            if($r->idcontent == $currentId){
                if($nextOrPrev == 'next'){
                    if($i <= 7)
                        return $records[$i+1]->idcontent;
                }else if($nextOrPrev == 'prev'){
                    if($i != 0)
                        return $records[$i-1]->idcontent;
                }
            }

        }


        return NULL;
    }


    public function actionAjax()
    {


        // uncomment the following code to enable ajax-based validation
        /*
        if(isset($_POST['ajax']) && $_POST['ajax']==='person-form-edit_person-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        */


        if(isset($_POST['id']))
        {
            $id = $_POST['id'];

            //content info
            $dataArr = Yii::app()->db->createCommand('
               SELECT idcontent, title, type, description, image, meta, idtype FROM content
               WHERE idcontent = '.$id)
                ->queryAll();

            $data = $dataArr[0];

            //content meta info

//            $Marray = Yii::app()->db->createCommand('
//                           SELECT m.desc,m.bg_color FROM content_meta AS m
//                           WHERE m.idcontent = '.$id)
//                ->queryAll();

            //content category info
            $typeArr = Yii::app()->db->createCommand('
                        SELECT c.idtype,c.title,c.type FROM content_type AS c
                        WHERE c.idtype = '.$data['idtype'])
                ->queryAll();

//            $data['more'] = $Marray;
            $data['cat'] = $typeArr[0];

            $this->renderPartial('_ajaxContent', array('data'=>$data), false, true);
            //$this->render('login',array('model'=>$model));

        }
    }

    public function actionThumbajax()
    {
        //$this->activeMenu = 'trainings';

        //        $Carray = Yii::app()->db->createCommand('
        //        SELECT c.idcontent,c.title,c.description,c.image,c.meta FROM content AS c,
        //        WHERE c.type = "training"')
        //            ->queryAll();
        if(isset($_POST['idtype']))
        {
            $Carray = Yii::app()->db->createCommand('
        SELECT c.idcontent,c.title,c.description,c.image,c.meta FROM content AS c
        WHERE c.idtype='.$_POST['idtype'])
                ->queryAll();

            //        foreach($Carray as $k => $v){
            //
            //            $Marray = Yii::app()->db->createCommand('
            //            SELECT m.desc,m.bg_color FROM content_meta AS m
            //            WHERE m.idcontent = '.$v['idcontent'])
            //                ->queryAll();
            //            $Carray[$k]['more'] = $Marray;
            //
            //        }

            $array = $Carray;

            $this->renderPartial('_ajaxThumbs',array(
                'dataProvider'=>$Carray,
            ));
        }

    }

    public function actionTrainajax()
    {

        if(isset($_GET['limit'])) {
            $to = 9 * $_GET['limit']; //18,27
            $from = $to - 9;
        }else{
            $from = 0;
        }

        $newLimit = $_GET['limit'] + 1;

        $Carray = Yii::app()->db->createCommand('
                SELECT * from content LIMIT '.$from.', 9')
            ->queryAll();

        $Carray[0]['newlimit'] = $newLimit;

        $this->renderPartial('_ajaxThumbs',array(
            'dataProvider'=>$Carray ));
    }

    public function actionResourceAjax()
    {
        if(isset($_POST['idtype']))
        {
            $rarray = Yii::app()->db->createCommand('
            SELECT c.idcontent,c.title,c.description,c.image,c.meta FROM content AS c
            WHERE c.idtype='.$_POST['idtype'])
                ->queryAll();


            //content category info
            $typeArr = Yii::app()->db->createCommand('
                        SELECT c.idtype,c.title,c.type FROM content_type AS c
                        WHERE c.idtype = '.$_POST['idtype'])
                ->queryAll();

//            echo "<pre>";
//            print_r($Carray); die();
//            echo "</pre>";

            $Carray['res'] = $rarray;
            $Carray['cat'] = $typeArr[0];

//            echo sizeof($Carray); die();

            $this->renderPartial('_ajaxResources',array(
                'resDataProvider'=>$Carray,
            ));
        }
    }
    public function actionPinfo(){
        $this->render('pinfo');
    }
}