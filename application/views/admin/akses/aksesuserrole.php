
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?php 
          if($sub_menu):
            echo $sub_menu; 
          else:
            echo $title;
          endif;
          ?>
          </h1>

          <div class="row">
            <div class='col-lg-8'>
            <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><a href="http://" class='btn btn-primary' data-toggle="modal" data-target="#exampleModal">Add New</a></h6>
                </div>
                <div class="card-body">
                <?php echo $this->session->flashdata('message'); ?>
                <?php echo validation_errors(); ?>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Role</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; ?>
                    <?php foreach ($data_role_menu as $m): ?>
                      <tr>
                        <th scope="row"><?php echo $i ?></th>
                        <td><?php echo $m['role']?></td>
                        <td><?php echo $m['header_menu']?></td>
                        <td>
                        <a href="http://" class="badge badge-success">Edit</a>
                        <a href="<?php echo base_url('akses/aksesRoleDelete/').$m['id']; ?>" class="badge badge-danger">Delete</a>
                        </td>
                      </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('akses/role'); ?>" method="POST">
      <div class="modal-body">
        <div class="form-group">
            <select class="custom-select custom-select" id='role_id' name='role_id'>
            <option selected>-- Pilih Role</option>
            <?php foreach ($arr_role as $value) : ?>
                <option value="<?php echo $value['id']; ?>"><?php echo $value['role']; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <select class="custom-select custom-select" id='menu_id' name='menu_id'>
            <option selected>-- Pilih Menu</option>
            <?php foreach ($arr_menu as $value) : ?>
                <option value="<?php echo $value['id']; ?>"><?php echo $value['nama']; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>

     
