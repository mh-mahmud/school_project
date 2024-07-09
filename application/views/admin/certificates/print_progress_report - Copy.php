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
        #printArea { width:1024px; margin:auto; }
        body, table {font-family:tahoma; font-size:13px;}
        table td { padding:8px; }

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
          width: 15%;
          height: 200px;
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
          width: 70%;
          float: left;
          margin-left: 2%;
        }

        .progress-student-name{
          width: 100%;
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
          width: 11%;
          float: left;
          margin-left: 2%;
          margin-top: 15px;
        }

        .progressmark-obtain table{
          width: 100%;
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
          width: 100%;
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

        .mark-sheet-area th{
          border: 1px solid #000 !important;
          text-align: center;
          padding: 5px;

        }

        .mark-sheet-area td{
          border: 1px solid #000 !important;
          padding: 5px;
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


            <div id="page_student_marksheet" class="row-fluid page_identifier">
                <div class="span12" id="content">
                    <div class="row-fluid">

                        <!-- here will goes alert message -->
                        <!-- <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4>Success</h4>
                            The operation completed successfully
                        </div> -->
                        <!-- alert message end -->
                      </div>


                         <!-- validation -->
                        <div class="row-fluid">
                             <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Student Mark Sheet</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                        <div class="marksheet-header">
                                            <h2>Shahid Academic School & College</h2>
                                            <p>Birpushia, Karatia, Tangail</p>
                                            <p>Easted: 2004, EIN: 136266, Code</p>
                                        </div>
                                        <div class="span12 col-md-12">
                                            <div class="progress-report">
                                                <div class="span2 col-md-2 ppimg">
                                                    <div class="progress-img">
                                                        <p>Picture</p>
                                                    </div>
                                                </div>
                                                <div class="span8 col-md-6">
                                                        <h3>Progress Report</h3>
                                                    <div class="progress-student-name">
                                                        <div class="student-pr1">
                                                            <table>
                                                                <tr>
                                                                    <td>Student Name : </td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Student ID : </td>
                                                                    <td></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div class="student-pr2">
                                                            <table>
                                                                <tr>
                                                                    <td>Class : </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Group : </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Section : </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Roll : </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div class="student-pr3">
                                                            <table>
                                                                <tr>
                                                                    <td>Version : </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Session : </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Campus : </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Shift : </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="span2 col-md-2">
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
                                            </div>
                                        </div>
                                        <div class="span12 col-md-12">
                                            <div class="mark-sheet-area">
                                                <h4>Half Yearly Examination:2016</h4>
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th >SI.No.</th>
                                                            <th>Name of Subject</th>
                                                            <th>Total</th>
                                                            <th class="none-padding" colspan="3">
                                                                <table class="s-table">
                                                                    <tr><th class="sd" colspan="3">Subject</th></tr>
                                                                    <tr>
                                                                        <th style="min-width:63px;" class="sdd">Total</th>
                                                                        <th style="min-width:63px;" class="pd">Pass</th>
                                                                        <th style="min-width:63px;" class="ssd">Obtained</th>
                                                                    </tr>
                                                                </table>
                                                            </th>
                                                            <th class="none-padding" colspan="3">
                                                                <table class="s-table">
                                                                    <tr><th class="sd" colspan="3">Objective</th></tr>
                                                                    <tr>
                                                                        <th style="min-width:63px;" class="sdd">Total</th>
                                                                        <th style="min-width:63px;" class="pd">Pass</th>
                                                                        <th style="min-width:63px;" class="ssd">Obtained</th>
                                                                    </tr>
                                                                </table>
                                                            </th>
                                                            <th class="none-padding" colspan="3">
                                                                <table class="s-table">
                                                                    <tr><th class="sd" colspan="3">Practical</th></tr>
                                                                    <tr>
                                                                        <th style="min-width:63px;" class="sdd">Total</th>
                                                                        <th style="min-width:63px;" class="pd">Pass</th>
                                                                        <th style="min-width:63px;" class="ssd">Obtained</th>
                                                                    </tr>
                                                                </table>
                                                            </th>
                                                            <th>Total Obtained</th>
                                                            <th>Height Obtained</th>
                                                            <th>Letter Grade</th>
                                                            <th>Grade Pointed</th>
                                                            <th>GPA
                                                                <br>
                                                                Without Additional Subject
                                                            </th>
                                                            <th>GPA</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td rowspan="2">1</td>
                                                            <td>Bangla 1st paper</td>
                                                            <td>100</td>
                                                            <td>60</td>
                                                            <td>20</td>
                                                            <td>50</td>
                                                            <td>40</td>
                                                            <td>13</td>
                                                            <td>30</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td rowspan="12"></td>
                                                            <td rowspan="12"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Bangla 2nd paper</td>
                                                            <td>100</td>
                                                            <td>60</td>
                                                            <td>20</td>
                                                            <td>50</td>
                                                            <td>40</td>
                                                            <td>13</td>
                                                            <td>30</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="2">2</td>
                                                            <td>English 1st  paper</td>
                                                            <td>100</td>
                                                            <td>60</td>
                                                            <td>20</td>
                                                            <td>50</td>
                                                            <td>40</td>
                                                            <td>13</td>
                                                            <td>30</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>English 2nd paper</td>
                                                            <td>100</td>
                                                            <td>60</td>
                                                            <td>20</td>
                                                            <td>50</td>
                                                            <td>40</td>
                                                            <td>13</td>
                                                            <td>30</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>English 1st  paper</td>
                                                            <td>100</td>
                                                            <td>60</td>
                                                            <td>20</td>
                                                            <td>50</td>
                                                            <td>40</td>
                                                            <td>13</td>
                                                            <td>30</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>English 1st  paper</td>
                                                            <td>100</td>
                                                            <td>60</td>
                                                            <td>20</td>
                                                            <td>50</td>
                                                            <td>40</td>
                                                            <td>13</td>
                                                            <td>30</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>English 1st  paper</td>
                                                            <td>100</td>
                                                            <td>60</td>
                                                            <td>20</td>
                                                            <td>50</td>
                                                            <td>40</td>
                                                            <td>13</td>
                                                            <td>30</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>English 1st  paper</td>
                                                            <td>100</td>
                                                            <td>60</td>
                                                            <td>20</td>
                                                            <td>50</td>
                                                            <td>40</td>
                                                            <td>13</td>
                                                            <td>30</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>7</td>
                                                            <td>English 1st  paper</td>
                                                            <td>100</td>
                                                            <td>60</td>
                                                            <td>20</td>
                                                            <td>50</td>
                                                            <td>40</td>
                                                            <td>13</td>
                                                            <td>30</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>8</td>
                                                            <td>English 1st  paper</td>
                                                            <td>100</td>
                                                            <td>60</td>
                                                            <td>20</td>
                                                            <td>50</td>
                                                            <td>40</td>
                                                            <td>13</td>
                                                            <td>30</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>9</td>
                                                            <td>English 1st  paper</td>
                                                            <td>100</td>
                                                            <td>60</td>
                                                            <td>20</td>
                                                            <td>50</td>
                                                            <td>40</td>
                                                            <td>13</td>
                                                            <td>30</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>10</td>
                                                            <td>English 1st  paper</td>
                                                            <td>100</td>
                                                            <td>60</td>
                                                            <td>20</td>
                                                            <td>50</td>
                                                            <td>40</td>
                                                            <td>13</td>
                                                            <td>30</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="18"><h5>Optional Subject</h5></td>
                                                        </tr>
                                                        <tr>
                                                            <td>11</td>
                                                            <td>English 1st  paper</td>
                                                            <td>100</td>
                                                            <td>60</td>
                                                            <td>20</td>
                                                            <td>50</td>
                                                            <td>40</td>
                                                            <td>13</td>
                                                            <td>30</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /block -->
                        </div>
                         <!-- /validation -->
                </div>        
            </div>  




</div>
</body>
</html>