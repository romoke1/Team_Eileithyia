<section class="b-pageHeader">
            <div class="container">
                <h1 class=" wow zoomInLeft" data-wow-delay="0.5s">TokunboCars.NG Investment Program (TIP)</h1>
                
            </div>
        </section><!--b-pageHeader-->

        <div class="b-breadCumbs s-shadow wow zoomInUp" data-wow-delay="0.5s">
            <div class="container">
                <a href="<?= base_url() ?>" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="#" class="b-breadCumbs__page m-active">TokunboCars.NG Investment Program (TIP)</a>
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
                                <h2 class="s-titleDet">TokunboCars.NG Investment Program (TIP)</h2> 
                            </header>
                            <p class=" wow zoomInUp" data-wow-delay="0.5s" style="font-weight: bold; color: #000; font-size: 18px;">
                                Before filling the form, kindly click 
                                <a href="<?= base_url()?>assets/Investment.pdf" target="_blank" class="btn btn-sm btn-default" style="background: rgb(152, 20, 10); color: #fff;"><span class="glyphicon glyphicon-save"></span> Here</a>
                                to view information about this program
                            </p>
                            <!--<p class=" wow zoomInUp" data-wow-delay="0.5s">Fill The Form Below Correctly...</p>-->
                            <div id="success"></div>
                            <form method="POST" action="<?= base_url(); ?>users/tip"  class="s-form wow zoomInUp" data-wow-delay="0.5s">
                                <div class="row">
                                    <div class="col-md-6">
                                        Fullname:
                                        <input type="text" name="fullname" required="" value="<?= set_value('fullname') ?>" placeholder="Fullname">
                                    </div>
                                    <div class="col-md-6">
                                        Phone Number:
                                        <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" type="text" name="txtPhone" value="<?= set_value('txtPhone') ?>" placeholder="Phone Number" required="">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        Email:
                                        <input type="email" name="txtEmail" required="" placeholder="Email Address" value="<?= set_value('txtEmail') ?>">
                                    </div>
                                    <div class="col-md-6">
                                        Occupation:
                                        <input type="text" name="txtOccupation" required="" value="<?= set_value('txtOccupation') ?>" placeholder="Occupation">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        Investment Amount:
                                        <!--<input  type="text" name="txtInvest" value="<?= set_value('txtInvest')?>" required="" placeholder="Investment Amount">-->
                                    <select name="txtInvest" class="m-select" style="padding: 16px 20px;">
                                            <option value="" selected="">Investment Amount</option>
                                            <?php
                                                for($a = 500000; $a<=5000000; $a+=500000){
                                            ?>
                                            <option value="<?= $a?>">
                                                <?= $a?>
                                            </option>
                                            <?php
                                                }
                                            ?>
                                            
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        Duration:
                                        <!--<input type="text" name="txtDuration" value="<?= set_value('txtDuration') ?>" required="" placeholder="Duration">-->
                                        <select name="txtDuration" class="m-select" style="padding: 16px 20px;">
                                            <option value="" selected="">Select Duration</option>
                                            <?php
                                                for($a =1; $a<=3; $a++){
                                            ?>
                                            <option value="<?= $a ?>"><?php if($a == 1){ echo $a.' Year';}else{echo $a. ' Years';}?> </option>
                                            <?php
                                                }
                                            ?>
                                            
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        Bank Details:
                                        <input type="text" name="txtBank" value="<?= set_value('txtBank')?>" required="" placeholder="Bank Details">
                                    </div>
                                    <div class="col-md-4">
                                        Next Of Kin Name:
                                        <input type="text" name="txtKinName" value="<?= set_value('txtKinName')?>" required="" placeholder="Next of Kin Name">
                                    </div>
                                     <div class="col-md-4">
                                        Next of Kin Phone:
                                        <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" type="text" name="txtKinPhone" value="<?= set_value('txtKinPhone')?>" required="" placeholder="Next of Kin Phone">
                                    </div>
                                </div>
                                
                                <div class="row">
                                   
                                    <div class="col-md-6">
                                        Next Of Kin Address:
                                        <textarea name="txtKinAddr" placeholder="Next of Kin Address"></textarea>
                                    </div>
                                   
                                    <div class="col-md-6">
                                        Address:
                                        <textarea name="txtAddr" placeholder="Resident Address"></textarea>
                                    </div>
                                </div>
                       
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" name="send" class="btn m-btn">SEND<span class="fa fa-angle-right"></span></button>
                           
                                    </div>
                                </div>
                                     </form>
                                
                        </div>
                    </div>
                    
            </div>
        </section>