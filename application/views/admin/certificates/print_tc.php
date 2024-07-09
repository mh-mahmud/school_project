<?php
$url_prefix = $this->webspice->settings()->site_url_prefix;
$site_url = $this->webspice->settings()->site_url;
$domain_name = $this->webspice->settings()->domain_name;
$total_column = 16;
$report_name = 'Student Transfer Certificate';

# don't edit the below area (csv)
if( $this->uri->segment(2)=='csv' ){
    $file_name = strtolower(str_replace(array('_',' '),'',$report_name)).'_'.date('Y_m_d_h_i').'.xls';
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=".$file_name);
    header("Pragma: no-cache");
    header("Expires: 0");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TC</title>

    <style type="text/css">
        #printArea { width:1024px; margin:auto; }
        body, table {font-family:tahoma; font-size:13px;}
        table td { padding:8px; }

        .student_address_section{width:90%;height:auto;float:left;font-size:17px;padding:0 0 0 10%;}
        .student_address_section p{line-height:40px;font-style:italic;}
        .student_moral_character_section{font-size:17px;padding:0 0 0 7%;}
        .student_moral_character_section h3{padding:0 0 0 3%;}
        .student_moral_character_section ul{list-style:none;font-style:italic;}
        .transfer_certificate_footer_section p{font-size:17px;}
        .tc_header_section{text-align: center;width:100%;height:auto;padding:2% 0% 2% 0%;float:left;}
        .tc_header_section h2{margin:0px;padding:0px;font-weight: bolder;font-size: 30px;}
        p#tc_address{font-size:14px;padding: 1% 0% 0% 0%;color:#808080;}
        p#tc_established{font-size:14px;padding: 0% 0% 0% 0%;color:#808080;}
        .tc_header_section h3{margin:0px;padding:0px;font-weight: bolder;font-size:20px;font-style:italic;}

    </style>

    <?php if( $this->uri->segment(2)=='print_tc'): ?>
        <script type="text/javascript" src="<?php echo $url_prefix; ?>global/js/jquery-1.9.1.js"></script>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo $url_prefix; ?>global/bootstrap_3_2/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $url_prefix; ?>global/bootstrap_3_2/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?php echo $url_prefix; ?>global/admin/assets/styles.css">
        <script src="<?php echo $url_prefix; ?>global/js/bootstrap.min.js"></script>

        <!-- print plugin -->
        <script src="<?php echo $url_prefix; ?>global/js/jquery.jqprint.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#printArea').jqprint();
                $('#print_icon').click(function(){
                    $('#printArea').jqprint();
                });
            });
        </script>
    <?php endif; ?>
</head>

<body>
	
<!--<a id="print_icon" href="#">Print</a>-->

<div id="printArea">


                      <div class="container">
                        <div class="transfer_certificate_wrapper">
                            <div class="transfer_certificate_inner_wrapper">
                                  <div class="row">
                          
                                      <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12"><!--Top_Header_Section-->
                                          <div class="tc_header_section">
                                              <h2>Comilla Yusuf High School</h2>
                                              <p id="tc_address">Bozropur, Adarsa Sadar, Comilla</p>
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
                                                  <p style="text-align:right">Comilla Yusuf High School</p>
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
</body>
</html>