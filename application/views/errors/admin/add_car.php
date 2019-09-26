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
                        //echo $status
                        ?>
                        <div class="tab-pane active" id="home">
                            <section class="boxpadding">

                                <?php echo form_open_multipart(); ?>

                                <div class="col-xs-3">

                                    <label>Make</label>
                                    <select class="form-control" name="make" id="Model"  onchange="fetchModel()" >
                                        <option>Select A Maker</option>
                                        <?php
                                        foreach ($cat as $category) {
                                            echo '<option value="' . $category->make_id . '">' . $category->name . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div> 

                                <div class="col-xs-3" id="model1">

                                    <label>Model</label>
                                    <select class="form-control"  >
                                        <option>Select A Model</option>

                                    </select>
                                </div>

                                <div class="col-xs-3">

                                    <label>Others</label>
                                    <input type="text" name="others" class="form-control" >
                                </div> 

                                <div class="col-xs-3">

                                    <label>Year</label>
                                    <?php
                                    $already_selected_value = 2003;
                                    $earliest_year = 1995;

                                    print '<select class="form-control" name="year" >';
                                    foreach (range(date('Y'), $earliest_year) as $x) {
                                        print '<option value="' . $x . '"' . ($x === $already_selected_value ? ' selected="selected"' : '') . ' >' . $x . '</option>';
                                    }
                                    print '</select>';
                                    ?>

                                </div>





                                <div class="col-xs-3">

                                    <label>Vin</label>
                                    <input type="text" name="vin" class="form-control" required >
                                </div> 


                                <div class="col-xs-3">

                                    <label>Amount</label>
                                    <input type="number" lang="en-150" name="amount" class="form-control" required >
                                </div> 
                                <div class="col-xs-3">

                                    <label>Damage</label>
                                    <input type="text" name="damage" class="form-control" required >

                                </div> 
                                <div class="col-xs-3">

                                    <label>odometer</label>
                                    <input type="number" name="odometer" class="form-control" required >

                                </div>
                                <!--  <div class="col-xs-3">
                          
                                    <label>Damage</label>
                                    <input type="" name="" class="form-control">
                                    
                                </div> -->
                                <div class="col-xs-3">

                                    <label>Vehicle Status</label>
                                    <select class="form-control" name="run" required >
                                        <option>Select Your Choice</option>
                                        <option value="Run and Drive" selected="">Run and Drive</option>
                                        <option value="Non-Runner">Non-Runner</option>
                                    </select>

                                </div>

                                <div class="col-xs-3">

                                    <label>Car Key</label>
                                    <select class="form-control" name="key" required >
                                        <option>Select Your Choice</option>
                                        <option value="Yes" selected="">Yes</option>
                                        <option value="No">No</option>
                                    </select>

                                </div>

                                <div class="col-xs-3">
                                    <label> Air Bags</label>
                                    <select id="dates-field2" class="multiselect-ui form-control" multiple="multiple"  name="airbags[]" required>
                                        <option value="All intact">All intact</option>
                                        <option value="Right Deploy">Right Deploy </option>
                                        <option value="left Deployed">left Deployed</option>
                                        <option value="Drive Deployed">Drive Deployed</option>
                                        <option value="Passenger Deployed">Passenger Deployed</option>
                                    </select>
                                </div>

                                <div class="col-xs-3">

                                    <label>Body</label>
                                    <select class="form-control"  name="body" required>
                                        <option>Select Your Choice</option>
                                        <option value="Coupe">Coupe</option>
                                        <option value="Suv">Suv</option>
                                        <option value="Convertible">Convertible</option>
                                        <option value="Sedan">Sedan</option>
                                        <option value="Minicar">Minicar</option>
                                        <option value="Van">Van</option>
                                        <option value="HatchBack">HatchBack</option>
                                        <option value="Pickup">Pickup</option>
                                    </select>

                                </div>
                                <div class="col-xs-3">

                                    <label>Fuel</label>
                                    <select class="form-control"  name="fuel">
                                        <option>Select Your Choice</option>
                                        <option value="Petrol" selected="">Petrol</option>
                                        <option value="Diesel">Diesel</option>
                                    </select>

                                </div>
                                <div class="col-xs-3">

                                    <label>Transmission</label>
                                    <select class="form-control"  name="transmission" required>
                                        <option>Select Your Choice</option>
                                        <option value="Automatic" selected="">Automatic</option>
                                        <option value="Manual">Manual</option>

                                    </select>

                                </div>

                                <div class="col-xs-3">

                                    <label>Cylinders</label>
                                    <select class="form-control"  name="cylinder" required>
                                        <option>Select Your Choice</option>
                                        <option value="3">3 Cylinders</option>
                                        <option value="4">4 Cylinders</option>
                                        <option value="5">5 Cylinders</option>
                                        <option value="6">6 Cylinders</option>
                                        <option value="8">8 Cylinders</option>
                                        <option value="10">10 Cylinders</option>
                                        <option value="12">12 Cylinders</option>

                                    </select>

                                </div>




                                <div class="col-xs-3">
                                    <label>Estimated Repair Cost</label>
                                    <input type="text" name="erc" class="form-control" required > 
                                </div>
                                <div class="col-xs-3">
                                    <label>Current Tokunbo Value</label>
                                    <input type="number" name="ctv" class="form-control" required > 
                                </div>
                                <div class="col-xs-3">
                                    <label>Estimated Clearing Cost</label>
                                    <input type="number" name="ecc" class="form-control" > 
                                </div>
                                <div class="col-xs-3 ">
                                    <label>Status</label>
                                    <select class="form-control"  name="status" required>
                                        <option>Select Your Choice</option>
                                        <option value="1">Buy Now</option>
                                        <option value="2">On Sail</option>
                                        <option value="3">Arrived</option>

                                    </select>
                                </div>
                                
                                <div class="col-xs-3 ">
                                    <label>Estimated Arrival Date</label>
                               <input type='text' class="form-control"  name="ead" id="datepicker"  placeholder="yyyy/mm/dd" />

                                </div>
                                
                                <div class="col-xs-3">
                                    <label>Website Link</label>
                                    <input type="text" name="link" class="form-control" > 
                                </div>
                                <div class="col-xs-3">

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
    $(function () {
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


