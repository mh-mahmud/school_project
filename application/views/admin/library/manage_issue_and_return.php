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
                                          <b>Manage Issue and Return</b>  
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
                                <div class="muted pull-left">Manage Issue and Return</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'book_issue' ?>"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
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
                                                <th>Book Name</th>
                                                <th>Member Name</th>
                                                <th>Issue Date</th>
                                                <th>Issue Expired Date</th>
                                                <th>Total Book Issued</th>
                                                <th>Return Status</th>
                                                <th>Created By</th>
                                                <th>Created Date</th>
                                                <!-- <th>Status</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php foreach($get_record as $v) : ?>


                                            <tr class="odd gradeX">
                                                <td><?php echo $v->BOOK_ISSUE_ID; ?></td>

                                                <td>
                                                  <?php
                                                    
                                                    $book_list = explode(",", $v->BOOK_ID);
                                                    $i=1;
                                                    $book_total = count($book_list);
                                                    // dd($emp_total);

                                                    foreach($book_list as $list) {
                                                      $name = $this->db->query("SELECT BOOK_NAME FROM books WHERE  BOOK_ID=".$list)->row()->BOOK_NAME;
                                                      if($book_total > $i) {
                                                        echo $name . ", ";
                                                      }

                                                      else {
                                                        echo $name;
                                                      }
                                                      $i++;
                                                    }
                                                    
                                                   ?>
                                                </td> 
                                                <td>
                                                    
                                                  <?php
                                                    $cat = $this->db->query("SELECT si.NAME, sd.STUDENT_DATA_ID, lm.STUDENT_DATA_ID, lm.LIBRARY_MEMBER_ID, bi.* FROM book_issue AS bi INNER JOIN library_member AS lm ON lm.LIBRARY_MEMBER_ID = bi.LIBRARY_MEMBER_ID INNER JOIN student_data AS sd ON sd.STUDENT_DATA_ID = lm.STUDENT_DATA_ID INNER JOIN student_info AS si ON si.STUDENT_ID=sd.STUDENT_ID WHERE  bi.LIBRARY_MEMBER_ID=".$v->LIBRARY_MEMBER_ID)->result();
                                                    echo($cat[0]->NAME);
                                                  ?>
                                                </td>
                                               <td> <?php  echo $v->ISSUE_DATE;?></td>
                                               <td> <?php  echo $v->ISSUE_EXPIREDATE;?></td>
                                               <td> <?php  echo $v->TOTAL_BOOK_ISSUE;?></td>

                                               <td>
                                               	<?php
                                               		$expire_date = strtotime($v->ISSUE_EXPIREDATE);
                                               		$current_date = time();
                                               		$return_status = null;

                                               		if( ($current_date > $expire_date) && $v->RETURN_STATUS == 0  ) {
                                               			echo '<span class="label label-danger" style="background-color:red">Expired</span>';
                                               		}
                                               		else if( ($current_date < $expire_date) && $v->RETURN_STATUS == 0 ) {
                                               			echo '<span class="label label-info">Issued</span>';
                                               		}
                                               		else if($v->RETURN_STATUS == 1) {
                                               			echo '<span class="label label-success">Returned</span>';
                                               		}
                                               	?>
                                               </td>
                                             
                                                <td><?php echo $this->webspice->admin_user_name($v->CREATED_BY); ?></td>
                                                <td><?php echo $v->CREATED_DATE; ?></td>
                                                <!-- <td><?php //echo $this->webspice->static_status($v->STATUS); ?></td> -->	
                                                <td>
                                                  <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-default dropdown-toggle customized-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      Action
                                                      <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu customized-menu">
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_issue_and_return',true) && $v->STATUS!=9 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_issue_and_return/edit/<?php echo $this->webspice->encrypt_decrypt($v->BOOK_ISSUE_ID,'encrypt'); ?>" class="btn btn-success">Edit</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_issue_and_return',true) && $v->RETURN_STATUS==0 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_issue_and_return/return_status/<?php echo $this->webspice->encrypt_decrypt($v->BOOK_ISSUE_ID,'encrypt'); ?>" class="btn btn-info">Book Return</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_issue_and_return',true)): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_issue_and_return/delete/<?php echo $this->webspice->encrypt_decrypt($v->BOOK_ISSUE_ID,'encrypt'); ?>" class="btn btn-danger">Delete</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      


                                                    </ul>
                                                  </div>
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