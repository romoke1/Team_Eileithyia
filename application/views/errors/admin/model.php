<!-- Right Section Header End -->
<!-- Content Section Start -->
<div class="content-section">
    <div class="container-liquid">

        <div class="row">
            <div class="col-xs-12">
                <div class="sec-box">
                    <header>
                        <h2 class="heading">Model</h2> 
                    </header>

                    <div class="contents">
                        <div class="boxpadding ">
                            <?php
                            echo validation_errors();
                            echo $status
                            ?>
                            <div class="col-xs-6">
                                <?php echo form_open(); ?>
                                <div class="input-group ">



                                    <input style="width: 60%;" name="sub_name" type="text" placeholder="Add New Model Type" class="form-control" value="<?php echo $this->input->post('name') ?>" required >

                                    <select  class="form-control" name="make" style="width: 40%;" required>
                                        <option value="">Select model</option>
                                        <?php
                                        foreach ($cat as $category) {
                                            echo '<option value="' . $category->make_id . '">' . $category->name . '</option>';
                                        }
                                        ?>
                                    </select>

                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default">Add New</button>
                                    </span>
                                </div>
                                <?php echo form_close(); ?>
                                <div class="clearfix boxpadding"></div>
                                <div class="linkslist">
                                    <?php echo form_open("admin/editmodel/" . $token . ""); ?>
                                    <ul>
                                        <?php
                                        if ($model) {
                                            foreach ($model as $row) {
                                                if ($token == $row->model_id) {
                                                    foreach ($make as $make) {
                                                        if($make->make_id == $row->make_id)
                                                        {
                                                            $selected = "selected='selected'";
                                                        }else{
                                                            $selected = "";
                                                        }
                                                        $ddl .= '<option value="' . $make->make_id . '" '.$selected.'>' . $make->name . '</option>';
                                                    }
                                                    echo '<li class="input-group" id="editLi">
                                                        
                                                        <input style="width: 60%;" name="category1" type="text" placeholder="Add New model" class="form-control" value="' . $row->name . '" >
                                                           
<select  class="form-control" name="level1" style="width: 40%;" required>
                                        <option value="">Select Level</option>
                                        ' . $ddl . '
                                        
                                        
                                    </select>



                                                           <span class="input-group-btn"><button type="submit" class="btn btn-success style2">Save</button>
                                                            </span> </li>';
                                                } else {

                                                    $level = $this->model_getvalues->getDetails("make", "make_id", $row->make_id);
                                                    echo '<li>' . $row->name . ' (' . $level['name'] . ')<a onclick=delmodel(' . $row->model_id . ') href="#"><span class="captions pull-right">Delete</span></a> <a href="' . base_url() . 'admin/editmodel/' . $row->model_id . '"><span class="captions pull-right">Edit</span></a> </li>';
                                                }
                                            }
                                        } else {
                                            echo "<li>No Leave Type has been created</li>";
                                        }
                                        ?> </li>

                                    </ul>
                                    <?php echo form_close() ?>
                                </div>

                            </div>  
                            <div class="col-xs-6"></div>  
                            <div class="clearfix boxpadding"></div>

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
