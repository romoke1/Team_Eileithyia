<?php

/**
 * @author Ayodeji Adesola (skyboy4life@gmail.com)
 * @copyright 2014
 */


?>
<style>
    input[type="button"]
    {
        padding: 10px 10px;
    }
</style>
<!-- Content Section Start -->
            <div class="content-section">
                <div class="container-liquid">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="sec-box">
                                <header>
                                    <h2 class="heading">Users (<?php echo $users_num ?>)</h2>
                                </header>
                                
                                <div class="col-sm-12" style="margin-top: -6%;">
                                    <div class="row">
                                        <div class="dropdown col-sm-5 col-sm-offset-10">
                                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Export CSV
                                            <span class="caret"></span></button>
                                            <ul class="dropdown-menu" style="background: #3276b1;">
                                                <li><a href="<?= base_url()?>Phone" style="text-decoration: none; color: #000;">Phone Numbers Only</a></li>
                                                <li><a href="<?= base_url()?>Email" style="text-decoration: none; color: #000;">Emails Only</a></li>
                                                <li><a href="<?= base_url()?>EmailPhone" style="text-decoration: none; color: #000;">Emails & Phone Numbers</a></li>
                                            </ul>
                                          </div>
                                    </div>
                                </div>
                                
                                <div class="contents">
                                    <div class="table-box">
                                <?php echo validation_errors(); ?>
                                <?php echo $status ?>
                                    <?php echo form_open() ?>
                                            <table class="display table table-striped" style="font-size: 12px;">
                                                    
                                                    
                                                    <thead>
                                                        <tr>
                                                    <th>Fullname</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Reg. Date</th>
                                                    <th>Status</th>
                                                    <th>View</th>
<!--                                                    <th>Edit</th>-->
                                                    <th></th></tr>
                                                    </thead>
                                                    
                                            <tbody>
                                                <?php 
                                                if($coys)
                                                {
                                                    foreach ($coys as $val)
                                                    {
                                                        switch ($val->status)
                                                        {
                                                            case 0:
                                                                $sta = "Inactive";
                                                                $lnk = '<input type="button"  onclick=activate_coy('.$val->user_id.') class="btn btn-danger style2" value="Activate" />';
                                                                break;
                                                            
                                                            case 1:
                                                                $sta = "Active";
                                                                $lnk = '<input type="button" onclick=deactivate_coy('.$val->user_id.') class="btn btn-success style2" value="Deactivate" />';
                                                                break;
                                                            
                                                            case 3:
                                                                $sta = "Suspended";
                                                                $lnk = '<input type="button" onclick=deactivate_coy('.$val->user_id.') class="btn btn-success style2" value="Unsuspend" />';
                                                                break;
                                                        }
                                                        
//                                                        $state = $this->model_getvalues->getDetails("states", "state_id", $val->state, "state_id");
                                                        $s++;
                                                        echo '<tr>'
                                                                . '<td>'.$val->fullname.'</td>'
                                                                . '<td>'.$val->email.'</td>'
                                                                . '<td>'.$val->phone.'</td>'
//                                                                . '<td>'.$state['state'].'</td>'
                                                                . '<td>'.$val->date_joined.'</td>'
                                                                . '<td>'.$sta.'</td>'
                                                                . '<td><a href="'.  base_url().'admin/user_profile/'.$val->user_id.'"><img src="'.base_url().'assets/admin/images/view.png" alt="View" /></a></td>'
//                                                                . '<td><a href="'.  base_url().'admin/edit_company_profile/'.$val->user_id.'"><img src="'.base_url().'assets/images/edit.png" alt="Edit" /></a></td>'
                                                                . '<td>'.$lnk.'</td>'
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





