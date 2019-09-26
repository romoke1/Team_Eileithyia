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
                                    <h2 class="heading">Partners (<?php echo $users_num ?>)</h2>
                                </header>
                                <div class="contents">
                                    <div class="table-box">
                                <?php echo validation_errors(); ?>
                                <?php echo $status ?>
                                    <?php echo form_open() ?>
                                            <table class="display table table-striped" style="font-size: 12px;">
                                                    
                                                    
                                                    <thead>
                                                        <tr>
                                                    <th>Fullname</th>
                                                    <th>Username</th>
                                                    <th>Level</th>
<!--                                                    <th>State</th>-->
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th>Profile</th>
<!--                                                    <th>Edit</th>-->
                                                    <th></th></tr>
                                                    </thead>
                                                    
                                            <tbody>
                                                <?php 
                                                if($partners)
                                                {
                                                    foreach ($partners as $val)
                                                    {
                                                        $det = $this->model_getvalues->getDetails("users", "user_id", $val->user_id);
                                                        
                                                        switch ($val->status)
                                                        {
                                                            case 0:
                                                                $sta = "Inactive";
                                                                $lnk = '<input type="button"  onclick=activate_coy('.$val->user_id.') class="btn btn-success style2" value="Activate" />';
                                                                break;
                                                            
                                                            case 1:
                                                                $sta = "Active";
                                                                $lnk = '<input type="button" onclick=deactivate_coy('.$val->user_id.') class="btn btn-danger style2" value="Deactivate" />';
                                                                break;
                                                            
                                                            case 3:
                                                                $sta = "Suspended";
                                                                $lnk = '<input type="button" onclick=deactivate_coy('.$val->user_id.') class="btn btn-success style2" value="Unsuspend" />';
                                                                break;
                                                        }
                                                        
//                                                        $state = $this->model_getvalues->getDetails("states", "state_id", $val->state, "state_id");
                                                        $s++;
                                                        echo '<tr>'
                                                                . '<td>'.$det['fullname'].'</td>'
                                                                . '<td>'.$val->username.'</td>'
                                                                . '<td>'.$val->level.'</td>'
//                                                                . '<td>'.$state['state'].'</td>'
                                                                . '<td>'.$val->amount.'</td>'
                                                                . '<td>'.$sta.'</td>'
                                                                . '<td><a href="'.  base_url().'admin/user_profile/'.$val->user_id.'"><img src="'.base_url().'assets/images/view.png" alt="View" /></a></td>'
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





