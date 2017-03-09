<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>BaseModel::label()['AdminUsersList'], 'url'=>array('index')),
	array('label'=>BaseModel::label()['AdminUsersUpdate'], 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);

//$this->widget('zii.widgets.CDetailView', array(
//	'data'=>$model,
//	'attributes'=>array(
//		'id',
//		'user_type',
//		'sup_user',
//		'user_name',
//		'user_surname',
//		'user_email',
//		'salt_password',
//		'user_password',
//	),
//));
?>

<div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="<?php echo Yii::app()->request->baseUrl."/".BaseModel::getAvatarUserID($model->id); ?>" alt="User profile picture">
          
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
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->