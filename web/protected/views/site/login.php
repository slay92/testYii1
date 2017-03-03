<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<p class="login-box-msg">Sign in to start your session</p>

<?php
    $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
                'validateOnSubmit'=>true,
        ),
    ));
?>
    <div class="form-group has-feedback">
        <?php echo $form->textField($model, 'username', array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'username'); ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <?php echo $form->passwordField($model, 'password', array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'password'); ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
        <div class="col-xs-8">
        <div class="checkbox icheck">
            <label>
                <?php echo $form->checkBox($model,'rememberMe'); ?> Remember Me
            </label>
        </div>
        </div>
        <div class="col-xs-4">
            <?php echo CHtml::submitButton('Login', array('class'=>'btn btn-primary btn-block btn-flat')); ?>
        </div>
    </div>
<?php $this->endWidget(); ?>