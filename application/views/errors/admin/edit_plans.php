<?php

/**
 * @author Ayodeji Adesola (skyboy4life@gmail.com)
 * @copyright 2014
 */
   $ajax = ajax();

?>
<!-- Content Section Start -->
            <div class="content-section">
                <div class="container-liquid">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="sec-box">
                                <header>
                                    <h2 class="heading">Edit Plans </h2>
                                </header>
                                <div class="contents">
                                    <div class="table-box">
                                <?php echo validation_errors(); ?>
                                <?php echo $status ?>
                                    <?php echo form_open() ?>
                                            <table class="display table table-striped" style="font-size: 16px;">
                                                    
                                                    
                                                    <thead>
                                                        <tr>
                                                    <th>S/N</th>
                                                    <th>Plan Name</th>
                                                    <th>Price</th>
                                                    <th>Duration</th>
                                                    <th>Max. No.</th>
                                                    <th>Status</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th></tr>
                                                    </thead>
                                                    
                                            <tbody>
                                                <?php 
                                                if($plans)
                                                {
                                                    foreach ($plans as $val)
                                                    {
                                                        if($cj)
                                                        {
                                                            $ajax->click('plan'.$val->id.'', $ajax->call('../ajax.php?response/edit_plan/'.$val->id.''));
                                                        }else{
                                                            $ajax->click('plan'.$val->id.'', $ajax->call('../../ajax.php?response/edit_plan/'.$val->id.''));
                                                        }
                                                        
                                                        switch ($val->status)
                                                        {
                                                            case 0:
                                                                $sta = "Inactive";
                                                                $lnk = '<input type="button"  onclick=activate_plan('.$val->id.') class="btn btn-success style2" value="Activate" />';
                                                                break;
                                                            
                                                            case 1:
                                                                $sta = "Active";
                                                                $lnk = '<input type="button" onclick=deactivate_plan('.$val->id.') class="btn btn-danger style2" value="Deactivate" />';
                                                                break;
                                                        }
                                                        
                                                        $s++;
                                                        echo '<tr>'
                                                                . '<td>'.$s.'</td>'
                                                                . '<td>'.$val->name.'</td>'
                                                                . '<td>'.$val->price.'</td>'
                                                                . '<td>'.$val->months.'</td>'
                                                                . '<td>'.$val->max_emp.'</td>'
                                                                . '<td>'.$lnk.'</td>'
                                                                
                                                                . '<td><a href="#"  onclick="skybaba()"><img id="plan'.$val->id.'" src="'.base_url().'assets/images/edit.png" alt="View" /></a></td>'
                                                                . '<td><a href="#" onclick="delete_plan('.$val->id.', \''.$val->name.'\')"><img src="'.base_url().'assets/images/del.png" alt="Edit" /></a></td>'
                                                                . '</tr>';
                                                    }
                                                }else{
                                                    echo '<tr><td colspan="8">No Data to display</td></tr>';
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





