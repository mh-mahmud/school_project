<?php include(APPPATH."views/admin/admin_header.php"); ?>

        <div class="container">
            <div class="row-fluid">
                <div class="span12" id="content">
                    <div class="row-fluid">

                        <!-- here will goes alert message -->
                        <!-- <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4>Success</h4>
                            The operation completed successfully
                        </div> -->
                        <!-- alert message end -->

                          <div class="navbar">
                              <div class="navbar-inner">
                                  <ul class="breadcrumb">
                                      <li>
                                          <b>Manage Gallery</b>  
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div>
<!-- table start -->
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Manage Slider</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix ?>add_images"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                      <!-- <div class="btn-group pull-right">
                                         <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                                         <ul class="dropdown-menu">
                                            <li><a href="#">Print</a></li>
                                            <li><a href="#">Save as PDF</a></li>
                                            <li><a href="#">Export to Excel</a></li>
                                         </ul>
                                      </div> -->
                                   </div>
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Category Name</th>
                                                <th>Sub Category Name</th>
                                                <th>Image Caption</th>
                                                <th>Image</th>
                                                <th>Created Date</th>
                                                <th>Created By</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($get_record as $v) : ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $v->IMAGE_ID; ?></td>
                                                <td><?php echo $this->db->query("SELECT CATEGORY_NAME FROM category WHERE CATEGORY_ID=".$v->CAT_ID)->row()->CATEGORY_NAME; ?></td>
                                                <td><?php echo $this->db->query("SELECT SUB_CATEGORY_NAME FROM sub_category WHERE SUB_CATEGORY_ID=".$v->SUB_CAT_ID)->row()->SUB_CATEGORY_NAME; ?></td>
                                                <td><?php echo $v->IMAGE_CAPTION; ?></td>
                                                <td>
                                                  <?php if( file_exists($this->webspice->get_path('gallery_full').$v->IMAGE_ID.'.jpg') ): ?>
                                                      <img src="<?php echo $this->webspice->get_path('gallery').$v->IMAGE_ID.'.jpg'; ?>"  alt="" class="img-responsive" width="100px;"/> 
                                                  <?php endif;  ?>
                                                </td>
                                                <td><?php echo $v->CREATED_DATE; ?></td>
                                                <td><?php echo $v->CREATED_BY; ?></td>
                                                <td><?php echo $this->webspice->static_status($v->STATUS); ?></td>
                                                <td>

                                                  <?php if( $this->webspice->permission_verify('manage_gallery',true)): ?>
                                                      <a href="<?php echo $url_prefix; ?>manage_gallery/delete/<?php echo $this->webspice->encrypt_decrypt($v->IMAGE_ID,'encrypt'); ?>" class="btn btn-danger">Delete</a>
                                                  <?php endif; ?>
                                                </td>
                                            </tr>
                                          <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
<!-- table end -->
                    
                    
                    
                </div>
        
            </div>
            
<?php include(APPPATH."views/admin/admin_footer.php"); ?>