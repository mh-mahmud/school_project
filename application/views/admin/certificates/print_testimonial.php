<?php
$url_prefix = $this->webspice->settings()->site_url_prefix;
$site_url = $this->webspice->settings()->site_url;
$domain_name = $this->webspice->settings()->domain_name;
$total_column = 16;
$report_name = 'Student Testimonial';

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
    <title>Testimonial</title>

    <style type="text/css">
        #printArea { width:1024px; margin:auto; }
        body, table {font-family:tahoma; font-size:13px;}
        table td { padding:8px; }
    </style>

    <?php if( $this->uri->segment(2)=='print_testimonial'): ?>
        <script type="text/javascript" src="<?php echo $url_prefix; ?>global/js/jquery-1.9.1.js"></script>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo $url_prefix; ?>global/bootstrap_3_2/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $url_prefix; ?>global/bootstrap_3_2/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?php echo $url_prefix; ?>global/admin/assets/print_testimonial.css">
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
    <!-- <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center" colspan="<?php //echo $total_column; ?>">
                <div style="font-size:150%;"><?php //echo $domain_name; ?></div>
            </td>
        </tr>
    </table>

    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr style="border-top:1px solid #ccc;">
            <td colspan="<?php //echo $total_column; ?>" align="center" style="font-size:17px; font-weight:bold; color:red; text-align:center; padding:0px;"><?php //echo $report_name; ?></td>
        </tr>
        <tr>
            <td colspan="<?php //echo $total_column; ?>" align="center" style="text-align:center; padding:0px;">Report Date: <?php //echo date("d F, Y"); ?>&nbsp;|&nbsp;<?php //echo $filter_by; ?></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
    </table> -->

                      <div class="container">
                        <div class="testimonial_wrapper_section">
                          <div class="row">
                            
                            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12"><!--Top_Header_Section-->
                              <div class="top_testimonial_section">
                                <div class="top_testimonial_logo_section">
                                  <img src="<?php echo $url_prefix; ?>global/img/logo3.png" alt="#" />
                                </div>
                                <div class="top_testimonial_text_section">
                                  <h2>Comilla Yusuf High School</h2>
                                  <p id="testimonial_address">Bozropur, Adarsa Sadar, Comilla</p>
                                  
                                </div>
                              </div>
                            </div><!--End_Top_Header_Section-->

                          
                            <div class="col-md-12"><!--Stu_Info_Section-->
                              <div class="row">
                                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                  <div class="testimonial_section">
                                    <h2>Testimonial</h2>
                                    <p>That is to certify that Mr .... <span class="testimonial"><?php echo $student_name; ?></span> .... son of Mr. .... <span class="testimonial"><?php echo $father_name; ?></span> ...., was a student of Base4 High School School. Dhaka, during the session .... <span class="testimonial"><?php echo $session; ?></span> .... in .... <span class="testimonial"><?php echo $group; ?></span> .... group. His Examination Roll No. .... <span class="testimonial"><?php echo $ssc_roll_no; ?></span> .... , Reg. No. .... <span class="testimonial"><?php echo $registration_no; ?></span> ...., Session .... <span class="testimonial"><?php echo $session; ?></span> .... He passed the Secondary School Certificate in .... <span class="testimonial"><?php echo date("Y"); ?></span> .... and was obtained Grade Point Average (GPA) .... <span class="testimonial"><?php echo $gpa; ?></span> .... During his stay in this school he did not take part in any activity subversive of state or of schools discipline.</p>
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
                                    <p><b>Comilla Yusuf High School</b></p>
                                    <p>Bozropur, Comilla</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                            
                              
                          </div><!--End_Stu_Info_Section-->


                            
                            
                            
                          

                        </div>
                      </div>

</div>
</body>
</html>