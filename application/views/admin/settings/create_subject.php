<?php include(APPPATH."views/admin/admin_header.php"); ?>

        <div class="container" id="wrapper">
            <div id="page_create_subject" class="row-fluid page_identifier">
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
                                          <b>Create Subject</b>
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
                                    <div class="muted pull-left">Create Subject</div>
                                </div>
                                <div class="block-content collapse in">
                                  <div class="span12">
                                    <!-- BEGIN FORM-->
                                    <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <input type="hidden" name="subject_id" value="<?php if( isset($edit['SUBJECT_ID']) && $edit['SUBJECT_ID'] ){echo $this->webspice->encrypt_decrypt($edit['SUBJECT_ID'], 'encrypt');} ?>" />
                                        <fieldset>

                                          <div class="control-group">
                                            <label class="control-label">Class Name<span class="required">*</span></label>
                                            <div class="controls">
                                              <select class="span6 m-wrap" name="class_id">
                                                <option value="">Select...</option>
                                                <?php
                                                  $options = $this->db->query("SELECT * FROM class WHERE STATUS = 7")->result();
                                                ?>
                                                <?php foreach($options as $option) : ?>
                                                  <option value="<?php echo $option->CLASS_ID ?>" <?php echo (isset($edit['CLASS_ID']) && $edit['CLASS_ID'] == $option->CLASS_ID) ? "selected" : ""; ?> ><?php echo $option->CLASS_NAME; ?></option>
                                                <?php endforeach; ?>
                                              </select>
                                              <span class="fred"><?php echo form_error('class_id'); ?></span>
                                            </div>
                                          </div>

                                          <div class="control-group">
                                              <label class="control-label">Subject Name<span class="required">*</span></label>
                                              <div class="controls">
                                                  <input type="text" name="subject_name" data-required="1" class="span6 m-wrap" value="<?php echo set_value('subject_name',$edit['SUBJECT_NAME']); ?>" />
                                              <span class="fred"><?php echo form_error('subject_name'); ?></span>
                                              </div>
                                          </div>

                                          <div class="control-group">
                                            <label class="control-label" for="has_parent">Mandatory Subject</label>
                                            <div class="controls">
                                              <label class="uniform">
                                                <input name="mandatory" class="uniform_on" type="checkbox" id="mandatory" value="1" <?php echo set_value('has_parent',$edit['MANDATORY'])== '1'?'checked': ''?>>
                                                ( Check the button if this subject is mandatory for all student )
                                              </label>
                                            </div>
                                          </div>

                                          <div class="control-group">
                                            <label class="control-label" for="has_parent">Has Parent</label>
                                            <div class="controls">
                                              <label class="uniform">
                                                <input name="has_parent" class="uniform_on" type="checkbox" id="has_parent" value="1" <?php echo set_value('has_parent',$edit['PARENT_ID'])?>>
                                                ( Check the button if subject has multiple part )
                                              </label>
                                            </div>
                                          </div>

                                          <div id="subject_list" class="control-group" style="display:none">
                                            <label class="control-label">Subject Name</label>
                                            <div class="controls">
                                              <select id="subject_list" class="span6 m-wrap" name="parent_id">
                                                <option value="">Select...</option>
                                                <?php
                                                  $options = $this->db->query("SELECT s.SUBJECT_ID, s.SUBJECT_NAME, c.CLASS_NAME, c.CLASS_ID FROM subject AS s INNER JOIN class AS c ON s.CLASS_ID = c.CLASS_ID WHERE s.STATUS = 7 AND s.PARENT_ID=0")->result();
                                                ?>
                                                <?php foreach($options as $option) : ?>
                                                  <option value="<?php echo $option->SUBJECT_ID?>" <?php echo (isset($edit['SUBJECT_ID']) && $edit['SUBJECT_ID'] == $option->SUBJECT_ID) ? "selected" : ""; ?> ><?php echo $option->CLASS_NAME . ": " . $option->SUBJECT_NAME; ?></option>
                                                <?php endforeach; ?>
                                              </select>
                                              <span class="fred"><?php echo form_error('parent_id'); ?></span>
                                            </div>
                                          </div>

                                          <div class="control-group">
                                              <label class="control-label">Total Mark<span class="required">*</span></label>
                                              <div class="controls">
                                                  <input type="text" name="total_mark" data-required="1" class="span6 m-wrap" value="<?php echo set_value('total_mark',$edit['TOTAL_MARK']); ?>" />
                                                  <span class="fred"><?php echo form_error('total_mark'); ?></span>
                                              </div>
                                          </div>

                                          <div class="control-group">
                                              <label class="control-label">Pass Mark<span class="required">*</span></label>
                                              <div class="controls">
                                                  <input type="text" name="pass_mark" data-required="1" class="span6 m-wrap" value="<?php echo set_value('pass_mark',$edit['PASS_MARK']); ?>" />
                                                  <span class="fred"><?php echo form_error('pass_mark'); ?></span>
                                              </div>
                                          </div>

                                          <div class="control-group">
                                              <label class="control-label">Subjective Mark<span class="required">*</span></label>
                                              <div class="controls">
                                                  <input type="text" name="subjective_mark" data-required="1" class="span6 m-wrap" value="<?php echo set_value('subjective_mark',$edit['SUBJECTIVE_MARK']); ?>" />
                                                  <span class="fred"><?php echo form_error('subjective_mark'); ?></span>
                                              </div>
                                          </div>

                                          <div class="control-group">
                                              <label class="control-label">Subjective Pass Mark<span class="required">*</span></label>
                                              <div class="controls">
                                                  <input type="text" name="subjective_pass" data-required="1" class="span6 m-wrap" value="<?php echo set_value('subjective_pass',$edit['SUBJECTIVE_PASS']); ?>" />
                                                  <span class="fred"><?php echo form_error('subjective_pass'); ?></span>
                                              </div>
                                          </div>

                                          <div class="control-group">
                                              <label class="control-label">Objective Mark</label>
                                              <div class="controls">
                                                  <input type="text" name="objective_mark" data-required="1" class="span6 m-wrap" value="<?php echo set_value('objective_mark',$edit['OBJECTIVE_MARK']); ?>" />
                                                  <span class="fred"><?php echo form_error('objective_mark'); ?></span>
                                              </div>
                                          </div>

                                          <div class="control-group">
                                              <label class="control-label">Objective Pass Mark</label>
                                              <div class="controls">
                                                  <input type="text" name="objective_pass" data-required="1" class="span6 m-wrap" value="<?php echo set_value('objective_pass',$edit['OBJECTIVE_PASS']); ?>" />
                                                  <span class="fred"><?php echo form_error('objective_pass'); ?></span>
                                              </div>
                                          </div>

                                          <div class="control-group">
                                              <label class="control-label">Practical Mark</label>
                                              <div class="controls">
                                                  <input type="text" name="practical_mark" data-required="1" class="span6 m-wrap" value="<?php echo set_value('practical_mark',$edit['PRACTICAL_MARK']); ?>" />
                                                  <span class="fred"><?php echo form_error('practical_mark'); ?></span>
                                              </div>
                                          </div>

                                          <div class="control-group">
                                              <label class="control-label">Practical Pass Mark</label>
                                              <div class="controls">
                                                  <input type="text" name="practical_pass" data-required="1" class="span6 m-wrap" value="<?php echo set_value('practical_pass',$edit['PRACTICAL_PASS']); ?>" />
                                                  <span class="fred"><?php echo form_error('practical_pass'); ?></span>
                                              </div>
                                          </div>
                                          
                                          <div class="control-group">
                                            <label class="control-label" for="optional">Optional Subject</label>
                                            <div class="controls">
                                              <label class="uniform">
                                                <input name="optional" class="uniform_on" type="checkbox" id="optional" value="1" <?php echo set_value('optional',$edit['OPTIONAL'])== '1'?'checked': ''?>>
                                                ( Check the button if subject is optional )
                                              </label>
                                            </div>
                                          </div>

                                          <div class="control-group">
                                            <label class="control-label">Group Name</label>
                                            <div class="controls">
                                              <select class="span6 m-wrap" name="group_name">
                                                <option value="">Select...</option>
                                                  <option value="science" <?php echo (isset($edit['GROUP_NAME']) && set_value('group_name',$edit['GROUP_NAME'])  == "science") ? "selected" : ""; ?> >Science</option>
                                                  <option value="commerce" <?php echo (isset($edit['GROUP_NAME']) && set_value('group_name',$edit['GROUP_NAME']) == "commerce") ? "selected" : ""; ?> >Commerce</option>
                                                  <option value="arts" <?php echo (isset($edit['GROUP_NAME']) && set_value('group_name',$edit['GROUP_NAME']) == "arts") ? "selected" : ""; ?> >Arts</option>
                                              </select>
                                              <span class="fred"><?php echo form_error('group_name'); ?></span>
                                            </div>
                                          </div>
                                          
                                          <div class="form-actions">
                                              <input type="submit" name="submit" class="btn btn-success" value="Submit Data"  />
                                              <a class="btn btn-danger" href="<?php echo $url_prefix; ?>manage_subject">Cancel</a>
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