<div class="sm-grid">
    
    <div class="class-list">
        <div class="contact" style="margin-top: 28px;">
              <h3 style="font-weight: bold;">All Items</h3>
              <a href="<?= base_url()?>add_item"><button class="btn btn-primary"><i class="fa fa-plus-square-o"></i>&nbsp;&nbsp;Add ITEM</button></a>
        </div>
        <?= $status ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                              <th>S/N</th>
                              <th>Item Name</th>
                              <th>Class Name</th>
                              <th>Date Added</th>
                              <th>Action</th>
                            </tr>
                            <?php 
                                $a = 0;
                                foreach($items as $val):
                                    
                                    $time = $this->model_getvalues->time_elapsed_string($val->date_added);
                                    $class = $this->model_getvalues->getDetails("class", "class_id", $val->class_id);
                            ?>
                            <tr>
                              <td class="text-left"><?= ++$a ?></td>
                              <td class="text-left"><?= $val->name ?></td>
                              <td class="text-left"><?= $class["name"] ?></td>
                              <td class="text-left"><?= $time ?></td>
                              <td class="text-left">
                                  <a onclick="delete_item(<?= $val->id ?>)" href="#" style="color: black"><i class="fa fa-trash" style="font-size: 22px;"></i>&nbsp;&nbsp;Delete</a>
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
  
  <script>
      var baseURL = location.protocol + "//" + location.hostname + (location.port && ":" + location.port) + "/mini_classroom/";



    function delete_item(s)
    {
    
         swal({
            title: "Are you sure?",
            text: "By clicking the Yes button, you will be deleting this ITEM.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#25a85c",
            confirmButtonText: "Yes, Delete Item!",
            closeOnConfirm: false}, function ()
            {
                swal("Delected!", "This Item has been deleted", "success");
                document.location.href = baseURL + 'app/delete_item/' + s;
            }
            );

    }
  </script>

  