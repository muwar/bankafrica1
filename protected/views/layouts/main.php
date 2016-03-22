<?php /* @var $this Controller */ ?>
<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">-->
<!DOCTYPE html>
<!--<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">-->
<html lang="en">
    <head>
        <!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />-->

        <meta charset="utf-8"></meta>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"></meta>
        <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
        <meta name="description" content=""></meta>
        <meta name="author" content="NGT Team"></meta>

        <!-- blueprint CSS framework -->
        <!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />-->
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->

        <!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower-components/js/bootstrap.min.js" type="text/javascript"></script>-->
        <!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-2.1.4.js"></script>-->

        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.7.1.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/msdropdown/jquery.dd.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/msdropdown/jquery.dd.min.js"></script>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/msdropdown/dd.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/msdropdown/flags.css" />

        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/bootstrap/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/metisMenu/dist/metisMenu.min.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/extras/dist/css/timeline.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/extras/dist/css/sb-admin-2.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/intl-tel-input-master/build/css/intlTelInput.css" />
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.table2excel.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/metisMenu/dist/metisMenu.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/raphael/raphael-min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/dist/js/sb-admin-2.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
        <!-- Page-Level Demo Scripts - Tables - Use for reference -->




        <!-------linking for dailling codes and country flags------------------->
    <!--    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>  -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/intl-tel-input-master/build/js/intlTelInput.min.js"></script>
        <script>
            $("#mobile-number").intlTelInput();
        </script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.table2excel.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.table2excel.min.js"></script>

        <link href="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
                <!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />-->


        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <?php
    $detusers = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
    foreach ($detusers as $detuser)
        ;
    $detprofs = Evprof::model()->findAll('id=:x', array(':x' => $detuser->pro));
    foreach ($detprofs as $detprof)
        ;
    $userprofile = $detprof->lib;
    ?>

    <body>
        <input type='hidden' id='url' align='center' value="<?php echo $_SERVER["HTTP_HOST"]; ?>" style='background: white'/>
       <!--        <input type="hidden" id="url" value="<?php echo $_SERVER['HTTP_HOST']; ?>"   --->
        <div class="row">
            <div class="col-md-12">
                <div id="wrapper">

                    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <image class="img-circle" height="60" width="200" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.gif" alt="logo"/>
                            <a class="navbar-brand" href="#" style="margin-bottom: 0">

                                N.G.C Admin v1.0
                            </a>
                        </div>
                        <!-- /.navbar-header -->


                        <ul class="nav navbar-top-links navbar-right">
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                                </a>                                
                                <ul class="dropdown-menu dropdown-messages">
                                    <li>
                                        <a href="#">
                                            <div>
                                                <strong>Olouge Eya</strong>
                                                <span class="pull-right text-muted">
                                                    <em>Yesterday</em>
                                                </span>
                                            </div>
                                            <div>Hi, tried reaching you to no avail. What's up?...</div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <div>
                                                <strong>Ndode Ngole Eya</strong>
                                                <span class="pull-right text-muted">
                                                    <em>Yesterday</em>
                                                </span>
                                            </div>
                                            <div>Did you receive my replies of yesterday? I finally met Mandy...</div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <div>
                                                <strong>Ngole Moses Ajebe</strong>
                                                <span class="pull-right text-muted">
                                                    <em>Yesterday</em>
                                                </span>
                                            </div>
                                            <div>Elder brother how can I start writing codes in C Language?...</div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a class="text-center" href="#">
                                            <strong>Read All Messages</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                                <!-- /.dropdown-messages -->
                            </li>
                            <!-- /.dropdown -->
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-tasks">
                                    <li>
                                        <a href="#">
                                            <div>
                                                <p>
                                                    <strong>Task 1</strong>
                                                    <span class="pull-right text-muted">40% Complete</span>
                                                </p>
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                        <span class="sr-only">40% Complete (success)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <div>
                                                <p>
                                                    <strong>Task 2</strong>
                                                    <span class="pull-right text-muted">20% Complete</span>
                                                </p>
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <div>
                                                <p>
                                                    <strong>Task 3</strong>
                                                    <span class="pull-right text-muted">60% Complete</span>
                                                </p>
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                        <span class="sr-only">60% Complete (warning)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <div>
                                                <p>
                                                    <strong>Task 4</strong>
                                                    <span class="pull-right text-muted">80% Complete</span>
                                                </p>
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                        <span class="sr-only">80% Complete (danger)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a class="text-center" href="#">
                                            <strong>See All Tasks</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                                <!-- /.dropdown-tasks -->
                            </li>
                            <!-- /.dropdown -->
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-alerts">
                                    <li>
                                        <a href="#">
                                            <div>
                                                <i class="fa fa-comment fa-fw"></i> New Comment
                                                <span class="pull-right text-muted small">4 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <div>
                                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                                <span class="pull-right text-muted small">12 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <div>
                                                <i class="fa fa-envelope fa-fw"></i> Message Sent
                                                <span class="pull-right text-muted small">4 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <div>
                                                <i class="fa fa-tasks fa-fw"></i> New Task
                                                <span class="pull-right text-muted small">4 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <div>
                                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                                <span class="pull-right text-muted small">4 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a class="text-center" href="#">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                                <!-- /.dropdown-alerts -->
                            </li>
                            <!-- /.dropdown -->
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <!--<a href="login.html"><i class="fa fa-sign-out fa-fw"></i> 
                                            Logout</a>-->

                                        <?php
                                        echo CHtml::link("<i class='fa fa-sign-out fa-fw'></i>Logout", array('/site/logout'));
                                        ?>
                                    </li>
                                </ul>
                                <!-- /.dropdown-user -->
                            </li>

                            <li>
                                <form  class="form-inline" role="form">
                                    <!--<label for="name">Select language</label>-->
                                    <select class="form-control">
                                        <option>Select Language</option>
                                        <option>English</option>
                                        <option>French</option>
                                    </select>
                                </form>
                            </li>
                            <li>
                                <form  class="form-control" role="form">
                                    <?php echo CHtml::dropDownList('investmttype', 'id_countries', CHtml::listData(Countries::model()->findAll('id_countries=:w or id_countries=:x or id_countries=:y or id_countries=:z ',array(':w'=>38,':x'=>81,':y'=>110,':z'=>154)), 'id_countries', 'name'), array('empty' => 'Select a country')); ?>
                                </form>
                            </li>
                            <li>

                                <?php
                                if (($detprof->lib == 'admin') || ($detprof->lib == 'Admin') || ($detprof->lib == 'ADMIN') || ($detprof->lib == 'administrator') || ($detprof->lib == 'Administrator') || ($detprof->lib == 'ADMINISTRATOR'))
                                    echo CHtml::link('Admin panel', array('/adminS5F1T6P0'));
                                ?>
                            </li>
                            <li>
                                <?php
                                if (Yii::app()->user->isGuest)
                                    echo CHtml::link('SIGNUP', array('/users/create'), array('onclick' => '$("#signup").dialog("open"); return false;'));
                                else {
                                    $users = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
                                    foreach ($users as $user)
                                        ;

                                    echo CHtml::link('Profile', array('/site/profile'));
                                }
                                ?>		
                            </li>
                            <!-- /.dropdown -->

                        </ul>
                        <!-- /.navbar-top-links -->
                        <div class="row">
                            <div class="navbar-default sidebar" role="navigation">
                                <div class="sidebar-nav navbar-collapse">
                                    <ul class="nav" id="side-menu">
                                        <li class="sidebar-search">
                                            <div class="input-group custom-search-form">
                                                <input type="text" class="form-control" placeholder="Search...">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="button">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </li>

                                        <li>
                                            <?php
                                            echo CHtml::link("<i class='fa fa-dashboard fa-fw'></i> Dashboard", array('/site/index'));
                                            ?>
                                        </li>
                                        <?php
                                        if (($userprofile == 'Personal') || ($userprofile == 'Investor') || ($userprofile == 'Personal') || ($userprofile == 'Businesses/Institutions')) {
                                            ;
                                        } else {
                                            ?>

                                            <li>
                                                <?php echo CHtml::link("<i class='fa fa-table fa-fw'></i>Inter-Bank Lending<span class='fa arrow'></span>", array('/ibl'));
                                                ?>
                                                <ul class="nav nav-second-level">
                                                    <li>
                                                        <?php
                                                        echo CHtml::link("<i class='fa fa-table fa-fw'></i> Rates<span class='fa arrow'></span>", array('/ibl'));
                                                        ?>                                              
                                                    </li>
                                                        <?php
                                                        if (Yii::app()->user->isGuest)
                                                            ;
                                                        else {
                                                            ?>
                                                        <li>
                                                        <?php
                                                        if ($userprofile == 'Administrator') {
                                                            ;
                                                        } else {
                                                            echo CHtml::link("<i class='fa fa-table fa-fw'></i>Configuration/requests<span class='fa arrow'></span>", array('/ibl/default/business'));
                                                        }
                                                        ?>
                                                        </li>
                                                        <?php } ?>
                                                </ul>
                                            </li>
                                                <?php } ?>
                                        <li>
                                        <?php
                                        echo CHtml::link("<i class='fa fa-table fa-fw'></i>Fixed Deposit Rates<span class='fa arrow'></span>", array('/fdr'));
                                        ?>

                                            <ul class="nav nav-second-level">
                                                <li>
<?php
echo CHtml::link("<i class='fa fa-table fa-fw'></i> Rates<span class='fa arrow'></span>", array('/fdr'));
?>
                                                </li>

                                                    <?php
                                                    if (Yii::app()->user->isGuest)
                                                        ;
                                                    else {
                                                        ?>
                                                    <li>
                                                    <?php
                                                    if (($userprofile == 'Administrator') || ($userprofile == 'Personal') || ($userprofile == 'Investor') || ($userprofile == 'Businesses/Institutions')) {
                                                        ;
                                                    } else {

                                                        echo CHtml::link("<i class='fa fa-table fa-fw'></i>Configuration/Requests<span class='fa arrow'></span>", array('/fdr/default/business'));
                                                    }
                                                    ?>
                                                    </li>
                                                    <?php } ?>
                                            </ul>
                                        </li>
                                        <li>
<?php
echo CHtml::link("<i class='fa fa-table fa-fw'></i>Bulk Placement<span class='fa arrow'></span>", array('/bulkplacement'));
?>

                                            <ul class="nav nav-second-level">
                                                <li>
<?php
echo CHtml::link("<i class='fa fa-table fa-fw'></i> Rates<span class='fa arrow'></span>", array('/bulkplacement'));
?>
                                                </li>

                                                    <?php
                                                    if (Yii::app()->user->isGuest)
                                                        ;
                                                    else {
                                                        ?>
                                                    <li>
                                                    <?php
                                                    if (($userprofile == 'Administrator') || ($userprofile == 'Personal') || ($userprofile == 'Investor') || ($userprofile == 'Businesses/Institutions')) {
                                                        ;
                                                    } else {

                                                        echo CHtml::link("<i class='fa fa-table fa-fw'></i>Configuration/Requests<span class='fa arrow'></span>", array('/bulkplacement/default/business'));
                                                    }
                                                    ?>
                                                    </li>
                                                    <?php } ?>
                                            </ul>
                                        </li>
                                        <li>
<?php
echo CHtml::link("<i class='fa fa-table fa-fw'></i>Com Borrowing Rates<span class='fa arrow'></span>", array('/cbr'));
?>
                                            <ul class="nav nav-second-level">
                                                <li>
                                            <?php
                                            echo CHtml::link("<i class='fa fa-table fa-fw'></i>Rates<span class='fa arrow'></span>", array('/cbr'));
                                            ?>
                                                </li>

                                                    <?php
                                                    if (Yii::app()->user->isGuest)
                                                        ;
                                                    else {
                                                        ?>
                                                    <li>
                                                    <?php
                                                    if (($userprofile == 'Administrator') || ($userprofile == 'Personal') || ($userprofile == 'Investor') || ($userprofile == 'Businesses/Institutions')) {
                                                        ;
                                                    } else {

                                                        echo CHtml::link("<i class='fa fa-table fa-fw'></i>Configuration<span class='fa arrow'></span>", array('/cbr/default/business'));
                                                    }
                                                    ?>
                                                    </li>
                                                    <?php } ?>
                                            </ul>
                                        </li>

                                        <li>
<?php
echo CHtml::link("<i class='fa fa-table fa-fw'></i>Corporate Finance<span class='fa arrow'></span>", array('/cf'));
?>
                                            <ul class="nav nav-second-level">
                                                <li>
                                            <?php
                                            echo CHtml::link("<i class='fa fa-table fa-fw'></i>Investment Opportunitiess<span class='fa arrow'></span>", array('/cf'));
                                            ?>

                                                </li>
                                                <li>
                                                    <?php
                                                    if ($userprofile == 'Administrator') {
                                                        ;
                                                    } else {

                                                        echo CHtml::link("<i class='fa fa-table fa-fw'></i>Entrepreneurs/Companies<span class='fa arrow'></span>", array('/cf/default/business'));
                                                    }
                                                    ?>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                                    <?php
                                                    echo CHtml::link("<i class='fa fa-table fa-fw'></i>Securities Trading<span class='fa arrow'></span>", array('/st'));
                                                    ?>
                                            <ul class="nav nav-second-level">
                                                <li>
                                            <?php
                                            echo CHtml::link("<i class='fa fa-table fa-fw'></i>Listed Securities<span class='fa arrow'></span>", array('/st'));
                                            ?>
                                                </li>

                                                    <?php
                                                    if (Yii::app()->user->isGuest)
                                                        ;
                                                    else {
                                                        ?>
                                                    <li>
                                                    <?php
                                                    if ($userprofile == 'Administrator') {
                                                        ;
                                                    } else {

                                                        echo CHtml::link("<i class='fa fa-table fa-fw'></i>List and Manage Financial Securities<span class='fa arrow'></span>", array('/st/default/business'));
                                                    }
                                                    ?>
                                                    </li>
                                                    <?php } ?>
                                            </ul>
                                        </li>
                                        <li>
                                                    <?php echo CHtml::link("<i class='fa fa-table fa-fw'></i>Electronic Banking<span class='fa arrow'></span>", array('/st')); ?>
                                            <ul class="nav nav-second-level">
                                                <li>
                                                <?php echo CHtml::link("<i class='fa fa-table fa-fw'></i>Electronic Banking<span class='fa arrow'></span>", array('/eb')); ?>                                                   
                                                </li>

                                                <li>
                                            <?php echo CHtml::link("<i class='fa fa-table fa-fw'></i>Electronic Banking<span class='fa arrow'></span>", array('/eb')); ?>                                                   
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
<?php echo CHtml::link("<i class='fa fa-table fa-fw'></i>Reliability Analysis<span class='fa arrow'></span>", array('/ra')); ?>                                                    
                                        </li>

<?php
if (Yii::app()->user->isGuest)
    ;
else {
    $users = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
    foreach ($users as $user)
        ;
    $profiles = Evprof::model()->findAll('pro=:x', array(':x' => $user->pro));
    foreach ($profiles as $profile)
        ;
    if ((Yii::app()->user->name == 'admin') || ($profile->pro == 'admin')) {
        
    }
    ?>
                                            <li>
                                                <a href="tables.html"><i class="fa fa-table fa-fw"></i>Settings<span class="fa arrow"></span></a>
                                                <ul class="nav nav-second-level">
                                                    <li>
                                            <?php echo CHtml::link('Set profiles', array('profiles/admin')); ?>
                                                    </li>
                                                    <li>
    <?php echo CHtml::link('User Accounts', array('#')); ?>
                                                    </li>
                                                    <li>
                                                        <?php echo CHtml::link('Professions', array('#')); ?>
                                                    </li>
                                                </ul>
                                            </li>
                                                    <?php } ?>
                                    </ul>
                                </div>
                                <!-- /.sidebar-collapse -->
                            </div>
                            <!-- /.navbar-static-side -->
                    </nav>


                    <nav class="navbar navbar-default" role="navigation"><!-- navbar-static-top-->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="navbar-collapse"><!--class="container" align="center" style="color:#ffd700;" style="height:auto; width:auto; "-->
<?php
$this->widget('zii.widgets.CMenu', array(
    'items' => array(
        array('label' => 'HOME', 'url' => array('/site/index'), 'htmlOptions' => array('role' => 'presentation')),
        array('label' => 'HOW IT WORKS', 'url' => array('/site/page', 'view' => 'howto'), 'htmlOptions' => array('role' => 'presentation')),
        array('label' => 'ABOUT US', 'url' => array('/site/page', 'view' => 'about'), 'htmlOptions' => array('role' => 'presentation')),
        array('label' => 'CONTACT US', 'url' => array('/site/contact'), 'htmlOptions' => array('role' => 'presentation')),
        array('label' => 'LOGIN', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest, 'htmlOptions' => array('role' => 'presentation')),
        array('label' => 'LOGOUT (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest, 'htmlOptions' => array('role' => 'presentation'))
    ),
    'htmlOptions' => array('class' => "nav navbar-nav navbar-right")//nav nav-pills nav-justified
        )
);
?>
                        </div>
                    </nav>
                            <?php echo $content; ?>
                </div><!-- wrapper -->
            </div>
        </div>


    </body>
</html>
