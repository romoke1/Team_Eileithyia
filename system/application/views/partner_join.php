


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->                      



<div class="wraper container-fluid" style="margin-bottom: 30px">
    <div class="row">

        <div class="col-md-9 col-xs-12">
            <header class="s-lineDownLeft" style="margin-bottom: 20px">
                <h2 class="s-titleDet">Become a Reseller/Partner</h2>
            </header>
            <div class="b-detail__main-info">
                <div class="b-detail__main-info-images wow zoomInUp" data-wow-delay="0.5s">
                    <div class="row m-smallPadding">
                        <div id="success"><?= $status ?> <?= validation_errors(); ?></div>

                        <form method="POST" action=""  class="s-form wow zoomInUp" data-wow-delay="0.5s" >
                           
                            <label for="subject" style="font-weight: normal">Level: <small><a href="<?= base_url() ?>partner" target="_blank">Click here</a> to know details of each Level</small></label> 
                            <select class="m-select" name="ddlLevel" required="">
                                <option value="">Select Partnership Level</option>
                                <option value="Referral">Referral Partner (N0.00)</option>
                                <option value="Gold">Gold Partner (N20,000.00)</option>
                                
                            </select>
                            <span class="fa fa-caret-down"></span>
                           
                            <label for="subject" style="font-weight: normal">Username <small>(E.g If your Username is <strong>Victor</strong> then your referral link will be <strong>www.tokunbocars.ng/join/victor</strong></small></label>			
                           <input type="text" placeholder="Username" value="" name="txtUsername" id="user-name" required="" />
                           
                           <label for="subject" style="font-weight: normal">Bank Name:</label>			
                           <select class="m-select" name="ddlBank" required="">
                               <option>GTBank</option>
                                                        <option>First Bank</option>
                                                        <option>Access Bank</option>
                                                        <option>Fidelity Bank</option>
                                                        <option>Diamond Bank</option>
                                                        <option>EcoBank</option>
                                                        <option>FCMB</option>
                                                        <option>StanbicIBTC Bank</option>
                                                        <option>Sterling Bank</option>
                                                        <option>Union Bank</option>
                                                        <option>UBA</option>
                                                        <option>Standard Chartered Bank</option>
                                                        <option>Zenith Bank</option>
                                                        <option>Unity Bank</option>
                                                        <option>Wema Bank</option>
                                                        <option>Keystone Bank</option>
                                                        <option>Heritage Bank</option>
                                                        <option>Main Street Bank</option>
                                                        <option>Skye Bank</option>
                                                        <option>Aso Savings</option>
                                                        <option>CMFB</option>
                                                        <option>Enterprise Bank</option>
                                
                            </select>
                           
                           <label for="subject" style="font-weight: normal">Bank Account Name:</label>			
                           <input type="text" placeholder="Account Name" value="" name="txtAcctName" />
                           
                           <label for="subject" style="font-weight: normal">Bank Account Number:</label>			
                           <input type="text" placeholder="Account Number" value="" name="txtAcctNum" />
                           
                                                                 
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

