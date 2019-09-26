 <div class="content-section">
                <div class="container-liquid">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="tabs-section">
                                <ul class="nav nav-tabs" id="myTab">
                                    <li class="active"><a href="#home" data-toggle="tab">Car</a></li>
                                    <!-- <li><a href="#profile" data-toggle="tab">Profile</a></li> -->
                                    <!-- <li><a href="#messages" data-toggle="tab">Messages</a></li> -->
                                </ul>
                                <div class="tab-content">
                                          <?php
                                    echo validation_errors();
                                    echo $status
                                    ?>
                                    <div class="tab-pane active" id="home">
                                        <section class="boxpadding">

                                    <?php echo form_open_multipart(); ?>

                                        <div class="col-xs-3">
                              
                                    <label>Select User</label>
                                    <select class="form-control" name="ddlUser" id="Model"  onchange="fetchOrders()" >
                                        <option>Select User</option>
                                         <?php
                                        foreach ($users as $user) {
                                            echo '<option value="' . $user->user_id . '">' . $user->fullname . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div> 

                                <div class="col-xs-3" id="model1">
                         
                                    <label>Choose Order</label>
                                    <select class="form-control"  >
                                        <option>Select A Model</option>
                                     
                                    </select>
                                </div>

                       

 
                                 <div class="col-xs-3">
                              
                                    <label>Amount</label>
                                    <input type="number" lang="en-150" name="amount" class="form-control" required >
                                </div> 
                               
                                 <div class="col-xs-3">
                            
                                     <label>Payment Method</label>
                                     <select class="form-control" name="ddlPay" required >
                                        <option>Select Your Choice</option>
                                        <option value="bank">Bank</option>
                                        <option value="online">Online</option>
                                        <option value="bitcoin">Bitcoin</option>
                                    </select>
                                    
                                </div>
                                            
                                            <div class="col-xs-3">
                            
                                     <label>Payment Details</label>
                                     <input type="text" name="txtDet" class="form-control" required >
                                    
                                </div>
 <div class="col-xs-3 ">
                                    <label>Due   Date</label>
                               <input type='text' class="form-control"  name="ddlDate" id="datepicker" value="" placeholder="yyyy/mm/dd" />

                                </div>
                                 <div class="col-xs-3">
                                     <!-- <a href="#profile"  data-toggle="tab"   class="btn btn-success style2" style="float: right;">NEXT </a> -->
                                            <button class="btn btn-success style2">Submit</button>

                                 </div>
                        
                               <?php echo form_close(); ?>
                       
                                
                                        </section>
                                    </div>
                                   
                                  
                                    <div class="tab-pane" id="messages">
                                        <section class="boxpadding">
                                          
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                    <!-- Row End -->
                </div>
            </div>
            <!-- Content Section End -->

<!-- Right Section Header End -->
<!-- Content Section Start -->

<!-- Wrapper End -->
</body>
</html>


<script type="text/javascript">
$(function() {
    $('.multiselect-ui').multiselect({
        includeSelectAllOption: true
    });
});
</script>
 <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>


