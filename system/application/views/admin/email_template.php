 <!-- Content Section Start -->
            <div class="content-section">
                <div class="container-liquid">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="sec-box">
                                <a class="closethis">Close</a>
                                <header>
                                    <h2 class="heading">Edit Email Template</h2>
                                </header>
                                <div class="contents">
                                
                                <?php echo validation_errors();
										echo $status;
										echo form_open() ?>
                                    <a class="togglethis">Toggle</a>
                                    	<table class="table table-hover" id="tableSky">
                                            <tbody>
                                            <tr>
                                                    <td class="col-md-2">Template</td>
                                                    <td class="col-md-10">
                                                        <select class="form-control" name="ddlTemplate" id="ddlTemplate" required>
                                                        	<option value="">--Select Template--</option>
                                                                <option value="reg">Company Registration Email</option>
                                                                <option value="deact">Account deactivation Email</option>
                                                                <option value="exten">Expiry date extension Email</option>
                                                                <option value="bank">Bank Payment confirmation Email</option>
                                                        </select><br />
                                                        
														
                                                    </td>
                                                </tr>
                                            </tbody>
                                     	</table>
                                    <section class="boxpadding editor-box">
                                    	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/wysihtml5-0.3.0_rc2.min.js"></script>
										<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-wysihtml5-0.0.2.js"></script>
										<script>
                                        	$(document).ready(function(){
												$('#emw').wysihtml5();
											});
                                        </script>
                                        <textarea id="txtBody" class="form-control" placeholder="Enter text ..." name="txtBody" required></textarea>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success style2" id="btnSubmit2">Submit</button> &nbsp;
                                            <button type="button" class="btn btn-default style2">Cancel</button>
                                        </div>
                                    </section>
                                </div>
                                <?php echo form_close() ?>
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
