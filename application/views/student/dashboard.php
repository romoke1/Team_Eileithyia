<div class="sm-grid">
      <div>
          <h2 style="font-weight: bold;">Student's Dashboard</h2>
      </div>
    
    
    <div class="class-list">
        <div class="contact" style="margin-top: 28px;">
            <h5 style="font-weight: bold;">All Items (<?= $class["name"]?>)</h5>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                              <th>S/N</th>
                              <th>Author</th>
                              <th>Item Name</th>
                              <th>Date Added</th>
                              <th>File</th>
                              <th>Action</th>
                            </tr>
                            <?php 
                                $a = 0;
                                foreach($item as $val):
                                    
                                    $time = $this->model_getvalues->time_elapsed_string($val->date_added);
                                    $author = $this->model_getvalues->getDetails("teachers", "id", $val->teacher_id);
                            ?>
                            <tr>
                              <td class="text-left"><?= ++$a ?></td>
                              <td class="text-left"><?= $author["fullname"] ?></td>
                              <td class="text-left"><?= $val->name ?></td>
                              <td class="text-left"><?= $time ?></td>
                              <td class="text-left">
                                  <?php 
                                    if(!empty($val->file)){
                                  ?>
                                  <a href="<?= base_url()?>download_file/<?= $val->id ?>" style="color: black"><i class="fa fa-download" style="font-size: 22px;"></i>&nbsp;&nbsp;</a>
                                  <?php 
                                    }else{
                                  ?>
                                  <a class="text-danger" style="font-weight: bold;">No File Here</a>
                                <?php }?>
                              </td>
                              <td class="text-left">
                                  <a href="<?= base_url()."item_details/".url_title($class["name"], "-")."/".$val->id?>" style="color: black"><i class="fa fa-eye" style="font-size: 18px;"></i>&nbsp;View</a>
                                  
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

  