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
                                          <b>Class Routine</b>  
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
                                <div class="muted pull-left">Class Routine</div>
                            </div>
                            <div class="block-content collapse in">



                              <div class="btn-group">
                                 <a href="<?php echo $url_prefix . 'admin' ?>"><button class="btn btn-success">Go Back</button></a>
                              </div>




                              <!-- TABLE LISTING STARTS -->
                              <div class="tab-pane active" id="list">
                              <div class="panel-group joined" id="accordion-test-2">
                              <?php 
                              //$toggle = true;
                              //$classes = $this->db->get('class')->result_array();
                              //foreach($classes as $row):
                              ?>


                              <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapse<?php //echo $row['class_id'];?>">
                                        <i class="entypo-rss"></i> Class <?php echo $class_name; ?> (<?php echo $section_name; ?>)
                                    </a>
                                    </h4>
                                </div>

                                <div id="collapse<?php //echo $row['class_id'];?>" class="panel-collapse  <?php //if($toggle){echo 'in';$toggle=false;}?>">
                                    <div class="panel-body">
                                        <table cellpadding="0" cellspacing="0" border="0"  class="table table-bordered">
                                            <tbody>
                                              <?php
                                              $ROUTINE = new Student_controller();
                                              for($d=1;$d<=7;$d++):

                                                if($d==1)$day='Sunday';
                                                else if($d==2)$day='Monday';
                                                else if($d==3)$day='Tuesday';
                                                else if($d==4)$day='Wednesday';
                                                else if($d==5)$day='Thursday';
                                                else if($d==6)$day='Friday';
                                                else if($d==7)$day='Saturday';
                                                ?>
                                                <tr class="gradeA">
                                                  <td width="100"><?php echo strtoupper($day);?></td>
                                                  <td>
                                                    <?php
                                                    // $this->db->order_by("ROUTINE_ID", "ASC");
                                                    $this->db->order_by("TIME_FROM", "DESC");
                                                    $this->db->where('DAY' , $day);
                                                    $this->db->where('SECTION_ID' , $section_id);
                                                    $routines = $this->db->get('class_routine')->result_array();
                                                    // dd($routines, true);
                                                    foreach($routines as $row2):
                                                    ?>
                                                      <div class="btn-group">
                                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                                          <?php echo $ROUTINE->subject_name($row2['SUBJECT_ID']);?>
                                                          <?php echo '('.$row2['TIME_FROM'].'-'.$row2['TIME_TO'].')';?>
                                                          <br />
                                                          <?php
                                                            $teacher = $this->db->query("SELECT TEACHER_NAME FROM teacher WHERE TEACHER_ID=".$row2['TEACHER_ID'])->row()->TEACHER_NAME;
                                                            echo $teacher;
                                                          ?>
                                                          <span class="caret"></span>
                                                        </button>
                                                        <!-- <ul class="dropdown-menu">
                                                          <li>
                                                            <a href="<?php //echo $url_prefix; ?>manage_class_routine/edit/<?php //echo $this->webspice->encrypt_decrypt($row2['ROUTINE_ID'],'encrypt'); ?>">
                                                            <i class="entypo-pencil"></i>
                                                            Edit
                                                            </a>
                                                          </li>

                                                          <li>
                                                            <a href="<?php //echo $url_prefix; ?>manage_class_routine/delete/<?php //echo $this->webspice->encrypt_decrypt($row2['ROUTINE_ID'],'encrypt'); ?>">
                                                            <i class="entypo-trash"></i>
                                                            Delete
                                                            </a>
                                                          </li>
                                                        </ul> -->
                                                      </div>
                                                    <?php endforeach;?>

                                                  </td>
                                                </tr>
                                              <?php endfor;?>
                                                
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>
                              </div>
                              <?php
                              //endforeach;
                              ?>
                              </div>
                              </div>
                              <!-- TABLE LISTING ENDS -->














                            </div>
                        </div>
                        <!-- /block -->
                    </div>
<!-- table end -->
                    
                    
                    
                </div>
        
            </div>
            
<?php include(APPPATH."views/admin/admin_footer.php"); ?>