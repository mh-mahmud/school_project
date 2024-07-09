<?php
$url_prefix = $this->webspice->settings()->site_url_prefix;
$site_url = $this->webspice->settings()->site_url;
$domain_name = $this->webspice->settings()->domain_name;
$total_column = 16;
$report_name = 'Progress Report';

# don't edit the below area (csv)
if( $this->uri->segment(1)=='csv' ){
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
    <title><?php echo $report_name; ?></title>

    <?php if( $this->uri->segment(1)=='print_progress_report'): ?>
        <script type="text/javascript" src="<?php echo $url_prefix; ?>global/js/jquery-1.9.1.js"></script>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?php //echo $url_prefix; ?>global/bootstrap_3_2/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php //echo $url_prefix; ?>global/bootstrap_3_2/css/bootstrap-theme.min.css">

        <script src="<?php echo $url_prefix; ?>global/bootstrap_3_2/js/bootstrap.min.js"></script>

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

    <style type="text/css">
        #printArea {
            width:1024px;
            margin:auto;
            padding: 0;
        }
        body, table {font-family:tahoma; font-size:13px;}
        /*table td { padding:8px; }*/

        /*Marksheet */
        .marksheet-header{
          width: 105%;
          height: auto;
          text-align: center;
          border-bottom: 2px solid #000;
        }

        .marksheet-header h2{
          font-size: 28px;
        }

        .marksheet-header p{
          font-size: 17px;
        }

        .progress-report{
          width: 100%;
          height: auto;
        }

        .progress-img{
          width: 130px;
          height: 175px;
          /*height: auto;*/
          margin-top: 35px;
          padding: 2px;
          border: 1px solid #000;
          float: left;
        }

        .progress-img p{
          text-align: center;
          padding-top: 42%;
        }

        .progress-student-area{
          overflow: hidden;
          width: 650px;
          float: left;
          margin-left: 2%;
        }

        .progress-student-name{
          width: 640px;
          height: 150px;
          border: 1px solid #000;
        }

        .progress-student-area h3{
          text-align: center !important;
          text-transform: uppercase;
        }

        .student-pr1{
          width: 45%;
          float: left;
          padding-top: 7px;
          padding-left: 7px;
          font-size: 16px;
          line-height: 20px;
        }

        .student-pr2{
          width: 30%;
          float: left;
          padding-top: 7px;
          padding-left: 7px;
          font-size: 16px;
          line-height: 20px;
        }

        .student-pr3{
          width: 15%;
          float: left;
          padding-top: 7px;
          padding-left: 7px;
          font-size: 16px;
          line-height: 20px;
        }

        .progressmark-obtain{
          width: 190px;
          height: 249px;
          float: left;
          margin-left: 1%;
          margin-top: 15px;
        }

        .progressmark-obtain table{
          width: 200px;
          height: 200px;
          float: left;
          margin-left: 2%;
          margin-top: 15px;
          border: 1px solid #000;
          text-align: center;
        }

        .progressmark-obtain table th{
          border: 1px solid #000;
            text-align: center;
        }

        .progressmark-obtain table td{
          border: 1px solid #000;
        }

        .mark-sheet-area{
          width: 1024px;
          height: auto;
          margin-bottom: 25px;
        }

        .mark-sheet-area h4{
          width: 30%;
          margin: 15px auto;
          text-align: center;
          text-transform: uppercase;
          border: 1px solid #000;
          overflow: hidden;
          padding: 7px;
        }

        .mark-sheet-area th {
          border: 1px solid #000 !important;
          text-align: center;
          padding: 5px;
          font-size: 10px;
        }

        .mark-sheet-area td{
          border: 1px solid #000 !important;
          padding: 5px;
          font-size: 10px;
          text-align: center;
        }

        .mark-sheet-area  .none-padding{
          padding: 0px !important;
        }


        .mark-sheet-area .s-table .sd{
          border-right: 0px solid #000 !important;
          border-top: 0px solid #000 !important;
          border-left: 0px solid #000 !important;
        }

        .mark-sheet-area .s-table .sdd{
          padding: 19px 10px;
          border-left: 0px solid #000 !important;
          border-bottom: 0px solid #000 !important;
        }

        .mark-sheet-area .s-table .ssd{
          padding: 19px 10px;
          border-right: 0px solid #000 !important;
          border-bottom: 0px solid #000 !important;
        }

        .mark-sheet-area .s-table .pd{
          padding: 19px 10px;
          border-bottom: 0px solid #000 !important;
        }

    </style>

</head>

<body>
  
<!--<a id="print_icon" href="#">Print</a>-->

<div id="printArea">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center" colspan="<?php //echo $total_column; ?>">
                <div style="font-size:150%;"><?php //echo $domain_name; ?></div>
            </td>
        </tr>
    </table>

            <?php
                $student_info = $this->db->query("SELECT si.*, sd.*, c.CLASS_NAME, s.SECTION_NAME FROM student_info AS si INNER JOIN student_data AS sd ON si.STUDENT_ID=sd.STUDENT_ID INNER JOIN class AS c ON c.CLASS_ID=sd.CLASS_ID INNER JOIN section AS s ON s.SECTION_ID=sd.SECTION_ID WHERE sd.STUDENT_DATA_ID='".$student_id."'")->row();
                // dd($student_info);
            ?>
          <div class="marksheet-header">
              <h2>Comilla Yusuf High School</h2>
                <p>Bozropur, Adarsa Sadar, Comilla</p>
          </div>
            <div class="progress-report">
                <div class="progress-img">
                      <?php if( file_exists($this->webspice->get_path('student_full').$student_info->STUDENT_ID.'.jpg') ): ?>
                          <img src="<?php echo $this->webspice->get_path('student').$student_info->STUDENT_ID.'.jpg'; ?>"  alt="" class="img-responsive" width="130px;"/>
                      <?php endif;  ?>
                </div>
              <div class="progress-student-area">
                  <h3>Progress Report</h3>
                <div class="progress-student-name">
                  <div class="student-pr1">
                    <table>
                      <tr>
                        <td>Student Name: <?php echo $student_info->NAME; ?></td>
                      </tr>
                      <tr>
                        <td>Student ID: <?php echo $student_info->PUBLIC_ID; ?></td>
                      </tr>
                      <tr>
                        <td>Version: Bangla</td>
                      </tr>
                      <tr>
                        <td>Session: </td>
                      </tr>
                      <tr>
                        <td>Campus: </td>
                      </tr>
                    </table>
                  </div>
                  <div class="student-pr2">
                    <table>
                      <tr>
                        <td>Class: <?php echo $student_info->CLASS_NAME; ?></td>
                      </tr>
                      <tr>
                        <td>Group:
                            <?php
                                $group = $this->db->query("SELECT GROUP_NAME FROM assign_student_subject WHERE STUDENT_ID='".$student_id."'")->row();
                                if(count($group)) {
                                    echo $group->GROUP_NAME;
                                }
                                else {
                                    echo "";
                                }
                            ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Section: <?php echo $student_info->SECTION_NAME; ?></td>
                      </tr>
                      <tr>
                        <td>Roll: <?php echo $student_info->ROLL_NO; ?></td>
                      </tr>
                      <tr>
                        <td>Shift: </td>
                      </tr>
                    </table>
                  </div>
<!--                   <div class="student-pr3">
                    <table>
                      <tr>
                        <td>Version: Bangla</td>
                      </tr>
                      <tr>
                        <td>Session: </td>
                      </tr>
                      <tr>
                        <td>Campus: </td>
                      </tr>
                      <tr>
                        <td>Shift: </td>
                      </tr>
                    </table>
                  </div> -->
                </div>
              </div>
              <div class="progressmark-obtain">
                <table>
                  <thead>
                    <th>Marks Range</th>
                    <th>GPA</th>
                    <th  class="lg">LG</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>80-100%</td>
                      <td>5.00</td>
                      <td class="lg">A+</td>
                    </tr>
                    <tr>
                      <td>70-79%</td>
                      <td>4.00</td>
                      <td class="lg">A</td>
                    </tr>
                    <tr>
                      <td>60-69%</td>
                      <td>3.50</td>
                      <td class="lg">A-</td>
                    </tr>

                    <tr>
                      <td>50-59%</td>
                      <td>3.00</td>
                      <td class="lg">B</td>
                    </tr>

                    <tr>
                      <td>40-49%</td>
                      <td>2.00%</td>
                      <td class="lg">C</td>
                    </tr>

                    <tr>
                      <td>33-39%</td>
                      <td>1.00</td>
                      <td class="lg">D</td>
                    </tr>

                    <tr>
                      <td class="ls">0-32%</td>
                      <td class="ls">0.00</td>
                      <td class="ls lg">F</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          <div class="mark-sheet-area">
            <h4>Half Yearly Examination:2016</h4>

                                                      <table>
                                                          <tr>
                                                            <th>SI.No.</th>
                                                            <th>Name of Subject</th>
                                                            <th>Total</th>
                                                            <th class="none-padding" colspan="3">
                                                              <table class="s-table">
                                                                <tr><th class="sd" colspan="3">Subject</th></tr>
                                                                <tr>
                                                                  <th class="sdd">Total</th>
                                                                  <th class="pd">Pass</th>
                                                                  <th class="ssd">Obtained</th>
                                                                </tr>
                                                              </table>
                                                            </th>
                                                            <th class="none-padding" colspan="3">
                                                              <table class="s-table">
                                                                <tr><th class="sd" colspan="3">Objective</th></tr>
                                                                <tr>
                                                                  <th class="sdd">Total</th>
                                                                  <th class="pd">Pass</th>
                                                                  <th class="ssd">Obtained</th>
                                                                </tr>
                                                              </table>
                                                            </th>
                                                            <th class="none-padding" colspan="3">
                                                              <table class="s-table">
                                                                <tr><th class="sd" colspan="3">Practical</th></tr>
                                                                <tr>
                                                                  <th class="sdd">Total</th>
                                                                  <th class="pd">Pass</th>
                                                                  <th class="ssd">Obtained</th>
                                                                </tr>
                                                              </table>
                                                            </th>
                                                            <th width="50px;">Total Obtained</th>
                                                            <th>Height Obtained</th>
                                                            <th>Letter Grade</th>
                                                            <th>Grade Point</th>
                                                            <th>
                                                              Without Additional Subject
                                                            </th>
                                                            <th width="50px;">With Additional Subject</th>
                                                          </tr>

                                                          <!-- bangla 1st & bangla 2nd paper -->
                                                          <?php
                                                            $i_b=1;
                                                            $total_mark=$s_total=$s_pass=$s_mark=$o_total=$o_pass=$o_mark=$mark_obtained=array();
                                                            foreach($bangla_sub as $v_b) {

                                                              $total_mark[] = $v_b->TOTAL_MARK;
                                                              $s_total[] = $v_b->SUBJECTIVE_MARK_TOTAL;
                                                              $s_pass[] = $v_b->SUBJECTIVE_PASS;
                                                              $s_mark[] = $v_b->SUBJECTIVE_MARK;
                                                              $o_total[] = $v_b->OBJECTIVE_MARK_TOTAL;
                                                              $o_pass[] = $v_b->OBJECTIVE_PASS;
                                                              $o_mark[] = $v_b->OBJECTIVE_MARK;
                                                              $mark_obtained[] = $v_b->MARK_OBTAINED;

                                                          ?>
                                                            <tr>
                                                              <?php if($i_b==1) : ?>
                                                                <td rowspan=3><?php echo $i_b; ?></td>
                                                              <?php endif; ?>
                                                              <td><?php echo $v_b->SUBJECT_NAME; ?></td>
                                                              <td><?php echo $v_b->TOTAL_MARK; ?></td>
                                                              <td><?php echo $v_b->SUBJECTIVE_MARK_TOTAL; ?></td>
                                                              <td><?php echo $v_b->SUBJECTIVE_PASS; ?></td>
                                                              <td><?php echo $v_b->SUBJECTIVE_MARK; ?></td>
                                                              <td><?php echo $v_b->OBJECTIVE_MARK_TOTAL; ?></td>
                                                              <td><?php echo $v_b->OBJECTIVE_PASS; ?></td>
                                                              <td><?php echo $v_b->OBJECTIVE_MARK; ?></td>
                                                              <td></td>
                                                              <td></td>
                                                              <td></td>
                                                              <td><?php echo $v_b->MARK_OBTAINED; ?></td>
                                                              <td><?php echo ""; ?></td>
                                                              <td>
                                                              <?php
                                                                if(($v_b->SUBJECTIVE_MARK < $v_b->SUBJECTIVE_PASS) || ($v_b->OBJECTIVE_MARK < $v_b->OBJECTIVE_PASS)) {
                                                                  echo "F";
                                                                }
                                                                else {
                                                                  if($v_b->MARK_OBTAINED >= 80) {
                                                                    echo "A+";
                                                                  }
                                                                  else if( ($v_b->MARK_OBTAINED >= 70) && ($v_b->MARK_OBTAINED <=79) ) {
                                                                    echo "A";
                                                                  }
                                                                  else if( ($v_b->MARK_OBTAINED >= 60) && ($v_b->MARK_OBTAINED <=69) ) {
                                                                    echo "A-";
                                                                  }
                                                                  else if( ($v_b->MARK_OBTAINED >= 50) && ($v_b->MARK_OBTAINED <=59) ) {
                                                                    echo "B";
                                                                  }
                                                                  else if( ($v_b->MARK_OBTAINED >= 40) && ($v_b->MARK_OBTAINED <=49) ) {
                                                                    echo "C";
                                                                  }
                                                                  else if( ($v_b->MARK_OBTAINED >= 33) && ($v_b->MARK_OBTAINED <=39) ) {
                                                                    echo "D";
                                                                  }
                                                                  else if( ($v_b->MARK_OBTAINED <= 32) ) {
                                                                    echo "F";
                                                                  }
                                                                }
                                                              ?>
                                                              </td>
                                                              <td>
                                                              <?php
                                                                if(($v_b->SUBJECTIVE_MARK < $v_b->SUBJECTIVE_PASS) || ($v_b->OBJECTIVE_MARK < $v_b->OBJECTIVE_PASS)) {
                                                                  echo "0.0";
                                                                }
                                                                else {
                                                                  if($v_b->MARK_OBTAINED >= 80) {
                                                                    echo "5.0";
                                                                  }
                                                                  else if( ($v_b->MARK_OBTAINED >= 70) && ($v_b->MARK_OBTAINED <=79) ) {
                                                                    echo "4.0";
                                                                  }
                                                                  else if( ($v_b->MARK_OBTAINED >= 60) && ($v_b->MARK_OBTAINED <=69) ) {
                                                                    echo "3.5";
                                                                  }
                                                                  else if( ($v_b->MARK_OBTAINED >= 50) && ($v_b->MARK_OBTAINED <=59) ) {
                                                                    echo "3.0";
                                                                  }
                                                                  else if( ($v_b->MARK_OBTAINED >= 40) && ($v_b->MARK_OBTAINED <=49) ) {
                                                                    echo "2.0";
                                                                  }
                                                                  else if( ($v_b->MARK_OBTAINED >= 33) && ($v_b->MARK_OBTAINED <=39) ) {
                                                                    echo "1.0";
                                                                  }
                                                                  else if( ($v_b->MARK_OBTAINED <= 32) ) {
                                                                    echo "0.0";
                                                                  }
                                                                }
                                                              ?>
                                                              </td>
                                                              <?php if($i_b==1) : ?>
                                                                <td  rowspan="12">
                                                                 <?php
                                                                    if($failed_any_sub) {
                                                                      
                                                                  ?>
                                                                  <table width="100%">
                                                                    <tr>
                                                                      <td><?php echo "GPA"; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td><?php echo "0.0"; ?></td>
                                                                    </tr>
                                                                  </table>

                                                                  <table style='width:100%; margin-top: 35px;'>
                                                                    <tr>
                                                                      <td><?php echo "Marks"; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td><?php echo $without_opt_mark; ?></td>
                                                                    </tr>
                                                                  </table>
                                                                   <?php }
                                                                      else {
                                                                      
                                                                  ?>
                                                                    <table width="100%">
                                                                      <tr>
                                                                        <td>GPA</td>
                                                                      </tr>
                                                                      <tr>
                                                                        <td><?php echo number_format($without_optional, 2); ?></td>
                                                                      </tr>
                                                                    </table>
                                                                    <table style='width:100%; margin-top: 35px;'>
                                                                      <tr>
                                                                        <td>Marks</td>
                                                                      </tr>
                                                                      <tr>
                                                                        <td><?php echo $without_opt_mark; ?></td>
                                                                      </tr>
                                                                    </table>
                                                                  <?php } ?>
                                                                </td>
                                                                <td rowspan="13">
                                                                 <?php
                                                                      if($failed_any_sub) {
                                                                  ?>
                                                                  <table width="100%">
                                                                    <tr>
                                                                      <td><?php echo "GPA"; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td><?php echo "0.0"; ?></td>
                                                                    </tr>
                                                                  </table>
                                                                  <table style='width:100%; margin-top: 35px;'>
                                                                    <tr>
                                                                      <td><?php echo "Marks"; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td><?php echo $with_opt_mark; ?></td>
                                                                    </tr>
                                                                  </table>
                                                                  <?php }
                                                                      else {
                                                                      $gpa = number_format($with_optional, 2);
                                                                  ?>
                                                                    <table width="100%">
                                                                      <tr>
                                                                        <td>GPA</td>
                                                                      </tr>
                                                                      <tr>
                                                                        <td><?php echo ($gpa > 5) ? "5.0" : $gpa; ?></td>
                                                                      </tr>
                                                                    </table>
                                                                    <table style='width:100%; margin-top: 35px;'>
                                                                      <tr>
                                                                        <td>Marks</td>
                                                                      </tr>
                                                                      <tr>
                                                                        <td><?php echo $with_opt_mark; ?></td>
                                                                      </tr>
                                                                    </table>
                                                                  <?php } ?>
                                                                </td>
                                                              <?php endif; ?>
                                                            </tr>

                                                          <?php $i_b++; } ?>

                                                            <tr>
                                                              <td>Total</td>
                                                              <td><?php echo array_sum($total_mark); ?></td>
                                                              <td><?php echo array_sum($s_total); ?></td>
                                                              <td><?php echo array_sum($s_pass); ?></td>
                                                              <td><?php echo array_sum($s_mark); ?></td>
                                                              <td><?php echo array_sum($o_total); ?></td>
                                                              <td><?php echo array_sum($o_pass); ?></td>
                                                              <td><?php echo array_sum($o_mark); ?></td>
                                                              <td></td>
                                                              <td></td>
                                                              <td></td>
                                                              <td>
                                                                <?php
                                                                  $total_avg = array_sum($total_mark)/2;
                                                                  $bangla_avg = array_sum($mark_obtained)/2;
                                                                  $bangla_avg = ($bangla_avg*100)/$total_avg;
                                                                  echo array_sum($mark_obtained) . " (". $bangla_avg . "%)";
                                                                ?>
                                                              </td>
                                                              <td><?php echo ""; ?></td>
                                                              <td>
                                                              <?php
                                                                if($failed_in_bangla) {
                                                                  echo "F";
                                                                }
                                                                else {
                                                                  $bangla_avg = array_sum($mark_obtained)/2;
                                                                  if($bangla_avg >= 80) {
                                                                    echo "A+";
                                                                  }
                                                                  else if( ($bangla_avg >= 70) && ($bangla_avg <=79) ) {
                                                                    echo "A";
                                                                  }
                                                                  else if( ($bangla_avg >= 60) && ($bangla_avg <=69) ) {
                                                                    echo "A-";
                                                                  }
                                                                  else if( ($bangla_avg >= 50) && ($bangla_avg <=59) ) {
                                                                    echo "B";
                                                                  }
                                                                  else if( ($bangla_avg >= 40) && ($bangla_avg <=49) ) {
                                                                    echo "C";
                                                                  }
                                                                  else if( ($bangla_avg >= 33) && ($bangla_avg <=39) ) {
                                                                    echo "D";
                                                                  }
                                                                  else if( ($bangla_avg <= 32) ) {
                                                                    echo "F";
                                                                  }
                                                                }
                                                              ?>
                                                              </td>
                                                              <td>
                                                              <?php
                                                                if($failed_in_bangla) {
                                                                  echo "0.0";
                                                                }
                                                                else {
                                                                  if($bangla_avg >= 80) {
                                                                    echo "5.0";
                                                                  }
                                                                  else if( ($bangla_avg >= 70) && ($bangla_avg <=79) ) {
                                                                    echo "4.0";
                                                                  }
                                                                  else if( ($bangla_avg >= 60) && ($bangla_avg <=69) ) {
                                                                    echo "3.5";
                                                                  }
                                                                  else if( ($bangla_avg >= 50) && ($bangla_avg <=59) ) {
                                                                    echo "3.0";
                                                                  }
                                                                  else if( ($bangla_avg >= 40) && ($bangla_avg <=49) ) {
                                                                    echo "2.0";
                                                                  }
                                                                  else if( ($bangla_avg >= 33) && ($bangla_avg <=39) ) {
                                                                    echo "1.0";
                                                                  }
                                                                  else if( ($bangla_avg <= 32) ) {
                                                                    echo "0.0";
                                                                  }
                                                                }
                                                              ?>
                                                              </td>
                                                              <!-- <td  rowspan="10"></td> -->
                                                              <!-- <td></td> -->
                                                            </tr>

                                                          <!-- end bangla 1st & 2nd paper -->


                                                          <!-- english 1st & english 2nd paper -->
                                                          <?php
                                                            $i_e=2;
                                                            $total_mark_e=$s_total_e=$s_pass_e=$s_mark_e=$o_total_e=$o_pass_e=$o_mark_e=$mark_obtained_e=array();
                                                            foreach($english_sub as $v_e) {

                                                              $total_mark_e[] = $v_e->TOTAL_MARK;
                                                              $s_total_e[] = $v_e->SUBJECTIVE_MARK_TOTAL;
                                                              $s_pass_e[] = $v_e->SUBJECTIVE_PASS;
                                                              $s_mark_e[] = $v_e->SUBJECTIVE_MARK;
                                                              $o_total_e[] = $v_e->OBJECTIVE_MARK_TOTAL;
                                                              $o_pass_e[] = $v_e->OBJECTIVE_PASS;
                                                              $o_mark_e[] = $v_e->OBJECTIVE_MARK;
                                                              $mark_obtained_e[] = $v_e->MARK_OBTAINED;

                                                          ?>
                                                            <tr>
                                                              <?php if($i_e==2) : ?>
                                                                <td rowspan=3><?php echo $i_e; ?></td>
                                                              <?php endif; ?>
                                                              <td><?php echo $v_e->SUBJECT_NAME; ?></td>
                                                              <td><?php echo $v_e->TOTAL_MARK; ?></td>
                                                              <td><?php echo $v_e->SUBJECTIVE_MARK_TOTAL; ?></td>
                                                              <td><?php echo $v_e->SUBJECTIVE_PASS; ?></td>
                                                              <td><?php echo $v_e->SUBJECTIVE_MARK; ?></td>
                                                              <td><?php echo $v_e->OBJECTIVE_MARK_TOTAL; ?></td>
                                                              <td><?php echo $v_e->OBJECTIVE_PASS; ?></td>
                                                              <td><?php echo $v_e->OBJECTIVE_MARK; ?></td>
                                                              <td></td>
                                                              <td></td>
                                                              <td></td>
                                                              <td><?php echo $v_e->MARK_OBTAINED; ?></td>
                                                              <td><?php echo ""; ?></td>
                                                              <td>
                                                              <?php
                                                                if(($v_e->SUBJECTIVE_MARK < $v_e->SUBJECTIVE_PASS) || ($v_e->OBJECTIVE_MARK < $v_e->OBJECTIVE_PASS)) {
                                                                  echo "F";
                                                                }
                                                                else {
                                                                  if($v_e->MARK_OBTAINED >= 80) {
                                                                    echo "A+";
                                                                  }
                                                                  else if( ($v_e->MARK_OBTAINED >= 70) && ($v_e->MARK_OBTAINED <=79) ) {
                                                                    echo "A";
                                                                  }
                                                                  else if( ($v_e->MARK_OBTAINED >= 60) && ($v_e->MARK_OBTAINED <=69) ) {
                                                                    echo "A-";
                                                                  }
                                                                  else if( ($v_e->MARK_OBTAINED >= 50) && ($v_e->MARK_OBTAINED <=59) ) {
                                                                    echo "B";
                                                                  }
                                                                  else if( ($v_e->MARK_OBTAINED >= 40) && ($v_e->MARK_OBTAINED <=49) ) {
                                                                    echo "C";
                                                                  }
                                                                  else if( ($v_e->MARK_OBTAINED >= 33) && ($v_e->MARK_OBTAINED <=39) ) {
                                                                    echo "D";
                                                                  }
                                                                  else if( ($v_e->MARK_OBTAINED <= 32) ) {
                                                                    echo "F";
                                                                  }
                                                                }
                                                              ?>
                                                              </td>
                                                              <td>
                                                              <?php
                                                                if(($v_e->SUBJECTIVE_MARK < $v_e->SUBJECTIVE_PASS) || ($v_e->OBJECTIVE_MARK < $v_e->OBJECTIVE_PASS)) {
                                                                  echo "0.0";
                                                                }
                                                                else {
                                                                  if($v_e->MARK_OBTAINED >= 80) {
                                                                    echo "5.0";
                                                                  }
                                                                  else if( ($v_e->MARK_OBTAINED >= 70) && ($v_e->MARK_OBTAINED <=79) ) {
                                                                    echo "4.0";
                                                                  }
                                                                  else if( ($v_e->MARK_OBTAINED >= 60) && ($v_e->MARK_OBTAINED <=69) ) {
                                                                    echo "3.5";
                                                                  }
                                                                  else if( ($v_e->MARK_OBTAINED >= 50) && ($v_e->MARK_OBTAINED <=59) ) {
                                                                    echo "3.0";
                                                                  }
                                                                  else if( ($v_e->MARK_OBTAINED >= 40) && ($v_e->MARK_OBTAINED <=49) ) {
                                                                    echo "2.0";
                                                                  }
                                                                  else if( ($v_e->MARK_OBTAINED >= 33) && ($v_e->MARK_OBTAINED <=39) ) {
                                                                    echo "1.0";
                                                                  }
                                                                  else if( ($v_e->MARK_OBTAINED <= 32) ) {
                                                                    echo "0.0";
                                                                  }
                                                                }
                                                              ?>
                                                              </td>
                                                              <!-- <td  rowspan="10"></td> -->
                                                              <!-- <td></td> -->
                                                            </tr>

                                                          <?php $i_e++; } ?>

                                                            <tr>
                                                              <td>Total</td>
                                                              <td><?php echo array_sum($total_mark_e); ?></td>
                                                              <td><?php echo array_sum($s_total_e); ?></td>
                                                              <td><?php echo array_sum($s_pass_e); ?></td>
                                                              <td><?php echo array_sum($s_mark_e); ?></td>
                                                              <td><?php echo array_sum($o_total_e); ?></td>
                                                              <td><?php echo array_sum($o_pass_e); ?></td>
                                                              <td><?php echo array_sum($o_mark_e); ?></td>
                                                              <td></td>
                                                              <td></td>
                                                              <td></td>
                                                              <td>
                                                                <?php
                                                                  $total_avg_e = array_sum($total_mark_e)/2;
                                                                  $english_avg_e = array_sum($mark_obtained_e)/2;
                                                                  $english_avg_e = ($english_avg_e*100)/$total_avg_e;
                                                                  echo array_sum($mark_obtained_e) . " (" . $english_avg_e . "%)";
                                                                ?>
                                                              </td>
                                                              <td><?php echo ""; ?></td>
                                                              <td>
                                                              <?php
                                                                if($failed_in_english) {
                                                                  echo "F";
                                                                }
                                                                else {
                                                                  $english_avg = array_sum($mark_obtained_e)/2;
                                                                  if($english_avg >= 80) {
                                                                    echo "A+";
                                                                  }
                                                                  else if( ($english_avg >= 70) && ($english_avg <=79) ) {
                                                                    echo "A";
                                                                  }
                                                                  else if( ($english_avg >= 60) && ($english_avg <=69) ) {
                                                                    echo "A-";
                                                                  }
                                                                  else if( ($english_avg >= 50) && ($english_avg <=59) ) {
                                                                    echo "B";
                                                                  }
                                                                  else if( ($english_avg >= 40) && ($english_avg <=49) ) {
                                                                    echo "C";
                                                                  }
                                                                  else if( ($english_avg >= 33) && ($english_avg <=39) ) {
                                                                    echo "D";
                                                                  }
                                                                  else if( ($english_avg <= 32) ) {
                                                                    echo "F";
                                                                  }
                                                                }
                                                              ?>
                                                              </td>
                                                              <td>
                                                              <?php
                                                                if($failed_in_english) {
                                                                  echo "0.0";
                                                                }
                                                                else {
                                                                  if($english_avg >= 80) {
                                                                    echo "5.0";
                                                                  }
                                                                  else if( ($english_avg >= 70) && ($english_avg <=79) ) {
                                                                    echo "4.0";
                                                                  }
                                                                  else if( ($english_avg >= 60) && ($english_avg <=69) ) {
                                                                    echo "3.5";
                                                                  }
                                                                  else if( ($english_avg >= 50) && ($english_avg <=59) ) {
                                                                    echo "3.0";
                                                                  }
                                                                  else if( ($english_avg >= 40) && ($english_avg <=49) ) {
                                                                    echo "2.0";
                                                                  }
                                                                  else if( ($english_avg >= 33) && ($english_avg <=39) ) {
                                                                    echo "1.0";
                                                                  }
                                                                  else if( ($english_avg <= 32) ) {
                                                                    echo "0.0";
                                                                  }
                                                                }
                                                              ?>
                                                              </td>
                                                              <!-- <td  rowspan="10"></td> -->
                                                              <!-- <td></td> -->
                                                            </tr>

                                                          <!-- end english 1st & 2nd paper -->







                                                          <!-- start main subjects -->
                                                          <?php $i=3; foreach($get_record as $v) { ?>

                                                            <tr>
                                                              <td><?php echo $i; ?></td>
                                                              <td><?php echo $v->SUBJECT_NAME; ?></td>
                                                              <td><?php echo $v->TOTAL_MARK; ?></td>
                                                              <td><?php echo $v->SUBJECTIVE_MARK_TOTAL; ?></td>
                                                              <td><?php echo $v->SUBJECTIVE_PASS; ?></td>
                                                              <td><?php echo $v->SUBJECTIVE_MARK; ?></td>
                                                              <td><?php echo $v->OBJECTIVE_MARK_TOTAL; ?></td>
                                                              <td><?php echo $v->OBJECTIVE_PASS; ?></td>
                                                              <td><?php echo $v->OBJECTIVE_MARK; ?></td>
                                                              <td><?php echo $v->PRACTICAL_MARK_TOTAL; ?></td>
                                                              <td><?php echo $v->PRACTICAL_PASS; ?></td>
                                                              <td><?php echo $v->PRACTICAL_MARK; ?></td>
                                                              <td>
                                                                <?php
                                                                  $main_avg = $v->MARK_OBTAINED;
                                                                  $main_avg = ($main_avg*100)/$v->TOTAL_MARK;
                                                                  echo $v->MARK_OBTAINED . " (" . $main_avg . "%)";
                                                                ?>
                                                              </td>
                                                              <td><?php echo ""; ?></td>
                                                              <td>
                                                              <?php
                                                                if(($v->SUBJECTIVE_MARK < $v->SUBJECTIVE_PASS) || ($v->OBJECTIVE_MARK < $v->OBJECTIVE_PASS)) {
                                                                  echo "F";
                                                                }
                                                                else {
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
                                                                }
                                                              ?>
                                                              </td>
                                                              <td>
                                                              <?php
                                                                if(($v->SUBJECTIVE_MARK < $v->SUBJECTIVE_PASS) || ($v->OBJECTIVE_MARK < $v->OBJECTIVE_PASS)) {
                                                                  echo "0.0";
                                                                }
                                                                else {
                                                                  if($v->MARK_OBTAINED >= 80) {
                                                                    echo "5.0";
                                                                  }
                                                                  else if( ($v->MARK_OBTAINED >= 70) && ($v->MARK_OBTAINED <=79) ) {
                                                                    echo "4.0";
                                                                  }
                                                                  else if( ($v->MARK_OBTAINED >= 60) && ($v->MARK_OBTAINED <=69) ) {
                                                                    echo "3.5";
                                                                  }
                                                                  else if( ($v->MARK_OBTAINED >= 50) && ($v->MARK_OBTAINED <=59) ) {
                                                                    echo "3.0";
                                                                  }
                                                                  else if( ($v->MARK_OBTAINED >= 40) && ($v->MARK_OBTAINED <=49) ) {
                                                                    echo "2.0";
                                                                  }
                                                                  else if( ($v->MARK_OBTAINED >= 33) && ($v->MARK_OBTAINED <=39) ) {
                                                                    echo "1.0";
                                                                  }
                                                                  else if( ($v->MARK_OBTAINED <= 32) ) {
                                                                    echo "0.0";
                                                                  }
                                                                }
                                                              ?>
                                                              </td>
                                                              <!-- <td  rowspan="10"></td> -->
                                                              <!-- <td></td> -->
                                                            </tr>

                                                          <?php $i++; } ?>
                                                          <!-- end main subjects -->










                                                          <!-- start group subjects -->

                                                          <?php foreach($group_sub as $v_g) { ?>

                                                            <tr>
                                                              <td><?php echo $i; ?></td>
                                                              <td><?php echo $v_g->SUBJECT_NAME; ?></td>
                                                              <td><?php echo $v_g->TOTAL_MARK; ?></td>
                                                              <td><?php echo $v_g->SUBJECTIVE_MARK_TOTAL; ?></td>
                                                              <td><?php echo $v_g->SUBJECTIVE_PASS; ?></td>
                                                              <td><?php echo $v_g->SUBJECTIVE_MARK; ?></td>
                                                              <td><?php echo $v_g->OBJECTIVE_MARK_TOTAL; ?></td>
                                                              <td><?php echo $v_g->OBJECTIVE_PASS; ?></td>
                                                              <td><?php echo $v_g->OBJECTIVE_MARK; ?></td>
                                                              <td><?php echo $v_g->PRACTICAL_MARK_TOTAL; ?></td>
                                                              <td><?php echo $v_g->PRACTICAL_PASS; ?></td>
                                                              <td><?php echo $v_g->PRACTICAL_MARK; ?></td>
                                                              <td>
                                                                <?php
                                                                  $group_avg = $v_g->MARK_OBTAINED;
                                                                  $group_avg = ($group_avg*100)/$v_g->TOTAL_MARK;
                                                                  echo $v_g->MARK_OBTAINED . " (" . $group_avg . "%)";
                                                                ?>
                                                              </td>
                                                              <td><?php echo ""; ?></td>
                                                              <td>
                                                              <?php
                                                                if(($v_g->SUBJECTIVE_MARK < $v_g->SUBJECTIVE_PASS) || ($v_g->OBJECTIVE_MARK < $v_g->OBJECTIVE_PASS)) {
                                                                  echo "F";
                                                                }
                                                                else {
                                                                  if($v_g->MARK_OBTAINED >= 80) {
                                                                    echo "A+";
                                                                  }
                                                                  else if( ($v_g->MARK_OBTAINED >= 70) && ($v_g->MARK_OBTAINED <=79) ) {
                                                                    echo "A";
                                                                  }
                                                                  else if( ($v_g->MARK_OBTAINED >= 60) && ($v_g->MARK_OBTAINED <=69) ) {
                                                                    echo "A-";
                                                                  }
                                                                  else if( ($v_g->MARK_OBTAINED >= 50) && ($v_g->MARK_OBTAINED <=59) ) {
                                                                    echo "B";
                                                                  }
                                                                  else if( ($v_g->MARK_OBTAINED >= 40) && ($v_g->MARK_OBTAINED <=49) ) {
                                                                    echo "C";
                                                                  }
                                                                  else if( ($v_g->MARK_OBTAINED >= 33) && ($v_g->MARK_OBTAINED <=39) ) {
                                                                    echo "D";
                                                                  }
                                                                  else if( ($v_g->MARK_OBTAINED <= 32) ) {
                                                                    echo "F";
                                                                  }
                                                                }
                                                              ?>
                                                              </td>
                                                              <td>
                                                              <?php
                                                                if(($v_g->SUBJECTIVE_MARK < $v_g->SUBJECTIVE_PASS) || ($v_g->OBJECTIVE_MARK < $v_g->OBJECTIVE_PASS)) {
                                                                  echo "0.0";
                                                                }
                                                                else {
                                                                  if($v_g->MARK_OBTAINED >= 80) {
                                                                    echo "5.0";
                                                                  }
                                                                  else if( ($v_g->MARK_OBTAINED >= 70) && ($v_g->MARK_OBTAINED <=79) ) {
                                                                    echo "4.0";
                                                                  }
                                                                  else if( ($v_g->MARK_OBTAINED >= 60) && ($v_g->MARK_OBTAINED <=69) ) {
                                                                    echo "3.5";
                                                                  }
                                                                  else if( ($v_g->MARK_OBTAINED >= 50) && ($v_g->MARK_OBTAINED <=59) ) {
                                                                    echo "3.0";
                                                                  }
                                                                  else if( ($v_g->MARK_OBTAINED >= 40) && ($v_g->MARK_OBTAINED <=49) ) {
                                                                    echo "2.0";
                                                                  }
                                                                  else if( ($v_g->MARK_OBTAINED >= 33) && ($v_g->MARK_OBTAINED <=39) ) {
                                                                    echo "1.0";
                                                                  }
                                                                  else if( ($v_g->MARK_OBTAINED <= 32) ) {
                                                                    echo "0.0";
                                                                  }
                                                                }
                                                              ?>
                                                              </td>
                                                              <!-- <td  rowspan="10"></td> -->
                                                              <!-- <td></td> -->
                                                            </tr>

                                                          <?php $i++; } ?>
                                                          <!-- end group subjects -->

                                                          <tr>
                                                            <th colspan=17 style="text-align:left">Optional Subject</th>
                                                          </tr>

                                                          <tr>
                                                            <td><?php echo $i; ?></td>
                                                              <td><?php echo $optional_sub->SUBJECT_NAME; ?></td>
                                                              <td><?php echo $optional_sub->TOTAL_MARK; ?></td>
                                                              <td><?php echo $optional_sub->SUBJECTIVE_MARK_TOTAL; ?></td>
                                                              <td><?php echo $optional_sub->SUBJECTIVE_PASS; ?></td>
                                                              <td><?php echo $optional_sub->SUBJECTIVE_MARK; ?></td>
                                                              <td><?php echo $optional_sub->OBJECTIVE_MARK_TOTAL; ?></td>
                                                              <td><?php echo $optional_sub->OBJECTIVE_PASS; ?></td>
                                                              <td><?php echo $optional_sub->OBJECTIVE_MARK; ?></td>
                                                              <td><?php echo $optional_sub->PRACTICAL_MARK_TOTAL; ?></td>
                                                              <td><?php echo $optional_sub->PRACTICAL_PASS; ?></td>
                                                              <td><?php echo $optional_sub->PRACTICAL_MARK; ?></td>
                                                              <td>
                                                                <?php
                                                                  $optional_avg = $optional_sub->MARK_OBTAINED;
                                                                  $optional_avg = ($optional_avg*100)/$optional_sub->TOTAL_MARK;
                                                                  echo $optional_sub->MARK_OBTAINED . " (" . $optional_avg . "%)";
                                                                ?>
                                                              </td>
                                                              <td ><?php echo ""; ?></td>
                                                              <td>
                                                              <?php
                                                                if(($optional_sub->SUBJECTIVE_MARK < $optional_sub->SUBJECTIVE_PASS) || ($optional_sub->OBJECTIVE_MARK < $optional_sub->OBJECTIVE_PASS)) {
                                                                  echo "F";
                                                                }
                                                                else {
                                                                  if($optional_sub->MARK_OBTAINED >= 80) {
                                                                    echo "A+";
                                                                  }
                                                                  else if( ($optional_sub->MARK_OBTAINED >= 70) && ($optional_sub->MARK_OBTAINED <=79) ) {
                                                                    echo "A";
                                                                  }
                                                                  else if( ($optional_sub->MARK_OBTAINED >= 60) && ($optional_sub->MARK_OBTAINED <=69) ) {
                                                                    echo "A-";
                                                                  }
                                                                  else if( ($optional_sub->MARK_OBTAINED >= 50) && ($optional_sub->MARK_OBTAINED <=59) ) {
                                                                    echo "B";
                                                                  }
                                                                  else if( ($optional_sub->MARK_OBTAINED >= 40) && ($optional_sub->MARK_OBTAINED <=49) ) {
                                                                    echo "C";
                                                                  }
                                                                  else if( ($optional_sub->MARK_OBTAINED >= 33) && ($optional_sub->MARK_OBTAINED <=39) ) {
                                                                    echo "D";
                                                                  }
                                                                  else if( ($optional_sub->MARK_OBTAINED <= 32) ) {
                                                                    echo "F";
                                                                  }
                                                                }
                                                              ?>
                                                              </td>
                                                              <td>
                                                              <?php
                                                                if(($optional_sub->SUBJECTIVE_MARK < $optional_sub->SUBJECTIVE_PASS) || ($optional_sub->OBJECTIVE_MARK < $optional_sub->OBJECTIVE_PASS)) {
                                                                  echo "0.0";
                                                                }
                                                                else {
                                                                  if($optional_sub->MARK_OBTAINED >= 80) {
                                                                    echo "5.0";
                                                                  }
                                                                  else if( ($optional_sub->MARK_OBTAINED >= 70) && ($optional_sub->MARK_OBTAINED <=79) ) {
                                                                    echo "4.0";
                                                                  }
                                                                  else if( ($optional_sub->MARK_OBTAINED >= 60) && ($optional_sub->MARK_OBTAINED <=69) ) {
                                                                    echo "3.5";
                                                                  }
                                                                  else if( ($optional_sub->MARK_OBTAINED >= 50) && ($optional_sub->MARK_OBTAINED <=59) ) {
                                                                    echo "3.0";
                                                                  }
                                                                  else if( ($optional_sub->MARK_OBTAINED >= 40) && ($optional_sub->MARK_OBTAINED <=49) ) {
                                                                    echo "2.0";
                                                                  }
                                                                  else if( ($optional_sub->MARK_OBTAINED >= 33) && ($optional_sub->MARK_OBTAINED <=39) ) {
                                                                    echo "1.0";
                                                                  }
                                                                  else if( ($optional_sub->MARK_OBTAINED <= 32) ) {
                                                                    echo "0.0";
                                                                  }
                                                                }
                                                              ?>
                                                              </td>
                                                              <td>
                                                                <table class="s-table">
                                                                  <tr><th>GP above 2</th></tr>
                                                                  <tr>
                                                                    <th><?php echo $this->webspice->opt_mark_val_to_points($optional_sub->MARK_OBTAINED); ?></th>
                                                                  </tr>
                                                                </table>
                                                              </td>
                                                               <td>
                                                                 <table>
                                                                    <tr>
                                                                      <th>Marks Above 40</th>
                                                                    </tr>
                                                                    <tr>
                                                                      <th><?php 
                                                                      if($optional_sub->MARK_OBTAINED > 40){
                                                                          $mark = $optional_sub->MARK_OBTAINED - 40 ;
                                                                        echo $mark; 
                                                                      }else{
                                                                        echo "00";
                                                                      }
                                                                      ?></th>
                                                                    </tr>
                                                                  </table>
                                                               </td> 
                                                          </tr>

                                                      </table>

          </div> 




</div>
</body>
</html>