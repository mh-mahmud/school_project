<?php include(APPPATH."views/admin/admin_header.php"); ?>

        <div class="overloaded"></div>

        <div class="container" id="wrapper">

            <div id="page_assign_subject" class="row-fluid page_identifier">
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
                                          <b>Assign Subject</b>  
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
                                    <div class="muted pull-left">Assign Subject</div>
                                </div>

                                <div class="block-content collapse in">

                                    <div class="span12">
                                      <?php if(isset($id_count_mismatch)) : ?>
                                        <div class="alert alert-danger" role="alert"><?php echo $id_count_mismatch; ?></div>
                                      <?php endif; ?>
                                                <!-- BEGIN FORM-->
                                                <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                    <input type="hidden" name="teacher_info_id" value="<?php if( isset($edit['TEACEHR_INFO_ID']) && $edit['TEACEHR_INFO_ID'] ){echo $this->webspice->encrypt_decrypt($edit['TEACEHR_INFO_ID'], 'encrypt');} ?>" />
                                                    <fieldset>

                                                          <div class="control-group">
                                                            <label class="control-label">Teacher Name<span class="required">*</span></label>
                                                            <div class="controls">
                                                              <select class="span6 m-wrap" name="teacher_id">
                                                                <option value="">Select...</option>
                                                                <?php
                                                                  $options = $this->db->query("SELECT * FROM teacher WHERE STATUS = 7")->result();
                                                                ?>
                                                                <?php foreach($options as $option) : ?>
                                                                  <option value="<?php echo $option->TEACHER_ID ?>" <?php echo (isset($edit['TEACHER_ID']) && $edit['TEACHER_ID'] == $option->TEACHER_ID) ? "selected" : ""; ?> ><?php echo $option->TEACHER_NAME; ?></option>
                                                                <?php endforeach; ?>
                                                              </select>
                                                              <span class="fred"><?php echo form_error('teacher_id'); ?></span>
                                                            </div>
                                                          </div>



                              														<div class="prodcut_price">
                              																<div class="control-group">
                                                                <!-- <div class="span12"> -->

                                                                  <label class="control-label">Assign Subject<span class="required">*</span></label>
                                                                  <div class="col-md-12 my_real_div">
                                  																	<div class="span3 my_span">
                                                                        <div class="form-group" >
                                                                          <label for="exampleInputEmail1">Class<span class="required">*</span></label>
                                                                          <select class="span6 m-wrap" name="class_id[]" class="list_subgroup1 form-control required" data-parsley-id="9394">
                                                                          <option value="">Select...</option>
                                                                          <?php
                                                                            $options = $this->db->query("SELECT * FROM class WHERE STATUS = 7")->result();
                                                                          ?>
                                                                          <?php foreach($options as $option) : ?>
                                                                            <option value="<?php echo $option->CLASS_ID ?>" <?php echo (isset($edit['CLASS_ID']) && $edit['CLASS_ID'] == $option->CLASS_ID) ? "selected" : ""; ?> ><?php echo $option->CLASS_NAME; ?></option>
                                                                          <?php endforeach; ?>
                                                                          </select>
                                                                          <span class="fred"><?php echo form_error('class_id[]'); ?></span>

                                                                        </div>
                                  																	</div>


                                  																	<div class="span3">
                                                                     
                                                                      <div class="form-group">
                                                                        <label>Section<span class="required">*</span></label>
                                                                        
                                  																			  <select class="span6 span-left m-wrap" name="section_id[]" class="form-control" data-parsley-id="7056">
                                  																				<option value="">Select Section</option>
                                  																				<?php
                                  																				  $options = $this->db->query("SELECT s.SECTION_ID, s.SECTION_NAME, c.CLASS_NAME FROM section AS s INNER JOIN class AS c ON s.CLASS_ID = c.CLASS_ID WHERE s.STATUS = 7")->result();
                                  																				?>
                                  																				<?php foreach($options as $option) : ?>
                                  																				  <option value="<?php echo $option->SECTION_ID?>" <?php echo (isset($edit['SECTION_ID']) && $edit['SECTION_ID'] == $option->SECTION_ID) ? "selected" : ""; ?> ><?php echo $option->CLASS_NAME . ": " . $option->SECTION_NAME; ?></option>
                                  																				<?php endforeach; ?>
                                  																			  </select>
                                  																			  <span class="fred"><?php echo form_error('section_id[]'); ?></span>
                                  																			</div>
                                                                     
                                  																	</div>


                                    																<div class="span3">
                                                                      <!-- <div style="margin-left: -33.5641%;"> -->
                                                                        <div class="form-group">
                                                                          <label>Subject<span class="required">*</span></label>
                                                                         
                                    																			  <select class="span6 m-wrap" name="subject_id[]">
                                    																				<option value="">Select Subject</option>
                                    																				<?php
                                    																				  $options = $this->db->query("SELECT s.SUBJECT_ID, s.SUBJECT_NAME, c.CLASS_NAME FROM subject AS s INNER JOIN class AS c ON s.CLASS_ID = c.CLASS_ID WHERE s.STATUS = 7")->result();
                                    																				?>
                                    																				<?php foreach($options as $option) : ?>
                                    																				  <option value="<?php echo $option->SUBJECT_ID?>" <?php echo (isset($edit['SUBJECT_ID']) && $edit['SUBJECT_ID'] == $option->SUBJECT_ID) ? "selected" : ""; ?> ><?php echo $option->CLASS_NAME . ":- " . $option->SUBJECT_NAME; ?></option>
                                    																				<?php endforeach; ?>
                                    																			  </select>
                                    																			  <span class="fred"><?php echo form_error('subject_id[]'); ?></span>
                                    																		  </div>
                                                                        <!-- </div> -->
                                    																</div>
                                                                  </div>


                                                                <!-- </div> -->

                              																</div>
	                                                        </div>
															
                            															<div class="prodcut_price_new" style="display:none">
                                                              <div class="control-group">
                                                                <!-- <div class="span12"> -->

                                                                  <label class="control-label"><span class="required">*</span></label>
                                                                  <div class="col-md-12 my_real_div">
                                                                    <div class="span3 my_span">
                                                                        <div class="form-group" >
                                                                          <label for="exampleInputEmail1">Class<span class="required">*</span></label>
                                                                          <select class="span6 m-wrap" name="class_id[]" class="list_subgroup form-control" data-parsley-id="9592">
                                                                          <option value="">Select...</option>
                                                                          <?php
                                                                            $options = $this->db->query("SELECT * FROM class WHERE STATUS = 7")->result();
                                                                          ?>
                                                                          <?php foreach($options as $option) : ?>
                                                                            <option value="<?php echo $option->CLASS_ID ?>" <?php echo (isset($edit['CLASS_ID']) && $edit['CLASS_ID'] == $option->CLASS_ID) ? "selected" : ""; ?> ><?php echo $option->CLASS_NAME; ?></option>
                                                                          <?php endforeach; ?>
                                                                          </select>
                                                                          <span class="fred"><?php echo form_error('class_id[]'); ?></span>

                                                                        </div>
                                                                    </div>


                                                                    <div class="span3">
                                                                     
                                                                      <div class="form-group">
                                                                        <label>Section<span class="required">*</span></label>
                                                                        
                                                                          <select class="span6 span-left m-wrap" name="section_id[]" class="list_subgroup3 form-control" data-parsley-id="6727">
                                                                          <option value="">Select Section</option>
                                                                          <?php
                                                                            $options = $this->db->query("SELECT s.SECTION_ID, s.SECTION_NAME, c.CLASS_NAME FROM section AS s INNER JOIN class AS c ON s.CLASS_ID = c.CLASS_ID WHERE s.STATUS = 7")->result();
                                                                          ?>
                                                                          <?php foreach($options as $option) : ?>
                                                                            <option value="<?php echo $option->SECTION_ID?>" <?php echo (isset($edit['SECTION_ID']) && $edit['SECTION_ID'] == $option->SECTION_ID) ? "selected" : ""; ?> ><?php echo $option->CLASS_NAME . ": " . $option->SECTION_NAME; ?></option>
                                                                          <?php endforeach; ?>
                                                                          </select>
                                                                          <span class="fred"><?php echo form_error('section_id[]'); ?></span>
                                                                        </div>
                                                                     
                                                                    </div>


                                                                    <div class="span3">
                                                                      <!-- <div style="margin-left: -33.5641%;"> -->
                                                                        <div class="form-group">
                                                                          <label>Subject<span class="required">*</span></label>
                                                                         
                                                                            <select class="span6 m-wrap" name="subject_id[]">
                                                                            <option value="">Select Subject</option>
                                                                            <?php
                                                                              $options = $this->db->query("SELECT s.SUBJECT_ID, s.SUBJECT_NAME, c.CLASS_NAME FROM subject AS s INNER JOIN class AS c ON s.CLASS_ID = c.CLASS_ID WHERE s.STATUS = 7")->result();
                                                                            ?>
                                                                            <?php foreach($options as $option) : ?>
                                                                              <option value="<?php echo $option->SUBJECT_ID?>" <?php echo (isset($edit['SUBJECT_ID']) && $edit['SUBJECT_ID'] == $option->SUBJECT_ID) ? "selected" : ""; ?> ><?php echo $option->CLASS_NAME . ":- " . $option->SUBJECT_NAME; ?></option>
                                                                            <?php endforeach; ?>
                                                                            </select>
                                                                            <span class="fred"><?php echo form_error('subject_id[]'); ?></span>
                                                                          </div>
                                                                        <!-- </div> -->
                                                                    </div>
                                                                  </div>


                                                                <!-- </div> -->

                                                              </div>
                                                          </div>

															
                            															<div id="pro_area"></div>
                            															
                            															<!-- <br> -->
                            															
                            															<div class="controls" style="border:none; margin:0px padding:0px;">
                            																<button id="add_product" class="btn btn-primary btn-sm">Add Subject</button>
                            											
                            																<button id="remove_product" type="button" class="btn btn-danger btn-sm">Remove Subject</button>
                            															</div>

                                                          <div class="control-group year_area">
                                                              <label class="control-label">Year<span class="required">*</span></label>
                                                              <div class="controls">
                                                                <input disabled type="text" name="year" data-required="1" class="span6 m-wrap" value="<?php echo date("Y") ?>" />
                                                                <span class="fred"><?php echo form_error('year'); ?></span>
                                                              </div>
                                                          </div>

                                                        <br /><br /><br />
                                                        <div class="form-actions">
                                                            <input type="submit" name="submit" class="btn btn-success" value="Submit Data"  />
                                                            <a class="btn btn-danger" href="<?php echo $url_prefix; ?>manage_assign_teacher">Cancel</a>
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
