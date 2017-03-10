<?php

class UseravatarController extends CController{

    public function actionCreate(){
        $model=new Useravatar;
        if(isset($_POST['Useravatar'])){
            $avatarStatus = array(
                "OKnKO"=>"error",
                "title"=>Useravatar::label()['SwalAvatarTitle'],
                "msg"=>Useravatar::label()['SwalAvatarError'],
            );
            
            $rnd = rand(0,9999);
            $model->attributes = $_FILES['Useravatar'];
            $uploadedFile=CUploadedFile::getInstance($model,'photoUrl');
            $id_user = Yii::app()->user->id;
            
            $path = $_FILES['Useravatar']['name']['photoUrl'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $fileName = "{$rnd}-{$id_user}.{$ext}";
            
            if($uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/avatars/'.$fileName)){
                $model->photoUrl = 'uploads/avatars/'.$fileName;
                $model->id_user = $id_user;
                if($model->save()){
                    $avatarStatus = array(
                        "OKnKO"=>"success",
                        "title"=>Useravatar::label()['SwalAvatarTitle'],
                        "msg"=>Useravatar::label()['SwalAvatarSuccess'],
                    );
                }
            }
            $this->redirect(array('user/profile', 'avatarStatus'=>$avatarStatus));
        }
        $this->render('create',array(
            'model'=>$model,
        ));
    }
    
    public function actionUpdate(){
        $id_user = Yii::app()->user->id;
        $model = $this->loadModel($id_user);
        $oldFile = $model->photoUrl;
        $avatarStatus = array(
            "OKnKO"=>"error",
            "title"=>Useravatar::label()['SwalAvatarTitle'],
            "msg"=>Useravatar::label()['SwalAvatarError'],
        );
        
        if(isset($_POST['Useravatar'])){
            $model->attributes = $_FILES['Useravatar'];
            $uploadedFile = CUploadedFile::getInstance($model,'photoUrl');
            if(!empty($uploadedFile)){
                $rnd = rand(0,9999);
                $path = $_FILES['Useravatar']['name']['photoUrl'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $fileName = "{$rnd}-{$id_user}.{$ext}";

                if($uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/avatars/'.$fileName)){
                    unlink(Yii::app()->basePath.'/../'.$oldFile);
                    $model->photoUrl = 'uploads/avatars/'.$fileName;
                    if($model->save()){
                        $avatarStatus = array(
                            "OKnKO"=>"success",
                            "title"=>Useravatar::label()['SwalAvatarTitle'],
                            "msg"=>Useravatar::label()['SwalAvatarSuccess'],
                        );
                    }
                }
            }
            $this->redirect(array('user/profile', 'avatarStatus'=>$avatarStatus));
        }
 
        $this->render('update',array(
            'model'=>$model,
        ));
    }
    
    
    /**
    * Returns the data model based on the primary key given in the GET variable.
    * If the data model is not found, an HTTP exception will be raised.
    * @param integer $id the ID of the model to be loaded
    * @return User the loaded model
    * @throws CHttpException
    */
    public function loadModel($id_user){
            $model = Useravatar::model()->find('id_user=:id_user', array(':id_user'=>$id_user));
            if($model===null)
                throw new CHttpException(404,'The requested page does not exist.');
            return $model;
    }
    
}