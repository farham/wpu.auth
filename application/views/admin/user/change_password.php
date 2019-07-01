        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?php 
          if($sub_menu):
            echo $sub_menu; 
          else:
            echo $title;
          endif;
          ?></h1>

          <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <?php echo $this->session->flashdata('message'); ?>
                        <?php echo form_open_multipart('user/changePass');?>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-4 col-form-label">Current Password</label>
                            <div class="col-sm-8">
                            <input type="password" class="form-control" id="current_password" name="current_password" placeholder="">
                            <?php echo form_error('password', '<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-4 col-form-label">New Password</label>
                            <div class="col-sm-8">
                            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="">
                            <?php echo form_error('new_password', '<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-4 col-form-label">Repeat New Password</label>
                            <div class="col-sm-8">
                            <input type="password" class="form-control" id="repeat_password" name="repeat_password" placeholder="">
                            <?php echo form_error('repeat_password', '<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Update Password</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     
