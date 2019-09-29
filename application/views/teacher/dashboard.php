<div class="sm-grid">
      <div>
          <h2 style="font-weight: bold;">Teacher's Dashboard</h2>
      </div>

    <div class="links" style="margin-left: -1px;">
        <a class="me" style="color: black;" href="<?= base_url()?>add_class">
            <div class="boxes" style="width: 350px;">
                <i style="margin-left: 12%;" class="fa fa-graduation-cap fa-3x"></i>
              <h3>ADD CLASS</h3>
            </div>
        </a>
        <a class="me" style="color: black;" href="<?= base_url()?>items">
            <div class="boxes" style="width: 370px;">
                <i style="margin-left: 18%;" class="fa fa-file fa-2x"></i>&nbsp;&nbsp;
              <h3>ALL ITEMS</h3>
            </div>
        </a>
        <a class="me" style="color: black; width: 10px;" href="<?= base_url()?>all_student">
            <div class="boxes" style="width: 350px;">
                <i style="margin-left: 12%; " class="fa fa-users fa-2x"></i>&nbsp;&nbsp;
              <h3>MY STUDENTS</h3>
            </div>
        </a>
      </div>
    
    
    
    <div class="class-list">
        <div class="contact" style="margin-top: 28px;">
              <h3 style="font-weight: bold;">All Classes</h3>
              <a href="<?= base_url()?>add_class"><button class="cl-btn"><i class="fa fa-plus-square-o"></i>&nbsp;&nbsp;Add Class</button></a>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                              <th>S/N</th>
                              <th>Class Name</th>
                              <th>No Of Students</th>
                              <th>No Of Items</th>
                              <th>Date Added</th>
                              <th>Action</th>
                            </tr>
                            <?php 
                                $a = 0;
                                foreach($class as $val):
                                    
                                    $time = $this->model_getvalues->time_elapsed_string($val->date_added);
                                    $student = $this->model_getvalues->getCount("student", "class_id", $val->class_id);
                                    $item = $this->model_getvalues->getCount("items", "class_id", $val->class_id);
                            ?>
                            <tr>
                              <td class="text-left"><?= ++$a ?></td>
                              <td class="text-left"><?= $val->name ?></td>
                              <td class="text-left"><?= $student ?></td>
                              <td class="text-left"><?= $item ?></td>
                              <td class="text-left"><?= $time ?></td>
                              <td class="text-left">
                                  <a href="<?= base_url()?>edit_class/<?= $val->class_id ?>" style="color: black"><i class="fa fa-edit" style="font-size: 22px;"></i>&nbsp;&nbsp;Edit</a>
                              </td>
                            </tr>
                            <?php endforeach; ?>
                          </table>
                    </div>
                </div>
            </div>
        </div>
          
    </div>
    
    </div>
  </div>

  