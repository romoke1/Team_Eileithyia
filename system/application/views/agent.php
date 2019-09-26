<section class="b-pageHeader">
            <div class="container">
                <h1 class=" wow zoomInLeft" data-wow-delay="0.5s">Agent Registration</h1>
                
            </div>
        </section><!--b-pageHeader-->

        <div class="b-breadCumbs s-shadow wow zoomInUp" data-wow-delay="0.5s">
            <div class="container">
                <a href="<?= base_url() ?>" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="#" class="b-breadCumbs__page m-active">Agent Registration</a>
            </div>
        </div><!--b-breadCumbs-->

       <!--  <div class="b-map wow zoomInUp" data-wow-delay="0.5s">
            <script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=W-Xpe7AurTrL7tXe8sROgCD2phwBIWEj&amp;width=100%&amp;height=400&amp;lang=en_US&amp;sourceType=constructor"></script>
        </div>
        <!--jjj-->

        <section class="b-contacts s-shadow">
            <div class="container">
                <div class="row">
                    
                                <?php echo validation_errors(); ?>
                                <?php echo $status ?>
                    
                    <blockquote>Earn N200,000 to N2,000,000 monthly when you become our agent. Top 3 agents gets all-expense-paid trip to Dubai in December. Fill the form below to get started.</blockquote>

                    
                 <div class="col-xs-4">
                        <div class="b-contacts__form">
                            
                            <header class="b-contacts__form-header s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
                                <h2 class="s-titleDet">Requirements</h2> 
                            </header>
                            <ul>
                                <li>Enquiry Centre space for clients visitation. If You do not have a space to be used as TokunboCars.NG Enquiry Centre, kindly apply as a Reseller/Partner. <a href="<?= base_url() ?>partners"> Click here to become a Reseller/Partner</a></li>
                                <li>A dedicated phone number that is WhatsApp enabled</li>
                                <li>Participation in our monthly training (Physical/Online)</li>
                            </ul>
                                
                        </div>
                    </div>

                 <div class="col-xs-8">
                        <div class="b-contacts__form">
                            
                            <header class="b-contacts__form-header s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
                                <h2 class="s-titleDet">Registration</h2> 
                            </header>
                            <p class=" wow zoomInUp" data-wow-delay="0.5s">Fill The Form Below Correctly...</p>
                            <div id="success"></div>
                            <form method="POST" action=""  class="s-form wow zoomInUp" data-wow-delay="0.5s">
                                <div class="row">
                                    <div class="col-md-6">
                                        Fullname:
                                        <input type="text" name="fullname" required="" value="<?= set_value('fullname') ?>" placeholder="Fullname">
                                    </div>
                                    <div class="col-md-6">
                                        Gender:
                                        <select class="m-select" name="ddlSex" required="">
                                            <option value="">Select...</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
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
                                        State:
                                         <select class="m-select" name="ddlState" required="">
                                            <option value="">Select...</option>
                                            <option>Lagos</option>
                                            <option>Abuja</option>
                                            <option>Rivers</option>
                                            <option>Bayelsa</option>
                                            <option>Imo</option>
                                            <option>Ogun</option>
                                            <option>Oyo</option>
                                            <option>Ondo</option>
                                            <option>Osun</option>
                                            <option>Benue</option>
                                            <option>Plateau</option>
                                            <option>Kano</option>
                                            <option>Aba</option>
                                            <option>Delta</option>
                                            <option>Edo</option>
                                            <option>Kwara</option>
                                            <option>Ekiti</option>
                                            <option>Enugu</option>
                                            <option>Akwa Ibom</option>
                                            <option>Cross River</option>
                                            <option>Kaduna</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        Proposed Enquiry Centre Address:
                                        <textarea class="" name="txtLoc" placeholder="Your Enquiry Centre Address" style="height: 80px"></textarea>
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