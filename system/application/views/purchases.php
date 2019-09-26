


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->                      



<div class="wraper container-fluid">
    <div class="row">

        <div class="col-md-9 col-xs-12">
            <header class="s-lineDownLeft">
                <h2 class="s-titleDet">Order History</h2>
            </header>
            <div class="b-detail__main-info">
                <div class="b-detail__main-info-images wow zoomInUp" data-wow-delay="0.5s">
                    <div class="row m-smallPadding">


                        <table id="example" class="table table-striped">
                            <thead>

                                <tr>
                                    <th></th>
                                    <th>Vehicle</th>
                                    <th>Info</th>
                                    <th>Status</th>
                                    <th>Payment Info</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($orders as $order) {

                                    $car_detail = $this->model_getvalues->getDetails("cars", "car_id", $order->stock_id);
                                    $make_detail = $this->model_getvalues->getDetails("make", "make_id", $car_detail['make']);
                                    $model_detail = $this->model_getvalues->getDetails("model", "model_id", $car_detail['model']);
                                    ?>
                                    <tr>
                                        <td><a href="<?= base_url() . "cars/item/" . $order->stock_id ?> "><img src="<?= base_url() . "upload/" . $car_detail['image_1'] ?>" width="100" /></a></td>
                                        <td> <a href="<?= base_url() . "cars/item/" . $order->stock_id ?> "> <?= $car_detail['year'] . " " . $make_detail['name'] . " " . $model_detail['name'] ?></a> </td>
                                        <td> Date Purchased: <?= date('jS M Y', strtotime($order->created_at)); ?> </td>
                                        <td> <?= $order->status ?> </td>
                                        <td style="text-align: center">  <strong>N<?= number_format($car_detail['amount'], 0) ?></strong> <br /> <a href="<?= base_url()."users/invoices/".$order->order_id.""?>"><button class="btn btn-primary" type="button">View Invoices</button></a> </td>
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

