

                        <!-- Page-Title -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            
                    
                
            <div class="col-md-1"></div>
                <div class="wraper container-fluid">
                    <div class="row">
                        
                        <div>
                             <?php if (isset($_SESSION['success'])) { ?>
                                         <?php echo $_SESSION['success']; ?>
                                    <?php  } ?>
                            
                        </div>
                        <div class="col-md-6" style="margin-top: 20px; margin-left: 20px;">
                            
                           
                        <div class="row">
                         <form action="<?php echo base_url() ."users/edit_contact";?>" method="post">
                                        <div class="form-group">
                                            <label for="userName">Fullname*</label>
                                            <input type="text" name="fullname" value="<?php echo $user['fullname']; ?>"  required placeholder="Fullname" class="form-control">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="pass1">Phone Number*</label>
                                            <input  type="text"  name="phone" value="<?php echo $user['phone']; ?>" placeholder="Phone Number" required class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="pass1">Address*</label>
                                            <input  type="text"  name="address" value="<?php echo $user['address']; ?>" placeholder="Address" required class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="pass1">Company*</label>
                                            <input  type="text"  name="company" value="<?php echo $user['company']; ?>" placeholder="Company" required class="form-control">
                                        </div>
                                            
                                            <div class="row">                                                                  

                                        <div class="form-group text-right m-b-0">

                               
                                            <button class="btn btn-success" type="submit" name="submit">
                                                Update
                                            </button>
                                            <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
                                                Cancel
                                            </button>
                                        </div>
                                        </div>
                                        
                                    </form>
                                </div>
                        </div>
                
                
                                </div>
                                </div>


                                                  
                    </div>
                                                          
                    
                    <div class="row">

                            </div>
                            
                            <!-- Personal-Information -->
                            
                            
                                                
                        
                        
                      
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        
                        
                    </div>
                    
                    <div class="row">
                        
                    </div>
                </div> <!-- container -->
                               
                </div> <!-- content -->

               
<!-- 
               <form action="<?php echo base_url() ."users/edit_contact";?>" method="post">
                                        <div class="form-group">
                                            <label for="userName">Fullname*</label>
                                            <input type="text" name="fullname" value="<?php echo $user['fullname']; ?>"  required placeholder="Fullname" class="form-control">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="pass1">Phone Number*</label>
                                            <input  type="text"  name="phone" value="<?php echo $user['phone']; ?>" placeholder="Phone Number" required class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="pass1">Address*</label>
                                            <input  type="text"  name="address" value="<?php echo $user['address']; ?>" placeholder="Address" required class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="pass1">Company*</label>
                                            <input  type="text"  name="company" value="<?php echo $user['company']; ?>" placeholder="Company" required class="form-control">
                                        </div>
                                            
                                                                                                            

                                        <div class="form-group text-right m-b-0">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit" name="submit">
                                                Update
                                            </button>
                                            <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
                                                Cancel
                                            </button>
                                        </div>
                                        
                                    </form>
                                </div>
                                <div class="col-lg-3"><a href="<?= base_url();?>users/profile" class="btn btn-success">My Profile</a></div> -->