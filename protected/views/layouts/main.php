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

        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/msdropdown/dd.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/msdropdown/flags.css" />

        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/bootstrap/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/metisMenu/dist/metisMenu.min.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/extras/dist/css/timeline.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/extras/dist/css/sb-admin-2.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/intl-tel-input-master/build/css/intlTelInput.css" />
        

        <link href="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Orbitron:900' rel='stylesheet' type='text/css'>   
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/validationEngine.jquery.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.flipster.min.css">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <?php
    if (Yii::app()->user->isGuest) {
        
    } else {
        $detusers = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
        foreach ($detusers as $detuser)
            ;
        $detprofs = Evprof::model()->findAll('id=:x', array(':x' => $detuser->pro));
        foreach ($detprofs as $detprof)
            ;
        $userprofile = $detprof->lib;
    }
    ?>

    <body>
        <input type='hidden' id='url' align='center' value="<?php echo $_SERVER["HTTP_HOST"]; ?>" style='background: white'/>
       <!--        <input type="hidden" id="url" value="<?php echo $_SERVER['HTTP_HOST']; ?>"   --->
        <div id="wrapper">
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;">
			<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								
								<a class="navbar-brand" href="#" style="margin-bottom: 0;font-family: 'Orbitron', 'Open Sans';font-size: 25px;"><image height="60" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="logo"/></a>
							</div>
							<!-- /.navbar-header -->
							<ul class="nav navbar-top-links navbar-right">
								
								<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#">
										<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
									</a>
									<ul class="dropdown-menu dropdown-user">
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
									<form  class="form-inline" role="form">
										<?php echo CHtml::dropDownList('investmttype', 'id_countries', CHtml::listData(Countries::model()->findAll('id_countries=:w or id_countries=:x or id_countries=:y or id_countries=:z ', array(':w' => 38, ':x' => 81, ':y' => 110, ':z' => 154)), 'id_countries', 'name'), array('class'=>'form-control', 'empty' => 'Select a country')); ?>
									</form>
								</li>
								<li>

									<?php
									if(Yii::app()->user->isGuest){
										
									}else{
									if (($detprof->lib == 'admin') || ($detprof->lib == 'Admin') || ($detprof->lib == 'ADMIN') || ($detprof->lib == 'administrator') || ($detprof->lib == 'Administrator') || ($detprof->lib == 'ADMINISTRATOR'))
										echo CHtml::link('Admin panel', array('/adminS5F1T6P0'));
									}   ?>
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
						</nav>
		<nav id="menu" class="navbar navbar-default" role="navigation"><!-- navbar-static-top-->
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
		<?php if((Yii::app()->controller->id=='site')&&(Yii::app()->controller->action->id=='login')){   ?>
		
					<div class="body"></div>
					<div class="grad"></div>
                    <article id="center_content">
					<?php echo $content; ?>
		<?php }
		else{ if((Yii::app()->controller->id=='users')&&(Yii::app()->controller->action->id=='create')){ ?>

					<div class="body"></div>
					<div class="grad"></div>
                    <article id="center_content">
					<?php echo $content; ?>
		
	<?php	}else{ ?>
		<?php if((Yii::app()->controller->id=='site')&&(Yii::app()->controller->action->id=='index')){   ?>
		
            <div class="col-md-12">
                <div class="row">
					<div class="body"></div>
					<div class="grad"></div>
                    <article id="center_content" style="margin:0 auto;position:relative;display:block;z-index:999">
						<div class="row" style="padding-top: 3%;">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-body">
										<div class="row text-center">
											<div class="col-md-4">
												<?php echo CHtml::link("<i class='fa fa-table fa-5x'></i> <br/>Inter-Bank Lending", array('/ibl')); ?>
											</div>
											
											<div class="col-md-4">
												<?php echo CHtml::link("<i class='fa fa-table fa-5x'></i> <br/>Fixed Deposit Rates", array('/fdr')); ?>
											</div>
											
											<div class="col-md-4">
												<?php echo CHtml::link("<i class='fa fa-table fa-5x'></i> <br/>Bulk Placement", array('/bulkplacement')); ?>
											</div>
										</div>
										
										<div style="padding:20px;"></div>
										<br/>
										<div class="row text-center">
											<div class="col-md-4">
												<?php echo CHtml::link("<i class='fa fa-table fa-5x'></i> <br/>Com Borrowing Rates", array('/cbr')); ?>
											</div>
											
											<div class="col-md-4">
												<?php echo CHtml::link("<i class='fa fa-table fa-5x'></i> <br/>Corporate Finance", array('/cf')); ?>
											</div>
											
											<div class="col-md-4">
												<?php echo CHtml::link("<i class='fa fa-table fa-5x'></i> <br/>Securities Trading", array('/st')); ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
<br/>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
						<!--
							<div class="row" style="padding-top: 3%;">
							<article id="demo-default" class="demo">
								<div id="coverflow">
									<ul class="flip-items">
										<li data-flip-title="Red">
											<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/text1.gif">
										</li>
										<li data-flip-title="Razzmatazz" data-flip-category="Purples">
											<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/text2.gif">
										 </li>
										<li data-flip-title="Deep Lilac" data-flip-category="Purples">
											<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/text3.gif">
										</li>
										<li data-flip-title="Daisy Bush" data-flip-category="Purples">
											<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/text4.gif">
										</li>
										<li data-flip-title="Cerulean Blue" data-flip-category="Blues">
											<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/text5.gif">
										</li>
										<li data-flip-title="Dodger Blue" data-flip-category="Blues">
											<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/text6.gif">
										</li>
										<li data-flip-title="Cyan" data-flip-category="Blues">
											<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/text7.gif">
										</li>
										<li data-flip-title="Robin's Egg" data-flip-category="Blues">
											<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/text8.gif">
										</li>
										<li data-flip-title="Deep Sea" data-flip-category="Greens">
											<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/text9.gif">
										</li>
										<li data-flip-title="Apple" data-flip-category="Greens">
											<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/text10.gif">
										</li>
									</ul>
								</div>
							</article>	
						</div>	
					-->
					</article>
                </div><!-- wrapper -->
            </div>
        
		<?php  }else { ?>
		<aside id="left_content">
                        <!-- /.navbar-top-links -->
                        <div class="content">
                            <div class="navbar-default sidebar" role="navigation" style="margin-top: 0;">
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
                                            echo CHtml::link("<i class='fa fa-dashboard fa-fw'></i> Dashboard<span class='fa arrow'></span>", array('/site/index'));
                                            ?>
                                        </li>
                                        <?php
										if(Yii::app()->user->isGuest){
											
										}else{
                               
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
											<?php } 
										}
                                        ?>
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
													if(Yii::app()->user->isGuest){
                                    
													}else{
														if ($userprofile == 'Administrator') {
															;
														} else {
															echo CHtml::link("<i class='fa fa-table fa-fw'></i>Entrepreneurs/Companies<span class='fa arrow'></span>", array('/cf/default/business'));
														}
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
											if(count($profiles)==0){
                                           
											}else{
												foreach ($profiles as $profile)
													;
												if ((Yii::app()->user->name == 'admin') || ($profile->pro == 'admin')) {
                                                
												}
											}
                                            ?>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <!-- /.sidebar-collapse -->	
                            </div>
                            <!-- /.navbar-static-side -->	
						</div>
                    </aside>
					
					<div class="body"></div>
					<div class="grad"></div>
                    <article id="center_content">
					<?php echo $content; ?>
		
		<?php  }
}	
}
	?>
		
		</div>

		<!-- jQuery -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.7.1.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/msdropdown/jquery.dd.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/msdropdown/jquery.dd.min.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.table2excel.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/metisMenu/dist/metisMenu.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/raphael/raphael-min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/dist/js/sb-admin-2.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
		<!-- Page-Level Demo Scripts - Tables - Use for reference -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/intl-tel-input-master/build/js/intlTelInput.min.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.validationEngine.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.validationEngine-fr.js"></script>
		<script>
			$("#mobile-number").intlTelInput();
		</script>
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.table2excel.min.js"></script><!-- Page-Level Demo Scripts - Tables - Use for reference -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.flipster.min.js"></script>
		<script>
			var coverflow = $("#coverflow").flipster();
		</script>
		<script>
			$(document).ready(function() {
				$('#dataTables-example').DataTable({
					responsive: true
				});
				
				// INITIALISER LE CONTROLE DES CHAMPS
				$("#contact-us").validationEngine();
		
				// VALIDATION DU FORMULAIRE
				$('#Btn_Send').click(function(){
					var controlForm = $("#contact-us").validationEngine('validate');			
					if(controlForm){
						$("#contact-us").submit();
					}
				});
			});
		</script>
		    <!-- ClickDesk Live Chat Service for websites -->
<script type='text/javascript'>
var _glc =_glc || []; _glc.push('all_ag9zfmNsaWNrZGVza2NoYXRyDwsSBXVzZXJzGKrup98TDA');
var glcpath = (('https:' == document.location.protocol) ? 'https://my.clickdesk.com/clickdesk-ui/browser/' : 
'http://my.clickdesk.com/clickdesk-ui/browser/');
var glcp = (('https:' == document.location.protocol) ? 'https://' : 'http://');
var glcspt = document.createElement('script'); glcspt.type = 'text/javascript'; 
glcspt.async = true; glcspt.src = glcpath + 'livechat-new.js';
var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(glcspt, s);
</script>
<!-- End of ClickDesk -->

    </body>
</html>
