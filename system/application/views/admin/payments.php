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
                                    <h2 class="heading">Payments Record </h2>
                                </header>
                                <div class="contents">
                                    <div class="table-box">
                                <?php echo validation_errors(); ?>
                                <?php echo $status ?>
                                    <?php echo form_open() ?>
                                        
                                        
                                        
                                        <div class="tabs-section">
                                <ul class="nav nav-tabs" id="myTab">
                                    <li class="active"><a href="#bank" data-toggle="tab">Bank Payments</a></li>
                                    <li class=""><a href="#cashenvoy" data-toggle="tab">Cashenvoy</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="bank">
                                    	<section class="boxpadding">
                                            <table class="display table table-striped" style="font-size: 16px;">
                                                    
                                                    
                                                    <thead>
                                                        <tr>
                                                    <th>S/N</th>
                                                    <th>Company</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                    <th>Confirmed Date</th>
                                                    <th>Status</th>
                                                    <th></th></tr>
                                                    </thead>
                                                    
                                            <tbody>
                                                <?php 
                                                if($bank_payments)
                                                {
                                                    foreach ($bank_payments as $val)
                                                    {
                                                        $s++;
                                                        $coy = $this->model_getvalues->getDetails("company", "id", $val->coy_id, "id");
                                                        if($val->transaction_details == '')
                                                        {
                                                            $sta = $val->status;
                                                        }else{
                                                            $sta = $val->status." (".$val->transaction_details.")";
                                                        }
                                                        
                                                        if($val->status == 'Pending'){
                                                            $act = ' <a href="'.  base_url().'admin/confirm_payment/'.$val->id.'"><button type="button" class="btn btn-success">Confirm Bank Payment</button></a>';
                                                        }else{
                                                            $act = '';
                                                        }
                                                            
                                                        
                                                        echo '<tr>'
                                                                . '<td>'.$s.'</td>'
                                                                . '<td>'.$coy['company_name'].'</td>'
                                                                . '<td>'.$val->amount.'</td>'
                                                                . '<td>'.$val->transaction_time.'</td>'
                                                                . '<td>'.$val->confirmed_date.'</td>'
                                                                . '<td>'.$sta.'</td>'
                                                                . '<td>'.$act.'</td>'
                                                                . '</tr>';
                                                    }
                                                }else{
                                                    echo '<tr><td colspan="8">No Data to display</td></tr>';
                                                }
                                                    
                                                ?>
                                                
                                            </tbody>
                                        </table>
                                        </section>
                                    </div>
                                    <div class="tab-pane" id="cashenvoy">
                                    	<section class="boxpadding">
                                            <table class="display table table-striped" style="font-size: 16px;">
                                                    
                                                    
                                                    <thead>
                                                        <tr>
                                                    <th>S/N</th>
                                                    <th>Company</th>
                                                    <th>Amount</th>
                                                    <th>Returned Amount</th>
                                                    <th>Date</th>
                                                    <th>Status</th></tr>
                                                    </thead>
                                                    
                                            <tbody>
                                                <?php 
                                                if($ce_payments)
                                                {
                                                    foreach ($ce_payments as $val)
                                                    {
                                                        $s++;
                                                        $coy = $this->model_getvalues->getDetails("company", "id", $val->coy_id, "id");
                                                        if($val->transaction_details == '')
                                                        {
                                                            $sta = $val->status;
                                                        }else{
                                                            $sta = $val->status." (".$val->transaction_details.")";
                                                        }
                                                        
                                                        
                                                            
                                                        
                                                        echo '<tr>'
                                                                . '<td>'.$s.'</td>'
                                                                . '<td>'.$coy['company_name'].'</td>'
                                                                . '<td>'.$val->amount.'</td>'
                                                                . '<td>'.$val->returned_amount.'</td>'
                                                                . '<td>'.$val->transaction_time.'</td>'
                                                                . '<td>'.$sta.'</td>'
                                                                . '</tr>';
                                                    }
                                                }else{
                                                    echo '<tr><td colspan="8">No Data to display</td></tr>';
                                                }
                                                    
                                                ?>
                                                
                                            </tbody>
                                        </table>
                                        </section>
                                    </div>
                                    
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





