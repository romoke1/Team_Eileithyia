


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->                      



<div class="wraper container-fluid">
    <div class="row">

        <div class="col-md-9 col-xs-12">
            <header class="s-lineDownLeft">
                <h2 class="s-titleDet"><?= $ticket['t_subject'] . "(#" . $ticket['t_id'] . ")"; ?></h2>
            </header>
            <div class="b-detail__main-info">
                <div class="b-detail__main-info-images wow zoomInUp" data-wow-delay="0.5s">
                    <div class="row m-smallPadding">


                        <div id="success"><?= $status ?> <?= validation_errors(); ?></div>
                        <form method="POST" action=""  class="s-form wow zoomInUp" data-wow-delay="0.5s" >
                            <table id="example" class="table table-striped" style="box-shadow: #ccc 2px 2px 9px">


                                <tbody>

                                    <tr>
                                        <td><label for="subject" style="font-weight: normal">Reply Message:</label>
                                            <textarea id="user-message" name="txtContent" placeholder="Message" style="height: 100px" required=""></textarea>

                                            <button type="submit" class="btn m-btn" name="mail">SUBMIT NOW<span class="fa fa-angle-right"></span></button></td>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>



</div>


<div class="row">

</div>

<!-- Personal-Information -->






<div class="clearfix"></div>
</div>
</div>


</div>

<div class="row">

</div>
</div> <!-- container -->

</div> <!-- content -->

