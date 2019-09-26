


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->                      



<div class="wraper container-fluid">
    <div class="row">

        <div class="col-md-9 col-xs-12">
            <header class="s-lineDownLeft">
                <h2 class="s-titleDet">My Tickets</h2>
            </header>
            <div class="b-detail__main-info">
                <div class="b-detail__main-info-images wow zoomInUp" data-wow-delay="0.5s">
                    <div class="row m-smallPadding">


                        <table id="example" class="table table-striped" style="box-shadow: #ccc 2px 2px 9px">
                            <thead>

                                <tr>
                                    <th>Ticket ID</th>
                                    <th>Subject</th>
                                    <th>Department</th>
                                    <th>Last Updated</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($tickets as $invoice) {

                                    ?>
                                    <tr>
                                        <td><a href="<?= base_url()."users/ticket/".$invoice->t_id."" ?>"><?= $invoice->t_id ?></a></td>
                                        <td><strong><a href="<?= base_url()."users/ticket/".$invoice->t_id."" ?>"><?= $invoice->t_subject ?></a></strong></td>
                                        <td><?= $invoice->t_dept ?></td>
                                        <td><?= date('Y-m-d h:i A', (strtotime($invoice->datee)));?></td>
                                    </tr>
<?php } ?>

                            </tbody>
                        </table>

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

