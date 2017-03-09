<?php

class UseravatarController extends CController{

    /**
     * Millorar codic, per que es genera 2 models de UserAvatar.
     * 1 Per per pujar l'arxiu i l'altre per fer l'insert a la BD
     * Si es feia tot en un sol, com a la base de dades no hi ha el camp image donaba error
     */
    public function actionCreate(){
        $model=new Useravatar;
        if(isset($_POST['Useravatar'])){
            $rnd = rand(0,9999);
            $model->attributes = $_FILES['Useravatar'];
            $uploadedFile=CUploadedFile::getInstance($model,'image');
            $id_user = Yii::app()->user->id;
            
            $path = $_FILES['Useravatar']['name']['image'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $fileName = "{$rnd}-{$id_user}.{$ext}";
            
            if($uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/avatars/'.$fileName)){
                $avatarDB = new Useravatar;
                $avatarDB->photoUrl = 'uploads/avatars/'.$fileName;
                $avatarDB->id_user = $id_user;
                if($avatarDB->save()){
                    $this->redirect(array('update'));
//                    $this->actionUpdate();
                }
            }
        }
        $this->render('create',array(
            'model'=>$model,
        ));
    }
    
    public function actionUpdate(){
//        $model=$this->loadModel($id);
 
//        if(isset($_POST['Banner'])){
//            $_POST['Banner']['image'] = $model->image;
//            $model->attributes=$_POST['Banner'];
// 
//            $uploadedFile=CUploadedFile::getInstance($model,'image');
// 
//            if($model->save())
//            {
//                if(!empty($uploadedFile))  // check if uploaded file is set or not
//                {
//                    $uploadedFile->saveAs(Yii::app()->basePath.'/../banner/'.$model->image);
//                }
//                $this->render('update',array(
//                    'model'=>$model,
//                ));
//            }
// 
//        }
 
//        $this->render('update',array(
//            'model'=>$model,
//        ));
        $this->render('update');
    }
    
    
}