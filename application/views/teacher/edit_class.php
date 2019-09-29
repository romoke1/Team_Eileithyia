<div class="sm-grid">
      <div class="class-list">
          <h2 style="font-size: 20px;">Edit Class (<?= $class_del["name"]?>)</h2>
        <hr>
        <?= $status  ?>
        <?= form_open() ?>
        <label for="course_name" style="font-size: 16px">Class Name</label>
          <input type="text" value="<?= $class_del["name"]?>" name="txtCName" required="" id="course_name">
          
          <label for="class_title" style="font-size: 16px">Class Description</label>
          <textarea name="txtCDesp" id="class_title" required=""><?= $class_del["description"]?></textarea>
          
          <div class="btn-holder">
              <button type="submit" class="save-btn">Update</button>
              <button type="reset" class="cancel-btn">Cancel</button>
          </div>
        <?= form_close() ?>
      </div>
    
    </div>
  </div>

 