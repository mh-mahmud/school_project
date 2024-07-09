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
                                          <b>View Library Books</b>  
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
                                <div class="muted pull-left">View Library Books</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                        <thead>
                                            <tr>
                                                <th>Book Category Name</th>
                                                <th>Writer Name</th>
                                                <th>Book Name</th>
                                                <th>Book Description</th>
                                                <th>Book Code</th>
                                                <th>ISBN NO</th>
                                                <th>Number of Copies</th>
                                                <th>Book Location</th>
                                                <th>Edition No</th>
                                                <th>Edition Year</th>
                                                <th>Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($get_record as $v) : ?>
                                            <tr class="odd gradeX">
                                                <td>
                                                  <?php
                                                    $cat = $this->db->query("SELECT CATEGORY_NAME FROM book_category WHERE BOOK_CATEGORY_ID=".$v->BOOK_CATEGORY_ID)->result();
                                                    echo($cat[0]->CATEGORY_NAME);
                                                  ?>
                                                </td>
                                                <td>
                                                	<?php
                                                    $cat = $this->db->query("SELECT WRITER_NAME FROM book_writer WHERE WRITER_ID=".$v->WRITER_ID)->result();
                                                    echo($cat[0]->WRITER_NAME);
                                                  ?>
                                                </td>
                                                <td><?php echo $v->BOOK_NAME; ?></td>
                                                <td style="min-width:200px"><?php echo $v->BOOK_DESCRIPTION; ?></td>
                                                <td><?php echo $v->BOOK_CODE; ?></td>
                                                <td><?php echo $v->ISBN_NO; ?></td>
                                                <td><?php echo $v->NUMBER_OF_COPIES; ?></td>
                                                <td><?php echo $v->BOOK_LOCATION; ?></td>
                                                <td><?php echo $v->EDITION_NO; ?></td>
                                                <td><?php echo $v->EDITION_YEAR; ?></td>
                                                <td>
                                                  <?php if( file_exists($this->webspice->get_path('book_full').$v->BOOK_ID.'.jpg') ): ?>
                                                      <img src="<?php echo $this->webspice->get_path('books').$v->BOOK_ID.'.jpg'; ?>"  alt="" class="img-responsive" width="100px;"/>
                                                  <?php endif;  ?>
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