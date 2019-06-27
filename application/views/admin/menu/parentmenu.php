
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
            <div class='col-lg-12'>
            <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><a href="http://" class='btn btn-primary' data-toggle="modal" data-target="#exampleModal">Add New Menu</a></h6>
                </div>
                <div class="card-body">
                <?php if(validation_errors()): ?>
                <div class="alert alert-danger" role="alert">
					<?php echo validation_errors() ?>						
				</div>
                <?php endif; ?>
                <?php echo $this->session->flashdata('message'); ?>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Is Active</th>
                        <th scope="col">Is Parent</th>
                        <th scope="col">Urutan</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; ?>
                    <?php 
                    $arr_badge = array(
                        '' => '<span class="badge badge-pill badge-danger">Deactive</span>',
                        1 => '<span class="badge badge-pill badge-primary">Active</span>'
                    );
                    $arr_parent = array(
                        '' => '<span class="badge badge-pill badge-danger">No</span>',
                        1 => '<span class="badge badge-pill badge-info">Yes</span>'
                    );
                    ?>
                    <?php foreach ($data_menu as $m): ?>
                      <tr>
                        <th scope="row"><?php echo $i ?></th>
                        <td><?php echo $m['header_menu']?></td>
                        <td><?php echo $m['title']?></td>
                        <td><?php echo $m['url']?></td>
                        <td><?php echo $m['icon']?></td>
                        <td><?php echo $arr_badge[$m['is_active']]; ?></td>
                        <td><?php echo $arr_parent[$m['is_parent']]; ?></td>
                        <td><?php echo $m['urutan']?></td>
                        <td>
                        <a href="http://" class="badge badge-success">Edit</a>
                        <a href="<?php echo base_url('menu/parentMenuDelete/').$m['id']; ?>" class="badge badge-danger">Delete</a>
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
      <form action="<?php echo base_url('menu/parentMenu'); ?>" method="POST">
      <div class="modal-body">
        <div class="form-group">
            <select class="custom-select custom-select" id='menu_id' name='menu_id'>
            <option selected>-- Pilih Menu Id</option>
            <?php foreach ($arr_header as $value) : ?>
                <option value="<?php echo $value['id']; ?>"><?php echo $value['nama']; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="title" name="title" placeholder="Judul Parent Menu">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="url" name="url" placeholder="Url Parent Menu">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon Parent Menu">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="urutan" name="urutan" placeholder="Urutan Parent Menu">
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="is_parent" name="is_parent" checked>
                <label class="form-check-label" for="is_parent">
                    Parent Menu
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                <label class="form-check-label" for="is_parent">
                    Active
                </label>
            </div>
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

     
