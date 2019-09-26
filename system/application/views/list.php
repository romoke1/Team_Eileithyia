<!-- Contents Starts Here-->
<section class="b-pageHeader">
    <div class="container">
        <h1 class="wow zoomInLeft" data-wow-delay="0.5s"><?= $header ?></h1>
        <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.5s">
            <h3><?= $sub ?></h3>
        </div>
    </div>
</section><!--b-pageHeader-->

<div class="b-breadCumbs s-shadow">
    <div class="container wow zoomInUp" data-wow-delay="0.5s">
        <a href="<?= base_url() ?> " class="b-breadCumbs__page">Home</a>
    </div>
</div><!--b-breadCumbs-->

<div class="b-infoBar">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <!--<div class="b-infoBar__compare wow zoomInUp" data-wow-delay="0.5s">
                    <strong>Buy Now Cars</strong> are the cheapest cars. You select your choice and we buy, truck and ship the car to Nigeria for you. <a href="<?= base_url() ?>cars/all">Click Here to read more...</a>
                </div>-->
                <?php
                if (isset($_GET['type']) && $_GET['type'] !== "") {
                    $sel = "";
                    $sel2 = "";
                    $sel3 = "";
                    switch ($_GET['type']) {
                        case 1:
                            $type = "Buy Now";
                            $sel = "selected";
                            break;

                        case 2:
                            $type = "On Sail";
                            $sel2 = "selected";
                            break;

                        case 3:
                            $type = "On Ground";
                            $sel3 = "selected";
                            break;

                        default:
                            break;
                    }
                    echo ' <a href="#" id="showS" class="btn m-btn m-readMore">' . $type . '<span class="fa fa-close closeS" id="closeSType"></span></a>';
                } else {
                    $sel = "";
                    $sel2 = "";
                    $sel3 = "";
                }

                if (isset($_GET['keyword']) && $_GET['keyword'] !== "") {
                    $key_exp = explode("-", $_GET['keyword']);

                    $c = 0;
                    foreach ($key_exp as $val) {
                        $c++;
                        echo ' <input type="hidden" id="hdSess' . $c . '" value="' . $val . '" /> <a href="#" id="showS" class="btn m-btn m-readMore">' . $val . '<span class="fa fa-close closeS" id="closeS' . $c . '"></span></a>';
                    }
                }

                if (isset($_GET['year']) && $_GET['year'] !== "") {
                    $yr_exp = explode("-", $_GET['year']);
                    echo '<a href="#" id="showS" class="btn m-btn m-readMore">' . $_GET['year'] . '<span class="fa fa-close closeS" id="closeSY"></span></a>';
                }else{
                    $yr_exp = array("", "");
                }
                
                if (isset($_GET['make']) && $_GET['make'] !== "") {
                    $make = $this->model_getvalues->getDetails("make", "make_id", $_GET['make']);
                    echo ' <a href="#" id="showS" class="btn m-btn m-readMore">' . $make["name"] . '<span class="fa fa-close closeS" id="closeSMake"></span></a>';
                }

                if (isset($_GET['model']) && $_GET['model'] !== "") {
                    $model = $this->model_getvalues->getDetails("model", "model_id", $_GET['model']);
                    echo ' <a href="#" id="showS" class="btn m-btn m-readMore">' . $model["name"] . '<span class="fa fa-close closeS" id="closeSModel"></span></a>';
                }



                if (isset($_GET['amount']) && $_GET['amount'] !== "") {
                    $amt_exp = explode("-", $_GET['amount']);
                    echo '<a href="#" id="showS" class="btn m-btn m-readMore">&#8358;' . number_format($amt_exp[0]) . ' - &#8358;' . number_format($amt_exp[1]) . '<span class="fa fa-close closeS" id="closeSA"></span></a>';
                }else{
                    $amt_exp = array("", "");
                }
                ?>

            </div>
            <div class="col-lg-5 col-md-12">
                <div class="b-infoBar__select wow zoomInUp" data-wow-delay="0.5s">


                    <div class="b-infoBar__select-one">
                        <span class="b-infoBar__select-one-title">ITEMS PER PAGE</span>
                        <select name="select1" id="ddlPage" class="m-select" onchange="perPage()">
                            <option value="20" <?php
                            if ($this->session->userdata('per_page') == '20') : echo 'selected';
                            endif;
                            ?>>20 items</option>
                            <option value="40" <?php
                                    if ($this->session->userdata('per_page') == '40') : echo 'selected';
                                    endif;
                                    ?>>40 items</option>
                            <option value="60" <?php
                            if ($this->session->userdata('per_page') == '60') : echo 'selected';
                            endif;
                                    ?>>60 items</option>
                            <option value="80" <?php
                            if ($this->session->userdata('per_page') == '80') : echo 'selected';
                            endif;
                            ?>>80 items</option>
                            <option value="100" <?php
                            if ($this->session->userdata('per_page') == '100') : echo 'selected';
                            endif;
                            ?>>100 items</option>
                        </select>
                        <span class="fa fa-caret-down"></span>
                    </div>
                    <div class="b-infoBar__select-one">
                        <span class="b-infoBar__select-one-title">SORT BY</span>
                        <select name="select2" id="ddlSort" class="m-select" style="padding-left: 10px; padding-right: 10px" onchange="perSort()">
                            <option value="1" <?php
                            if ($this->session->userdata('per_sort') == '1') : echo 'selected';
                            endif;
                            ?>>Recently Added</option>
                            <option value="2" <?php
                                    if ($this->session->userdata('per_sort') == '2') : echo 'selected';
                                    endif;
                            ?>>Price: (Low to High)</option>
                            <option value="3" <?php
                                    if ($this->session->userdata('per_sort') == '3') : echo 'selected';
                                    endif;
                            ?>>Price (High to Low)</option>
                        </select>
                        <span class="fa fa-caret-down"></span>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div><!--b-infoBar-->

<div class="b-items">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-4 col-xs-12">
                <div class="b-search__main-form-submit" id="mobile_filter" style="text-align: center; margin-top: 0px; margin-bottom: 40px; display: none">
                    <button type="button" class="btn m-btn" id="mobile_show">Show Filter<span class="fa fa-angle-down"></span></button>
                </div>
                <aside class="b-items__aside" id="aside">

                    <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">REFINE YOUR SEARCH</h2>
                    <div class="b-items__aside-main wow zoomInUp" data-wow-delay="0.5s">
<?php
echo form_open();
//echo '<form method="get" action="'. base_url() . 'cars/new_search/">' 
?>

                        <div class="b-items__aside-main-body">

                            <div class="b-items__aside-main-body-item">
                                <label>SELECT TYPE</label>
                                <div>
                                    <select name="type" id="ddlType" class="m-select" onchange="search_type()">
                                        <option value="" selected="">Any Type</option>
                                        <option value="1" <?= $sel ?> >Buy Now</option>
                                        <option value="2" <?= $sel2 ?> >On Sail</option>
                                        <option value="3" <?= $sel3 ?> >On Ground</option>
                                    </select>
                                    <span class="fa fa-caret-down"></span>
                                    <hr />
                                </div>
                            </div>


                            <div class="b-items__aside-main-body-item">
                                <label style="text-align: center">From (YEAR)</label>
                                <div>
                                    <select name="year" class="m-select" id="ddlFrom">
                                        <option value="">Select Year</option>
                                        <?php
                                        $already_selected_value = 2003;
                                        $earliest_year = 1998;

                                        foreach (range($earliest_year, date('Y')) as $x) {
                                            if($yr_exp[0] == $x)
                                            {
                                                echo '<option value="' . $x . '" selected="" >' . $x . '</option>';
                                            }else{
                                                echo '<option value="' . $x . '" >' . $x . '</option>';
                                            }
                                            
                                        }
                                        ?>
                                    </select>
                                    <span class="fa fa-caret-down"></span>






                                </div>

                                <label style="text-align: center; margin-top: 10px">To</label>
                                <div>



                                    <select name="year" class="m-select" id="ddlTo">
                                        <option value="" selected="">Select Year</option>
                                        <?php
                                        $already_selected_value = 2003;
                                        $earliest_year = 1998;

                                        foreach (range($earliest_year, date('Y')) as $x) {
                                            if($yr_exp[1] == $x)
                                            {
                                                echo '<option value="' . $x . '" selected="" >' . $x . '</option>';
                                            }else{
                                                echo '<option value="' . $x . '" >' . $x . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <span class="fa fa-caret-down"></span>




                                </div>

                                <button type="button" class="btn m-btn" style="margin-top: 20px; width: 100%" onclick="search_year()">GO<span class="fa fa-angle-right"></span></button><br />

                                <hr />

                            </div>

                            <div class="b-items__aside-main-body-item">
                                <label>SELECT A MAKE</label>
                                <div>
                                    <select name="make" id="make_cat" class="m-select" onchange="search_make()">
                                        <option value="" selected="">Any Make</option>
                                        <?php
                                        foreach ($makes as $maker) {

                                            if (isset($_GET['make']) && $_GET['make'] !== "") {
                                                if ($_GET['make'] == $maker->make_id) {
                                                    echo '<option value="' . $maker->make_id . '" selected>' . $maker->name . '</option>';
                                                } else {
                                                    echo '<option value="' . $maker->make_id . '">' . $maker->name . '</option>';
                                                }
                                            } else {
                                                echo '<option value="' . $maker->make_id . '">' . $maker->name . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <span class="fa fa-caret-down"></span>
                                    <hr />
                                </div>
                            </div>

                            <div class="b-items__aside-main-body-item">
                                <label>SELECT A MODEL</label>
                                <div>
                                    <select name="model" id="ddlModel" class="m-select" onchange="search_model()">
                                        <?php
                                        if (isset($_GET['make']) && $_GET['make'] !== "") {

                                            echo '<option value="" selected="">Select...</option>';

                                            $models = $this->model_getvalues->getTableRows("model", "make_id", $_GET['make'], "name", "asc");

                                            foreach ($models as $model) {

                                                if ($_GET['model'] == $model->model_id) {
                                                    echo '<option value="' . $model->model_id . '" selected>' . $model->name . '</option>';
                                                } else {
                                                    echo '<option value="' . $model->model_id . '">' . $model->name . '</option>';
                                                }
                                            }
                                        } else {
                                            echo '<option value="" selected="">Select Make above</option>';
                                        }
                                        ?>

                                    </select>
                                    <span class="fa fa-caret-down"></span>
                                </div>
                                <hr />
                            </div>

                            <div class="b-items__aside-main-body-item">
                                <label style="text-align: center">From (PRICE RANGE)</label>
                                <div>
                                    <select name="year" class="m-select" id="ddlMin">
                                        <option value="" >  Select...</option>
                                        <?php
                                        for ($x = 0.5; $x < 10; $x++) {
                                            $val = $x * 1000000;
                                            if ($val == $amt_exp[0]) {
                                                echo '<option value="' . $val . '" selected=""> &#8358;' . number_format($val) . '</option>';
                                            } else {
                                                echo '<option value="' . $val . '" > &#8358;' . number_format($val) . '</option>';
                                            }
                                        }
                                        ?>
                                        <option value="10000000" <?php if (10000000 == $amt_exp[0]): echo 'selected=""'; endif; ?>> &#8358;10,000,000</option>
                                    </select>
                                    <span class="fa fa-caret-down"></span>






                                </div>

                                <label style="text-align: center; margin-top: 10px">To (PRICE RANGE)</label>
                                <div>



                                    <select name="year" class="m-select" id="ddlMax">
                                        <option value="" selected="">  Select...</option>
                                        <option value="1000000" <?php if (1000000 == $amt_exp[1]): echo 'selected=""'; endif; ?>> &#8358;1,000,000</option>
                                            <?php
                                            for ($x = 1.5; $x < 10; $x++) {
                                                $val = $x * 1000000;
                                                if ($val == $amt_exp[1]) {
                                                    echo '<option value="' . $val . '" selected="" > &#8358;' . number_format($val) . '</option>';
                                                } else {
                                                    echo '<option value="' . $val . '" > &#8358;' . number_format($val) . '</option>';
                                                }
                                                
                                            }
                                            ?>
                                        <option value="10000000" <?php if (10000000 == $amt_exp[1]): echo 'selected=""'; endif; ?>> &#8358;10,000,000</option>
                                        <option value="100000000" <?php if (100000000 == $amt_exp[1]): echo 'selected=""'; endif; ?>> Above N10,000,000</option>
                                    </select>
                                    <span class="fa fa-caret-down"></span>




                                </div>

                                <button type="button" class="btn m-btn" style="margin-top: 20px; width: 100%" onclick="search_price()">GO<span class="fa fa-angle-right"></span></button><br />

                            </div>


<?= form_close() ?>
                        </div>
                        <!--<div class="b-items__aside-sell wow zoomInUp" data-wow-delay="0.5s">
                            <div class="b-items__aside-sell-img">
                                <h3>MAKE A REQUEST</h3>
                            </div>
                            <div class="b-items__aside-sell-info">
                                <p>
                                    You can make a custom request for a specific car you can't find on this platform.
                                </p>
                                <a href="<?= base_url() ?>cars/request" class="btn m-btn">REQUEST NOW<span class="fa fa-angle-right"></span></a>
                            </div>
                        </div>-->
                </aside>
            </div>
            <div class="col-lg-9 col-sm-8 col-xs-12">
                <div class="b-items__cars">

                    <?php foreach ($list as $key => $list): ?>

                        <?php
                        $ead = date('jS M Y', strtotime("+45 days", (strtotime(date('Y-m-d')))));
                        
                        $ead2 = date('jS M Y', strtotime($list->ead));

                        $price = 40 / 100 * $list->amount;
                        $price2 = 60 / 100 * $list->amount;

                        $mid = $list->make;
                        $moid = $list->model;

                        $sql = "SELECT * FROM make WHERE make_id = '$mid'";
                        $query = $this->db->query($sql);
                        foreach ($query->result_array() as $key => $make) {

                            $mosql = "SELECT * FROM model WHERE model_id = '$moid'";
                            $moquery = $this->db->query($mosql);
                            foreach ($moquery->result_array() as $key => $model) {
                                ?>


                                <div class="b-items__cars-one wow zoomInUp" data-wow-delay="0.5s">
                                    <div class="b-items__cars-one-img">
                                        <a href="<?= base_url(); ?>cars/item/<?= $list->car_id; ?>"><img src="<?= base_url() ?>upload/<?= $list->image_1; ?>" width="270" alt='<?php echo $list->year; ?> <?= $make['name']; ?> <?= $model['name']; ?>'/></a>

                                    </div>
                                    <div class="b-items__cars-one-info">
                                        <form class="b-items__cars-one-info-header s-lineDownLeft">
                                            <a href="<?= base_url(); ?>cars/item/<?= $list->car_id; ?>"><h2><?php echo $list->year; ?> <?= $make['name']; ?> <?= $model['name'] . " " . $list->others; ?> <?php if ($list->status === '4') : ?> <span style="font-weight: bolder; color: red"> &nbsp; *SOLD*</span> <?php endif; ?></h2></a>

                                        </form>
                                        <div class="row s-noRightMargin">
                                            <div class="col-md-9 col-xs-12">

                                                <?php
                                                switch ($list->status) {
                                                    case 1:
                                                        $arrive = "<p>This car will arrive Lagos on or before <strong>$ead</strong> if you pay <strong> &#8358; " . number_format($price) . "</strong> today.</p>";
                                                        break;


                                                    case 2:
                                                        $arrive = "<p>This car is on its way. It's Arrival date is <strong>$ead2</strong>. Pay <strong> &#8358; " . number_format($price2) . "</strong> today to secure it.</p>";
                                                        break;

                                                    case 3:
                                                        $arrive = "<p>This car has arrived</p>";
                                                        break;

                                                    case 4:
                                                        $arrive = "<p>This car is SOLD</p>";
                                                        break;

                                                    default:
                                                        break;
                                                }
                                                echo $arrive;
                                                ?>


                                                <div class="m-width row m-smallPadding">
                                                    <div class="col-xs-6">
                                                        <div class="row m-smallPadding">
                                                            <div class="col-xs-6">
                                                                <span class="b-items__cars-one-info-title">Damage:</span>
                                                                <span class="b-items__cars-one-info-title">Run & Drive:</span>
                                                                <span class="b-items__cars-one-info-title">Mileage:</span>
                                                            </div>
                                                            <div class="col-xs-6">
                                                                <span class="b-items__cars-one-info-value"><?= $list->damage; ?></span>
                                                                <span class="b-items__cars-one-info-value"><?= $list->run; ?></span>
                                                                <span class="b-items__cars-one-info-value"><?= $list->odometer; ?></span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="row m-smallPadding">
                                                            <div class="col-xs-5">
                                                                <span class="b-items__cars-one-info-title">Transmission:</span>
                                                                <span class="b-items__cars-one-info-title">Fuel:</span>
                                                                <span class="b-items__cars-one-info-title">Car Keys:</span>
                                                            </div>
                                                            <div class="col-xs-7">
                                                                <span class="b-items__cars-one-info-value"><?= $list->transmission; ?></span>
                                                                <span class="b-items__cars-one-info-value"><?= $list->fuel; ?></span>
                                                                <span class="b-items__cars-one-info-value"><?= $list->car_keys; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-xs-12">
                                                <div class="b-items__cars-one-info-price">
                                                    <div class="pull-right">
                                                        <h3>Price:</h3>
                                                        <h4> &#8358;<?= number_format($list->amount); ?></h4>
                                                    </div>
                                                    <a href="<?= base_url(); ?>cars/item/<?= $list->car_id; ?>" class="btn m-btn">VIEW DETAILS<span class="fa fa-angle-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

        <?php } ?>
    <?php } ?>
<?php endforeach; ?>
                </div>

<?= $pagi ?>


                <div class="b-detail__main-aside-about-seller" style="text-align: center; margin-top: 70px">
                    <span style="font-size: 20px">Can't Find The Car You need?</span> <a href="<?= base_url() ?>request"><button type="button" class="btn m-btn">Make a Custom Request<span class="fa fa-angle-right"></span></button></a>
                </div>

            </div>



        </div>
    </div>
</div><!--b-items-->