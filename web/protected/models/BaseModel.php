<?php

class BaseModel extends CFormModel{
        
        public static function model($className=__CLASS__) {
            return parent::model($className);
        }
    
        /**
        * Declares attribute labels.
        */
        public function attributeLabels(){
               return array(
                        //Header
                        'headerProfile'=>Yii::t('app','model.header.headerProfile'),
                        'headerLogout'=>Yii::t('app','model.header.headerLogout'),
                        //Footer
                        'rights'=>Yii::t('app','model.header.rights'),
                        'based'=>Yii::t('app','model.header.based'),
                        //Menu
                        'startPage'=>Yii::t('app','model.menuL.startPage'),
                        'contact'=>Yii::t('app','model.menuL.contact'),

                        'titleDevices'=>Yii::t('app','model.menuL.titleDevices'),

                        'titleManage'=>Yii::t('app','model.menuL.titleManage'),

                        'titleAdmin'=>Yii::t('app','model.menuL.titleAdmin'),
                            'AdminUsers'=>Yii::t('app','model.menuL.AdminUsers'),                   
                                'AdminUsersList'=>Yii::t('app','model.menuL.AdminUsersList'),
                                'AdminUsersAdd'=>Yii::t('app','model.menuL.AdminUsersAdd'),
                                'AdminUsersManage'=>Yii::t('app','model.menuL.AdminUsersManage'),
                                'AdminUsersUpdate'=>Yii::t('app','model.menuL.AdminUsersUpdate'),

                        'login'=>Yii::t('app','model.menuL.login'),
                        'logout'=>Yii::t('app','model.menuL.logout'),
                       
               );
        }

        public static function label(){
               return (new BaseModel)->attributeLabels();
        }
        
        public static function showNameOrNickname(){
            $id_user = Yii::app()->user->id;
            $user = User::model()->findByPk($id_user);
            $infoUser = Infouser::model()->find('id_user=:id_user', array(':id_user'=>$id_user));
            $name = "";
            if(isset($infoUser->nickname)){
                $name = $infoUser->nickname;
            }
            else{
                $name = $user->user_surname.", ".$user->user_name;
            }
            return $name;
        }
        
        public static function getAvatarProfile(){
            $id_user = Yii::app()->user->id;
            $userAvatar = Useravatar::model()->find('id_user=:id_user', array(':id_user'=>$id_user));
            $avatar = "";
            if(!$userAvatar){
                $avatar = "uploads/avatars/default.jpg";
            }
            else{
                $avatar = $userAvatar->photoUrl;
            }
            return $avatar;
        }
        
        public static function getAvatarUserID($id_user){
            $userAvatar = Useravatar::model()->find('id_user=:id_user', array(':id_user'=>$id_user));
            $avatar = "";
            if(!$userAvatar){
                $avatar = "uploads/avatars/default.jpg";
            }
            else{
                $avatar = $userAvatar->photoUrl;
            }
            return $avatar;
        }
        
        /**
         * Function to show a SWAL Modal
         * @param array $avatarStatus
         *      $avatarStatus = array(
         *          "OKnKO"=>"",
         *          "title"=>"",
         *          "msg"=>"",
         *      )
         * @return string HTML
         */
        public static function swalModal($avatarStatus){
            $html = "<script>";
            $html .= 'swal('
                    . "'".$avatarStatus['title']."',"
                    . "'".$avatarStatus['msg']."',"
                    . "'".$avatarStatus['OKnKO']."'"
                . ')';
            $html .= "</script>";
            return $html;
        }
}
