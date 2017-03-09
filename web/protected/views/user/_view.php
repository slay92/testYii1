<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="col-md-2">
    <!-- Profile Image -->
    <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="<?php echo Yii::app()->request->baseUrl."/".BaseModel::getAvatarUserID($data->id); ?>" alt="User profile picture">
            <h3 class="profile-username text-center"><?php echo CHtml::encode($data->user_name); ?>, <?php echo CHtml::encode($data->user_surname); ?></h3>
            <?php echo CHtml::link(User::label()['viewUser'], array('view', 'id'=>$data->id), array('class'=>'btn btn-primary btn-block btn-flat')); ?>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
    

<!--
<div class="view">
	<b><?php // echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php // echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php // echo CHtml::encode($data->getAttributeLabel('user_type')); ?>:</b>
	<?php // echo CHtml::encode($data->user_type); ?>
	<br />

	<b><?php // echo CHtml::encode($data->getAttributeLabel('sup_user')); ?>:</b>
	<?php // echo CHtml::encode($data->sup_user); ?>
	<br />

	<b><?php // echo CHtml::encode($data->getAttributeLabel('user_name')); ?>:</b>
	<?php // echo CHtml::encode($data->user_name); ?>
	<br />

	<b><?php // echo CHtml::encode($data->getAttributeLabel('user_surname')); ?>:</b>
	<?php // echo CHtml::encode($data->user_surname); ?>
	<br />

	<b><?php // echo CHtml::encode($data->getAttributeLabel('user_email')); ?>:</b>
	<?php // echo CHtml::encode($data->user_email); ?>
	<br />
        
	<b><?php // echo CHtml::encode($data->getAttributeLabel('salt_password')); ?>:</b>
	<?php // echo CHtml::encode($data->salt_password); ?>
	<br />

	<b><?php // echo CHtml::encode($data->getAttributeLabel('user_password')); ?>:</b>
	<?php // echo CHtml::encode($data->user_password); ?>
	<br />

</div>-->