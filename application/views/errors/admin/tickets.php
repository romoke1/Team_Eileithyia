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
                    <li class="active"><a href="#All" data-toggle="tab" style="font-weight: bold;">All Tickets (<?= $product_num;?>)</a></li>
                </ul>
                   <div class="tab-content">

                    <div class="tab-pane fade active in" id="All">
                        <div class="table-box">
                    
                                            <table class="display table table-striped" style="font-size: 12px;">
                                                    
                                                    
                                                    <thead>
                                                        <tr>
                                                    <th>S/N</th>
                                                    <th>Ticket ID</th>
                                                    <th>Name</th>
                                                    <th>Subject</th>
                                                <th>Dept</th>
                                                    <th>Last Update</th>
                                                    <th></th></tr>
                                                    </thead>
                                                    
                                            <tbody>
                                                <?php 
                                                if($products)
                                                {
                                                    foreach ($products as $val)
                                                    {
                                                        
                                                        $user = $this->model_getvalues->getDetails("users", "user_id", $val->t_user);
                                                        $s++;
                                                        echo '<tr>'
                                                                . '<td>'.$s.'</td>'
                                                                . '<td><a href="'.base_url().'admin/ticket/'.$val->t_id.'">'.$val->t_id.'</a></td>'
                                                                . '<td><a href="'.base_url().'admin/user_profile/'.$val->t_user.'">'.$user['fullname'].'</a></td>'
                                                                . '<td><a href="'.base_url().'admin/ticket/'.$val->t_id.'">'.$val->t_subject.'</a></td>'
                                                                . '<td>'.$val->t_dept.'</td>'
                                                                . '<td>'.date('Y-m-d h:i A', strtotime($val->datee)).'</td>'
                                                                . '</tr>';
                                                        
                                                        
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
