<?php include(APPPATH."views/admin/admin_header.php"); ?>
        <div class="container" id="wrapper">
            <div id="page_create_parent" class="row-fluid page_identifier">
                <div class="span12" id="content">
                    <div class="row-fluid">
                          <div class="navbar">
                              <div class="navbar-inner">
                                  <ul class="breadcrumb">
                                      <li>
                                          <b>Admit Card</b>  
                                      </li>
                                  </ul>
                              </div>
                          </div>
                    </div>
					<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

                     <!-- validation -->
                    <div class="row-fluid">
                         <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Admit Card</div>
                            </div>
	                            
                            <div class="block-content collapse in">
                            	<div class="button_set">
	                              <!-- <a target="_blank" class="btn btn-info" href="<?php //echo $url_prefix; ?>print_student_id_card/<?php //echo $class_id; ?>/<?php //echo $student_id; ?>/<?php //echo $year; ?>">Print ID Card</a> -->
                                
	                              <!-- <a class="btn btn-success" href="<?php //echo $url_prefix; ?>manage_testimonial/save_testimonial/<?php //echo $my_data; ?>">Save Testimonial</a> -->
	                            </div>
                                <div class="span12">
                                    <a target="_blank" class="btn btn-info" href="<?php echo $url_prefix; ?>print_admit_card/<?php echo $class_id; ?>/<?php echo $section_id; ?>/<?php echo $for_exam_id; ?>/<?php echo $year; ?>">Print ID Card</a>
                                    <div class="admit_card_area">
                                      <?php foreach ($get_record as$v): ?>
                                       	<div class="admit_school_area">
                                       		<div class="admit_header_area">
                                       			<div class="admit_logo">
                                       				<img src="<?php echo $url_prefix; ?>global/assets/images/logo.png">
                                       			</div>
                                            <div class="admit_school_name">
                                              <h4 class="school_back">Shahid Academic School & College</h4>
                                              <p>Birpushiya, Karotiya, Tangail</p>
                                              <p class="admit_back">Admit Card</p>
                                              <p class="exam_back"><?php echo $exam_name; ?> -2016</p>
                                            </div>
                                       		</div>
                                          <div class="admit_student_img_area">
                                            <div class="admit_student_img">
                                              <img src="<?php echo $url_prefix; ?>global/custom_files/student/<?php echo $v->STUDENT_ID; ?>.jpg">
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
                                       	</div>
                                     <?php endforeach; ?>
                                    </div>  
                                </div>
                            </div>
                        </div>
                          <!-- /block -->
                    </div>
                     <!-- /validation -->                    
                </div>       
            </div>            
<?php include(APPPATH."views/admin/admin_footer.php"); ?>
<script>
/*// AJAX call for autocomplete 
$(document).ready(function(){
  $("#search-box").keyup(function(){
    var keyword = $(this).val();
    var token = $("#token").val();

    $.ajax({
      type: "POST",
      url: url_prefix + "student_list_search",
      data: {
        keyword: keyword,
        csrf_webspice_tkn: token
      },
      beforeSend: function(){
        $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
      },
      success: function(data){
        $("#suggesstion-box").show();
        $("#suggesstion-box").html(data);
        $("#search-box").css("background","#FFF");
      }
    });
  });
}

//To select country name
function selectCountry(val) {
  $("#search-box").val(val);
  $("#suggesstion-box").hide();
}*/
</script>