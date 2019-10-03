<div class="sm-grid">
      <div class="class-list">
          <h2 style="font-size: 20px;">Edit Profile</h2>
        <hr>
        <?= $status  ?>
        <?= form_open() ?>
        <label for="course_name" style="font-size: 16px">Fullname</label>
          <input type="text" value="<?= $teacher["fullname"]?>" name="txtFname" required="" id="course_name">
          
        <label for="course_name" style="font-size: 16px">Email</label>
          <input type="email" value="<?= $teacher["email"]?>" name="txtEmail" required="" id="course_name">
          
          <div class="btn-holder">
              <button type="submit" class="save-btn">Update Profile</button>
              <button type="reset" class="cancel-btn">Cancel</button>
          </div>
        <?= form_close() ?>
      </div>
    
      <div class="class-list">
          <h2 style="font-size: 20px;">Change Password</h2>
        <hr>
        <form action="<?= base_url()?>teacher_change_password" method="POST">
        <label for="course_name" style="font-size: 16px">Old Password</label>
          <input type="password" name="txtOldPass" required="" id="course_name">
          
        <label for="course_name" style="font-size: 16px">New Password</label>
          <input type="password" name="txtNewPass" required="" id="course_name">
          
          
        <label for="course_name" style="font-size: 16px">Confirm New Password</label>
          <input type="password" name="txtNewPass2" required="" id="course_name">
          
          <div class="btn-holder">
              <button type="submit" class="save-btn">Update</button>
              <button type="reset" class="cancel-btn">Cancel</button>
          </div>
        <?= form_close() ?>
      </div>
    
    </div>
  </div>

 