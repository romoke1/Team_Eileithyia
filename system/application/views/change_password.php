


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->                      



<div class="wraper container-fluid">
    <div class="row">

        <div class="col-md-9 col-xs-12">
            <header class="s-lineDownLeft">
                <h2 class="s-titleDet">Change Password</h2>
            </header>
            <div class="b-detail__main-info">
                <div class="b-detail__main-info-images wow zoomInUp" data-wow-delay="0.5s">
                    <div class="row m-smallPadding">


                        <div id="success"><?= $status ?> <?= validation_errors(); ?></div>
                        <form method="POST" action=""  class="s-form wow zoomInUp" data-wow-delay="0.5s" >
                            <table id="example" class="table table-striped" style="box-shadow: #ccc 2px 2px 9px">


                                <tbody>
                                    
                                    <tr>
                                        <td style="width: 20%">Old Password</td>
                                        <td><input type="password" placeholder="Your Old Password" name="txtOldPass" id="user-name" required="" /></td>
                                    </tr>
                                    <tr>
                                        <td>New Password</td>
                                        <td><input type="password" placeholder="Your New Password" name="txtNewPass" id="user-name" required="" /></td>
                                    </tr>
                                    <tr>
                                        <td>Repeat New Password</td>
                                        <td><input type="password" placeholder="Repeat Password" name="txtNewPass2" id="user-name" required="" /></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>

                                            <button type="submit" class="btn m-btn" name="mail">SUBMIT NOW<span class="fa fa-angle-right"></span></button></td>
                                    </tr>


                                  
                                </tbody>
                            </table>
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

