<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" style="width:50%;" src="<?php echo Yii::app()->request->baseUrl."/".BaseModel::getAvatarProfile(); ?>" alt="User profile picture">
            </div>
            <?php
                $form = $this->beginWidget(
                    'CActiveForm',
                    array(
                        'id' => 'upload-form',
                        'enableAjaxValidation' => false,
                        'htmlOptions' => array('enctype' => 'multipart/form-data'),
                    )
                );

                echo '<div class="form-group">';
                    echo $form->labelEx($model, User::label()['changePicture']);
                    echo CHtml::activeFileField($model, 'image', array('class'=>'form-control'));
                    echo $form->error($model,'image');
                echo '</div>';

                echo CHtml::submitButton('Submit', array('class'=>'btn btn-primary btn-block btn-flat'));
                $this->endWidget();
            ?>
        </div>
    </div>
</div>






