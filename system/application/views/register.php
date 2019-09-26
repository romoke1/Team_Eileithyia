<section class="b-pageHeader">
            <div class="container">
                <h1 class=" wow zoomInLeft" data-wow-delay="0.5s">Registration / Login</h1>
                
            </div>
        </section><!--b-pageHeader-->

        <div class="b-breadCumbs s-shadow wow zoomInUp" data-wow-delay="0.5s">
            <div class="container">
                <a href="<?= base_url() ?>" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="#" class="b-breadCumbs__page m-active">Registration / Login</a>
            </div>
        </div><!--b-breadCumbs-->

       <!--  <div class="b-map wow zoomInUp" data-wow-delay="0.5s">
            <script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=W-Xpe7AurTrL7tXe8sROgCD2phwBIWEj&amp;width=100%&amp;height=400&amp;lang=en_US&amp;sourceType=constructor"></script>
        </div>
        <!--jjj-->

        <section class="b-contacts s-shadow">
            <div class="container">
                <div class="row">


                 <div class="col-xs-10">
                        <div class="b-contacts__form">
                            
                                <?php echo validation_errors(); ?>
                                <?php echo $status ?>
                            <header class="b-contacts__form-header s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
                                <h2 class="s-titleDet">Registration</h2> 
                            </header>
                            <p class=" wow zoomInUp" data-wow-delay="0.5s">Fill The Form Below Correctly...</p>
                            <div id="success"></div>
                            <form method="POST" action="<?= base_url(); ?>users/register"  class="s-form wow zoomInUp" data-wow-delay="0.5s">
                                <div class="row">
                                    <div class="col-md-6">
                                        Fullname:
                                        <input type="text" name="fullname" required="" value="<?= set_value('fullname') ?>" placeholder="Fullname">
                                    </div>
                                    <div class="col-md-6">
                                        Company: <small>(Optional)</small>
                                        <input type="text" name="txtCoy" value="<?= set_value('txtCoy') ?>" placeholder="Company Name">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        Phone Number:
                                        <input type="text" name="phone" required="" placeholder="Phone Number" value="<?= set_value('phone') ?>">
                                    </div>
                                    <div class="col-md-6">
                                        Email:
                                        <input type="email" name="txtEmail" required="" value="<?= set_value('email') ?>" placeholder="Email">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        Password:
                                        <input type="password" name="passwd" required="" placeholder="Password">
                                    </div>
                                    <div class="col-md-6">
                                        Repeat Password:
                                         <input type="password" name="password2" required="" placeholder="Confirm Password">
                                    </div>
                                </div>
                                
                                <?php if($this->session->userdata('refxyz')) : 
                                    
                                    $ref = $this->model_getvalues->getDetails("partners", "username", $this->session->userdata('refxyz'));
                                
                                    $user = $this->model_getvalues->getDetails("users", "user_id", $ref['user_id']);
                                    ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        Referral Details:
                                        <input type="text" name="referral" value="<?= $this->session->userdata('refxyz')." (".$user['fullname'].")" ?>" readonly="">
                                    </div>
                                    
        
                                </div>
       
        <?php endif; ?>
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <label class="checkbox" style="margin-left: 20px">
                                            <input name="accepttos" class="checkbox checkbox-primary" type="checkbox" required="">
                            I have read and agree to the <a href="<?= base_url() ?>pages/terms" target="_blank">Terms of Service</a>
                            </label>
                                    </div>
                                    
                                   
                                </div>
                                
                                <div class="row">
                                    
                                  
                                    
                                    <div class="col-md-6">
                                        <button type="submit" name="register" class="btn m-btn">SIGNUP NOW<span class="fa fa-angle-right"></span></button>
                           
                                    </div>
                                </div>
                                     </form>
                                
                        </div>
                    </div>
                    
            </div>
        </section>