<?php
$users = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
$customers = Bqcus::model()->findAll('cus=:x', array(':x' => current($users)->id));
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <input type="hidden" value="<?php echo current($users)->id ?>" id="user_id"/>
                <input type="hidden" value="<?php echo current($customers)->identity ?>" id="cus_id"/>
                <div class="panel-heading">
                    <i class="fa fa-th-list"></i>&nbsp;&nbsp;<strong>Profile page for  </strong><?php echo "<i>" . Yii::app()->user->name . "</i>"; ?>
                </div>
                <!-- /.panel-heading -->
                <p align="right"><i class=" fa fa-edit"><?php echo CHtml::link('Edit Profile', array('/users/edit')); ?></i></p>
                <div class="panel-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#home" data-toggle="tab">Personal info</a>
                        </li>
                        <?php if (Evprof::model()->findByPk(current($users)->pro)->lib == "Personal") { ?>
                            <li><a href="#profile" data-toggle="tab">Family info</a>
                            </li>
          
                        <li><a href="#messages" data-toggle="tab">Civic info</a>
                        </li>
                        <?php } ?>
                    </ul>
                    <!-- Tab panes -->
                    <?php if (Evprof::model()->findByPk(current($users)->pro)->lib == "Personal") { ?> 
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="home">
                                <div class="table-responsive">
                                    <table class="table table-striped  table-hover">
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Surname</td>
                                                <?php
                                                if (current($customers)->sur == '') {
                                                    ?>
                                                    <td>Not Provided</td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("sur","")')); ?></i></td>
                                                <?php } else { ?>
                                                    <td><?php echo current($customers)->sur; ?></td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("sur","' . current($customers)->sur . '")')); ?></i></td>
                                                <?php }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Middle Name</td>
                                                <?php
                                                if (current($customers)->mid == '') {
                                                    ?>
                                                    <td>Not Provided</td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("mid","")')); ?></i></td>
                                                <?php } else { ?>
                                                    <td><?php echo current($customers)->mid; ?></td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("mid","' . current($customers)->mid . '")')); ?></i></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Other Names</td>
                                                <?php
                                                if (current($customers)->otn == '') {
                                                    ?>
                                                    <td>Not Provided</td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("otn","")')); ?></i></td>
                                                <?php } else { ?>
                                                    <td><?php echo current($customers)->otn; ?></td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("otn","' . current($customers)->otn . '")')); ?></i></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Gender</td>
                                                <?php
                                                if (current($customers)->sex == '') {
                                                    ?>
                                                    <td>Not Provided</td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("sex","")')); ?></i></td>
                                                <?php } else { ?>
                                                    <td><?php echo current($customers)->sex; ?></td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("sex","' . current($customers)->sex . '")')); ?></i></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Telephone number</td>
                                                <?php
                                                if (current($customers)->telephone == '') {
                                                    ?>
                                                    <td>Not Provided</td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("telephone","")')); ?></i></td>
                                                <?php } else { ?>
                                                    <td><?php echo current($customers)->telephone; ?></td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("telephone","' . current($customers)->telephone . '")')); ?></i></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <?php
                                                if (current($customers)->email == '') {
                                                    ?>
                                                    <td>Not Provided</td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("email","")')); ?></i></td>
                                                <?php } else { ?>
                                                    <td><?php echo current($customers)->email; ?></td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("email","' . current($customers)->email . '")')); ?></i></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Date of Birth</td>
                                                <?php
                                                if (current($customers)->dbir == '') {
                                                    ?>
                                                    <td>Not Provided</td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("dbir","")')); ?></i></td>
                                                <?php } else { ?>
                                                    <td><?php echo date('d/m/Y', strtotime(current($customers)->dbir)); ?></td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("dbir","' . current($customers)->dbir . '")')); ?></i></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Place of Birth</td>
                                                <?php
                                                if (current($customers)->tbir == '') {
                                                    ?>
                                                    <td>Not Provided</td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("tbir","")')); ?></i></td>
                                                <?php } else { ?>
                                                    <td><?php echo date('d/m/Y', strtotime(current($customers)->tbir)); ?></td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("tbir","' . current($customers)->tbir . '")')); ?></i></td>
                                                <?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
    <!--                                <i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();pupdate("general","personal")')); ?></i> -->

                            </div>
                            <div class="tab-pane fade" id="profile">
                                <div class="table-responsive">
                                    <table class="table table-striped  table-hover">
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Mother's name</td>
                                                <?php
                                                if (current($customers)->mna == '') {
                                                    ?>
                                                    <td>Not Provided</td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("mna","")')); ?></i></td>
                                                <?php } else { ?>
                                                    <td><?php echo current($customers)->mna; ?></td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("mna","' . current($customers)->mna . '")')); ?></i></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Father's name</td>
                                                <?php
                                                if (current($customers)->fna == '') {
                                                    ?>
                                                    <td>Not Provided</td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("fna","")')); ?></i></td>
                                                <?php } else { ?>
                                                    <td><?php echo date('d/m/Y', strtotime(current($customers)->fna)); ?></td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("fna","' . current($customers)->fna . '")')); ?></i></td>
                                                <?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="messages">
                                <div class="table-responsive">
                                    <table class="table table-striped  table-hover">
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Profession</td>
                                                <?php
                                                if (current($customers)->pro == '') {
                                                    ?>
                                                    <td>Not Provided</td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("pro","")')); ?></i></td>
                                                <?php } else { ?>
                                                    <td><?php echo current($customers)->pro; ?></td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("pro","' . current($customers)->pro . '")')); ?></i></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Annual Salary</td>
                                                <?php
                                                if (current($customers)->sal == '') {
                                                    ?>
                                                    <td>Not Provided</td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("sal","")')); ?></i></td>
                                                <?php } else { ?>
                                                    <td><?php echo current($customers)->sal; ?></td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("sal","' . current($customers)->sal . '")')); ?></i></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>ID Card Number</td>
                                                <?php
                                                if (current($customers)->id == '') {
                                                    ?>
                                                    <td>Not Provided</td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("id","")')); ?></i></td>
                                                <?php } else { ?>
                                                    <td><?php echo current($customers)->id; ?></td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("id","' . current($customers)->id . '")')); ?></i></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Date of issue</td>
                                                <?php
                                                if (current($customers)->idid == '') {
                                                    ?>
                                                    <td>Not Provided</td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("idid","")')); ?></i></td>
                                                <?php } else { ?>
                                                    <td><?php echo date('d/m/Y', strtotime(current($customers)->idid)); ?></td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("idid","' . current($customers)->idid . '")')); ?></i></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Place of issue</td>
                                                <?php
                                                if (current($customers)->idis == '') {
                                                    ?>
                                                    <td>Not Provided</td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("idis","")')); ?></i></td>
                                                <?php } else { ?>
                                                    <td><?php echo current($customers)->idis; ?></td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("idis","' . current($customers)->idis . '")')); ?></i></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Date of Expiration</td>
                                                <?php
                                                if (current($customers)->ided == '') {
                                                    ?>
                                                    <td>Not Provided</td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("ided","")')); ?></i></td>
                                                <?php } else { ?>
                                                    <td><?php echo date('d/m/Y', strtotime(current($customers)->ided)); ?></td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("ided","' . current($customers)->ided . '")')); ?></i></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Passport Number</td>
                                                <?php
                                                if (current($customers)->psp == '') {
                                                    ?>
                                                    <td>Not Provided</td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("psp","")')); ?></i></td>
                                                <?php } else { ?>
                                                    <td><?php echo current($customers)->psp; ?></td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("psp","' . current($customers)->psp . '")')); ?></i></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Place of issue</td>
                                                <?php
                                                if (current($customers)->pspis == '') {
                                                    ?>
                                                    <td>Not Provided</td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("pspis","")')); ?></i></td>
                                                <?php } else { ?>
                                                    <td><?php echo current($customers)->pspis; ?></td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("pspis","' . current($customers)->pspis . '")')); ?></i></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Date of Issue</td>
                                                <?php
                                                if (current($customers)->pspid == '') {
                                                    ?>
                                                    <td>Not Provided</td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("pspid","")')); ?></i></td>
                                                <?php } else { ?>
                                                    <td><?php echo date('d/m/Y', strtotime(current($customers)->pspid)); ?></td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("pspid","' . current($customers)->pspid . '")')); ?></i></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Date of Expiration</td>
                                                <?php
                                                if (current($customers)->psped == '') {
                                                    ?>
                                                    <td>Not Provided</td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("psped","")')); ?></i></td>
                                                <?php } else { ?>
                                                    <td><?php echo date('d/m/Y', strtotime(current($customers)->psped)); ?></td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("psped","' . current($customers)->psped . '")')); ?></i></td>
                                                <?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <div class="table-responsive">
                                        <table class="table table-striped  table-hover">
                                            <thead>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Official Name</td>
                                                    <?php
                                                    if (current($customers)->rso == '') {
                                                        ?>
                                                        <td>Not Provided</td>
                                                        <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("rso","")')); ?></i></td>
                                                    <?php } else { ?>
                                                        <td><?php echo current($customers)->rso; ?></td>
                                                        <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("rso","' . current($customers)->rso . '")')); ?></i></td>
                                                    <?php }
                                                    ?>
                                                </tr>
                                                
                                                <tr>
                                                    <td>Headquarter</td>
                                                    <?php
                                                    if (current($customers)->town == '') {
                                                        ?>
                                                        <td>Not Provided</td>
                                                        <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("town","")')); ?></i></td>
                                                    <?php } else { ?>
                                                        <td><?php echo current($customers)->town; ?></td>
                                                        <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("town","' . current($customers)->town . '")')); ?></i></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <td>Sector of activity</td>
                                                    <?php
                                                    if (current($customers)->sec == '') {
                                                        ?>
                                                        <td>Not Provided</td>
                                                        <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("sec","")')); ?></i></td>
                                                    <?php } else { ?>
                                                        <td><?php echo current($customers)->sec; ?></td>
                                                        <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("sec","' . current($customers)->sec. '")')); ?></i></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <td>Registration Number</td>
                                                    <?php
                                                    if (current($customers)->breg == '') {
                                                        ?>
                                                        <td>Not Provided</td>
                                                        <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("breg","")')); ?></i></td>
                                                    <?php } else { ?>
                                                        <td><?php echo current($customers)->breg; ?></td>
                                                        <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("breg","' . current($customers)->breg . '")')); ?></i></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <td>Type of Customers</td>
                                                    <?php
                                                    if (current($customers)->tcus == '') {
                                                        ?>
                                                        <td>Not Provided</td>
                                                        <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("tcus","")')); ?></i></td>
                                                    <?php } else { ?>
                                                        <td><?php echo current($customers)->tcus; ?></td>
                                                        <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("tcus","' . current($customers)->tcus . '")')); ?></i></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <td>Tax Payer's Number</td>
                                                    <?php
                                                    if (current($customers)->tpc == '') {
                                                        ?>
                                                        <td>Not Provided</td>
                                                        <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("tpc","")')); ?></i></td>
                                                    <?php } else { ?>
                                                        <td><?php echo current($customers)->tpc; ?></td>
                                                        <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("tpc","' . current($customers)->tpc. '")')); ?></i></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <td>Quality Note</td>
                                                    <?php
                                                    if (current($customers)->qua == '') {
                                                        ?>
                                                        <td>Not Provided</td>
                                                        <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("qua","")')); ?></i></td>
                                                    <?php } else { ?>
                                                        <td><?php echo current($customers)->qua; ?></td>
                                                        <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("qua","' . current($customers)->qua . '")')); ?></i></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <td>Annual Income</td>
                                                    <?php
                                                    if (current($customers)->ca == '') {
                                                        ?>
                                                        <td>Not Provided</td>
                                                        <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("ca","")')); ?></i></td>
                                                    <?php } else { ?>
                                                        <td><?php echo current($customers)->ca; ?></td>
                                                        <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'event.preventDefault();singleupdate("ca","' . current($customers)->ca . '")')); ?></i></td>
                                                    <?php } ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="singleupdateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <fieldset>
                    <div class="form">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel" align="center">Update</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="field" id="field">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="existingvalue" id="existingvalue" autofocus>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="send" class="btn btn-primary" onclick="singlesave()">Save</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="modal fade" id="pupdateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <fieldset>
                    <div class="form">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel" align="center">Update Form</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Name of term" name="typename" id="termname" autofocus><br>
                                    <input class="form-control" placeholder="Duration of term" name="typename" id="dterm" >
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </fieldset>
            </div>
        </div>
        <div class="modal fade" id="inpdateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <fieldset>
                    <div class="form">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Adding new terms</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Name of term" name="typename" id="termname" autofocus><br>
                                    <input class="form-control" placeholder="Duration of term" name="typename" id="dterm" >
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </fieldset>
            </div>
        </div>
    </div>


    <div class="modal fade" id="sModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <fieldset>
                <div class="form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel"></h4>
                        </div>
                        <div class="modal-body" id="msg">
                            SUCCESS!!!
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </fieldset>
        </div>
    </div>
    <!-- jQuery -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/raphael/raphael-min.js"></script>

                        <!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/js/morris-data.js"></script>-->
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/dist/js/sb-admin-2.js"></script>
    <!-- DataTables JavaScript -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>

                                    $(document).ready(function() {
                                        $('#dataTables-example').DataTable({
                                            responsive: true
                                        });
                                    });
                                    function singleupdate(field, existingvalue) {
                                        //                              alert(field + "---" + existingvalue);
                                        document.getElementById("field").value = field;
                                        document.getElementById("existingvalue").value = existingvalue;
                                        $('#singleupdateModal').modal('show');
                                    }
                                    function singlesave() {
                                        var field = document.getElementById("field").value
                                        var existingvalue = document.getElementById("existingvalue").value
                                        //                                  alert(document.getElementById('user_id').value + "---" + document.getElementById('cus_id').value)

                                        $.ajax({
                                            type: "GET",
                                            url: "http://" + document.getElementById('url').value + "/bankafrica1/index.php?r=site/updatecustomer" +
                                                    "&id=" + document.getElementById('user_id').value +
                                                    "&cid=" + document.getElementById('cus_id').value +
                                                    "&field=" + field +
                                                    "&existingvalue=" + existingvalue,
                                            data: "", //ProposedSites
                                            cache: false,
                                            success: function(data) {
                                                //              alert(data);
                                                if (data == 'true') {
                                                    $('#singleupdateModal').modal('hide');
                                                    $('#sModal').modal('show');
                                                }
                                                else if (data == 'false') {
                                                    alert("Failure: Data Could Not Be Saved. Try Again.");
                                                }
                                            },
                                            error: function(data) {
                                                alert("Error Sending Data.");
                                            }
                                        });
                                    }
    </script>