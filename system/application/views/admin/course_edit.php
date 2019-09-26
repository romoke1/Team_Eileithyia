<?php
/**
 * @author Ayodeji Adesola (skyboy4life@gmail.com)
 * @copyright 2014
 */
?>
<!-- Content Section Start -->
<div class="content-section">
    <div class="container-liquid">
        <div class="row">
            <div class="col-xs-12">
                <div class="sec-box">
                    <header>
                        <h2 class="heading">Edit Course </h2>
                    </header>
                    <div class="contents">
                        <div class="table-box">
<?php echo validation_errors(); ?>
<?php echo $status ?>
<?php echo form_open() ?>
                            <div class="col-xs-9">
                                <table class="display table table-hover" style="font-size: 16px;">
                                    <tbody>
                                        <tr style="background-color: white;">
                                            <td class="col-sm-1">Category</td>
                                            <td class="col-sm-3">
                                                <select class="form-control" name="ddlCategory">
                                                    
<?php
    $category = $this->model_getvalues->getDetails("categories", "category_id", $course_det['category_id']);
    
    $level = $this->model_getvalues->getDetails("level", "level_id", $category['level_id']);
    echo '<option value="'.$category['category_id'].'">'.$category['category_name'].' (' . $level['level_name'] . ')</option>';
foreach ($cats as $cat) {
    $level = $this->model_getvalues->getDetails("level", "level_id", $cat->level_id);
    echo '<option value="' . $cat->category_id . '">' . $cat->category_name . ' (' . $level['level_name'] . ')</option>';
}
?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td class="col-sm-1">Course Name</td>
                                            <td class="col-sm-3"><input name="txtCourseName" type="text" value="<?php echo $course_det['course_name'] ?>" class="form-control" required ></td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td> Course Details</td>
                                            <td><textarea name="txtCourseDetails" class="form-control" rows="6"><?php echo $course_det['details'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td class="col-md-1"></td>
                                            <td class="col-md-3">
                                                <button type="submit" class="btn btn-success style2">Submit</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
<?php form_close() ?>
                        </div>
                        <div class="clearfix"></div>
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





