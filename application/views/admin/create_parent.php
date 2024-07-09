<?php include(APPPATH."views/admin/admin_header.php"); ?>

        <div class="container" id="wrapper">
            <div id="page_create_parent" class="row-fluid page_identifier">
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
                                          <b>Create Parent</b>  
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div>


                         <!-- validation -->
                        <div class="row-fluid">
                             <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Create Parent</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                                <!-- BEGIN FORM-->
                                                <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                                    <input id="token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                    <input type="hidden" name="parent_id" value="<?php if( isset($edit['PARENT_ID']) && $edit['PARENT_ID'] ){echo $this->webspice->encrypt_decrypt($edit['PARENT_ID'], 'encrypt');} ?>" />
                                                    <fieldset>

                                                            <!-- <div class="control-group">
                                                              <label class="control-label">Student Name<span class="required">*</span></label>
                                                              <div class="controls">
                                                                <input id="search-box" type="text" name="student_id" data-required="1" class="span6 m-wrap" value="<?php //echo set_value('student_id',$edit['STUDENT_ID']); ?>" />
                                                                <span class="fred"><?php //echo form_error('student_id'); ?></span>
                                                                <div id="suggesstion-box"></div>
                                                              </div>
                                                            </div> -->

                                                          <div class="control-group">
                                                              <label class="control-label">Student Name<span class="required">*</span></label>
                                                              <div class="controls">
                                                                <select class="span6 m-wrap chzn-select" name="student_id">
                                                                  <option value="">Select...</option>
                                                                  <?php
                                                                    $options = $this->db->query("SELECT * FROM student_info WHERE STATUS = 7")->result();
                                                                  ?>
                                                                  <?php foreach($options as $option) : ?>
                                                                    <option value="<?php echo $option->STUDENT_ID ?>" <?php echo (isset($edit['STUDENT_ID']) && $edit['STUDENT_ID'] == $option->STUDENT_ID) ? "selected" : ""; ?> ><?php echo $option->NAME . " ( " . $option->PUBLIC_ID ." )"; ?></option>
                                                                  <?php endforeach; ?>
                                                                </select>
                                                                <span class="fred"><?php echo form_error('student_id'); ?></span>
                                                              </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Parent Name<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="parent_name" data-required="1" class="span6 m-wrap" value="<?php echo set_value('parent_name',$edit['PARENT_NAME']); ?>" />
                                                                    <span class="fred"><?php echo form_error('parent_name'); ?></span>
                                                                </div>
                                                                
                                                            </div>

                                                              <div class="control-group">
                                                                <label class="control-label">Parent Phone<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="phone" data-required="1" class="span6 m-wrap" value="<?php echo set_value('phone',$edit['PHONE']); ?>" />
                                                                    <span class="fred"><?php echo form_error('phone'); ?></span>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Parent Email<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="email" name="email" data-required="1" class="span6 m-wrap" value="<?php echo set_value('email',$edit['EMAIL']); ?>" />
                                                                </div>
                                                                <span class="fred"><?php echo form_error('email'); ?></span>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">National Id No<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="national_card_no" data-required="1" class="span6 m-wrap" value="<?php echo set_value('national_card_no',$edit['NATIONAL_ID_NO']); ?>" />
                                                                    <span class="fred"><?php echo form_error('national_card_no'); ?></span>
                                                                </div>
                                                                
                                                            </div>


                                                            <div class="control-group">
                                                                <label class="control-label">Relation with student<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="relation_with_stu" data-required="1" class="span6 m-wrap" value="<?php echo set_value('relation_with_stu',$edit['RELATION_WITH_STU']); ?>" />
                                                                    <span class="fred"><?php echo form_error('relation_with_stu'); ?></span>
                                                                </div>
                                                                
                                                            </div>

                                                             <div class="control-group">
                                                                <label class="control-label">Occopation<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="occopation" data-required="1" class="span6 m-wrap" value="<?php echo set_value('occopation',$edit['OCCOPATION']); ?>" />
                                                                    <span class="fred"><?php echo form_error('occopation'); ?></span>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="control-group">
                                                              <label class="control-label">Gender<span class="required">*</span></label>
                                                              <div class="controls">
                                                                <select class="span6 m-wrap" name="gender">
                                                                  <option value="">Select...</option>
                                                                    <option value="Male" <?php echo (isset($edit['GENDER']) && $edit['GENDER'] == "Male") ? "selected" : ""; ?> >Male</option>
                                                                    <option value="Female" <?php echo (isset($edit['GENDER']) && $edit['GENDER'] == "Female") ? "selected" : ""; ?> >Female</option>
                                                                </select>
                                                                <span class="fred"><?php echo form_error('gender'); ?></span>
                                                              </div>
                                                            </div>
                                                          

                                                            <div class="control-group">
                                                                <label class="control-label">Address<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <textarea name="address" data-required="1" class="span6 m-wrap" ><?php echo set_value('address',$edit['ADDRESS']); ?></textarea>
                                                                    <span class="fred"><?php echo form_error('address'); ?></span>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="control-group">
                                                              <label class="control-label" for="images">Parent Image</label>
                                                              <div class="controls">
                                                                <input type="file" name="images" class="input-file uniform_on" id="images" <?php if(set_value('parent_id',$edit['PARENT_ID']))echo '';else echo 'required';?>>
                                                              </div>
                                                              <span class="fred"><?php echo form_error('images'); ?></span>
                                                            </div>
                                                            <?php if( file_exists($this->webspice->get_path('parent_full').$edit['PARENT_ID'].'.jpg') ): ?>
                                                              <div class="personnel-thm-img" style="padding-top:20px;margin-left:180px;"> 
                                                                <img src="<?php echo $this->webspice->get_path('parent').$edit['PARENT_ID'].'.jpg'; ?>"  alt="" class="img-responsive" width="100"/> 
                                                              </div> 
                                                            <?php endif;  ?>

                                                            <div class="form-actions">
                                                                <input type="submit" name="submit" class="btn btn-primary" value="Submit Data"  />
                                                                 <a class="btn btn-danger" href="<?php echo $url_prefix; ?>manage_parent">Cancel</a>
                                                            </div>
                                                    </fieldset>
                                                </form>
                                                <!-- END FORM-->
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