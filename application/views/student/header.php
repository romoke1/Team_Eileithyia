<!DOCTYPE html>
<html>
<head>
  <title><?= $title ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?= base_url()?>assets/css/teacher_dashboard.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      
  
  <!--ADDING THE JS FOR BOOTSTRAP--> 
  <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/bootstrap/css/bootstrap.min.css">
  <script type="text/javascript" src="<?= base_url()?>assets/bootstrap/js/jquery.js"></script>
  <script type="text/javascript" src="<?= base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- Adding Toastr Files -->
    <link href="<?= base_url()?>assets/toast/toastr.min.css" rel="stylesheet">
    <script src="<?= base_url()?>assets/toast/toastr.min.js"></script>

    <!-- Adding SweetAlert Files -->
    <link href="<?= base_url()?>assets/sweetalert/sweetalert.css" rel="stylesheet">
    <script src="<?= base_url()?>assets/sweetalert/sweetalert.js"></script>
    
</head>

<div class="main-cont">
  <div class="header">
    <div>
        <h4 style="margin-left: 10px;"><i class="fa fa-graduation-cap fa-2x"></i>&nbsp;Thyia E - Learning Classroom</h4>
    </div>
    <div class="profile-sm">
        <img src="<?= base_url()?>assets/images/avatar_sm.png" class="avatar-sm">
        <!--<img src="<?= base_url()?>assets/images/arrow_dwn.svg">-->
        <a href="" style="margin-right: 20px; color: black; font-weight: bold;" >Welcome, <?= $student["fullname"]?></a>
    </div>
  </div>

  <div class="main-grid">
    <div class="sidebar">
      <div class="profile-lg">
          <img src="<?= base_url()?>assets/images/avatar_lg.png" style="width: 30%;" class="avatar-lg">
        <div class="indicators">
            <h5 class="text-centerd" style="margin-left: 40px;"><i style="color: #51d010;" class="fa fa-circle"></i>&nbsp;&nbsp;<?= $student["fullname"]?></h5>
        </div>
      </div>
        <hr style="border-color: #fff;">
      <div class="profile-lg">
          <div class="list-item"><a href="<?= base_url()?>student_dashboard" style="color: #fff;"><i class="fa fa-home" style="font-size: 22px;"></i>&nbsp;&nbsp;Dashboard</a></div>
          <div class="list-item"><a href="<?= base_url()?>student_logout" style="color: #fff;"><i class="fa fa-sign-out" style="font-size: 22px;"></i>&nbsp;&nbsp;Logout</a></div>
      </div>
      <hr>
      <hr>
    </div>