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
                                    <a href="<?php echo base_url(); ?>admin/tickets" class="btn btn-default style2 pull-right margintop" ><i class="glyphicon glyphicon-backward">&nbsp;</i>All Tickets</a>
                                    <h2 class="heading">Reply to <a href="<?php echo base_url().'admin/user_profile/'.$user['user_id']; ?>"><?= $user['fullname'] ?> </a></h2>
                                </header>
                                <div class="contents">
                                    <div class="table-box">
                                <?php echo validation_errors(); ?>
                                <?php echo $status ?>
                                    <?php echo form_open() ?>
                                        <div class="tabs-section">
                  
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <section class="boxpadding">
                                <h4><?= $ticket['t_subject'] ?> </h4>
                                        <table class="table table-striped">
                                            <tbody>
                                                      
                                                   <tr>
                                        <td><label for="subject" style="font-weight: normal">Reply Message:</label>
                                            <textarea id="user-message" name="txtContent" class="form-control" placeholder="Message" style="height: 100px" required=""></textarea>

                                            <button type="submit" class="btn btn-primary" name="mail">SUBMIT NOW<span class="fa fa-angle-right"></span></button></td>
                                    </tr>


                                    <?php
                                    $tbody = explode('*|||*', $ticket['t_content']);
                                    $tbody = array_reverse($tbody);
                                    foreach ($tbody as $parts) {
                                        
                                        $part = explode('*~', $parts);
                                        
                                        

                                        $sender = $part[0];
                                        $msg = $part[1];
                                        $date = $part[2];
                                        ?>
                                        <tr>
                                            <td><h4><?= $sender ?></h4>
                                                <small><em>at <?= $date ?></em></small>
                                                <hr />
                                                <p><?= $msg ?> </p>
                                            </td>
                                        </tr>
                                    <?php } ?>
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
