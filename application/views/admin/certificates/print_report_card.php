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

    <?php if( $this->uri->segment(2)=='print_report_card'): ?>
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


<?php

  $get_record = $this->db->query("SELECT m.*, c.CLASS_NAME, si.NAME, s.SECTION_NAME, e.EXAM_NAME, sub.SUBJECT_NAME FROM marks AS m INNER JOIN class AS c ON m.CLASS_ID=c.CLASS_ID INNER JOIN section AS s ON s.SECTION_ID=m.SECTION_ID INNER JOIN exam AS e ON e.EXAM_ID=m.EXAM_ID INNER JOIN subject AS sub ON m.SUBJECT_ID=sub.SUBJECT_ID INNER JOIN student_data AS sd ON sd.STUDENT_DATA_ID=m.STUDENT_ID INNER JOIN student_info AS si ON si.STUDENT_ID=sd.STUDENT_ID WHERE m.CLASS_ID='".$class_id."' AND m.SECTION_ID='".$section_id."' AND m.EXAM_ID='".$exam_id."' AND m.STUDENT_ID='".$student_id."' AND m.YEAR='".$year."'")->result();

?>

                <div class="container">
                  <div class="marksheet_wrapper">
                      <div class="marksheet_inner_wrapper_section">
                        <div class="row">
                
                            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12"><!--Top_Header_Section-->
                                <div class="top_header_section">
                                    <h2>Comilla Yusuf High School</h2>
                                    <p id="address">Bozropur, Adarsa Sadar, Comilla</p>
                                    <p id="established">Mobile:+8801712196729</p>
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
</body>
</html>