<?php

?>
<div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/img/user4-128x128.jpg" alt="User profile picture">

          <h3 class="profile-username text-center"><?php echo $profile['user_surname'].', '.$profile['user_name']; ?></h3>
          <?php
            if(Yii::app()->user->isAdmin() == 1){
                echo '<p class="text-muted text-center">Admin User</p>';
            }
            else{
                echo '<p class="text-muted text-center">Owner User</p>';
            }
          ?>
          <a href="#" class="btn btn-primary btn-block"><i class="fa fa-picture-o" ></i> &nbsp;&nbsp;<b> Change Picture</b></a>
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
                        if(isset($profile->infousers->birthdate) || isset($profile->infousers->City) || isset($profile->infousers->State)){
                            echo '<!-- timeline time label -->';
                            echo '<li class="time-label">';
                                echo '<span class="bg-red">'.User::label()['titleExtraInfo'].'</span>';
                            echo '</li>';
                            echo '<!-- /.timeline-label -->';
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
                                                    width="450" height="450" frameborder="0" style="border:0"
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
            <?php
                  if(isset($profile->attributes)) var_dump($profile->attributes);
                  if(isset($profile->infousers)) var_dump($profile->infousers->attributes);
                  if(isset($profile->userType)) var_dump($profile->userType->attributes);
            ?>
            <form class="form-horizontal">
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Name</label>

                <div class="col-sm-10">
                  <input type="email" class="form-control" id="inputName" placeholder="Name">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-10">
                  <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Name</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputName" placeholder="Name">
                </div>
              </div>
              <div class="form-group">
                <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                <div class="col-sm-10">
                  <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-danger">Submit</button>
                </div>
              </div>
            </form>
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