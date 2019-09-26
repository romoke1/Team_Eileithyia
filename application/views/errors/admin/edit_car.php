 <div class="content-section">
                <div class="container-liquid">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="tabs-section">
                                <ul class="nav nav-tabs" id="myTab">
                                    <li class="active"><a href="#home" data-toggle="tab">Edit Car</a></li>
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
                              
                                    <label>Make</label>
                                    <select class="form-control" name="make" id="Model"  onchange="fetchModel()" >
                                        <option>Select A Maker <?= $car_det['make'] ?></option>
                                         <?php
                                        foreach ($cat as $category) {
                                            if($category->make_id === $car_det['make']){
                                                echo '<option value="' . $category->make_id . '" selected>' . $category->name . '</option>';
                                            }else{
                                                echo '<option value="' . $category->make_id . '">' . $category->name . '</option>';
                                            }
                                            
                                        }
                                        ?>
                                    </select>
                                </div> 

                                <div class="col-xs-3" id="model1">
                         
                                    <label>Model</label>
                                    <select class="form-control" name="model"  >
                                        <option value="<?= $model_det['model_id'] ?>"><?= $model_det['name'] ?></option>
                                     
                                    </select>
                                </div>
                                            
                                            <div class="col-xs-3">
                                
                                    <label>Others</label>
                                    <input type="text" name="others" class="form-control" value="<?= $car_det['others'] ?>" >
                                </div> 
                                            
                                            
                                  <div class="col-xs-3">
                            
                                    <label>Year</label>
                                    <select class="form-control" name="year" >
                                    <?php 

                                    
                                    for($x=1996; $x<2019; $x++)
                                    {
                                        if($x == $car_det['year']){
                                            echo '<option value="'.$x.'" selected>'.$x.'</option>';
                                        }else{
                                            echo '<option value="'.$x.'">'.$x.'</option>';
                                        }
                                        
                                    }
                                     ?>
                                        
                                    </select>
                                    
                                </div>

                       



                                   <div class="col-xs-3">
                                
                                    <label>Vin</label>
                                    <input type="text" name="vin" class="form-control" value="<?= $car_det['vin'] ?>" required >
                                </div> 
                                         
                                 <div class="col-xs-3">
                              
                                    <label>Amount</label>
                                   <input type="num" name="amount" class="form-control" value="<?= $car_det['amount'] ?>" required >
                                </div> 
                                 <div class="col-xs-3">
                               
                                    <label>Damage</label>
                                    <input type="text" name="damage" class="form-control" value="<?= $car_det['damage'] ?>" required >
                                    
                                </div> 
                                 <div class="col-xs-3">
                              
                                    <label>odometer</label>
                                    <input type="number" name="odometer" class="form-control" value="<?= $car_det['odometer'] ?>" required >
                                    
                                </div>
                                <!--  <div class="col-xs-3">
                          
                                    <label>Damage</label>
                                    <input type="" name="" class="form-control">
                                    
                                </div> -->
                                 <div class="col-xs-3">
                            
                                   <label>Vehicle Status</label>
                                     <select class="form-control" name="run" required >
                                        <option>Select Your Choice</option>
                                        <option <?php if($car_det['run'] == 'Run and Drive') : echo 'selected'; endif; ?> value="Run and Drive">Run and Drive</option>
                                        <option <?php if($car_det['run'] == 'Non-Runner') : echo 'selected'; endif; ?> value="Non-Runner">Non-Runner</option>
                                    </select>
                                    
                                </div>

                                  <div class="col-xs-3">
                              
                                    <label>Car Key</label>
                                     <select class="form-control" name="key" required >
                                        <option>Select Your Choice</option>
                                        <option <?php if($car_det['car_keys'] == 'Yes') : echo 'selected'; endif; ?> value="Yes">Yes</option>
                                        <option <?php if($car_det['car_keys'] == 'No') : echo 'selected'; endif; ?> value="No">No</option>
                                    </select>
                                    
                                </div>

                                <div class="col-xs-3">
                                    <label> Air Bags</label>
                                    <select id="dates-field2" class="multiselect-ui form-control" multiple="multiple"  name="airbags[]" required>
                                          <option value="All intact" <?php if($car_det['airbags'] == 'All intact') : echo 'selected'; endif; ?>>All intact</option>
                                          <option value="Right Deploy" <?php if($car_det['airbags'] == 'Right Deploy') : echo 'selected'; endif; ?>>Right Deploy </option>
                                          <option value="Left Deployed" <?php if($car_det['airbags'] == 'Left Deployed') : echo 'selected'; endif; ?>>Left Deployed</option>
                                          <option value="Drive Deployed" <?php if($car_det['airbags'] == 'Drive Deployed') : echo 'selected'; endif; ?>>Drive Deployed</option>
                                          <option value="Passenger Deployed" <?php if($car_det['airbags'] == 'Passenger Deployed') : echo 'selected'; endif; ?>>Passenger Deployed</option>
                                        </select>
                                </div>

                                 <div class="col-xs-3">
                               
                                    <label>Body</label>
                                     <select class="form-control"  name="body" required>
                                        <option>Select Your Choice</option>
                                        <option <?php if($car_det['body'] == 'Coupe') : echo 'selected'; endif; ?> value="Coupe">Coupe</option>
                                        <option <?php if($car_det['body'] == 'Suv') : echo 'selected'; endif; ?> value="Suv">Suv</option>
                                        <option <?php if($car_det['body'] == 'Convertible') : echo 'selected'; endif; ?> value="Convertible">Convertible</option>
                                        <option <?php if($car_det['body'] == 'Sedan') : echo 'selected'; endif; ?> value="Sedan">Sedan</option>
                                        <option <?php if($car_det['body'] == 'Minicar') : echo 'selected'; endif; ?> value="Minicar">Minicar</option>
                                        <option <?php if($car_det['body'] == 'Van') : echo 'selected'; endif; ?> value="Van">Van</option>
                                        <option <?php if($car_det['body'] == 'HatchBack') : echo 'selected'; endif; ?> value="HatchBack">HatchBack</option>
                                        <option <?php if($car_det['body'] == 'Pickup') : echo 'selected'; endif; ?> value="Pickup">Pickup</option>
                                    </select>
                                    
                                </div>
                                  <div class="col-xs-3">
                         
                                    <label>Fuel</label>
                                     <select class="form-control"  name="fuel">
                                        <option>Select Your Choice</option>
                                        <option <?php if($car_det['fuel'] == 'Petrol') : echo 'selected'; endif; ?> value="Petrol">Petrol</option>
                                        <option <?php if($car_det['fuel'] == 'Diesel') : echo 'selected'; endif; ?> value="Diesel">Diesel</option>
                                    </select>
                                    
                                </div>
                                  <div class="col-xs-3">
                          
                                    <label>Transmission</label>
                                     <select class="form-control"  name="transmission" required>
                                        <option>Select Your Choice</option>
                                        <option <?php if($car_det['transmission'] == 'Automatic') : echo 'selected'; endif; ?> value="Automatic">Automatic</option>
                                        <option <?php if($car_det['transmission'] == 'Manual') : echo 'selected'; endif; ?> value="Manual">Manual</option>
                                
                                    </select>
                                    
                                </div>
                                
                                 <div class="col-xs-3">
                          
                                    <label>Cylinders</label>
                                     <select class="form-control"  name="cylinder" required>
                                        <option>Select Your Choice</option>
                                        <option <?php if($car_det['cylinder'] == '3') : echo 'selected'; endif; ?> value="3">3 Cylinders</option>
                                        <option <?php if($car_det['cylinder'] == '4') : echo 'selected'; endif; ?> value="4">4 Cylinders</option>
                                        <option <?php if($car_det['cylinder'] == '5') : echo 'selected'; endif; ?> value="5">5 Cylinders</option>
                                        <option <?php if($car_det['cylinder'] == '6') : echo 'selected'; endif; ?> value="6">6 Cylinders</option>
                                        <option <?php if($car_det['cylinder'] == '8') : echo 'selected'; endif; ?> value="8">8 Cylinders</option>
                                        <option <?php if($car_det['cylinder'] == '10') : echo 'selected'; endif; ?> value="10">10 Cylinders</option>
                                        <option <?php if($car_det['cylinder'] == '12') : echo 'selected'; endif; ?> value="12">12 Cylinders</option>
                                
                                    </select>
                                    
                                </div>



                                <div class="col-xs-3">
                                    <label>Estimated Repair Cost</label>
                                    <input type="text" name="erc" class="form-control" value="<?= $car_det['erc'] ?>" required > 
                                </div>
                                 <div class="col-xs-3">
                                    <label>Current Tokunbo Value</label>
                                    <input type="number" name="ctv" class="form-control" value="<?= $car_det['ctv'] ?>" required > 
                                </div>
                                <div class="col-xs-3">
                                    <label>Estimated Clearing Cost</label>
                                    <input type="number" name="ecc" class="form-control" value="<?= $car_det['ecc'] ?>" required  > 
                                </div>
                                 <div class="col-xs-3 ">
                                    <label>Estimated Arrival  Date</label>
                               <input type='text' class="form-control"  name="ead" id="datepicker" value="<?= $car_det['ead'] ?>" placeholder="yyyy/mm/dd" />

                                </div>
                                    <div class="col-xs-3 ">
                                  <label>Status</label>
                                     <select class="form-control"  name="status" required>
                                        <option>Select Your Choice</option>
                                        <option value="1" <?php if($car_det['status'] == '1') : echo 'selected'; endif; ?>>Buy Now</option>
                                        <option value="2" <?php if($car_det['status'] == '2') : echo 'selected'; endif; ?>>On Sail</option>
                                        <option value="3" <?php if($car_det['status'] == '3') : echo 'selected'; endif; ?>>Arrived</option>
                                        <option value="4">Sold</option>
                                
                                    </select>
                                </div>
                                
                                <div class="col-xs-3">
                                    <label>Website Link</label>
                                    <input type="text" name="link" value="<?= $car_det['link'] ?>" class="form-control" > 
                                </div>
                                 <!--  <div class="col-xs-3">
                                      <input type="file" class="form-control"  name="userfile" >
                                    </div> -->
                                 <div class="col-xs-3">
                                     <!-- <a href="#profile"  data-toggle="tab"   class="btn btn-success style2" style="float: right;">NEXT </a> -->
                                            <button class="btn btn-success style2">Submit</button>

                                 </div>
                        
                               <?php echo form_close(); ?>
                       
                                
                                        </section>
                                    </div>
                                    <!-- <div class="tab-pane" id="profile">
                                        <section class="boxpadding">
                                         <div class="col-xs-4">
                                                    
                                                      <input type="file" class="form-control" name="userFiles[]" multiple/>
                                         </div>
                                          <div class="col-xs-4">
                                                    <input type="file">
                                         </div>
                                          <div class="col-xs-4">
                                                    <input type="file">
                                         </div>
                                          <div class="col-xs-4">
                                                    <input type="file">
                                         </div>
                                          <div class="col-xs-4">
                                                    <input type="file">
                                         </div>
                                          <div class="col-xs-4">
                                                    <input type="file">
                                         </div>
                                          <div class="col-xs-4">
                                                    <input type="file">
                                         </div>
                                          <div class="col-xs-4  ">
                                                    <input type="file">
                                         </div>
                                                
                                        <div class="col-xs-4">
                                              <a href="#home"  data-toggle="tab"   class="btn btn-success style2" >Back </a>
                                            <button class="btn btn-success style2">Submit</button>
                                        </div>
                                        </section>
                                    </div> -->
                                    
                                  
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


