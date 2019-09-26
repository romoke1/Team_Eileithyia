<style>
    form-group.multiselect-native-select select {
        border: 0!important;
        clip: rect(0 0 0 0)!important;
        height: 1px!important;
        margin: -1px -1px -1px -3px!important;
        overflow: hidden!important;
        padding: 0!important;
        position: absolute!important;
        width: 1px!important;
        left: 50%;
        top: 30px;
    }
</style>
<!-- Main content -->
<div class="main-content">
    <h1 class="page-title">Add Cars</h1>
    <!-- Breadcrumb -->
    <ol class="breadcrumb breadcrumb-2"> 
        <li><a href="<?= base_url() ?>dealers/dashboard"><i class="fa fa-home"></i>Dashboard</a></li> 
        <li class="active"><strong>Add Cars</strong></li> 
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Add Car Details</h4>

                </div>
                <div class="panel-body">
                    <?= validation_errors() ?>
                    <?= $status ?>
                     <?php echo form_open_multipart(); ?>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="make">Make</label>

                                <select class="select2 form-control select2-hidden-accessible" name="make" id="Model"  onchange="fetchModel2()" tabindex="-1" aria-hidden="true">
                                    <option>Select a Maker</option>
                                    <?php
                                    foreach ($cat as $category) {
                                        ?>
                                        <option value="<?= $category->make_id ?>"><?= $category->name ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3"  id="mode1">
                            <div class="form-group">
                                <label for="model">Model</label>
                                <select class="select2 form-control select2-hidden-accessible" name="model" tabindex="-1" aria-hidden="true">
                                    <option>Select  Model</option>
                                </select>                            
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="others">Others</label>
                                <input type="text" name="others" class="form-control" id="emailaddress" placeholder="others">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="year">Year</label>
                                <select class="select2 form-control select2-hidden-accessible" name="year" tabindex="-1" aria-hidden="true">
                                    <?php
                                    $already_selected_value = 2003;
                                    $earliest_year = 1995;
                                    foreach (range(date('Y'), $earliest_year) as $x) {
                                        print '<option value="' . $x . '"' . ($x === $already_selected_value ? ' selected="selected"' : '') . ' >' . $x . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="vin">Vin</label>
                                <input type="text" name="vin" class="form-control" id="emailaddress" placeholder="Vin" required="">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" name="amount" class="form-control" id="emailaddress" placeholder="Amount" required="">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="Damage">Damage</label>
                                <input type="text" name="damage" class="form-control" id="emailaddress" placeholder="Damage" required="">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="Odometer">Odometer</label>
                                <input type="number" name="odometer" class="form-control" id="emailaddress" placeholder="Odometer" required="">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="Vehicle Status">Vehicle Status</label>
                                <select class="select2 form-control select2-hidden-accessible" name="run" tabindex="-1" aria-hidden="true" required="">
                                    <option>Select Your Choice</option>
                                    <option value="Run and Drive" selected="">Run and Drive</option>
                                    <option value="Non-Runner">Non-Runner</option>
                                </select>                            
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="Car Key">Car Key</label>
                                <select class="select2 form-control select2-hidden-accessible" name="key" tabindex="-1" aria-hidden="true" required="">
                                    <option>Select Your Choice</option>
                                    <option value="Yes" selected="">Yes</option>
                                    <option value="No">No</option>
                                </select>                            
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="Air Bag">Air Bag</label>
                                <select id="dates-field2" class="multiselect-ui form-control" multiple="multiple"  name="airbags[]"  tabindex="-1" aria-hidden="true" required="">
                                    <option value="All intact">All intact</option>
                                    <option value="Right Deploy">Right Deploy </option>
                                    <option value="left Deployed">left Deployed</option>
                                    <option value="Drive Deployed">Drive Deployed</option>
                                    <option value="Passenger Deployed">Passenger Deployed</option>
                                </select>                            
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="Body">Body</label>
                                <select class="select2 form-control select2-hidden-accessible"  name="body" tabindex="-1" aria-hidden="true" required="">
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
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="Fuel">Fuel</label>
                                <select class="select2 form-control select2-hidden-accessible"  name="fuel" tabindex="-1" aria-hidden="true" required="">
                                    <option>Select Your Choice</option>
                                    <option value="Petrol" selected="">Petrol</option>
                                    <option value="Diesel">Diesel</option>
                                </select>                            
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="Transmission">Transmission</label>
                                <select class="select2 form-control select2-hidden-accessible"  name="transmission" tabindex="-1" aria-hidden="true" required="">
                                    <option>Select Your Choice</option>
                                    <option value="Automatic" selected="">Automatic</option>
                                    <option value="Manual">Manual</option>
                                </select>                            
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="Cylinders">Cylinders</label>
                                <select class="select2 form-control select2-hidden-accessible"  name="cylinder" tabindex="-1" aria-hidden="true" required="">
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
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="Estimated Repair Cost">Estimated Repair Cost</label>
                                <input type="text" name="erc" class="form-control" id="emailaddress" placeholder="Estimated Repair Cost" required="">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="Current Tokunbo Value">Current Tokunbo Value</label>
                                <input type="number" name="ctv" class="form-control" id="emailaddress" placeholder="Current Tokunbo Value" required="">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="Estimated Clearing Cost">Estimated Clearing Cost</label>
                                <input type="number" name="ecc" class="form-control" id="emailaddress" placeholder="Estimated Clearing Cost">
                            </div>
                        </div>

<!--                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="Status">Status</label>
                                <select class="select2 form-control select2-hidden-accessible"  name="status" tabindex="-1" aria-hidden="true" required="">
                                    <option>Select Your Choice</option>
                                    <option value="1">Buy Now</option>
                                    <option value="2">On Sail</option>
                                    <option value="3">Arrived</option>
                                </select>                            
                            </div>
                        </div>-->
                        
                        
<!--                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="Estimated Arrival Date">Estimated Arrival Date</label>
                                <input type="date" name="ead" class="form-control" id="datepicker"  placeholder="yyyy/mm/dd">
                            </div>
                        </div>-->
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="Website link">Website Link</label>
                                <input type="text" name="link" class="form-control" id="emailaddress" placeholder="Websiter Link" />
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <footer class="footer-main"> 
        &copy; <?= date('Y') ?> <strong><a target="_blank" href="#/">TokunkoCars.NG</a></strong>. All Right Reserved 
    </footer>	
    <!-- /footer -->

</div>
<!-- /main content -->

