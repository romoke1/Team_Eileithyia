<div class="sm-grid">
      <div class="class-list">
        <h2>Add ITEM</h2>
        <hr>
        <?= $status  ?>
        <?= form_open_multipart()?>
          <label for="course_name">Select Class</label>
          <select id="course_name" name="txtClass" required="">
              <option>Select Class</option>
              <?php foreach($class as $val):?>
              <option value="<?= $val->class_id ?>"><?= $val->name ?></option>
              <?php endforeach; ?>
          </select>
          
          <label for="course_name">Item Name</label>
          <input type="text" name="txtName" required="" id="course_name">
          
          <label for="class_title">Item Description</label>
          <textarea name="txtDesp" id="class_title" required=""></textarea>
          
          <label for="class_title">Useful File</label>
          <input type="file" name="userfile">
          
          <div class="btn-holder">
              <button type="submit" class="save-btn">Save</button>
              <button type="reset" class="cancel-btn">Cancel</button>
          </div>
        <?= form_close() ?>
      </div>
    
    </div>
  </div>

 