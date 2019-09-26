<?php

/**
 * @author Ayodeji Adesola (skyboy4life@gmail.com)
 * @copyright 2014
 */



?>
<!-- Content Section Start -->
            <div class="content-section">
                <div class="container-liquid">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="sec-box">
                                <header>
                                    <a href="<?php echo base_url(); ?>admin/users" class="btn btn-default style2 pull-right margintop" ><i class="glyphicon glyphicon-backward">&nbsp;</i>All Users</a>
                                    <h2 class="heading">View User Details </h2>
                                </header>
                                <div class="contents">
                                    <div class="table-box">
                                <?php echo validation_errors(); ?>
                                <?php echo $status ?>
                                    <?php echo form_open() ?>
                                        <div class="tabs-section">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class=""><a href="<?= base_url() ?>admin/user_profile/<?= $id ?>">Basic Details</a></li>
                        <li class="active"><a href="#">Verification</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <section class="boxpadding">

                                        <table class="table" id="tableSky">
                                            
                                                 <tr style="background-color: white;">
                                                        <td class="col-sm-1">Name</td>
                                                        <td class="col-sm-3"><?php echo $user["lastname"]." ".$user["othernames"]  ?></td>
                                                    </tr>
                                                    
                                                    <tr style="background-color: white;">
                                                        <td>Status</td>
                                                        <td>
                                                            <?php echo $v_status ?>
                                                        </td>
                                                    </tr>
                                                    <tr style="background-color: white;">
                                                        <td>First Referee</td>
                                                        <td>
                                                            <?php echo $verify["next_of_kin_name"]  ?>

                                                        </td>
                                                    </tr>
                                                    <tr style="background-color: white;">
                                                        <td>First Referee Phone</td>
                                                        <td>
                                                            <?php echo $verify["next_of_kin_phone"]  ?>

                                                        </td>
                                                    </tr>
                                                    <tr style="background-color: white;">
                                                        <td>First Referee Address</td>
                                                        <td>
                                                            <?php echo $verify["next_of_kin_address"]  ?>

                                                        </td>
                                                    </tr>
                                                    
                                                    <tr style="background-color: white;">
                                                        <td>Identification Proof</td>
                                                        <td>
                                                            <?php
                                                                if($verify['id'] !== NULL)
                                                                {
                                                                    echo $verify['id'] .' &nbsp &nbsp <a href="' . base_url() . 'assets/verify_ids/' . $verify['id_loc'] . '" target="_new"><button type="button" name="btnSub" class="btn style2 btn-info">View</button> &nbsp';
                                                                }
                                                            ?>

                                                        </td>
                                                    </tr>
                                                
                                                  
                                            </tbody>
                                        </table>
                            </section>
                        </div>
                    </div>
                                        <?php form_close() ?>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row End -->
                </div>
            </div>
            <!-- Content Section End -->
        </div>
        <!-- Right Section End -->
    </div>
</div>
<!-- Wrapper End -->
</body>
</html>
