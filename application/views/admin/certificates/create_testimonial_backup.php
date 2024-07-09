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
                                          <b>Create Testimonial</b>  
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div>


                      <div class="container">
                        <div class="testimonial_wrapper_section">
                          <div class="row">
                            
                            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12"><!--Top_Header_Section-->
                              <div class="top_testimonial_section">
                                <div class="top_testimonial_logo_section">
                                  <img src="<?php echo $url_prefix; ?>global/img/logo3.png" alt="#" />
                                </div>
                                <div class="top_testimonial_text_section">
                                  <h2>Base4 High School</h2>
                                  <p id="testimonial_address">Elephant Road, Dhaka</p>
                                  <p id="testimonial_established">Established: 2012</p>
                                  
                                </div>
                              </div>
                            </div><!--End_Top_Header_Section-->

                          
                            <div class="col-md-12"><!--Stu_Info_Section-->
                              <div class="row">
                                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                  <div class="testimonial_section">
                                    <h2>Testimonial</h2>
                                    <p>That is to certify that Mr .... <span class="testimonial">Mh Mahmud Tusher</span> .... son of Mr. .... <span class="testimonial">Abu Kawser</span> ...., was a student of Base4 High School School. Dhaka, during the session .... <span class="testimonial">2012 - 2013</span> .... in .... <span class="testimonial">Science</span> .... group. His Examination Roll No. .... <span class="testimonial">108255</span> .... , Reg. No. .... <span class="testimonial">418807</span> ...., Session .... <span class="testimonial">2012 - 2013</span> .... He passed the Secondary School Certificate in .... <span class="testimonial">2014</span> .... and was obtained Grade Point Average (GPA) .... <span class="testimonial">5.00</span> .... During his stay in this school he did not take part in any activity subversive of state or of schools discipline.</p>
                                  </div>
                                  <div class="testimonial_moral_character_section">
                                    <p>His conduct and character was satisfactory.He bears a good moral character. His behavior is good nice, gentle and proper.</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                            <div class="col-md-12">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="wishing_section">
                                    <p>I wish his bright future &amp; a successfull life.</p>
                                  </div>
                                  <div class="date_section">
                                    <p>Date: <span class="testimonial"><?php echo date("l, jS F Y", time()); ?></span></p>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="signature_section">
                                    <p><b>Principal</b></p>
                                    <p><b>Base4 School</b></p>
                                    <p>Elephant Road, Dhaka</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                            
                              
                          </div><!--End_Stu_Info_Section-->
                            
                            
                            
                          

                        </div>
                      </div>
                    
                    
                    
                </div>
        
            </div>
            
<?php include(APPPATH."views/admin/admin_footer.php"); ?>