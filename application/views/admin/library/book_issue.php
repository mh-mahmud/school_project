<?php include(APPPATH."views/admin/admin_header.php"); ?>



		        <div class="container">
		            <div class="row-fluid">
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
		                                          <b>Book Issue</b>  
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
						                <div class="muted pull-left">Book Issue</div>
						            </div>
						            <div class="block-content collapse in">
						                <div class="span12">
						                    <!-- BEGIN FORM-->
                    						<form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">
                        						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        						<input type="hidden" name="book_issue_id" value="<?php if( isset($edit['BOOK_ISSUE_ID']) && $edit['BOOK_ISSUE_ID'] ){echo $this->webspice->encrypt_decrypt($edit['BOOK_ISSUE_ID'], 'encrypt');} ?>" />
                       							 <fieldset>

									                <div class="control-group">
									                    <label class="control-label">Book Name<span class="required">*</span></label>
									                        <div class="controls">
									                          <?php
									                          $employee_name=$this->db->query("SELECT bw.WRITER_ID, bw.WRITER_NAME, bc.BOOK_CATEGORY_ID, bc.CATEGORY_NAME, b.BOOK_NAME, b.BOOK_ID, b.BOOK_CATEGORY_ID FROM books AS b INNER JOIN book_writer AS bw ON bw.WRITER_ID = b.WRITER_ID INNER JOIN book_category AS bc ON bc.BOOK_CATEGORY_ID=b.BOOK_CATEGORY_ID WHERE b.STATUS = 7")->result();
									                          //dd($employee_name);
									                          //exit();
									                        ?>
									                          <select data-placeholder="Please Type Book Name" name="book_id[]" style="width:350px;" multiple class="chzn-select" id="test_me" name="test_me_form" tabindex="8">
									                              <option value=""></option>
									                              <?php foreach($employee_name as $v):?>
									                            
									                            <option value="<?php echo $v->BOOK_ID;?>" <?php echo (isset($edit['BOOK_ID']) && $edit['BOOK_ID'] == $v->BOOK_ID) ? "selected" : ""; ?> ?><?php echo $v->CATEGORY_NAME . " -> ". $v->BOOK_NAME . " (". $v->WRITER_NAME  .")" ;?></option>
									                            
									                            <?php endforeach; ?>  
									                          </select>

									                            <span class="fred"><?php echo form_error('book_id'); ?></span>
									                        </div>
									                </div>

                        							<div class="control-group">
                    									<label class="control-label">Member Name<span class="required">*</span></label>
                        								<div class="controls">
                                                          <select class="span6 m-wrap chzn-select" name="library_member_id">
                                                            <option value="">Select...</option>
                                                            <?php
                                                              $options = $this->db->query("SELECT sd.STUDENT_DATA_ID, sd.STUDENT_ID, lm.STUDENT_DATA_ID, lm.LIBRARY_MEMBER_ID, lm.YEAR, si.NAME FROM library_member AS lm INNER JOIN student_data AS sd ON sd.STUDENT_DATA_ID = lm.STUDENT_DATA_ID INNER JOIN student_info AS si ON si.STUDENT_ID=sd.STUDENT_ID WHERE lm.YEAR =". date("Y"))->result();
                                                            ?>
                                                            <?php foreach($options as $option) : ?>
                                                              <option value="<?php echo $option->LIBRARY_MEMBER_ID?>" 

                                                                <?php echo (set_value('library_member_id', $edit['LIBRARY_MEMBER_ID']) == $option->LIBRARY_MEMBER_ID) ? "selected" : "" ?>
                                                                
                                                               ><?php echo $option->NAME; ?></option>
                                                            <?php endforeach; ?>
                                                          </select>
                                                          <span class="fred"><?php echo form_error('library_member_id'); ?></span>
                                                        </div>
                        							</div>

							                        <div class="control-group">
                                                        <label class="control-label">Issue Date<span class="required">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" name="issue_date" data-required="1" class="span6 m-wrap datepicker" value="<?php echo set_value('issue_date',$edit['ISSUE_DATE']); ?>" />
                                                        </div>
                                                        <span class="fred"><?php echo form_error('issue_date'); ?></span>
                                                    </div>

                                                    <div class="control-group">
                                                        <label class="control-label">Issue Expire Date<span class="required">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" name="issue_expiredate" data-required="1" class="span6 m-wrap datepicker" value="<?php echo set_value('issue_expiredate',$edit['ISSUE_EXPIREDATE']); ?>" />
                                                        </div>
                                                        <span class="fred"><?php echo form_error('issue_expiredate'); ?></span>
                                                    </div>

                                                    <div class="control-group">
                                                        <label class="control-label">Total Book Issue<span class="required">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" name="total_book_issue" data-required="1" class="span6 m-wrap" value="<?php echo set_value('total_book_issue',$edit['TOTAL_BOOK_ISSUE']); ?>" />
                                                        </div>
                                                        <span class="fred"><?php echo form_error('total_book_issue'); ?></span>
                                                    </div>

							                        <div class="form-actions">
							                            <input type="submit" name="submit" class="btn btn-success" value="Submit Data"  />
							                            <a class="btn btn-danger" href="<?php echo $url_prefix; ?>manage_issue_and_return">Cancel</a>
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


</div>