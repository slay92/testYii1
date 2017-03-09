<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="box">
    <div class="box-body">

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'user-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation'=>false,
    )); ?>

            <?php echo $form->errorSummary($model); ?>

            <div class="form-group">
                    <?php echo $form->labelEx($model, 'user_type'); ?>
                    <?php echo $form->dropDownList($model, 'user_type', $userTypes, array('options' => array('2'=>array('selected'=>true)), 'class'=>'form-control')); ?>
                    <?php echo $form->error($model, 'user_type'); ?>
            </div>

            <!--<div class="form-group">-->
                    <?php // echo $form->labelEx($model,'sup_user'); ?>
                    <?php // echo $form->textField($model,'sup_user',array('class'=>'form-control')); ?>
                    <?php // echo $form->error($model,'sup_user'); ?>
            <!--</div>-->

            <div class="form-group">
                    <?php echo $form->labelEx($model,'user_name'); ?>
                    <?php echo $form->textField($model,'user_name',array('class'=>'form-control', 'size'=>60,'maxlength'=>150)); ?>
                    <?php echo $form->error($model,'user_name'); ?>
            </div>

            <div class="form-group">
                    <?php echo $form->labelEx($model,'user_surname'); ?>
                    <?php echo $form->textField($model,'user_surname',array('class'=>'form-control', 'size'=>60,'maxlength'=>150)); ?>
                    <?php echo $form->error($model,'user_surname'); ?>
            </div>

            <div class="form-group">
                    <?php echo $form->labelEx($model,'user_email'); ?>
                    <?php echo $form->textField($model,'user_email',array('class'=>'form-control', 'size'=>60,'maxlength'=>200)); ?>
                    <?php echo $form->error($model,'user_email'); ?>
            </div>

    <!--
            <div class="form-group">
                    <?php // echo $form->labelEx($model,'salt_password'); ?>
                    <?php // echo $form->textField($model,'salt_password',array('class'=>'form-control', 'size'=>60,'maxlength'=>150)); ?>
                    <?php // echo $form->error($model,'salt_password'); ?>
            </div>
    -->

            <div class="form-group">
                    <?php echo $form->labelEx($model,'user_password'); ?>
                    <?php echo $form->passwordField($model,'user_password',array('class'=>'form-control', 'size'=>60,'maxlength'=>150)); ?>
                    <?php echo $form->error($model,'user_password'); ?>
            </div>

            <p class="note">Fields with <span class="required">*</span> are required.</p>

            <div class="form-group">
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary btn-block btn-flat')); ?>
            </div>

    <?php $this->endWidget(); ?>
    </div>
</div><!-- form -->