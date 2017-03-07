<!-- search form (Optional) -->
<!--
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
-->
<!-- /.search form -->

<ul class="sidebar-menu">
    <li class="active"><a href="<?php echo Yii::app()->homeUrl; ?>/site/index"><i class="fa fa-home"></i> <span><?php echo BaseModel::label()['startPage']; ?></span></a></li>
<!--    
    <li class="header"><?php echo BaseModel::label()['titleDevices']; ?></li>
-->
    <li class="header"><?php echo BaseModel::label()['titleManage']; ?></li>
        <?php        
            if(Yii::app()->user->isAdmin() == 1){
                echo '<li class="treeview">';
                    echo '<a href="#"><i class="fa fa-gears"></i> <span>'.BaseModel::label()['titleAdmin'].'</span>';
                        echo '<span class="pull-right-container">';
                          echo '<i class="fa fa-angle-left pull-right"></i>';
                        echo '</span>';
                    echo '</a>';
                    echo '<ul class="treeview-menu">';
                    
                        echo '<li>';
                            echo '<a href="#"><i class="fa fa-child"></i> '.BaseModel::label()['AdminUsers'];
                                echo '<span class="pull-right-container">';
                                    echo '<i class="fa fa-angle-left pull-right"></i>';
                                echo '</span>';
                            echo '</a>';
                            echo '<ul class="treeview-menu">';
                                echo '<li><a href="'.Yii::app()->homeUrl.'/user/"><i class="fa fa-users "></i> '.BaseModel::label()['AdminUsersList'].'</a></li>';
                                echo '<li><a href="'.Yii::app()->homeUrl.'/user/admin"><i class="fa fa-user-plus"></i> '.BaseModel::label()['AdminUsersAdd'].'</a></li>';
                                echo '<li><a href="'.Yii::app()->homeUrl.'/user/create"><i class="fa fa-wrench"></i> '.BaseModel::label()['AdminUsersManage'].'</a></li>';
                            echo '</ul>';
                        echo '</li>';
                    
                    echo '</ul>';
                echo '</li>';
            }
        ?>
    
    <li><a href="<?php echo Yii::app()->homeUrl; ?>/site/contact"><i class="fa fa-mail-forward"></i> <span><?php echo BaseModel::label()['contact']; ?></span></a></li>
    
    <?php
        if(Yii::app()->user->isGuest){
            //No hauria de sortir
            echo '<li><a href="'.Yii::app()->homeUrl.'/site/login"><i class="fa fa-sign-in"></i> <span>'.BaseModel::label()['login'].'</span></a></li>'; 
        }
        else{
            echo '<li><a href="'.Yii::app()->homeUrl.'/site/logout"><i class="fa fa-sign-out"></i> <span>'.BaseModel::label()['logout'].'</span></a></li>'; 
        }
    ?>
</ul>