

    

   

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

          <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="<?php echo base_url('assets/img/profile/').$user['image']; ?>" class="card-img">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $user['name']; ?></h5>
                  <p class="card-text"><?php echo $user['email']; ?></p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     
