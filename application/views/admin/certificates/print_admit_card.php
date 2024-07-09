<?php
$url_prefix = $this->webspice->settings()->site_url_prefix;
$site_url = $this->webspice->settings()->site_url;
$domain_name = $this->webspice->settings()->domain_name;
$total_column = 16;
$report_name = 'Student ID Card';

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
    <title>Admit Card</title>



    <?php if( $this->uri->segment(1)=='print_admit_card'): ?>
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

    
<div class="container">
    <div class="marksheet_inner_wrapper_section">
		<div id="printArea" class="id_card_main">
            <div class="admit_card_area">
              <?php  foreach ($get_record as$v): ?>
               	<div class="admit_school_area">
               		<div class="admit_header_area">
               			<div class="admit_logo">
               				<img src="<?php echo $url_prefix; ?>global/assets/images/logo.png">
               			</div>
                    <div class="admit_school_name">
                      <h4 class="school_back">Comilla Yusuf High School</h4>
                      <p>Bozropur, Adarsa Sadar, Comilla</p>
                      <p class="admit_back">Admit Card</p>
                      <p class="exam_back"><?php echo $exam_name; ?> -2016</p>
                    </div>
               		</div>
                  <div class="admit_student_img_area">
                    <div class="admit_student_img">
                      <img width="100" src="<?php echo $url_prefix; ?>global/custom_files/student/<?php echo $v->STUDENT_ID; ?>.jpg">
                    </div>
                  </div>
                  <div class="admit_student_info">
                      <div class="admit_student_name">
                        ID : <?php echo $v->PUBLIC_ID; ?>
                      </div>
                      <div class="admit_student_name">
                       Student Name : <?php echo $v->NAME; ?>
                      </div>
                      <div  class="stcgs">
                        <div class="stcgstd"> Class : <?php echo $v->CLASS_NAME; ?></div>
                        <?php if($v->CLASS_NAME == "Nine"){ ?>
                        	<div class="stcgstd"> Group : <?php echo $v->SECTION_NAME; ?></div>
                        <?php }else{ ?>
                            <div class="stcgstd"> Section : <?php echo $v->SECTION_NAME; ?></div>
                        <?php } ?>
                      </div>
                      <div class="admit_student_roll">
                        Roll No: <?php echo $v->ROLL_NO; ?>
                      </div>
                  </div>
                  <div class="admit_instructions_area">
                    <div class="admit_instructions_header">
                      <p>Instructions</p>
                    </div>
                    <div class="admit_instructions_role">
                      <ul>
                        <li>1. Student must come before 15 minutes to exam hall from the exam starting time.</li>
                        <li>2. Student can not bring anything at exam hall without admit card, pen, calculator & compass box.</li>
                        <li>3. Student must wear school dress to attend at exam hall.</li>
                        <li>4. Student can not leave or submit exam paper before finishing exam times.</li>
                      </ul>
                    </div>  
                  </div>
                  <div class="admit_authorsignature_area">
                    <div class="admit_principal_sig">
                      <img src="<?php echo $url_prefix; ?>global/assets/images/signature.jpg" alt="signature">
                      <p>Principal</p>
                    </div>
                    <div class="admit_classt_sig">
                        <img src="<?php echo $url_prefix; ?>global/assets/images/signature -copy.jpg" alt="signature">
                      <p>Class Teacher</p>
                    </div>
                  </div>
                  	<!-- <?php if($i%2==1){
	                   //echo "<div class='admit_dot_dot'></div>";
	                }
	               // $i++;
	                ?> -->
               		<div class='admit_dot_dot'></div>
               	</div>
             <?php endforeach; ?>
            </div>  	      
        </div>
    </div>
</div>
</body>
</html>