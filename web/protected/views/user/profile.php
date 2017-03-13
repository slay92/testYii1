<?php
    $avatarIMG = BaseModel::getAvatarProfile();
?>
<div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="<?php echo Yii::app()->request->baseUrl."/".$avatarIMG; ?>" alt="User profile picture">
          
          <?php
            if(isset($profile->infousers->nickname)){
                echo '<h3 class="profile-username text-center">'.$profile->infousers->nickname.'</h3>';
                echo '<p class="text-muted text-center">'.$profile->user_surname.', '.$profile->user_name.'</p>';
            }
            else{
                echo '<h3 class="profile-username text-center">'.$profile->user_surname.', '.$profile->user_name.'</h3>';
            }
            if(Yii::app()->user->isAdmin() == 1){
                echo '<p class="text-muted text-center">'.User::label()['adminUser'].'</p>';
            }
            else{
                echo '<p class="text-muted text-center">'.User::label()['ownerUser'].'</p>';
            }
            
            if($avatarIMG == "uploads/avatars/default.jpg"){
                echo '<a href="'.Yii::app()->homeUrl.'/useravatar/create" class="btn btn-primary btn-block"><i class="fa fa-picture-o" ></i> &nbsp;&nbsp;<b> '.User::label()['changePicture'].'</b></a>';
            }
            else{
                echo '<a href="'.Yii::app()->homeUrl.'/useravatar/update" class="btn btn-primary btn-block"><i class="fa fa-picture-o" ></i> &nbsp;&nbsp;<b> '.User::label()['changePicture'].'</b></a>';
            }
            
          ?>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      
      <!-- About Me Box -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo User::label()['titleSpace']; ?></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="box-body chart-responsive">
                <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#profile" data-toggle="tab"><?php echo User::label()['title']; ?></a></li>
          <li><a href="#editProfile" data-toggle="tab"><?php echo User::label()['titleUpdate']; ?></a></li>
        </ul>
        <div class="tab-content">
          <!-- /.tab-pane -->
          <div class="active tab-pane" id="profile">
                <!-- The Profile timeline -->
                  <ul class="timeline timeline-inverse">
                    <!-- timeline time label -->
                    <li class="time-label">
                        <span class="bg-red"><?php echo User::label()['titleInfoBasic']; ?></span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-user bg-green"></i>
                      <div class="timeline-item">
                        <h3 class="timeline-header"><a href="#"><?php echo User::label()['name']; ?>:</a> <?php echo $profile->user_name; ?></h3>
                        <h3 class="timeline-header"><a href="#"><?php echo User::label()['surname']; ?>:</a> <?php echo $profile->user_surname; ?></h3>
                      </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-envelope bg-green"></i>
                      <div class="timeline-item">
                        <h3 class="timeline-header"><a href="#"><?php echo User::label()['email']; ?>:</a> <?php echo $profile->user_email; ?></h3>
                      </div>
                    </li>
                    <!-- END timeline item -->
                    <?php
                        if(isset($profile->infousers->nickname) || isset($profile->infousers->birthdate) || isset($profile->infousers->City) || isset($profile->infousers->State)){
                            echo '<!-- timeline time label -->';
                            echo '<li class="time-label">';
                                echo '<span class="bg-red">'.User::label()['titleExtraInfo'].'</span>';
                            echo '</li>';
                            echo '<!-- /.timeline-label -->';
                        }
                        if(isset($profile->infousers->nickname)){
                            echo '<!-- timeline item -->';
                            echo '<li>';
                              echo '<i class="fa fa-user bg-green"></i>';
                              echo '<div class="timeline-item">';
                                  echo '<h3 class="timeline-header"><a href="#">'.User::label()['nickname'].':</a> ';
                                     echo $profile->infousers->nickname;
                                  echo '</h3>';
                              echo '</div>';
                            echo '</li>';
                            echo '<!-- END timeline item -->';
                        }
                        if(isset($profile->infousers->birthdate)){
                            echo '<!-- timeline item -->';
                            echo '<li>';
                              echo '<i class="fa fa-birthday-cake bg-green"></i>';
                              echo '<div class="timeline-item">';
                                  echo '<h3 class="timeline-header"><a href="#">'.User::label()['birthdate'].':</a> ';
                                     echo $profile->infousers->birthdate;
                                  echo '</h3>';
                              echo '</div>';
                            echo '</li>';
                            echo '<!-- END timeline item -->';
                        }
                        if( isset($profile->infousers->City) || isset($profile->infousers->State) ){
                            echo '<!-- timeline item -->';
                            echo '<li>';
                              echo '<i class="fa fa-map-marker bg-green"></i>';
                              echo '<div class="timeline-item">';
                                  echo '<h3 class="timeline-header"><a href="#">'.User::label()['location'].'</a></h3>';
                                  echo '<div class="timeline-body">';
                                      if(isset($profile->infousers->City)){
                                        echo '<b>'.User::label()['state'].': </b>';
                                        echo $profile->infousers->City;
                                        echo '<br/>';
                                      }
                                      if(isset($profile->infousers->State)){
                                        echo '<b>'.User::label()['city'].': </b>';
                                        echo $profile->infousers->State;
                                      }
                                  echo '</div>';
                              echo '</div>';
                            echo '</li>';
                            echo '<!-- END timeline item -->';
                        }
                    
                        if( isset($profile->infousers->City) || isset($profile->infousers->State) ){
                            echo '<!-- timeline item -->';
                            echo '<li>';
                              echo '<i class="fa fa-map bg-green"></i>';
                              echo '<div class="timeline-item">';
                                  echo '<h3 class="timeline-header"><a href="#">'.User::label()['map'].'</a></h3>';
                                  echo '<div class="timeline-body">';

                                            $googleKey = Yii::app()->params['googleMaps'];
                                            $location = $profile->infousers->State.','.$profile->infousers->City;
                                            echo '<iframe
                                                    style="width:100%;" height="450" frameborder="0" style="border:0"
                                                    src="https://www.google.com/maps/embed/v1/place?key='.$googleKey.'&q='.$location.'"
                                                    allowfullscreen>
                                            </iframe>';

                                  echo '</div>';
                              echo '</div>';
                            echo '</li>';
                            echo '<!-- END timeline item -->';
                        }
                    ?>
                  </ul>
                <!-- The Profile timeline -->
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane" id="editProfile">
            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'user-form',
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation'=>false,
            )); ?>
              
            <?php echo $form->errorSummary($userData); ?>

            <div class="form-group">
                    <?php echo $form->labelEx($userData,'user_name'); ?>
                    <?php echo $form->textField($userData,'user_name',array('class'=>'form-control', 'size'=>60,'maxlength'=>150)); ?>
                    <?php echo $form->error($userData,'user_name'); ?>
            </div>

            <div class="form-group">
                    <?php echo $form->labelEx($userData,'user_surname'); ?>
                    <?php echo $form->textField($userData,'user_surname',array('class'=>'form-control', 'size'=>60,'maxlength'=>150)); ?>
                    <?php echo $form->error($userData,'user_surname'); ?>
            </div>

            <div class="form-group">
                    <?php echo $form->labelEx($userData,'user_email'); ?>
                    <?php echo $form->textField($userData,'user_email',array('class'=>'form-control', 'size'=>60,'maxlength'=>200)); ?>
                    <?php echo $form->error($userData,'user_email'); ?>
            </div>
              
            <div class="form-group">
                    <?php echo $form->labelEx($userData,'user_password'); ?>
                    <?php echo $form->passwordField($userData,'user_password',array('class'=>'form-control', 'size'=>60,'maxlength'=>150)); ?>
                    <?php echo $form->error($userData,'user_password'); ?>
            </div>
            
            <div class="form-group">
                    <?php echo $form->labelEx($infoUser,'nickname'); ?>
                    <?php echo $form->textField($infoUser,'nickname',array('class'=>'form-control', 'size'=>60,'maxlength'=>150)); ?>
                    <?php echo $form->error($infoUser,'nickname'); ?>
            </div>

            <div class="form-group">
                    <?php echo $form->labelEx($infoUser,'birthdate'); ?>
                    <?php echo $form->textField($infoUser,'birthdate',array('class'=>'form-control' )); ?>
                    <?php echo $form->error($infoUser,'birthdate'); ?>
            </div>

            <div class="form-group">
                    <?php echo $form->labelEx($infoUser,'State'); ?>
                    <?php echo $form->textField($infoUser,'State',array('class'=>'form-control', 'size'=>60,'maxlength'=>150)); ?>
                    <?php echo $form->error($infoUser,'State'); ?>
            </div>

            <div class="form-group">
                    <?php echo $form->labelEx($infoUser,'City'); ?>
                    <?php echo $form->textField($infoUser,'City',array('class'=>'form-control', 'size'=>60,'maxlength'=>150)); ?>
                    <?php echo $form->error($infoUser,'City'); ?>
            </div>
            
            <div class="form-group">
                    <?php echo CHtml::submitButton($infoUser->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary btn-block btn-flat')); ?>
            </div>
            
            <?php $this->endWidget(); ?>
              
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  
<?php
    $avatarModal = Yii::app()->user->getState('avatarStatus');
    if(isset($avatarModal)){
        echo BaseModel::swalModal($avatarModal);
        Yii::app()->user->setState('avatarStatus', NULL);
    }
    if(isset($swalInfoUser)){
        echo BaseModel::swalModal($swalInfoUser);
    }
?>