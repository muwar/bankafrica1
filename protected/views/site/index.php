<div id="page-wrapper" style="background: gray">
    <?php
    ini_set("SMTP", "ssl://smtp.gmail.com");
    ini_set("smtp_port", "465");
    /* @var $this SiteController */

    $this->pageTitle = Yii::app()->name;
    ?>


    <?php
    if (Yii::app()->user->hasFlash("msg"))
        echo Yii::app()->user->getFlash("msg");
    ?>
    <!-- Header Carousel -->
        
  
</div>
<!-- /#page-wrapper -->