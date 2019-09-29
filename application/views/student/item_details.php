<div class="sm-grid">
      <div class="class-list">
          
          <h2 style="font-size: 22px; font-weight: bold;"><?= $item_del["name"] ?></h2>
        <hr>
        
        <div class="descp" style="margin-left: 30px;">
            <p style="text-align: justify;"><?= $item_del["description"]?></p>
        </div>
        <hr>
        
         <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="list-group">
                            <a href="#" class="list-group-item active coded" style="background: #006494; border-color: #006494">
                              Resources For <?= $item_del["name"]?>
                            </a>
                            
                            <?php 
                                if(!empty($item_del["file"])){
                                    foreach($items as $val):
                                        if(!empty($val->file)):
                            ?>
                                <a href="<?= base_url()?>download_file/<?= $val->id ?>" class="list-group-item coded" style="color: black;"><?= $val->name ?> &nbsp;&nbsp;<i class="fa fa-download" style="font-size: 20px;"></i></a>
                            <?php 
                                    endif;        
                                    endforeach;
                                }else{
                            ?>
                                <a href="#" class="list-group-item coded" style="color: black;">No Item for this Course Uploaded</a>
                            <?php }?>
                          </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    
    </div>
  </div>

 