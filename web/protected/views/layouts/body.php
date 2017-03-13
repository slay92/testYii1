<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo CHtml::encode(Yii::app()->name); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/dist/css/AdminLTE.min.css">
  <!--<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/dist/css/skins/skin-blue.min.css">-->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/dist/css/skins/skin-black.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- SWAL2 -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/swal2/sweetalert2.min.css">
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/swal2/sweetalert2.min.js"></script>
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the desired effect
|-------------------------------------------------------------------------------------|
| SKINS | skin-blue, skin-black, skin-purple, skin-yellow, skin-red, skin-green       |
|-------------------------------------------------------------------------------------|
|LAYOUT OPTIONS | fixed, layout-boxed, layout-top-nav, sidebar-collapse, sidebar-mini |
|-------------------------------------------------------------------------------------|
-->
<body class="hold-transition skin-black fixed">
<div class="wrapper">
  <!-- Main Header -->
  <header class="main-header">
    <?php
        include Yii::app()->getViewPath().'/layouts/header.php';
    ?> 
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <?php
            include Yii::app()->getViewPath().'/layouts/menuLeft.php';
        ?>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<!--    
    <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>
-->

    <!-- Main content -->
    <section class="content">
    <?php
        echo $content;
    ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        <?php echo Yii::powered(); ?>
        <?php echo BaseModel::label()['based']; ?> <a href="https://almsaeedstudio.com/">AdminLTE Template</a>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#"><?php echo CHtml::encode(Yii::app()->name); ?></a>.</strong> <?php echo BaseModel::label()['rights']; ?>
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 2.2.3 -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/js/bootstrap.min.js"></script>

<?php
    $url = Yii::app()->getRequest()->getPathInfo();
    $url = explode('/', $url);
    if($url[0] == 'user'){
        echo '<!-- Morris.js charts -->';
        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>';
        echo '<script src="'.Yii::app()->theme->baseUrl.'/plugins/morris/morris.min.js"></script>';
        echo '<!-- FastClick -->';
        echo '<script src="'.Yii::app()->theme->baseUrl.'/plugins/fastclick/fastclick.js"></script>';
        echo '<!-- AdminLTE App -->';
        echo '<script src="'.Yii::app()->theme->baseUrl.'/dist/js/app.min.js"></script>';
        echo '<!-- AdminLTE for demo purposes -->';
        echo '<script src="'.Yii::app()->theme->baseUrl.'/dist/js/demo.js"></script>';
        echo <<<HTML
            <!-- page script -->
            <script>
            $(function () {
              "use strict";
              //DONUT CHART
              var donut = new Morris.Donut({
                element: 'sales-chart',
                resize: true,
                colors: ["#3c8dbc", "#f56954"],
                data: [
                  {label: "Free Space", value: 99},
                  {label: "Space", value: 1}
                ],
                hideHover: 'auto'
              });
            });
          </script>
HTML;
    }
    else if($url[1] = 'contact'){
        echo '<!-- Bootstrap WYSIHTML5 -->';
        echo '<script src="'.Yii::app()->theme->baseUrl.'/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>';
        echo '<!-- AdminLTE App -->';
        echo '<script src="'.Yii::app()->theme->baseUrl.'/dist/js/app.min.js"></script>';
        echo '<script>
                $(function () {
                  //Add text editor
                  $("#compose-textarea").wysihtml5();
                });
              </script>';
    }
    else {
        echo '<!-- AdminLTE App -->';
        echo '<script src="'.Yii::app()->theme->baseUrl.'/dist/js/app.min.js"></script>';
    }
?>
<!-- SlimScroll -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/fastclick/fastclick.js"></script>

</body>
</html>