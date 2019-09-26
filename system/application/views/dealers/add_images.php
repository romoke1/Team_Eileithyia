
<!-- Main content -->
<div class="main-content">
    <h1 class="page-title">Images for <?= $car_det['year'] . " " . $make_det['name'] . " " . $model_det['name'] ?></h1>
    <!-- Breadcrumb -->
    <ol class="breadcrumb breadcrumb-2"> 
        <li><a href="<?= base_url() ?>dealers/dashboard"><i class="fa fa-home"></i>Dashboard</a></li> 
        <li class="active"><strong>Add Images</strong></li> 
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Add a copy of your custom paper first</h4>
                    
                      <div class="row col-md-12" style="margin-top: 3%;">
                        
                        <div class="col-md-2">
                            <p><?php if($car_image['custom_paper'] == "") { echo 'No Custom Paper yet';} else{ echo '<img class="thumbnail" src="'.base_url().'dealers/upload/'.$car_image['custom_paper'].'" width="150">'; } ?></p>
                        </div>
                        
                        <?= form_open_multipart('dealers/upload_custom_paper_img/'.$a) ?>
                        <div class="col-md-5">
                             <div class="form-group"> 
                                 <div class="col-md-12">
                                    <input type="file" class="form-control"  name="userfile" required="" > 
                                    <p class="help-block" style="color: red">Upload a Copy of Custom Paper</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <input type="text" name="txtCC" placeholder="CC Number" class="form-control" required="">
                            <p class="help-block" style="color: red">Enter Custom Paper CC Number</p>
                        </div>

                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Add Custom Paper</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
                <div class="panel-body">
                    <?= validation_errors() ?>
                    <?= $status ?>
                    
                  
                    
                    <div class="row">
                        
                        <div class="col-md-1">
                            <p>S/N</p>
                        </div>
                        
                        <div class="col-md-3">
                            <p>Preview</p>
                        </div>
                        
                        <div class="col-md-4">
                            <p>Upload</p>
                        </div>
                        
                    </div>
                    
                    <div class="row">
                        <div class="col-md-1">
                            <p>1</p>
                        </div>
                        <div class="col-md-3">
                            <p><?php if($car_image['image_1'] == "") { echo '(This is the main image of the car) <br />No image';} else{ echo '<img class="thumbnail" src="'.base_url().'upload/'.$car_image['image_1'].'" width="150">'; } ?></p>
                        </div>
                        <?= form_open_multipart('dealers/upload_img/'.$a.'/1') ?>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="file" class="form-control"  name="userfile" required="" > 
                                <input type="hidden" name="joy" value="1" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Update Image</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-1">
                            <p>2</p>
                        </div>

                        <div class="col-md-3">
                            <p><?php if($car_image['image_2'] == "") { echo 'No image';} else{ echo '<img src="'.base_url().'upload/'.$car_image['image_2'].'" width="150">'; } ?></p>
                        </div>
                        <?= form_open_multipart('dealers/upload_img/'.$a.'/2') ?>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="file" class="form-control"  name="userfile" required="" > 
                                <input type="hidden" name="joy" value="1" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Update Image</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-1">
                            <p>3</p>
                        </div>

                        <div class="col-md-3">
                            <p><?php if($car_image['image_3'] == "") { echo 'No image';} else{ echo '<img src="'.base_url().'upload/'.$car_image['image_3'].'" width="150">'; } ?></p>
                        </div>
                        <?= form_open_multipart('dealers/upload_img/'.$a.'/3') ?>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="file" class="form-control"  name="userfile" required="" > 
                                <input type="hidden" name="joy" value="1" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Update Image</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-1">
                            <p>4</p>
                        </div>

                        <div class="col-md-3">
                            <p><?php if($car_image['image_4'] == "") { echo 'No image';} else{ echo '<img src="'.base_url().'upload/'.$car_image['image_4'].'" width="150">'; } ?></p>
                        </div>
                        <?= form_open_multipart('dealers/upload_img/'.$a.'/4') ?>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="file" class="form-control"  name="userfile" required="" > 
                                <input type="hidden" name="joy" value="1" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Update Image</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-1">
                            <p>5</p>
                        </div>

                        <div class="col-md-3">
                            <p><?php if($car_image['image_5'] == "") { echo 'No image';} else{ echo '<img src="'.base_url().'upload/'.$car_image['image_5'].'" width="150">'; } ?></p>
                        </div>
                        <?= form_open_multipart('dealers/upload_img/'.$a.'/5') ?>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="file" class="form-control"  name="userfile" required="" > 
                                <input type="hidden" name="joy" value="1" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Update Image</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-1">
                            <p>6</p>
                        </div>

                        <div class="col-md-3">
                            <p><?php if($car_image['image_6'] == "") { echo 'No image';} else{ echo '<img src="'.base_url().'upload/'.$car_image['image_6'].'" width="150">'; } ?></p>
                        </div>
                        <?= form_open_multipart('dealers/upload_img/'.$a.'/6') ?>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="file" class="form-control"  name="userfile" required="" > 
                                <input type="hidden" name="joy" value="1" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Update Image</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-1">
                            <p>7</p>
                        </div>

                        <div class="col-md-3">
                            <p><?php if($car_image['image_7'] == "") { echo 'No image';} else{ echo '<img src="'.base_url().'upload/'.$car_image['image_7'].'" width="150">'; } ?></p>
                        </div>
                        <?= form_open_multipart('dealers/upload_img/'.$a.'/7') ?>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="file" class="form-control"  name="userfile" required="" > 
                                <input type="hidden" name="joy" value="1" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Update Image</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-1">
                            <p>8</p>
                        </div>

                        <div class="col-md-3">
                            <p><?php if($car_image['image_8'] == "") { echo 'No image';} else{ echo '<img src="'.base_url().'upload/'.$car_image['image_8'].'" width="150">'; } ?></p>
                        </div>
                        <?= form_open_multipart('dealers/upload_img/'.$a.'/8') ?>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="file" class="form-control"  name="userfile" required="" > 
                                <input type="hidden" name="joy" value="1" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Update Image</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <footer class="footer-main"> 
        &copy; <?= date('Y') ?> <strong><a target="_blank" href="#/">TokunkoCars.NG</a></strong>. All Right Reserved 
    </footer>	
    <!-- /footer -->

</div>
<!-- /main content -->

