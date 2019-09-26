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
                        <li class="active"><a href="#">Basic Details</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <section class="boxpadding">

                                        <table class="table" id="tableSky">
                                            
                                                 <tr style="background-color: white;">
                                                        <td class="col-sm-1">Name</td>
                                                        <td class="col-sm-3"><?php echo $user["fullname"]  ?></td>
                                                    </tr>
                                                    <tr style="background-color: white;">
                                                        <td>User ID</td>
                                                        <td>
                                                            <?php echo $user["user_id"]  ?>

                                                        </td>
                                                    </tr>
                                                    <tr style="background-color: white;">
                                                        <td>Status</td>
                                                        <td>
                                                            <?php 
                                                            if($user["status"] == 1)
                                                            {
                                                                echo 'Active';
                                                            }else{
                                                                echo 'Inactive';
                                                            }?>
                                                        </td>
                                                    </tr>
                                                    <tr style="background-color: white;">
                                                        <td>Email</td>
                                                        <td>
                                                            <?= $user['email'] ?>
                                                        </td>
                                                    </tr>
                                                    <tr style="background-color: white;">
                                                        <td>Phone</td>
                                                        <td>
                                                            <?= $user['phone'] ?>
                                                        </td>
                                                    </tr>
                                                    <tr style="background-color: white;">
                                                        <td>Registration Date</td>
                                                        <td>
                                                            <?= $user['date_joined'] ?>
                                                        </td>
                                                    </tr>
                                                    <tr style="background-color: white;">
                                                        <td>Address</td>
                                                        <td>
                                                            <?= $user['address'] ?>
                                                        </td>
                                                    </tr>
                                                    <tr style="background-color: white;">
                                                        <td>Company</td>
                                                        <td>
                                                            <?= $user['company'] ?>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr style="background-color: white;">
                                                        <td></td>
                                                        <td>
                                                            <a href="<?= base_url() ?>admin/user_login/<?= $user['user_id'] ?>" target="_blank">Login As Client</a>
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
