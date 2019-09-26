


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->                      



<div class="wraper container-fluid">
    <div class="row">

        <div class="col-md-9 col-xs-12">
            <header class="s-lineDownLeft">
                <h2 class="s-titleDet">All My Invoices </h2>
            </header>
            <div class="b-detail__main-info">
                <div class="b-detail__main-info-images wow zoomInUp" data-wow-delay="0.5s">
                    <div class="row m-smallPadding">


                        <table id="example" class="table table-striped" style="box-shadow: #ccc 2px 2px 9px">
                            <thead>

                                <tr>
                                    <th>Invoice ID</th>
                                    <th>Order ID</th>
                                    <th>Amount</th>
                                    <th>Payment Method</th>
                                    <th>Payment Info</th>
                                    <th>Status</th>
                                    <th>Download</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($invoices as $invoice) {
                                     $pdf = 'invoice -'.$invoice->order_id;
                                     $link = base_url().'assets/pdf/invoice_'.$invoice->order_id.'.pdf';
                                     
                                     
                                    ?>
                                    <tr>
                                        <td><?= $invoice->invoice_id ?></td>
                                        <td><a href="<?= base_url()."cars/order/".$invoice->order_id."" ?>"><?= $invoice->order_id ?></a></td>
                                        <td>N<?= number_format($invoice->payment_amount) ?></td>
                                        <td><?= $invoice->payment_method ?></td>
                                        <td style="text-align: justify;">
                                            Invoice Date: <?= date('jS M Y', strtotime($invoice->datee)); ?><br />
                                            Due Date:  <?= date('jS M Y', strtotime("+1 days", (strtotime($invoice->datee))));?><br />
                                            Payment Reference: <?= $invoice->payment_ref ?>
                                        </td>
                                        <td><?php 
                                        
                                        if($invoice->payment_status === 'Pending')
                                        {
                                            echo '<a href="'.base_url().'cars/payment/'.$invoice->invoice_id.'" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-signal"></span> Pending, Pay Now</a>';
//                                            echo 'Pending <br /><a class="btn btn-primary" href="">Make Payment Now</a>';
                                        }else{
                                            echo $invoice->payment_status;
                                        }
                                        ?></td>            
                                        <td>
                                            <a href="<?= $link ?>" target="_blank" class="btn btn-sm btn-default" style="background: rgb(152, 20, 10); color: #fff;"><span class="glyphicon glyphicon-save"></span> Download</a>
                                            
                                        </td>
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

