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
                                    <a href="<?php echo base_url(); ?>admin/products" class="btn btn-default style2 pull-right margintop" ><i class="glyphicon glyphicon-backward">&nbsp;</i>All Products</a>
                                    <h2 class="heading">View Product Details </h2>
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
                                <?php 
                                $product_category = $this->model_getvalues->getDetails("categories", "cat_id", $product["cat_id"], "cat_id");
                                $sub_category = $this->model_getvalues->getDetails("sub_categories", "s_id", $product["sub_id"]);

                                ?>
                                        <table class="table" id="tableSky">
                                            <tr style="background-color: white;">
                                                <td>Product ID</td>
                                                <td>
                                                    <?php echo $product["product_id"]  ?>

                                                </td>
                                            </tr>
                                                 <tr style="background-color: white;">
                                                        <td class="col-sm-1">Product Name</td>
                                                        <td class="col-sm-3"><?php echo $product["product_name"] ?></td>
                                                    </tr>
                                                 <tr style="background-color: white;">
                                                        <td class="col-sm-1">Product Category</td>
                                                        <td class="col-sm-3"><?php echo $product_category["cat_name"] ?></td>
                                                    </tr>
                                                 <tr style="background-color: white;">
                                                        <td class="col-sm-1">Sub-Category</td>
                                                        <td class="col-sm-3"><?php echo $sub_category["sub_name"] ?></td>
                                                    </tr>
                                                    
                                                    <tr style="background-color: white;">
                                                        <td>Status</td>
                                                        <td>
                                                            <?php 
                                                            if($product["status"] == 1)
                                                            {
                                                                echo 'Approved <i class="glyphicon glyphicon-star">';
                                                            }else{
                                                               echo 'Not Approved'.'&nbsp;&nbsp;&nbsp;'.'<input type="button"  onclick=approve_product('.$product['product_id'].') class="btn btn-success style2" value="Approve" />';
                                                            }?>
                                                        </td>
                                                    </tr>
                                                    <tr style="background-color: white;">
                                                        <td>Username</td>
                                                        <td>
                                                            <?= $product['username'] ?>
                                                        </td>
                                                    </tr>
                                                    <tr style="background-color: white;">
                                                        <td>Amount</td>
                                                        <td>
                                                            &#8358;<?= number_format($product['amount']) ?>
                                                        </td>
                                                    </tr>
                                                    <tr style="background-color: white;">
                                                        <td>Negotiable</td>
                                                        <td>
                                                            <?= $product['negotiable'] ?>
                                                        </td>
                                                    </tr>
                                                    <tr style="background-color: white;">
                                                        <td>Product Description</td>
                                                        <td style="text-align: justify;">
                                                            <?= $product['description'] ?>
                                                        </td>
                                                    </tr>
                                                    <tr style="background-color: white;">
                                                        <td>Product Image</td>
                                                        <td>
                                                            <img src="<?= base_url()?>assets/admin/products/<?= $product['image_url']?>" width="100%" class="img-thumbnail" alt=""/> 
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
