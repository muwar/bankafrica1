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
						
					</article>
                </div><!-- wrapper -->
            </div>
        
		<?php  }else { ?>
		
		
		<?php  } ?>
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
    </body>
</html>
