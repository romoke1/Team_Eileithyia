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
                            <input type="text" class="form-control" name="txtSearch" />
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
                    <li class="active"><a href="#All" data-toggle="tab" style="font-weight: bold;"><?= $h ?> (<?= $product_num;?>)</a></li>
                </ul>
                   <div class="tab-content">

                    <div class="tab-pane fade active in" id="All">
                        <div class="table-box">
                                    <?php echo form_open() ?>
                            
                            
                    
                                            <table class="display table table-striped" style="font-size: 12px;">
                                                    
                                                    
                                                    <thead>
                                                        <tr>
                                                    <th>S/N</th>
                                                    <th>Car</th>
                                                    <th>Stock</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th>Publish By</th>
                                                    <th>View</th>
                                                    <th>Action</th>
                                                    <th></th></tr>
                                                    </thead>
                                                    
                                            <tbody>
                                                <?php 
                                                if($products)
                                                {
                                                    foreach ($products as $val)
                                                    {
                                                         switch ($val->status)
                                                        {
                                                            case '3':
                                                                $sta = "On Ground";
                                                                $lnk = '<input type="button"  onclick=approve_product('.$val->car_id.') class="btn btn-success style2" value="Approve" />';
                                                                break;
                                                            
                                                            case '1':
                                                                $sta = "Buy Now";
                                                                $lnk = '<input type="button" onclick=disapprove_product('.$val->car_id.') class="btn btn-danger style2" value="Disapprove" />';
                                                                break;
                                                            
                                                            case '2':
                                                                $sta = "On Sail";
                                                                $lnk = '<input type="button" onclick=disapprove_product('.$val->car_id.') class="btn btn-success style2" value="Unsuspend" />';
                                                                break;
                                                            
                                                            case '4':
                                                                $sta = "Sold";
                                                                $lnk = '<input type="button" onclick=disapprove_product('.$val->car_id.') class="btn btn-success style2" value="Unsuspend" />';
                                                                break;
                                                        }
                                                        
                                                        $make = $this->model_getvalues->getDetails("make", "make_id", $val->make);
                                                        $model = $this->model_getvalues->getDetails("model", "model_id", $val->model);
                                                        $admin = $this->model_getvalues->getDetails("admin", "id", $val->uploader);
                                                        $s++;
                                                        echo '<tr style="color: #000; font-weight: 600px; font-size: 12px;">'
                                                                . '<td>'.$s.'</td>'
                                                                . '<td>'.$val->year.' '.$make["name"].' '.$model["name"].''
                                                                . '<td>'.$val->car_id.' </td>'
                                                                . '<td>&#8358;'. number_format($val->amount).'</td>'
                                                                . '<td>'.$sta.'</td>'
                                                                . '<td>'.$admin['name'].'</td>'
                                                                . '<td><a target="new" href="'.  base_url().'cars/item/'.$val->car_id.'" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-eye-open"></span> View</a></td>'
                                                                .'<td><input type="button" onclick="unpublish_car('.$val->car_id.')" class="btn btn-success style2" value="Unpublish This Car"></td>'
                                                                . '<td><a href="#" onclick=del_car('.$val->car_id.') ><img src="'.base_url().'assets/admin/images/delete.png" alt="Delete" /></a></td>'
                                                                . '</tr>';
                                                        
                                                        
                                                    }
                                                }else{
                                                    echo '<tr><td colspan="8"></td></tr>';
                                                }
                                                    
                                                ?>
                                                
                                            </tbody>
                                        </table>
                                        <?php form_close() ?>
                            
                            <?= $pagi ?>
                                    </div>
                    </div><!-- End tab-pane --> 

                    <div class="tab-pane fade" id="sub">
                        <div class="table-responsive">
                            <div class="col-md-4">
                                <div class="styled-select">
                                    <select class="form-control" name="dSubCat" id="dSubCat" onchange="ViewSubCat()" required="">
                                        <option value="Select Sub-Category" selected="">Select Sub-Category</option>
                                        
                                        <?php 
                                            foreach($sub_cat as $sub){
                                        ?>
                                            <option value="<?= $sub->s_id ?>"><?= $sub->sub_name ?></option>

                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            

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
