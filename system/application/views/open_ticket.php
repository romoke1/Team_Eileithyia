


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->                      



<div class="wraper container-fluid" style="margin-bottom: 30px">
    <div class="row">

        <div class="col-md-9 col-xs-12">
            <header class="s-lineDownLeft" style="margin-bottom: 20px">
                <h2 class="s-titleDet">Open Ticket</h2>
            </header>
            <div class="b-detail__main-info">
                <div class="b-detail__main-info-images wow zoomInUp" data-wow-delay="0.5s">
                    <div class="row m-smallPadding">
                        <div id="success"><?= $status ?> <?= validation_errors(); ?></div>

                        <form method="POST" action=""  class="s-form wow zoomInUp" data-wow-delay="0.5s" >
                           
                            <label for="subject" style="font-weight: normal">Department:</label> <select class="form-control" name="ddlDepartment" required="">
                                <option value="">Select Department</option>
                                <option value="Custom Request">Custom Request</option>
                                <option value="Billing">Billing</option>
                                <option value="Sales">Sales</option>
                                <option value="Customer Feedback">Customer Feedback</option>
                                <option value="Others">Others</option>
                                
                            </select>
                           
                           <label for="subject" style="font-weight: normal">Subject:</label>			
                           <input type="text" placeholder="Subject" value="" name="txtSubject" id="user-name" required="" />
                           
                           <label for="subject" style="font-weight: normal">Email:</label>			
                           <input type="text" placeholder="Email" value="<?= $this->session->userdata('email') ?>" name="email" readonly="" />
                           
								<label for="subject" style="font-weight: normal">Message Body:</label>
                                                                <textarea id="user-message" name="txtContent" placeholder="Message" style="height: 100px" required=""></textarea>
                                                                
								<button type="submit" class="btn m-btn" name="mail">SUBMIT NOW<span class="fa fa-angle-right"></span></button>
							</form>

                    </div>
                </div>
            </div>
        </div>

    </div>



</div>


<div class="row">

</div>

<!-- Personal-Information -->






<div class="clearfix"></div>
</div>
</div>


</div>

<div class="row">

</div>
</div> <!-- container -->

</div> <!-- content -->

