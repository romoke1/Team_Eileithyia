<!-- Content Section Start -->
<div class="content-section">
    <div class="container-liquid">
        <div class="row">
            <div class="col-xs-4">
                <div class="stat-box colorfive">
                    <i class="users">&nbsp;</i>
                    <h4>Active Users</h4>
                    <h1><?php echo $activeCoys; ?></h1>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="stat-box colortweleve">
                    <i class="author">&nbsp;</i>
                    <h4>Inactive Users</h4>
                    <h1><?php echo $inActiveCoys; ?></h1>
                </div>

            </div>    
            <div class="col-xs-4">
                <div class="stat-box colorsix">
                    <i class="pages">&nbsp;</i>
                    <h4>Orders</h4>
                    <h1><?php echo $orders ?></h1>
                </div>
            </div>
        </div>
        
        <div class="col-xs-12">
            <h1 style="text-align: center">
                My Upload Statistics
            </h1>
        </div>


        <div class="col-xs-3">
            <div class="sec-box">
                <a class="closethis">Close</a>
                <header>
                    <h2 style="text-align: center" class="heading">This Week</h2>
                </header>
                <div class="contents boxpadding" style="height: 70px; overflow-y: auto; overflow-x: hidden">
                    <div style="text-align: center; font-size: 32px" class="linkslist">
                    <?= $week ?>/50
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xs-3">
            <div class="sec-box">
                <a class="closethis">Close</a>
                <header>
                    <h2 style="text-align: center" class="heading">Uploaded This Month</h2>
                </header>
                <div class="contents boxpadding" style="height: 70px; overflow-y: auto; overflow-x: hidden">
                     <div style="text-align: center; font-size: 32px" class="linkslist">
                    <?= $month ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xs-3">
            <div class="sec-box">
                <a class="closethis">Close</a>
                <header>
                    <h2 style="text-align: center" class="heading">Approved This Month</h2>
                </header>
                <div class="contents boxpadding" style="height: 70px; overflow-y: auto; overflow-x: hidden">
                     <div style="text-align: center; font-size: 32px" class="linkslist">
                    <?= $month2 ?>/200
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xs-3">
            <div class="sec-box">
                <a class="closethis">Close</a>
                <header>
                    <h2 style="text-align: center" class="heading">My Cars Sold This Month</h2>
                </header>
                <div class="contents boxpadding" style="height: 70px; overflow-y: auto; overflow-x: hidden">
                     <div style="text-align: center; font-size: 32px" class="linkslist">
                    <?= $sold2."/".$sold ?>
                    </div>
                </div>
            </div>
        </div>
        
        
                    
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="card ks-card-widget ks-widget-payment-card-rate-details">
                                <h5 class="card-header">
                                    Uploader's Stats
                                </h5>
                                <div class="card-block">
                                    

                                    <table class="table ks-payment-card-rate-details-table">
                                        <thead>
                                            <tr>
                                                <th>Name</th><th>Uploaded </th><th>Approved </th><th>Sold</th>
                                            </tr>
                                        </thead>
                                        
                                        <?php 
                                            foreach ($ups as $up) {
                                                
                                                $mnth = $this->model_getvalues->getCount2("cars", array("month" => date('m'), "uploader" => $up->id));
                                                $mnth2 = $this->model_getvalues->getCount2("cars", array("month" => date('m'), "car_status !=" => 0, "uploader" => $up->id));
                                                
                                                $d = date("2018-06-01");
                                                
        $dat = $this->model_getvalues->getCount2("orders", array("created_at >" => $d, "created_at <" => date("Y-m-d"), "status !=" => "Awaiting First Payment", "uploader" => $up->id));
                                                
                                                echo '<tr>
                                            <td class="ks-currency">
                                                 '.$up->name.'
                                            </td>
                                            <td class="ks-amount">'.$mnth.'</td>
                                                <td>'.$mnth2.'</td>
                                                <td>'.$dat.'</td>
                                        </tr>';
                                            }
                                        ?>
                                        
                                        
                                    </table>
                                </div>
                            </div>
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
