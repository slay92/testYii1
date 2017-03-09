<!-- Logo -->
<a href="<?php echo Yii::app()->homeUrl; ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><?php echo Yii::app()->params['logo-mini']; ?></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><?php echo Yii::app()->params['logo-lg']; ?></span>
</a>

<!-- Header Navbar -->
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <?php if(!Yii::app()->user->isGuest){ ?>
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <!--BaseModel::getAvatarProfile()-->
                <img src="<?php echo Yii::app()->request->baseUrl."/".BaseModel::getAvatarProfile(); ?>" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">
                    <?php echo BaseModel::showNameOrNickname();?>
                </span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="<?php echo Yii::app()->request->baseUrl."/".BaseModel::getAvatarProfile(); ?>" class="img-circle" alt="User Image">
                  <p>
                      <?php echo Yii::app()->user->name; ?>
                  </p>
                </li>
                <li class="user-footer">
                  <div class="pull-left">
                      <a href="<?php echo Yii::app()->homeUrl; ?>/user/profile" class="btn btn-default btn-flat"><?php echo BaseModel::label()['headerProfile']; ?></a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo Yii::app()->homeUrl; ?>/site/logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i><?php echo BaseModel::label()['headerLogout']; ?></a>
                  </div>
                </li>
              </ul>
            </li>
        <?php } ?>
        </ul>
    </div>
</nav>