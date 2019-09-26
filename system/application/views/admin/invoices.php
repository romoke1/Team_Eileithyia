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
                        <div class="col-xs-9">
                            
                                    <?php echo form_open() ?>
                            <div class="input-group ">
                                <input type="text" class="form-control" name="txtSearch" placeholder="Search with Invoice ID" />
                            <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default">Search</button>
                                    </span>
                            </div>
                            
                                        <?php form_close() ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="sec-box">
                                
                                <div class="contents">
                                    <div class="table-box">
                                <?php echo validation_errors(); ?>
                                <?php echo $status ?>
                                        <div class="tabs-section">
                    <ul class="nav nav-tabs" id="mytabs">
                    <li class="active"><a href="#All" data-toggle="tab" style="font-weight: bold;">All Invoices (<?= $product_num;?>)</a></li>
                </ul>
                   <div class="tab-content">

                    <div class="tab-pane fade active in" id="All">
                        <div class="table-box">
                    
                                            <table class="display table table-striped" style="font-size: 12px;">
                                                    
                                                    
                                                    <thead>
                                                        <tr>
                                                    <th>S/N</th>
                                                    <th>Invoice ID</th>
                                                    <th>Order ID</th>
                                                    <th>Date</th>
                                                <th>Name</th>
                                                    <th>Payment Method<br />Reference</th>
                                                    <th>Details</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                    <th></th></tr>
                                                    </thead>
                                                    
                                            <tbody>
                                                <?php 
                                                if($products)
                                                {
                                                    foreach ($products as $val)
                                                    {
                                                        switch ($val->payment_status)
                                                        {
                                                            case 'Pending':
                                                                $sta = "Not Approved";
                                                                $lnk = '<input type="button"  onclick=accept_pay('.$val->invoice_id.') class="btn btn-success style2" value="Approve" />';
                                                                break;
                                                            
                                                            case 'Paid':
                                                                $sta = "Approved";
                                                                $lnk = '<input type="button" onclick=disapprove_product('.$val->order_id.') class="btn btn-danger style2" value="Disapprove" />';
                                                                break;
                                                            
                                                            case 3:
                                                                $sta = "Suspended";
                                                                $lnk = '<input type="button" onclick=disapprove_product('.$val->order_id.') class="btn btn-success style2" value="Unsuspend" />';
                                                                break;
                                                        }
                                                        
                                                        switch ($val->payment_method)
                                                        {
                                                            case 'bank':
                                                                $ref = "<textarea class='form-control' name='txtRef' id='ref_".$val->invoice_id."' required>".$val->payment_ref."</textarea>";
                                                                break;
                                                            
                                                            case 'online':
                                                                $ref = $val->payment_ref;
                                                        }
                                                        
                                                        $user = $this->model_getvalues->getDetails("users", "user_id", $val->user_id);
                                                        $s++;
                                                        echo '<form action="admin/pay_invoice/'.$val->invoice_id.'" method="post"><tr>'
                                                                . '<td>'.$s.' <input type="hidden" value"" id="" </td>'
                                                                . '<td>'.$val->invoice_id.'</td>'
                                                                . '<td><a href="'.base_url().'admin/orders/search/'.$val->order_id.'">'.$val->order_id.'</a></td>'
                                                                . '<td>'.date('d-m-Y', strtotime($val->datee)).'</td>'
                                                                . '<td><a href="'.  base_url().'admin/user_profile/'.$val->user_id.'">'.$user['fullname'].'</a></td>'
                                                                . '<td>'.$val->payment_method.' <br /> '.$ref.' </td>'
                                                                . '<td>'.$val->payment_details.'</td>'
                                                                . '<td>&#8358;'. number_format($val->payment_amount).'</td>'
                                                                . '<td>'.$val->payment_status.'</td>'
                                                                //. '<td><a href="'.  base_url().'admin/car_details/'.$val->product_id.'"><img src="'.base_url().'assets/images/view.png" alt="View" /></a></td>'
                                                                //. '<td><a href="'.  base_url().'admin/view_invoices/'.$val->order_id.'"><img src="'.base_url().'assets/images/edit.png" alt="View Invoices" /></a></td>'
                                                                . '<td>'.$lnk.'</td>'
                                                                .'<td><a href="#" onclick=delete_invoice('.$val->invoice_id.') ><img src="'.base_url().'assets/admin/images/delete.png" alt="Delete" /></a></td>'
                                                                . '</tr></form>';
                                                        
                                                        
                                                    }
                                                }else{
                                                    echo '<tr><td colspan="8"></td></tr>';
                                                }
                                                    
                                                ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                    </div><!-- End tab-pane --> 


                </div>
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
