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
                                    <h2 class="heading">Settings </h2>
                                </header>
                                <section style="margin:10px">
                                        <ul class="nav nav-tabs">
                                            <li><a href="#">Payment Gateways</a></li>
                                            <li class="dropdown active"><a href="#">HR Types</a></li>
                                            
                                        </ul>
                                    </section>
                                <div class="contents">
                                    <div class="table-box">
                                <?php echo validation_errors(); ?>
                                <?php echo $status ?>
                                            <table class="table" id="tableSky">
                                           
                                            <tbody>
                                    <?php echo form_open() ?>
                                                
                                                
                                                 <?php echo form_open('admin/save_bank') ?>
                                                 <tr class="tbHeading">
                                                    
                                                    <th colspan="3">1. Bank Transfer</th>
                                                </tr>
                                                <tr>
                                                    <td class="col-xs-2">Bank Transfer Details:</td>
                                                    <td><textarea class="form-control" name="txtBankDetails" rows="5"><?php echo $bank['details'] ?></textarea></td> <td valign="bottom"> <input type="submit" value="Save Bank Details" class="btn btn-success style2"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Status:
                                                    </td>
                                                    <td>
                                                        <?php echo $bank['status'] ?> <?php if($bank['status'] == 'Active') :?> &nbsp;<a href="<?php echo base_url() ?>admin/deactivate_payment/1" > <input type="button" value="Deactivate" class="btn btn-danger style2"> </a>
                                                        <?php else: ?>
                                                            <a href="<?php echo base_url() ?>admin/activate_payment/1" ><input type="button" value="Activate" class="btn btn-success style2"></a> 
                                                        <?php endif; ?>
                                                    </td><td></td>
                                                </tr>
                                                 <tr class="tbHeading">
                                                    
                                                    <th colspan="3">2. Cash Envoy</th>
                                                </tr>
                                               
                                                <tr>
                                                    <td>
                                                        Status:
                                                    </td>
                                                    <td>
                                                        <?php echo $cash['status'] ?> <?php if($cash['status'] == 'Active') :?> &nbsp; <a href="<?php echo base_url() ?>admin/deactivate_payment/2" ><input type="button" value="Deactivate" class="btn btn-danger style2"> </a>
                                                        <?php else: ?>
                                                            <a href="<?php echo base_url() ?>admin/activate_payment/2" ><input type="button" value="Activate" class="btn btn-success style2"></a> 
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                 <tr class="tbHeading">
                                                    
                                                    <th colspan="3">1. Interswitch</th>
                                                </tr>
                                                
                                                <tr>
                                                    <td>
                                                        Status:
                                                    </td>
                                                    <td>
                                                        <?php echo $inter['status'] ?> <?php if($inter['status'] == 'Active') :?> &nbsp; 
                                                            <a href="<?php echo base_url() ?>admin/deactivate_payment/3" ><input type="button" value="Deactivate" class="btn btn-danger style2"></a> 
                                                        <?php else: ?>
                                                            <a href="<?php echo base_url() ?>admin/activate_payment/3" ><input type="button" value="Activate" class="btn btn-success style2"></a> 
                                                        <?php endif; ?>
                                                    </td><td></td>
                                                </tr>
                                                
                                        <?php form_close() ?>
                                            </tbody>
                                               
                                                
                                            
                                            </table>
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





