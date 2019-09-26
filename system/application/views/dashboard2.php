<?php 
$page = "Dashboard";
 ?>

    
    <style>
        .tooltip {
  position: relative;
  display: inline-block;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 140px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px;
  position: absolute;
  z-index: 1;
  bottom: 150%;
  left: 50%;
  margin-left: -75px;
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}
    </style>
           

                        <div class="col-md-9">
                             <header class="s-lineDownLeft">
                <h2 class="s-titleDet">Reseller/Partners Dashboard</h2>
            </header>
                            
                         <div class="row">
                             <div class="col-xs-12" style="margin-bottom: 20px; margin-top: 20px">
                                 <input type="text" value="www.tokunbocars.ng/partner/<?= $ref['username'] ?>" id="myInput" style="display: none">
                                 <h5>Hi <?php echo $user['fullname']." (".$ref['level']." Partner)" ?>, Your Referral Link is below: </h5>
                                 <h4><strong>www.tokunbocars.ng/partner/<?= $ref['username'] ?></strong></h4>
                             </div>
                             
                             <div class="col-md-2 col-lg-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-success pull-left">
                                        <i class="md md-remove-red-eye text-success"></i>
                                    </div>
                                    <div class="text-center">
                                        <h3 class="text-dark"><b class="counter"> &#8358;0.00</b></h3>
                                        <p class="text-muted">Amount Earned</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-2 col-lg-3">
                                <div class="widget-bg-color-icon card-box fadeInDown animated">
                                    <div class="bg-icon bg-icon-info pull-left">
                                        <i class="md md-attach-money text-info"></i>
                                    </div>
                                    <div class="text-center">
                                        <h3 class="text-dark"><b class="counter"><?= $countRefs ?></b></h3>
                                        <p class="text-muted">Recruits</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-2 col-lg-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-pink pull-left">
                                        <i class="md md-add-shopping-cart text-pink"></i>
                                    </div>
                                    <div class="text-center">
                                        <h3 class="text-dark"><b class="counter">0</b></h3>
                                        <p class="text-muted">Direct Sales</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-2 col-lg-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-purple pull-left">
                                        <i class="md md-equalizer text-purple"></i>
                                    </div>
                                    <div class="text-center">
                                        <h3 class="text-dark"><b class="counter">0</b></h3>
                                        <p class="text-muted">Indirect Sales</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            
                        </div>
                            
                            <div class="row m-smallPadding">


                        <table id="example" class="table table-striped" style="box-shadow: #ccc 2px 2px 9px; margin-top: 50px">
                            <thead>

                                <tr>
                                    <th>S/N</th>
                                    <th>Recruit Name</th>
                                    <th>Level</th>
                                    <th>Cars</th>
                                    <th>Commision</th>

                                </tr>
                            </thead>

                            <tbody>
                                
                                    <?php
                                    
                                    if($refs)
                                    {
                                        foreach ($refs as $ref) {
                                           
                                    $s++;
                                    $ref_det = $this->model_getvalues->getDetails("partners", "user_id", $ref->user_id);
                                    if($ref_det)
                                    {
                                        $level = $ref_det['level']." Partner";
                                    }else{
                                        $level = "User";
                                    }

                                    ?>
                                    <tr>
                                        <td><?= $s ?></td>
                                        <td><?= $ref->fullname ?></td>
                                        <td><?= $level ?></td>
                                        <td>0</td>
                                        <td>N0.00</td>
                                    </tr>
<?php } ?>
                                    
                                    <?php 
                                    }else{
                                        echo '<tr><td colspan="5" style="text-align:center">You do not have any referral yet. Click the button above to copy your link and start sharing </td></tr>';
                                    }
                                    
                                     ?>
                                

                            </tbody>
                        </table>

                    </div>

                    </div>
                       
                                   
                        	<!-- end col -->



                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

       
                            
