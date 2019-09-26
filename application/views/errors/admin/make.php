<!-- Right Section Header End -->
<!-- Content Section Start -->
<div class="content-section">
    <div class="container-liquid">

        <div class="row">
            <div class="col-xs-12">
                <div class="sec-box">
                    <header>
                        <h2 class="heading">Make</h2> 
                    </header>

                    <div class="contents">
                        <div class="boxpadding ">
                            <?php echo validation_errors();
                            echo $status
                            ?>
                            <div class="col-xs-6">
                                    <?php echo form_open(); ?>
                                <div class="input-group ">
<?php $deptName = array("name" => "txtCategory", "id" => "txtCategory", "value" => "", "class" => "form-control", "placeholder" => "Add Make ");
echo form_input($deptName) ?>
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default">Add New</button>
                                    </span>
                                </div>
                                    <?php echo form_close(); ?>
                                <div class="clearfix boxpadding"></div>
                                <div class="linkslist">
                                        <?php echo form_open("admin/edit_make/" . $token . ""); ?>
                                    <ul>
                                        <?php
                                        if ($results) {
                                            foreach ($results as $row) {
                                                if ($token == $row->make_id) {
                                                    $editST = array(
                                                        "name" => "txtCategory1", 
                                                        "id" => "txtCategory1", 
                                                        "value" => "" . $row->name . "", 
                                                        "class" => "form-control", 
                                                        "placeholder" => "Add New Make Type"
                                                        );
                                                    echo '<li class="input-group" id="editLi">' . form_input($editST) . '<span class="input-group-btn"><button type="submit" class="btn btn-success style2">Save</button>
                                                                </span> </li>';
                                                } else {
                                                    echo '<li>' . $row->name . '<a onclick="delCategory(' . $row->make_id . ')" href="#" c><span class="captions pull-right">Delete</span></a> <a href="' . base_url() . 'admin/edit_make/' . $row->make_id . '"><span class="captions pull-right">Edit</span></a> </li>';
                                                }
                                            }
                                        } else {
                                            echo "<li>No Make Type has been created</li>";
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
<!-- Wradminer End -->
</body>
</html>
