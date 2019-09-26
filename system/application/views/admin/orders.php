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
                                <input type="text" class="form-control" name="txtSearch" placeholder="Search with Order ID" />
                            <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default">Search</button>
                                    </span>
                            </div>
                            
                                        <?php echo form_close() ?>
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
                    <li class="active"><a href="#All" data-toggle="tab" style="font-weight: bold;">All Orders (<?= $product_num;?>)</a></li>
                </ul>
                   <div class="tab-content">

                    <div class="tab-pane fade active in" id="All">
                        <div class="table-box">
                    
                                            <table class="display table table-striped" style="font-size: 12px;">
                                                    
                                                    
                                                    <thead>
                                                        <tr>
                                                    <th>S/N</th>
                                                    <th>Order ID</th>
                                                    <th>Date</th>
                                                <th>Name</th>
                                                <th>Car</th>
                                                    <th>Amount</th>
                                                    <th>Invoices</th>
                                                    <!--<th>View</th>-->
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
                                                        
                                                        
                                                        $shw = "";
                                                        $invoices = $this->model_getvalues->getTableRows("invoices", "order_id", $val->order_id, "invoice_id", "asc");
                                                        foreach ($invoices as $invoice){
                                                            
                                                            $shw .= "<a href='".base_url()."admin/invoices/search/".$invoice->invoice_id."'>Invoice #: ".$invoice->invoice_id."</a><br />";
                                                            
                                                        }
                                                        
                                                        $o_status = '<selec';
                                                        
                                                        
                                                        $user = $this->model_getvalues->getDetails("users", "user_id", $val->user_id);
                                                        $car_det = $this->model_getvalues->getDetails("cars", "car_id", $val->stock_id);
                                                        $make = $this->model_getvalues->getDetails("make", "make_id", $car_det['make']);
                                                        $model = $this->model_getvalues->getDetails("model", "model_id", $car_det['model']);
                                                        $s++;
                                                        $uploader = $this->model_getvalues->getDetails("admin", "id", $val->uploader);
                                                        echo '<tr>'
                                                                . '<td>'.$s.'</td>'
                                                                . '<td>'.$val->order_id.'</td>'
                                                                . '<td>'.date('d-m-Y', strtotime($val->created_at)).'</td>'
                                                                . '<td><a href="'.base_url().'admin/user_profile/'.$val->user_id.'">'.$user['fullname'].'</a></td>'
                                                                . '<td><a href="https://tokunbocars.ng/cars/item/'.$val->stock_id.'" target="new">'.$car_det['year'].' '.$make["name"].' '.$model["name"].'</a><br />('.$uploader["name"].')</td>'
                                                                . '<td>&#8358;'. number_format($car_det['amount']).'</td>'
                                                                //. '<td><a href="'.  base_url().'admin/car_details/'.$val->product_id.'"><img src="'.base_url().'assets/images/view.png" alt="View" /></a></td>'
                                                                . '<td>'.$shw.'</td>'
                                                                . '<td>'.$val->status.'</td>'
                                                                . '<td><form action="'.base_url().'admin/change_status/'.$val->order_id.'" method="post"><select name="ddlStat'.$val->order_id.'" class="form-control" style="width:150px">
                                                        <option value="">Change Status</option>
                                                        <option>Car Bought, Awaiting Trucking</option>
                                                        <option>Car Trucked to Port, Awaiting Dock on Ship</option>
                                                        <option>Car Docked on Ship, Awaiting Sail of Ship</option>
                                                        <option>Ship About to Sail, Awaiting Second Payment</option>
                                                        <option>Ship Sailed</option>
                                                        <option>Awaiting Ship Arrival</option>
                                                        <option>Ship Arrives in 3 Days</option>
                                                        <option>Ship Arrived</option>
                                                        <option>Ship Arrived, Awaiting Final Payment</option>
                                                        <option>Transaction Completed</option>
                                                    </select> <input type="submit" name="btn'.$val->order_id.'" value="Update" class="btn btn-success" /> </form></td>'
                                                                .'<td><a href="#" onclick=delete_order('.$val->order_id.') ><img src="'.base_url().'assets/admin/images/delete.png" alt="Delete" /></a></td>'
                                                                . '</tr>';
                                                        
                                                        
                                                    }
                                                }else{
                                                    echo '<tr><td colspan="8"></td></tr>';
                                                }
                                                    
                                                ?>
                                                
                                            </tbody>
                                        </table>
                                        <?php form_close() ?>
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
