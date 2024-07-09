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
                                          <b>Student Mark Sheet</b>  
                                      </li>
                                  </ul>
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
                                          <h3>Half Yearly Exam 2016</h3>
                                      </div>
                                  </div><!--End_Top_Header_Section-->
                      
                              
                                  <div class="col-md-12"><!--Stu_Info_Section-->
                                      <div class="stu_info_wrapper_section">
                                          <div class="row">
                                              <div class="col-md-4 col-lg-4 col-xs-12 col-sm-4">
                                                  <div class="stu_info_section">
                                                      <p><b>Student Id: </b> 2006</p>
                                                      <p><b>Student Name: </b> JAHID RAHMAN</p>
                                                      <p><b>Father's Name: </b> JAHID RAHMAN</p>
                                                      <p><b>Mother's Name: </b> JAHID RAHMAN</p>
                                                      <p><b>Class: </b> 8</p>
                                                      <p><b>Section: </b> A</p>
                                                      <p><b>Roll: </b> A</p>
                                                  </div>
                                              </div>
                      
                                              <div class="col-md-4 col-lg-4 col-xs-12 col-sm-4">
                                                  <div class="logo_section">
                                                      <img src="<?php echo $url_prefix; ?>global/img/logo3.png" alt="" class="img-responsive"/>
                                                  </div>
                                              </div>
                      
                                              <div class="col-md-4 col-lg-4 col-xs-12 col-sm-4">
                                                  <div class="grading_section">
                                                      <table class="table table-bordered table-striped table-hover table-responsive table-condensed">
                                                        <tbody>
                                                          <tr>
                                                              <th>Class Interval</td>
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
                                                              <td>C</td>
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
                                          <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                            
                                              
                                                  <tr>
                                                      <td>SL No</td>
                                                      <td>Name Of Subject</td>
                                                      <td>Mark</td>
                                                      <td>Grade Point</td>
                                                      <td>Letter Grade</td>
                                                      <td>GPA(Without Fourth Subject)</td>
                                                      <td>GPA</td>
                                                      <td>Grade</td>
                                                  </tr>
                                                  <tr>
                                                      <td>1</td>
                                                      <td>Bangla 1st Paper</td>
                                                      <td>80/100</td>
                                                      <td>5.00</td>
                                                      <td>A+</td>
                                                      <td rowspan="16">
                                                          <div class="fourth_subject_cal">4.88</div>
                                                      </td>
                                                      <td rowspan="16">
                                                          <div class="fourth_subject_cal2"><p>5</p></div>
                                                      </td>
                                                      <td rowspan="16">
                                                          <div class="fourth_subject_cal2"><p>A+</p></div>
                                                      </td>
                                                  </tr>
                                                  <tr>
                                                      <td>2</td>
                                                      <td>Bangla 2st Paper</td>
                                                      <td>71/100</td>
                                                      <td>5.00</td>
                                                      <td>A</td>
                                                  </tr>
                                                  
                                                  <tr>
                                                      <td>3</td>
                                                      <td>English 1st Paper</td>
                                                      <td>80/100</td>
                                                      <td>5.00</td>
                                                      <td>A+</td>
                                                  </tr>
                                                  <tr>
                                                      <td>4</td>
                                                      <td>English 2st Paper</td>
                                                      <td>80/100</td>
                                                      <td>5.00</td>
                                                      <td>A+</td>
                                                      
                                                      
                                                  </tr>
                                                  <tr>
                                                      <td>5</td>
                                                      <td>Religion(Islam)</td>
                                                      <td>80/100</td>
                                                      <td>5.00</td>
                                                      <td>A+</td>
                                                  </tr>
                                                  
                                                  <tr>
                                                      <td>6</td>
                                                      <td>Career</td>
                                                      <td>80-100</td>
                                                      <td>5.00</td>
                                                      <td>A+</td>
                                                  </tr>
                                                  
                                                  <tr>
                                                      <td>6</td>
                                                      <td>ICT</td>
                                                      <td>80-100</td>
                                                      <td>5.00</td>
                                                      <td>A+</td>
                                                      
                                                  </tr>
                                                  <tr>
                                                      <td>7</td>
                                                      <td>Physical Education</td>
                                                      <td>80-100</td>
                                                      <td>5.00</td>
                                                      <td>A+</td>
                                                      
                                                  </tr>
                                                  
                                                  <tr>
                                                      <td>8</td>
                                                      <td>Bangladesh & Global Stadies</td>
                                                      <td>80-100</td>
                                                      <td>5.00</td>
                                                      <td>A+</td>
                                                      
                                                  </tr>
                                                  
                                                  <tr>
                                                      <td>9</td>
                                                      <td>Physics</td>
                                                      <td>80-100</td>
                                                      <td>5.00</td>
                                                      <td>A+</td>
                                                      
                                                  </tr>
                                                  
                                                  <tr>
                                                      <td>10</td>
                                                      <td>Chemistry</td>
                                                      <td>80-100</td>
                                                      <td>5.00</td>
                                                      <td>A+</td>
                                                      
                                                  </tr>
                                                  
                                                  <tr>
                                                      <td>11</td>
                                                      <td>Biology</td>
                                                      <td>80-100</td>
                                                      <td>5.00</td>
                                                      <td>A+</td>
                                                      
                                                  </tr>
                                                  
                                                  <tr>
                                                      <td>12</td>
                                                      <td>Agriculture</td>
                                                      <td>80-100</td>
                                                      <td>5.00</td>
                                                      <td>A+</td>
                                                      
                                                  </tr>
                                                  
                                                  <tr>
                                                      <td>13</td>
                                                      <td>Higher Mathmatics</td>
                                                      <td>80-100</td>
                                                      <td>5.00</td>
                                                      <td>A+</td>
                                                      
                                                  </tr>
                                                  
                                            
                      
                                          </table>
                                      </div>
                                  </div><!--End_Marksheet_Section-->
                                  
                                  <div class="col-md-12"><!--Footer_Section-->
                                      <div class="footer_top_section">
                                      <div class="row">
                                          <div class="col-md-6">
                                            <div class="parent_signature">
                                              <p>Head Teacher<br/>Signature</p>
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
                      <!-- end report card -->
                    
                    
                    
                </div>
        
            </div>
            
<?php include(APPPATH."views/admin/admin_footer.php"); ?>