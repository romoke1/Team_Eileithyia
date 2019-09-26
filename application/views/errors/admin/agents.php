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
                                    <h2 class="heading">Agents (<?php echo $users_num ?>)</h2>
                                </header>
                                <div class="contents">
                                    <div class="table-box">
                                <?php echo validation_errors(); ?>
                                <?php echo $status ?>
                                    <?php echo form_open() ?>
                                            <table class="display table table-striped" style="font-size: 12px;">
                                                    
                                                    
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                    <th>Fullname</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <th>State</th>
                                                    <th>Address</th>
                                                    <th>Gender</th></tr>
                                                    </thead>
                                                    
                                            <tbody>
                                                <?php 
                                                if($partners)
                                                {
                                                    foreach ($partners as $val)
                                                    {
                                                        
//                                                        $state = $this->model_getvalues->getDetails("states", "state_id", $val->state, "state_id");
                                                        $s++;
                                                        echo '<tr>'
                                                                . '<td>'.$s.'</td>'
                                                                . '<td>'.$val->name.'</td>'
                                                                . '<td>'.$val->phone.'</td>'
                                                                . '<td>'.$val->email.'</td>'
                                                                . '<td>'.$val->state.'</td>'
                                                                . '<td>'.$val->address.'</td>'
                                                                . '<td>'.$val->gender.'</td>'
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





