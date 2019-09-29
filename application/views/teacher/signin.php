

<!-- THE INSTRUCTOR LOGIN FORM STARTS FROM HERE -->
<section>

    <div class="container-fluid">
        <div class="row">

            <div class="offset-3 col-lg-5 col-md-5 col-sm-6 col-xs-5 instructor-signupForm" style="margin-top: 8%; margin-bottom: 9%;">
                <h2 class="text-center text-light" style="margin-bottom: 2%;">Teacher's Login</h2>

                <?= $status ?>
                <?= form_open() ?>
                    <div class="form-group">
                        <input type="email" name="txtEmail" placeholder="Email address" class="form-control" required="">
                    </div>

                    <div class="form-group">
                        <input type="password" name="txtPassword" placeholder="Password" class="form-control" required="">
                    </div>


                    <div class="form-group">
                        <button type="submit" name="" class="btn btn-dark form-control"> Login </button>
                    </div>

                    <div class="form-group text-light">
                        <input type="checkbox" name=""> &nbsp <span style="font-size: 1.2em">Remember me</span>
                    </div>

                    <div class="form-group text-center text-light">
                        <span style="font-size: 1.2em">Need an account? <span> <a href="<?= base_url() ?>teacher/signup" style="color: #fff;">Signup Here</a>
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