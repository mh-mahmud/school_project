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
                              <!-- <div class="navbar-inner">
                                  <ul class="breadcrumb">
                                      <li>
                                          <b>Student Transfer Certificate</b>  
                                      </li>
                                  </ul>
                              </div> -->

                              <?php
                                $my_data['student_name'] = $student_name;
                                $my_data['father_name'] = $father_name;
                                $my_data['mother_name'] = $mother_name;
                                $my_data['gender'] = $gender;
                                $my_data['student_id'] = $student_id;
                                $my_data['student_data_id'] = $student_data_id;
                                $my_data['class_id'] = $class_id;
                                $my_data['section_id'] = $section_id;
                                $my_data['roll_no'] = $roll_no;
                                $my_data['address'] = $address;
                                $my_data['birthday'] = $birthday;
                                $my_data['post_office'] = $post_office;
                                $my_data['district'] = $district;
                                $my_data['police_station'] = $police_station;
                                $my_data['release_date'] = $release_date;
                                $my_data = implode("|", $my_data);
                                $my_data = $this->webspice->encrypt_decrypt($my_data, 'encrypt');
                                // dd($my_data);
                              ?>

                              <div class="button_set">
                                <a class="btn btn-info" href="<?php echo $url_prefix; ?>manage_transfer_certificate/print_tc/<?php echo $my_data; ?>">Print Transfer Certificate</a>
                                <!-- <a class="btn btn-success" href="<?php //echo $url_prefix; ?>manage_transfer_certificate/save_tc/<?php //echo $my_data; ?>">Save Transfer Certificate</a> -->
                              </div>

                          </div>
                      </div>


                      <div class="container">
                        <div class="transfer_certificate_wrapper">
                            <div class="transfer_certificate_inner_wrapper">
                                  <div class="row">
                          
                                      <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12"><!--Top_Header_Section-->
                                          <div class="tc_header_section">
                                              <h2>Base4 High School</h2>
                                              <p id="tc_address">Elephant Road, Dhaka</p>
                                              <p id="tc_established">Established: 2012</p>
                                              <h3>Transfer Certificate 2016</h3>
                                          </div>
                                      </div><!--End_Top_Header_Section-->

                                  
                                      <div class="col-md-12"><!--Stu_Info_Section-->
                                          <div class="stu_info_wrapper_section">
                                              <div class="row">
                                                  <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                                      <div class="student_address_section">
                                                          <p style="text-align: justify;padding-right:40px">This is to consenting that .... <span class="testimonial"><?php echo $student_name; ?></span> ...., Father .... <span class="testimonial"><?php echo $father_name; ?></span> ...., Mother .... <span class="testimonial"><?php echo $mother_name; ?></span> .... &amp; his/her address is .... <span class="testimonial"><?php echo $address; ?></span> .... Post Office name is .... <span class="testimonial"><?php echo $post_office; ?></span> ...., Police Station name is .... <span class="testimonial"><?php echo $police_station; ?></span> ...., District .... <span class="testimonial"><?php echo $district; ?></span> .... He/She had been studying in this school up to the dated .... <span class="testimonial"><?php echo $release_date; ?></span> .... His date of birth is : ..... <span class="testimonial"><?php echo $birthday; ?></span> .... (as per description of admission book). At present he is ....<span class="testimonial"><?php $diff = (date('Y') - date('Y',strtotime($birthday)));echo $diff;?> years old</span>.... He used to read in class .... <span class="testimonial">Six</span> .... and he was passed the last annual examination. His result is stisfactory to us. All the dues from him was received with understanding up to the dated ....<span class="testimonial"><?php echo $release_date; ?></span>.... His moral character is good enough. His behaviour is excellent &amp; academic progress is very good. We wish a bright feture for him.</p>
                                                      </div>
                                                      
                                                      <!-- <div class="student_moral_character_section">
                                                          <h3>Cause of leaving the school:</h3>
                                                          <ul>
                                                              <li> Willing of the guardian.</li>
                                                              <li> End of the education to school.</li>
                                                              <li>Change of residence.</li>
                                                          </ul>
                                                      </div> -->
                                                      
                                                  </div>
                                              </div>
                                          </div>
                                      </div><!--End_Stu_Info_Section-->
                                      

                                      
                                      <div class="col-md-12"><!--Footer_Section-->
                                          <div class="footer_top_section">
                                          <div class="row">
                                              
                                              <div class="col-md-12 pull-right">
                                                  <div class="transfer_certificate_footer_section">
                                                    <br /><br /><br /><br />
                                                  <p style="text-align:right">Head Master</p>
                                                  <p style="text-align:right">Base4 High School</p>
                                                  <p style="text-align:right">Signature</p>
                                                  </div>
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