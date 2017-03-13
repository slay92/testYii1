<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>
<h1><?php echo ContactForm::label()['title'];?></h1>

<div class="row">
<!-- /.row -->
    <!-- /.col -->
    <div class="col-md-offset-1 col-md-10">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo ContactForm::label()['newMsg'];?></h3>
              <small style="float: right;"><?php echo BaseModel::label()['required']; ?></small>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'contact-form',
                'enableClientValidation'=>true,
                'clientOptions'=>array(
                        'validateOnSubmit'=>true,
                ),
          )); ?>
          <div class="form-group">
                <?php echo $form->labelEx($model,'name'); ?>
                <?php echo $form->textField($model,'name', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'name'); ?>
          </div>
          <div class="form-group">
                <?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'email'); ?>
          </div>
          <div class="form-group">
                <?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('class'=>'form-control','size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject'); ?>
          </div>
          <div class="form-group">
                <?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('id'=>'compose-textarea', 'class'=>'form-control', 'style'=>'height:300px')); ?>
		<?php echo $form->error($model,'body'); ?>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <div class="pull-left">
            <?php if(CCaptcha::checkRequirements()): ?>
                <div class="form-group">
                    <?php echo $form->labelEx($model,ContactForm::label()['verificationcode']); ?>
                    <?php $this->widget('CCaptcha'); ?>
                    <div class="hint"><?php echo ContactForm::label()['verificationText'];?></div>
                    <?php echo $form->textField($model,'verifyCode', array('class'=>'form-control', 'style'=>'width:300px')); ?>
                    <?php echo $form->error($model,'verifyCode'); ?>
                </div>
            <?php endif; ?>
          </div>
          <div class="pull-right">
            <div class="form-group">
                <?php echo CHtml::submitButton(ContactForm::label()['send'], array('class'=>'btn btn-primary')); ?>
            </div>
          </div>
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- /. box -->
    </div>
    <!-- /.col -->
    <?php $this->endWidget(); ?>
</div>
<!-- /.row -->