<?php
$users = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
$customers = Bqcus::model()->findAll('cus=:x', array(':x' => current($users)->cdos));
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-info">
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
                        <?php } ?>
                        <li><a href="#messages" data-toggle="tab">Civic info</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home">
                            <?php if (Evprof::model()->findByPk(current($users)->pro)->lib == "Personal") { ?> 
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
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'update("sur")')); ?></i></td>
                                                <?php } else { ?>
                                                    <td><?php echo current($customers)->sur; ?></td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'update("sur")')); ?></i></td>
                                                <?php }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Middle Name</td>
                                                <?php
                                                if (current($customers)->mid == '') {
                                                    ?>
                                                    <td>Not Provided</td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'update("mid","")')); ?></i></td>
                                                <?php } else { ?>
                                                    <td><?php echo current($customers)->mid; ?></td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'update("mid",' . current($customers)->mid . ')')); ?></i></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Other Names</td>
                                                <?php
                                                if (current($customers)->otn == '') {
                                                    ?>
                                                    <td>Not Provided</td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'update("otn","")')); ?></i></td>
                                                <?php } else { ?>
                                                    <td><?php echo current($customers)->otn; ?></td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'update("otn",' . current($customers)->otn . ')')); ?></i></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Gender</td>
                                                <?php
                                                if (current($customers)->sex == '') {
                                                    ?>
                                                    <td>Not Provided</td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'update("sex","")')); ?></i></td>
                                                <?php } else { ?>
                                                    <td><?php echo current($customers)->sex; ?></td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'update("sex",' . current($customers)->sex . ')')); ?></i></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Telephone number</td>
                                                <?php
                                                if (current($customers)->telephone == '') {
                                                    ?>
                                                    <td>Not Provided</td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'update("telephone","")')); ?></i></td>
                                                <?php } else { ?>
                                                    <td><?php echo current($customers)->telephone; ?></td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'update("telephone",' . current($customers)->telephone . ')')); ?></i></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <?php
                                                if (current($customers)->email == '') {
                                                    ?>
                                                    <td>Not Provided</td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'update("email","")')); ?></i></td>
                                                <?php } else { ?>
                                                    <td><?php echo current($customers)->email; ?></td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'update("email",' . current($customers)->email . ')')); ?></i></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Date of Birth</td>
                                                <?php
                                                if (current($customers)->dbir == '') {
                                                    ?>
                                                    <td>Not Provided</td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'update("dbir","")')); ?></i></td>
                                                <?php } else { ?>
                                                    <td><?php echo current($customers)->dbir; ?></td>
                                                    <td><i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'update("dbir",' . current($customers)->dbir . ')')); ?></i></td>
                                                <?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <i class="fa fa-edit"><?php echo CHtml::link('Update', array(''), array('onclick' => 'update("general","personal")')); ?></i>
                            <?php } ?>

                        </div>

                        <div class="tab-pane fade" id="profile">
                            <h4>Profile Tab</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <div class="tab-pane fade" id="messages">
                            <h4>Messages Tab</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
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
                            <h4 class="modal-title" id="myModalLabel">Update</h4>
                        </div>
                        <div class="modal-body">
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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



    <?php if ($customer->tcus == "in") {
        ?>
        <?php echo $customer->rso; ?>
        <table>
            <tr>
                <td><strong>Name</strong></td>
                <td><i>&nbsp;<?php echo $customer->resnam; ?></i></td>
                <td colspan="5"></td>
                <td>
                    <strong>creation date</strong></td>
                <td><i>&nbsp;<?php echo $customer->dcre; ?></i></td>
            </tr>
            <tr>
                <td><strong>Headquarter</strong></td>
                <td><i>&nbsp;<?php echo $customer->town; ?></i></td>
                <td colspan="5"></td>
                <td>
                    <strong>Registration Number</strong></td>
                <td><i>&nbsp;<?php echo $customer->breg; ?></i></td>
            </tr>
            <tr>
                <td><strong>Tax payer's Number</strong></td>
                <td><i>&nbsp;<?php echo $customer->tpc; ?></i></td>
                <td colspan="5"></td>
                <td>
                    <strong>Quality Note</strong></td>
                <td><i>&nbsp;<?php echo $customer->qua; ?></i></td>
            </tr>
            <tr>
                <td><strong>Country of residence</strong></td>
                <td><i>&nbsp;<?php echo Countries::model()->findByPk($customer->res)->name; ?></i></td>
                <td colspan="5"></td>
                <td>
                    <strong>Annual GDP</strong></td>
                <td><i>&nbsp;<?php echo $customer->ca; ?></i></td>
            </tr>
            <tr>
                <td><strong>Sector of Activity</strong></td>
                <td><i>&nbsp;<?php echo $customer->sec; ?></i></td>
                <td colspan="5"></td>
            </tr>
            <tr>
                <td>
                    <strong>creation date</strong></td>
                <td><i>&nbsp;<?php echo $customer->dcre; ?></i></td>

                <td>

                </td>
            </tr>
        </table>
    </div>
    </div>
    </div>
    <div class="col-lg-5">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bell fa-fw"></i> Notifications Panel
            </div>
            <!-- .panel-heading -->
            <div class="panel-body">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class='fa fa-envelope'></i>&nbsp;Responses from previous bids</a>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <ul class="list-unstyled"> 
                                    <li><i class='fa fa-smile-o'></i>&nbsp;<a href='#'>Bid for Security XYZ accepted</li>
                                    <li><i class='fa fa-meh-o'></i>&nbsp;<a href='#'>Request for Loan MNO being processed</li>
                                    <li><i class='fa fa-frown-o'></i>&nbsp;<a href='#'>Request for fixed deposit at ABC rejected</li>
                                </ul>                        
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class='fa fa-bullhorn'></i>&nbsp;New securities posted</a>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse ">
                            <div class="panel-body">
                                <ul class="list-unstyled"> 
                                    <li><i class='fa fa-circle'></i>&nbsp;<a href='#'>Government bond worth 50,000,000FCFA</li>
                                </ul>                                    
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><i class='fa fa-bullhorn'></i>&nbsp;New commercial borrowing rates</a>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul class="list-unstyled"> 
                                    <li><i class='fa fa-circle'></i>&nbsp;<a href='#'>BICEC ...</li>
                                    <li><i class='fa fa-circle'></i>&nbsp;<a href='#'>SGBC ...</li>
                                    <li><i class='fa fa-circle'></i>&nbsp;<a href='#'>ECOBANK ...</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><i class='fa fa-bullhorn'></i>&nbsp;New bank services</a>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul class="list-unstyled"> 
                                    <li><i class='fa fa-circle'></i>&nbsp;<a href='#'>BICEC ...</li>
                                    <li><i class='fa fa-circle'></i>&nbsp;<a href='#'>SGBC ...</li>
                                    <li><i class='fa fa-circle'></i>&nbsp;<a href='#'>ECOBANK ...</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                SFTP footer
            </div>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php echo CHtml::link('Business Page', array('/business'), array('class' => 'btn btn-primary btn-lg btn-block')); ?>
        </div><br>
        <br>
    </div>
    <div class="row">    <!-- /.col-lg-12 -->

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-archive"></i>&nbsp;&nbsp;History of past transactions
                </div>
                <!-- .panel-heading -->
                <div class="panel-body">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseA">Securities Trading</a>
                                </h4>
                            </div>
                            <div id="collapseA" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#home" data-toggle="tab">Purchases</a>
                                        </li>
                                        <li><a href="#profile" data-toggle="tab">Accepted bids</a>
                                        </li>
                                        <li><a href="#messages" data-toggle="tab">Rejected bids</a>
                                        </li>
                                        <li><a href="#settings" data-toggle="tab">Securities sold</a>
                                        </li>
                                        <li><a href="#process" data-toggle="tab">Requests in process</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="home">
                                            <h4>Purchases Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="profile">
                                            <h4>Accepted bids Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="messages">
                                            <h4>Rejected Bids Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="settings">
                                            <h4>Securities Sold Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="process">
                                            <h4>Securities in process Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-6 -->
                        <?php if ($customer->tcus == 'in') {
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseE">Interbank Lending</a>
                                    </h4>
                                </div>
                                <div id="collapseE" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="ilr" data-toggle="tab">Requested</a>
                                            </li>
                                            <li><a href="#ilg" data-toggle="tab">Requests Granted</a>
                                            </li>
                                            <li><a href="#ild" data-toggle="tab">Requests Denied</a>
                                            </li>
                                            <li><a href="#ilp" data-toggle="tab">Requests in process</a>
                                            </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active" id="ilr">
                                                <h4>Requests Tab</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                            </div>
                                            <div class="tab-pane fade" id="ilg">
                                                <h4>Requests Granted Tab</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                            </div>
                                            <div class="tab-pane fade" id="ild">
                                                <h4>Requests Denied Tab</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                            </div>
                                            <div class="tab-pane fade" id="ilp">
                                                <h4>Requests in process Tab</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseB">Commercial Borrowing (Loans)</a>
                                </h4>
                            </div>
                            <div id="collapseB" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="cmr" data-toggle="tab">Requested</a>
                                        </li>
                                        <li><a href="#cmg" data-toggle="tab">Requests Granted</a>
                                        </li>
                                        <li><a href="#cmd" data-toggle="tab">Requests Denied</a>
                                        </li>
                                        <li><a href="#cmp" data-toggle="tab">Requests in process</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="cmr">
                                            <h4>Requests Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="cmg">
                                            <h4>Requests Granted Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="cmd">
                                            <h4>Requests Denied Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="cmp">
                                            <h4>Requests in process Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseC">Fixed Deposits</a>
                                </h4>
                            </div>
                            <div id="collapseC" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="fdr" data-toggle="tab">Requested</a>
                                        </li>
                                        <li><a href="#fdg" data-toggle="tab">Requests Granted</a>
                                        </li>
                                        <li><a href="#fdd" data-toggle="tab">Requests Denied</a>
                                        </li>
                                        <li><a href="#fdp" data-toggle="tab">Requests in process</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="fdr">
                                            <h4>Requests Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="fdg">
                                            <h4>Requests Granted Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="fdd">
                                            <h4>Requests Denied Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="fdp">
                                            <h4>Requests in process Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                    </div>               
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseD">Corporate Finance</a>
                                </h4>
                            </div>
                            <div id="collapseD" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="projects" data-toggle="tab">Projects</a>
                                        </li>
                                        <li><a href="#investment" data-toggle="tab">Investment</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="projects">
                                            <h4>Projects Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="investment">
                                            <h4>Investment Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .panel-body -->
            </div>

            <?php
        }
        if ($customer->tcus == "pe") {
            ?>
            <table>
                <tr>
                    <td><strong>Name</strong></td>
                    <td><i>&nbsp;<?php echo $customer->sur . "&nbsp;" . $customer->mid . "&nbsp" . $customer->otn; ?></i></td>
                    <td colspan="5"></td>
                    <td>
                        <strong>Date of Birth</strong></td>
                    <td><i>&nbsp;<?php echo $customer->dbir; ?></i></td>
                </tr>
                <tr>
                    <td><strong>Town of Birth</strong></td>
                    <td><i>&nbsp;<?php echo $customer->tbir; ?></i></td>
                    <td colspan="5"></td>
                    <td>
                        <strong>Gender</strong></td>
                    <td><i>&nbsp;<?php if ($customer->sex == "Fe") echo "Female"; if ($customer->sex == "Ma") echo "Male"; ?></i></td>
                </tr>
                <tr>
                    <td><strong>Father's name</strong></td>
                    <td><i>&nbsp;<?php echo $customer->mna; ?></i></td>
                    <td colspan="5"></td>
                    <td>
                        <strong>Mother's Name</strong></td>
                    <td><i>&nbsp;<?php echo $customer->fna; ?></i></td>
                </tr>
                <tr>
                    <td><strong>Country of residence</strong></td>
                    <td><i>&nbsp;<?php echo Countries::model()->findByPk($customer->res)->name; ?></i></td>
                    <td colspan="5"></td>
                    <td>
                        <strong>Annual salary</strong></td>
                    <td><i>&nbsp;<?php echo $customer->sal; ?></i></td>
                </tr>
                <tr>
                    <td><strong>Profession</strong></td>
                    <td><i>&nbsp;<?php echo $customer->pro; ?></i></td>
                    <td colspan="5"></td>
                    <td>
                        <strong>ID card number</strong></td>
                    <td><i>&nbsp;<?php echo $customer->id; ?></i></td>
                </tr>
                <tr>
                    <td><strong>Place of issue</strong></td>
                    <td><i>&nbsp;<?php echo $customer->idis; ?></i></td>
                    <td colspan="5"></td>
                    <td>
                        <strong>Date of issue</strong></td>
                    <td><i>&nbsp;<?php echo $customer->idid; ?></i></td>
                </tr>
                <tr>
                    <td><strong>Date of expiration</strong></td>
                    <td><i>&nbsp;<?php echo $customer->ided; ?></i></td>
                    <td colspan="5"></td>
                    <td>
                        <strong>Passport number</strong></td>
                    <td><i>&nbsp;<?php echo $customer->psp; ?></i></td>
                </tr>
                <tr>
                    <td><strong>Date of issue</strong></td>
                    <td><i>&nbsp;<?php echo $customer->pspid; ?></i></td>
                    <td colspan="5"></td>
                    <td>
                        <strong>Place of issue</strong></td>
                    <td><i>&nbsp;<?php echo $customer->pspis; ?></i></td>
                </tr>
                <tr>
                    <td><strong>Date of expiration</strong></td>
                    <td><i>&nbsp;<?php echo $customer->psped; ?></i></td>

                    <td>
                        <strong>&nbsp;</strong></td>
                    <td><i>&nbsp;<?php echo "&nbsp;"; ?></i></td>
                </tr>
                <tr>
                    <td>

                    </td>
                </tr>
            </table>
        </div>
    </div>
    </div>
    <div class="col-lg-5">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bell fa-fw"></i> Notifications Panel
            </div>
            <!-- .panel-heading -->
            <div class="panel-body">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class='fa fa-envelope'></i>&nbsp;Responses from previous bids</a>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <ul class="list-unstyled"> 
                                    <li><i class='fa fa-smile-o'></i>&nbsp;<a href='#'>Bid for Security XYZ accepted</a></li>
                                    <li><i class='fa fa-meh-o'></i>&nbsp;<a href='#'>Request for Loan MNO being processed</a></li>
                                    <li><i class='fa fa-frown-o'></i>&nbsp;<a href='#'>Request for fixed deposit at ABC rejected</a></li>
                                </ul>                        
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class='fa fa-bullhorn'></i>&nbsp;New securities posted</a>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse ">
                            <div class="panel-body">
                                <ul class="list-unstyled"> 
                                    <li><i class='fa fa-circle'></i>&nbsp;<a href='#'>Government bond worth 50,000,000FCFA</li>
                                </ul>                                    
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                <i class='fa fa-bullhorn'></i>&nbsp;New commercial borrowing rates
                            </a>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul class="list-unstyled"> 
                                    <li><i class='fa fa-circle'></i>&nbsp;<a href='#'>BICEC ...</li>
                                    <li><i class='fa fa-circle'></i>&nbsp;<a href='#'>SGBC ...</li>
                                    <li><i class='fa fa-circle'></i>&nbsp;<a href='#'>ECOBANK ...</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><i class='fa fa-bullhorn'></i>&nbsp;New bank services</a>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul class="list-unstyled"> 
                                    <li><i class='fa fa-circle'></i>&nbsp;<a href='#'>BICEC ...</li>
                                    <li><i class='fa fa-circle'></i>&nbsp;<a href='#'>SGBC ...</li>
                                    <li><i class='fa fa-circle'></i>&nbsp;<a href='#'>ECOBANK ...</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .panel-body -->
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php echo CHtml::link('Business Page', array('/business'), array('class' => 'btn btn-primary btn-lg btn-block')); ?><br>
        </div>
        <br>
    </div>
    <div class="row">  
        <!-- /.col-lg-12 -->

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-archive"></i>&nbsp;&nbsp;History of past transactions
                </div>
                <!-- .panel-heading -->
                <div class="panel-body">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseA">Securities Trading</a>
                                </h4>
                            </div>
                            <div id="collapseA" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#home" data-toggle="tab">Purchases</a>
                                        </li>
                                        <li><a href="#profile" data-toggle="tab">Accepted bids</a>
                                        </li>
                                        <li><a href="#messages" data-toggle="tab">Rejected bids</a>
                                        </li>
                                        <li><a href="#settings" data-toggle="tab">Securities sold</a>
                                        </li>
                                        <li><a href="#process" data-toggle="tab">Requests in process</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="home">
                                            <h4>Purchases Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="profile">
                                            <h4>Accepted bids Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="messages">
                                            <h4>Rejected Bids Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="settings">
                                            <h4>Securities Sold Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="process">
                                            <h4>Securities in process Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-6 -->


                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseB">Commercial Borrowing (Loans)</a>
                                </h4>
                            </div>
                            <div id="collapseB" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="cmr" data-toggle="tab">Requested</a>
                                        </li>
                                        <li><a href="#cmg" data-toggle="tab">Requests Granted</a>
                                        </li>
                                        <li><a href="#cmd" data-toggle="tab">Requests Denied</a>
                                        </li>
                                        <li><a href="#cmp" data-toggle="tab">Requests in process</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="cmr">
                                            <h4>Requests Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="cmg">
                                            <h4>Requests Granted Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="cmd">
                                            <h4>Requests Denied Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="cmp">
                                            <h4>Requests in process Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseC">Fixed Deposits</a>
                                </h4>
                            </div>
                            <div id="collapseC" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="fdr" data-toggle="tab">Requested</a>
                                        </li>
                                        <li><a href="#fdg" data-toggle="tab">Requests Granted</a>
                                        </li>
                                        <li><a href="#fdd" data-toggle="tab">Requests Denied</a>
                                        </li>
                                        <li><a href="#fdp" data-toggle="tab">Requests in process</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="fdr">
                                            <h4>Requests Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="fdg">
                                            <h4>Requests Granted Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="fdd">
                                            <h4>Requests Denied Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="fdp">
                                            <h4>Requests in process Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                    </div>               
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseD">Corporate Finance</a>
                                </h4>
                            </div>
                            <div id="collapseD" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="projects" data-toggle="tab">Projects</a>
                                        </li>
                                        <li><a href="#investment" data-toggle="tab">Investment</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="projects">
                                            <h4>Projects Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="investment">
                                            <h4>Investment Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .panel-body -->
            </div>

        <?php } ?>

        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->

    <!-- /#page-wrapper -->
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
        
        function update(field,existingvalue){
            alert(field+"---"+existingvalue);
            
        }
    </script>