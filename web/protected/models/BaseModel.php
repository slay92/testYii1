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

                        'login'=>Yii::t('app','model.menuL.login'),
                        'logout'=>Yii::t('app','model.menuL.logout'),
                       
               );
        }

        public static function label(){
               return (new BaseModel)->attributeLabels();
        }
}
