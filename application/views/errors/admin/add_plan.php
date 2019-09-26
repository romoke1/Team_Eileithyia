<?php

/**
 * @author Ayodeji Adesola (skyboy4life@gmail.com)
 * @copyright 2014
 */



?>
<script>
											$(document).ready(function(){
												$('.minimalcheckradios').iCheck({
													checkboxClass: 'icheckbox_minimal',
													radioClass: 'iradio_minimal',
													increaseArea: '20%' // optional
												  });
												  $('.bluecheckradios').iCheck({
													checkboxClass: 'icheckbox_flat-blue',
													radioClass: 'iradio_flat-blue',
													increaseArea: '20%' // optional
												  });
												  $('.greencheckradios').iCheck({
													checkboxClass: 'icheckbox_flat-green',
													radioClass: 'iradio_flat-green',
													increaseArea: '20%' // optional
												  });
												  $('.orangecheckradios').iCheck({
													checkboxClass: 'icheckbox_flat-orange',
													radioClass: 'iradio_flat-orange',
													increaseArea: '20%' // optional
												  });
												  $('.redcheckradios').iCheck({
													checkboxClass: 'icheckbox_flat-red',
													radioClass: 'iradio_flat-red',
													increaseArea: '20%' // optional
												  });
												});
												$(document).ready(function(){
												  $('.bluebutns').each(function(){
													var self = $(this),
													  label = self.next(),
													  label_text = label.text();
												
													label.remove();
													self.iCheck({
													  checkboxClass: 'icheckbox_line-blue',
													  radioClass: 'iradio_line-blue',
													  insert: '<div class="icheck_line-icon"></div>' + label_text
													});
												  });
												  $('.greenbutns').each(function(){
													var self = $(this),
													  label = self.next(),
													  label_text = label.text();
												
													label.remove();
													self.iCheck({
													  checkboxClass: 'icheckbox_line-green',
													  radioClass: 'iradio_line-green',
													  insert: '<div class="icheck_line-icon"></div>' + label_text
													});
												  });
												  $('.orangebutns').each(function(){
													var self = $(this),
													  label = self.next(),
													  label_text = label.text();
												
													label.remove();
													self.iCheck({
													  checkboxClass: 'icheckbox_line-orange',
													  radioClass: 'iradio_line-orange',
													  insert: '<div class="icheck_line-icon"></div>' + label_text
													});
												  });
												  $('.redbutns').each(function(){
													var self = $(this),
													  label = self.next(),
													  label_text = label.text();
												
													label.remove();
													self.iCheck({
													  checkboxClass: 'icheckbox_line-red',
													  radioClass: 'iradio_line-red',
													  insert: '<div class="icheck_line-icon"></div>' + label_text
													});
												  });
											});  	
										</script>
<!-- Content Section Start -->
            <div class="content-section">
                <div class="container-liquid">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="sec-box">
                                <header>
                                    <h2 class="heading">Add new plan </h2>
                                </header>
                                <div class="contents">
                                    <div class="table-box">
                                <?php echo validation_errors(); ?>
                                <?php echo $status ?>
                                    <?php echo form_open() ?>
                                        <div class="col-xs-9">
                                            <table class="display table table-hover" style="font-size: 16px;">
                                                <tbody>
                                                    <tr style="background-color: white;">
                                                        <td class="col-sm-1">Plan Name</td>
                                                        <td class="col-sm-3"><input name="txtPlan" type="text" value="<?php echo $this->input->post('txtPlan') ?>" class="form-control" required ></td>
                                                    </tr>
                                                    <tr style="background-color: white;">
                                                        <td class="col-sm-1">Price</td>
                                                        <td class="col-sm-3"><input name="txtPrice" type="number" value="<?php echo $this->input->post('txtPrice') ?>" class="form-control" required ></td>
                                                    </tr>
                                                    <tr style="background-color: white;">
                                                        <td class="col-sm-1">Duration (Months)</td>
                                                        <td class="col-sm-3"><input name="txtMonths" type="number" value="<?php echo $this->input->post('txtMonths') ?>" class="form-control" required ></td>
                                                    </tr>
                                                    <tr style="background-color: white;">
                                                        <td> Max. No. of Employees</td>
                                                        <td><input name="txtNum" type="number" value="<?php echo $this->input->post('txtNum') ?>" class="form-control" required >
                                                        </td>
                                                    </tr>
                                                    <tr style="background-color: white;">
                                                        <td> Sections:</td>
                                                        <td>
                                                            <div class="custom-radio-checkbox">
                                                                <input tabindex="1" type="checkbox" class="bluebutns" name="sections" value="payroll" id="sections1" checked disabled="disabled">
                                                                <label>Employees</label>
                                                            </div>
                                                            
                                                            <div class="custom-radio-checkbox">
                                                                <input tabindex="1" type="checkbox" class="bluebutns" name="sections" value="payroll" id="sections1">
                                                                <label>Payroll</label>
                                                            </div>
                                                            
                                                            <div class="custom-radio-checkbox">
                                                                <input tabindex="1" type="checkbox" class="bluebutns" name="sections" value="training" id="sections2">
                                                                <label>Training</label>
                                                            </div>
                                                            
                                                            <div class="custom-radio-checkbox">
                                                                <input tabindex="1" type="checkbox" class="bluebutns" name="sections" value="reports" id="sections2">
                                                                <label>Reports</label>
                                                            </div>
                                                            
                                                            <div class="custom-radio-checkbox">
                                                                <input tabindex="1" type="checkbox" class="bluebutns" name="sections" value="disciplinary" id="sections2">
                                                                <label>Disciplinary</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr style="background-color: white;">
                                                    <td class="col-md-1"></td>
                                                    <td class="col-md-3">
                                                    <button type="submit" class="btn btn-success style2">Submit</button></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
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





