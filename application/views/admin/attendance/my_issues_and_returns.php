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
                                          <b>My Issues and Returns</b>  
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
                                <div class="muted pull-left">My Issues and Returns</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                        <thead>
                                            <tr>
                                                <th>Book Name</th>
                                                <th>Member Name</th>
                                                <th>Issue Date</th>
                                                <th>Issue Expired Date</th>
                                                <th>Total Book Issued</th>
                                                <th>Return Status</th>
                                                <th>Created By</th>
                                                <th>Created Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php foreach($get_record as $v) : ?>


                                            <tr class="odd gradeX">

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