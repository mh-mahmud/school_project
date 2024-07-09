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
                              
                            <?php
                              $my_data = array();
                              $my_data['class_name'] = $class_name;
                              $my_data['section_name'] = $section_name;
                              $my_data['student_name'] = $student_name;
                              $my_data['year'] = $year;
                              $my_data['total_sub'] = $total_sub;
                              $my_data['class_id'] = $class_id;
                              $my_data['section_id'] = $section_id;
                              $my_data['student_id'] = $student_id;
                              $my_data['exam_id'] = $exam_id;
                              $my_data['year'] = $year;
                              $my_data['roll_no'] = $roll_no;
                              $my_data = implode("|", $my_data);
                              $my_data = $this->webspice->encrypt_decrypt($my_data, 'encrypt');
                              // dd($my_data);
                            ?>

                            <div class="button_set">
                              <a class="btn btn-info" href="<?php echo $url_prefix; ?>print_student_report_card/print_report_card/<?php echo $my_data; ?>">Print Report Card</a>
                              <!-- <a class="btn btn-success" href="<?php //echo $url_prefix; ?>manage_testimonial/save_testimonial/<?php //echo $my_data; ?>">Save Testimonial</a> -->
                            </div>

                          </div>
                      </div>


                      <div class="container">
                        <div class="marksheet_wrapper">
                            <div class="marksheet_inner_wrapper_section">
                              <div class="row">
                      
                                  <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12"><!--Top_Header_Section-->
                                      <div class="top_header_section">
                                          <h2>Base4 High School</h2>
                                          <p id="address">Elephant Road, Dhaka</p>
                                          <p id="established">Established: 2012</p>
                                          <p id="established">Mobile:+8801672918866, +8801717075522, +8801922606668</p>
                                          <h3>Report Card 2016</h3>
                                      </div>
                                  </div><!--End_Top_Header_Section-->
                      
                              
                                  <div class="col-md-12"><!--Stu_Info_Section-->
                                      <div class="stu_info_wrapper_section">
                                          <div class="row">
                                              <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                                                  <div class="grading_section">
                                                      <table class="table table-bordered table-striped table-hover table-responsive table-condensed">
                                                        <tbody>
                                                          <tr>
                                                              <td>Name:</td>
                                                              <td><?php echo $student_name; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Class:</td>
                                                              <td><?php echo $class_name; ?></td>
                                                             
                                                          </tr>
                                                          <tr>
                                                              <td>Section Name:</td>
                                                              <td><?php echo $section_name; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Roll No:</td>
                                                              <td><?php echo $roll_no; ?></td>
                                                          </tr>
                                                        </tbody>
                                
                                                      </table>
                                                  </div>
                                              </div>
                      
                                              <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                                                  <div class="report_card_logo_section">
                                                      <img src="<?php echo $url_prefix; ?>global/img/logo3.png" alt="" class="img-responsive"/>
                                                  </div>
                                              </div>
                      
                                              <div class="col-md-4 col-lg-4 col-xs-12 col-sm-4">
                                                  <div class="grading_section">
                                                      <table class="table table-bordered table-striped table-hover table-responsive table-condensed">
                                                        <tbody>
                                                          <tr>
                                                              <th>Marks</td>
                                                              <th>Letter Grade</td>
                                                              <th>Grade Point</td>
                                                          </tr>
                                                          <tr>
                                                              <td>80-100</td>
                                                              <td>A+</td>
                                                              <td>5</td>
                                                          </tr>
                                                          <tr>
                                                              <td>70-79</td>
                                                              <td>A</td>
                                                              <td>4</td>
                                                          </tr>
                                                          <tr>
                                                              <td>60-69</td>
                                                              <td>A-</td>
                                                              <td>3.5</td>
                                                          </tr>
                                                          <tr>
                                                              <td>50-59</td>
                                                              <td>B</td>
                                                              <td>3</td>
                                                          </tr>
                                                          <tr>
                                                              <td>40-49</td>
                                                              <td>C</td>
                                                              <td>2</td>
                                                          </tr>
                                                          <tr>
                                                              <td>33-39</td>
                                                              <td>D</td>
                                                              <td>1</td>
                                                          </tr>
                                                          <tr>
                                                              <td>0-32</td>
                                                              <td>F</td>
                                                              <td>2</td>
                                                          </tr>
                                                        </tbody>
                                
                                                      </table>
                                                  </div>
                                              </div>
                      
                                          </div>
                                      </div>
                                  </div><!--End_Stu_Info_Section-->
                                  
                                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"><!--Marksheet_Section-->
                                      <div class="marksheet_section">
                                        <?php $failed = null; ?>
                                        <h2><?php echo $get_record[0]->EXAM_NAME; ?> Result</h2>
                                          <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                            
                                              
                                                  <tr>
                                                      <th>Subject</th>
                                                      <th>Mark</th>
                                                      <th>Point</th>
                                                      <th>Grade</th>
                                                      <th>Status</th>
                                                  </tr>
                                                      <?php $marks=array(); $points=array(); foreach($get_record as $v) : $marks[] = $v->MARK_OBTAINED; ?>
                                                        <tr>
                                                          <td>
                                                            <?php
                                                              if($this->webspice->is_optional_sub($v->SUBJECT_ID)) {
                                                                echo $v->SUBJECT_NAME . " (optional)";
                                                              }
                                                              else {
                                                                echo $v->SUBJECT_NAME;
                                                              }
                                                            ?>
                                                          </td>
                                                          <td><?php echo $v->MARK_OBTAINED; ?></td>
                                                          <td>
                                                            <?php
                                                              if($v->MARK_OBTAINED >= 80) {
                                                                $point = ($this->webspice->is_optional_sub($v->SUBJECT_ID)) ? 3 : 5;
                                                                $points[] = $point;
                                                                echo $point.'.00';
                                                              }
                                                              else if( ($v->MARK_OBTAINED >= 70) && ($v->MARK_OBTAINED <=79) ) {
                                                                $point = ($this->webspice->is_optional_sub($v->SUBJECT_ID)) ? 2 : 4;
                                                                $points[] = $point;
                                                                echo $point.'.00';
                                                              }
                                                              else if( ($v->MARK_OBTAINED >= 60) && ($v->MARK_OBTAINED <=69) ) {
                                                                $point = ($this->webspice->is_optional_sub($v->SUBJECT_ID)) ? 1.5 : 3.5;
                                                                $points[] = $point;
                                                                echo $point.'0';
                                                              }
                                                              else if( ($v->MARK_OBTAINED >= 50) && ($v->MARK_OBTAINED <=59) ) {
                                                                $point = ($this->webspice->is_optional_sub($v->SUBJECT_ID)) ? 1 : 3;
                                                                $points[] = $point;
                                                                echo $point.'.00';
                                                              }
                                                              else if( ($v->MARK_OBTAINED >= 40) && ($v->MARK_OBTAINED <=49) ) {
                                                                $point = ($this->webspice->is_optional_sub($v->SUBJECT_ID)) ? 0 : 2;
                                                                $points[] = $point;
                                                                echo $point.'.00';
                                                              }
                                                              else if( ($v->MARK_OBTAINED >= 33) && ($v->MARK_OBTAINED <=39) ) {
                                                                $point = ($this->webspice->is_optional_sub($v->SUBJECT_ID)) ? 0 : 1;
                                                                $points[] = $point;
                                                                echo $point.'.00';
                                                              }
                                                              else if( ($v->MARK_OBTAINED <= 32) ) {
                                                                $point = 0.00;
                                                                $points[] = $point;
                                                                echo $point.'.00';
                                                              }
                                                            ?>
                                                          </td>
                                                          <td>
                                                            <?php
                                                              if($v->MARK_OBTAINED >= 80) {
                                                                echo "A+";
                                                              }
                                                              else if( ($v->MARK_OBTAINED >= 70) && ($v->MARK_OBTAINED <=79) ) {
                                                                echo "A";
                                                              }
                                                              else if( ($v->MARK_OBTAINED >= 60) && ($v->MARK_OBTAINED <=69) ) {
                                                                echo "A-";
                                                              }
                                                              else if( ($v->MARK_OBTAINED >= 50) && ($v->MARK_OBTAINED <=59) ) {
                                                                echo "B";
                                                              }
                                                              else if( ($v->MARK_OBTAINED >= 40) && ($v->MARK_OBTAINED <=49) ) {
                                                                echo "C";
                                                              }
                                                              else if( ($v->MARK_OBTAINED >= 33) && ($v->MARK_OBTAINED <=39) ) {
                                                                echo "D";
                                                              }
                                                              else if( ($v->MARK_OBTAINED <= 32) ) {
                                                                echo "F";
                                                              }
                                                            ?>
                                                          </td>
                                                          <td>
                                                            <?php if($v->MARK_OBTAINED >= 33) : ?>
                                                              <span class="label label-success">Pass</span>
                                                            <?php elseif($v->MARK_OBTAINED <= 32) : $failed=true; ?>
                                                              <span class="label label-danger-custom">Failed</span>
                                                            <?php endif; ?>
                                                          </td>
                                                        </tr>
                                                      <?php endforeach; ?>

                                                      <!-- show total result if all subjects result has published -->
                                                      <?php if($total_sub == count($marks)) : ?>
                                                        <tr>
                                                          <td style="color:blue;font-weight:bold">TOTAL</td>
                                                          <td style="color:blue;font-weight:bold"><?php echo array_sum($marks); ?></td>
                                                          <td style="color:blue;font-weight:bold">
                                                            <?php
                                                              $gpa = array_sum($points)/($total_sub-1);
                                                              echo number_format($gpa, 2);
                                                            ?>
                                                          </td>
                                                          <td style="color:blue;font-weight:bold">
                                                            <?php
                                                              if($gpa >= 5) {
                                                                echo "A+";
                                                              }
                                                              else if( ($gpa >= 4) ) {
                                                                echo "A";
                                                              }
                                                              else if( ($gpa >= 3.5) ) {
                                                                echo "A-";
                                                              }
                                                              else if( ($gpa >= 3) ) {
                                                                echo "B";
                                                              }
                                                              else if( ($gpa >= 2) ) {
                                                                echo "C";
                                                              }
                                                              else if( ($gpa >= 1) ) {
                                                                echo "D";
                                                              }
                                                              else if( ($gpa < 1) ) {
                                                                echo "F";
                                                              }
                                                            ?>
                                                          </td>
                                                          <td>
                                                            <?php if($failed==false) : ?>
                                                              <span class="label label-success">Pass</span>
                                                            <?php elseif($failed==true) : ?>
                                                              <span class="label label-danger-custom">Failed</span>
                                                            <?php endif; ?>
                                                          </td>
                                                        </tr>
                                                      <?php endif; ?>
                                                 
                                           </table>
                                      </div>
                                  </div><!--End_Marksheet_Section-->
                                  
                                  <div class="col-md-12"><!--Footer_Section-->
                                      <div class="footer_top_section">
                                      <div class="row">
                                          <div class="col-md-6">
                                            <div class="parent_signature">
                                              <p>Parents<br/>Signature</p>
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                              <p style="text-align:right">Class Teacher <br/>&nbsp;&nbsp;Signature</p>
                                          </div>
                                      </div>
                                      </div>
                                  </div><!--End_Footer_Section-->
                            </div>
                          </div>
                      </div>
                      </div>
                    
                    
                    
                </div>
        
            </div>
            
<?php include(APPPATH."views/admin/admin_footer.php"); ?>