<div class="content-section">
    <div class="container-liquid">

        <div class="row">
            <div class="col-xs-12">
                <div class="sec-box">
                    <header>
                        <h2 class="heading">Images for <?= $car_det['year']." ".$make_det['name']." ".$model_det['name'] ?></h2> 
                    </header>

                    <div class="contents">
                         <?php
                            echo validation_errors();
                            echo $status;
                         //   echo $success_msg;
                            ?>
                            
                        
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <td>S/N</td><td>Preview</td><td>Upload </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                            
                                    
                                    <td> 1</td>
                                    <td>(This is the main image of the car) <br /><?php if($car_image['image_1'] == "") { echo 'No image';} else{ echo '<img src="'.base_url().'upload/'.$car_image['image_1'].'" width="150">'; } ?></td>
                                    <td>
                                    <?= form_open_multipart('admin/upload_img/'.$a.'/1') ?>
                                        <input type="file" class="form-control"  name="userfile" required="" > 
                                        <input type="hidden" name="joy" value="1" />
                                    <input type="submit" class="btn btn-warning style2 col-xs-12" style="float: right;" type="submit" name="btnSub" value="Update">
                                    <?= form_close() ?>
                                    </td>
                                   
                                </tr>
                                
                                 <tr>
                                    <td> 2</td>
                                    <td><?php if($car_image['image_2'] == "") { echo 'No image';} else{ echo '<img src="'.base_url().'upload/'.$car_image['image_2'].'" width="150">'; } ?></td>
                                     <td>
                                    <?= form_open_multipart('admin/upload_img/'.$a.'/2') ?>
                                        <input type="file" class="form-control"  name="userfile" required="" > 
                                        <input type="hidden" name="joy" value="1" />
                                    <input type="submit" class="btn btn-primary style2 col-xs-12" style="float: right;" type="submit" name="btnSub" value="Update">
                                    <?= form_close() ?>
                                    </td>
                                </tr>
                                
                                
                                 <tr>
                                    <td> 3</td>
                                    <td><?php if($car_image['image_3'] == "") { echo 'No image';} else{ echo '<img src="'.base_url().'upload/'.$car_image['image_3'].'" width="150">'; } ?></td>
                                     <td>
                                    <?= form_open_multipart('admin/upload_img/'.$a.'/3') ?>
                                        <input type="file" class="form-control"  name="userfile" required="" > 
                                        <input type="hidden" name="joy" value="1" />
                                    <input type="submit" class="btn btn-danger style2 col-xs-12" style="float: right;" type="submit" name="btnSub" value="Update">
                                    <?= form_close() ?>
                                    </td>
                                </tr>
                                
                                 <tr>
                                    <td> 4</td>
                                    <td><?php if($car_image['image_4'] == "") { echo 'No image';} else{ echo '<img src="'.base_url().'upload/'.$car_image['image_4'].'" width="150">'; } ?></td>
                                     <td>
                                    <?= form_open_multipart('admin/upload_img/'.$a.'/4') ?>
                                        <input type="file" class="form-control"  name="userfile" required="" > 
                                        <input type="hidden" name="joy" value="1" />
                                    <input type="submit" class="btn btn-warning style2 col-xs-12" style="float: right;" type="submit" name="btnSub" value="Update">
                                    <?= form_close() ?>
                                    </td>
                                </tr>
                                
                                 <tr>
                                    <td> 5</td>
                                    <td><?php if($car_image['image_5'] == "") { echo 'No image';} else{ echo '<img src="'.base_url().'upload/'.$car_image['image_5'].'" width="150">'; } ?></td>
                                     <td>
                                    <?= form_open_multipart('admin/upload_img/'.$a.'/5') ?>
                                        <input type="file" class="form-control"  name="userfile" required="" > 
                                        <input type="hidden" name="joy" value="1" />
                                    <input type="submit" class="btn btn-primary style2 col-xs-12" style="float: right;" type="submit" name="btnSub" value="Update">
                                    <?= form_close() ?>
                                    </td>
                                </tr>
                                
                                 <tr>
                                    <td> 6</td>
                                    <td><?php if($car_image['image_6'] == "") { echo 'No image';} else{ echo '<img src="'.base_url().'upload/'.$car_image['image_6'].'" width="150">'; } ?></td>
                                     <td>
                                    <?= form_open_multipart('admin/upload_img/'.$a.'/6') ?>
                                        <input type="file" class="form-control"  name="userfile" required="" > 
                                        <input type="hidden" name="joy" value="1" />
                                    <input type="submit" class="btn btn-danger style2 col-xs-12" style="float: right;" type="submit" name="btnSub" value="Update">
                                    <?= form_close() ?>
                                    </td>
                                </tr>
                                
                                
                                 <tr>
                                    <td> 7</td>
                                    <td><?php if($car_image['image_7'] == "") { echo 'No image';} else{ echo '<img src="'.base_url().'upload/'.$car_image['image_7'].'" width="150">'; } ?></td>
                                     <td>
                                    <?= form_open_multipart('admin/upload_img/'.$a.'/7') ?>
                                        <input type="file" class="form-control"  name="userfile" required="" > 
                                        <input type="hidden" name="joy" value="1" />
                                    <input type="submit" class="btn btn-danger style2 col-xs-12" style="float: right;" type="submit" name="btnSub" value="Update">
                                    <?= form_close() ?>
                                    </td>
                                </tr>
                                
                                 <tr>
                                    <td> 8</td>
                                    <td><?php if($car_image['image_8'] == "") { echo 'No image';} else{ echo '<img src="'.base_url().'upload/'.$car_image['image_8'].'" width="150">'; } ?></td>
                                     <td>
                                    <?= form_open_multipart('admin/upload_img/'.$a.'/8') ?>
                                        <input type="file" class="form-control"  name="userfile" required="" > 
                                        <input type="hidden" name="joy" value="1" />
                                    <input type="submit" class="btn btn-danger style2 col-xs-12" style="float: right;" type="submit" name="btnSub" value="Update">
                                    <?= form_close() ?>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                        
                                         
                               
                        
                              
                    
            </div>
        </div>

       
    </div>
</div>
<!-- Content Section End -->
<!-- </div> -->
<!-- Right Section End -->
