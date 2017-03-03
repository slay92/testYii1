<?php
    if(!Yii::app()->user->isGuest){
        require_once 'body.php';
    }
    else{
        require_once 'login.php';
    }
?>