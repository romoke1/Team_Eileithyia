

<!-- THE INSTRUCTOR LOGIN FORM STARTS FROM HERE -->
<section>

    <div class="container-fluid">
        <div class="row">

            <div class="offset-3 col-lg-5 col-md-5 col-sm-6 col-xs-5 instructor-signupForm" style="margin-top: 5%; margin-bottom: 2%;">
                <h2 class="text-center text-light" style="margin-bottom: 3%">Student Signup</h2>
                
                <?= $status ?>
                <?= form_open() ?>

                    <div class="form-group">
                        <input type="text" name="txtFname" value="<?= set_value('txtFname')?>" placeholder="Fullname" class="form-control" required="">
                    </div>

                    <div class="form-group">
                        <input type="email" value="<?= set_value('txtEmail')?>" name="txtEmail" placeholder="Email address" class="form-control" required="">
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="txtClass" required="" value="<?= set_value('txtClass')?>">
                            <option>Select Class</option>
                            <?php foreach($class as $val): ?>
                                <option value="<?= $val->class_id ?>"><?= $val->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                
                    <div class="form-group" id="txtPassDiv">
                        <input type="password" id="txtPass" name="txtPassword" placeholder="Password" class="form-control" required="">
                    </div>
                
                    <div class="form-group" id="txtPassDiv2">
                        <input type="password" id="txtPass2" name="txtPassword2" placeholder="Confirm Password" class="form-control" required="">
                        <label id="message" class="control-label" for="inputSuccess1" style="font-size: 12px; display: none;"></label>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="" class="btn btn-dark form-control"> Signup </button>
                    </div>

                    <div class="form-group text-light">
                        <input type="checkbox" name=""> &nbsp <span style="font-size: 1.2em">Remember me</span>
                    </div>

                    <div class="form-group text-center text-light">
                        <span style="font-size: 1.2em">Already have an account? <span> <a href="<?= base_url() ?>student/signin" style="color: #fff; font-weight: bold;">Signin Here</a>
                    </div>
                <?= form_close()?>

            </div>



        </div>

    </div>
    <!-- THE INSTRUCTOR LOGIN FORM STARTS FROM HERE -->



<!--footer starts from this part-->


<div class="container footer">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 copyRight">
            <span>&copy Thyia E-Learning School 2019</span>

        </div>
        <!-- social media on footer starts here-->

        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
            <ul class=" nav fa-pull-right socialMedia">

                <li><a href="#facebook.com/thyiaelearn"><i class='fa fa-facebook'></i></a></li>
                <li><a href="#facebook.com/thyiaelearn"><i class='fa fa-twitter'></i></a></li>
                <li><a href="#facebook.com/thyiaelearn"><i class='fa fa-github'></i></a></li>
            </ul>

        </div>
    </div>

</div>
<!--footer starts from this part-->


</section>


</body>
</html>
