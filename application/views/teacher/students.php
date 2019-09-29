<div class="sm-grid">
    
    <div class="class-list">
        <div class="contact" style="margin-top: 28px;">
              <h3 style="font-weight: bold;">All Students</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                              <th>S/N</th>
                              <th>Fullname</th>
                              <th>Email</th>
                              <th>Class</th>
                              <th>Date Joined</th>
                            </tr>
                            <?php 
                                $a = 0;
                                foreach($student as $val):
                                    
                                    $time = $this->model_getvalues->time_elapsed_string($val->date_added);
                                    $class = $this->model_getvalues->getDetails("class", "class_id", $val->class_id);
                            ?>
                            <tr>
                              <td class="text-left"><?= ++$a ?></td>
                              <td class="text-left"><?= $val->fullname ?></td>
                              <td class="text-left"><?= $val->email ?></td>
                              <td class="text-left"><?= $class["name"] ?></td>
                              <td class="text-left"><?= $time ?></td>
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
  
  