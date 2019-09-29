<div class="sm-grid">
      <div class="class-list">
        <h2>Add Class</h2>
        <hr>
        <?= $status  ?>
        <?= form_open() ?>
          <label for="course_name">Class Name</label>
          <input type="text" name="txtCName" required="" id="course_name">
          
          <label for="class_title">Class Description</label>
          <textarea name="txtCDesp" id="class_title" required=""></textarea>
          
          <div class="btn-holder">
              <button type="submit" class="save-btn">Save</button>
              <button type="reset" class="cancel-btn">Cancel</button>
          </div>
        <?= form_close() ?>
      </div>
    
    </div>
  </div>

 