<?php include(APPPATH."views/admin/admin_header.php"); ?>

        <div class="container" id="wrapper">
            <div id="page_student_checkin" class="row-fluid page_identifier">
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
                                          <b>Student Check-in or Check-out</b>  
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
                                    <div class="muted pull-left">Student Check-in or Check-out</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                        <!-- BEGIN FORM-->
                                        <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                            <input id="token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                            <input type="hidden" name="checkin_id" value="<?php if( isset($edit['CHECKIN_ID']) && $edit['CHECKIN_ID'] ){echo $this->webspice->encrypt_decrypt($edit['CHECKIN_ID'], 'encrypt');} ?>" />
                                            <fieldset>

                                            	<div class="control-group">
													<label class="control-label">House Name<span class="required">*</span></label>
													<div class="controls">
													  <select id="hostel_list" class="span6 m-wrap" name="house_id">
													    <option value="">Select...</option>
													    <?php
													      $options = $this->db->query("SELECT * FROM house WHERE STATUS = 7")->result();
													    ?>
													    <?php foreach($options as $option) : ?>
													      <option value="<?php echo $option->HOUSE_ID ?>" <?php echo (isset($edit['HOUSE_ID']) && $edit['HOUSE_ID'] == $option->HOUSE_ID) ? "selected" : ""; ?> ><?php echo $option->HOUSE_NAME; ?></option>
													    <?php endforeach; ?>
													  </select>
													  <span class="fred"><?php echo form_error('house_id'); ?></span>
													</div>
											    </div>

												<div class="control-group">
													<label class="control-label">Student Name<span class="required">*</span></label>
													<div class="controls">
													  <select id="student_list" class="span6 m-wrap" name="student_data_id">
													    <option value="">Select...</option>
													    <?php
													   		$options = $this->db->query("SELECT sd.STUDENT_DATA_ID, sd.STUDENT_ID, hs.STUDENT_DATA_ID, si.NAME FROM admit_student_to_hostel AS hs INNER JOIN student_data AS sd ON sd.STUDENT_DATA_ID = hs.STUDENT_DATA_ID INNER JOIN student_info AS si ON si.STUDENT_ID=sd.STUDENT_ID WHERE hs.STATUS = 7")->result();
													    ?>
													    <?php  foreach($options as $option) :?>
													      <option value="<?php echo $option->STUDENT_DATA_ID?>" <?php echo (isset($edit['STUDENT_DATA_ID']) && $edit['STUDENT_DATA_ID'] == $option->STUDENT_DATA_ID) ? "selected" : ""; ?> ><?php echo $option->NAME; ?></option>
													    <?php endforeach; ?>
													  </select>
													  <span class="fred"><?php echo form_error('student_data_id'); ?></span>
													</div>		
												</div>

												<div class="control-group">
                                                    <label class="control-label">Check-out Date<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input type="text" name="checkout_date" data-required="1" class="span6 m-wrap datepicker" value="<?php echo set_value('checkout_date',$edit['CHECKOUT_DATE']); ?>" />
                                                    </div>
                                                    <span class="fred"><?php echo form_error('checkout_date'); ?></span>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label">Expire Date<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input type="text" name="expire_date" data-required="1" class="span6 m-wrap datepicker" value="<?php echo set_value('expire_date',$edit['EXPIRE_DATE']); ?>" />
                                                    </div>
                                                    <span class="fred"><?php echo form_error('expire_date'); ?></span>
                                                </div>

                                                <div class="control-group">
                                                  <label class="control-label">Gurdiun Type<span class="required">*</span></label>
                                                  <div class="controls">
                                                    <select class="span6 m-wrap" name="gurdiun_type">
                                                      <option value="">Select...</option>
                                                        <option value="Father" <?php echo (isset($edit['GURDIUN_TYPE']) && $edit['GURDIUN_TYPE'] == "Father") ? "selected" : ""; ?> >Father</option>
                                                        <option value="Mother" <?php echo (isset($edit['GURDIUN_TYPE']) && $edit['GURDIUN_TYPE'] == "Mother") ? "selected" : ""; ?> >Mother</option>
                                                       	<option value="Brother" <?php echo (isset($edit['GURDIUN_TYPE']) && $edit['GURDIUN_TYPE'] == "Brother") ? "selected" : ""; ?> >Brother</option>
                                                       	<option value="Syster" <?php echo (isset($edit['GURDIUN_TYPE']) && $edit['GURDIUN_TYPE'] == "Syster") ? "selected" : ""; ?> >Syster</option>
                                                    </select>
                                                    <span class="fred"><?php echo form_error('gurdiun_type'); ?></span>
                                                  </div>
                                                </div>

                                                <div class="control-group">
	                                                <label class="control-label">Gurdiun Name<span class="required">*</span></label>
	                                                <div class="controls">
	                                                    <input type="text" name="gurdiun_name" data-required="1" class="span6 m-wrap" value="<?php echo set_value('gurdiun_name',$edit['GURDIUN_NAME']); ?>" />
	                                                    <span class="fred"><?php echo form_error('gurdiun_name'); ?></span>
	                                                </div>
	                                            </div>

	                                            <div class="control-group">
	                                                <label class="control-label">Mobile Number<span class="required">*</span></label>
	                                                <div class="controls">
	                                                    <input type="text" name="mobile_no" data-required="1" class="span6 m-wrap" value="<?php echo set_value('mobile_no',$edit['MOBILE_NO']); ?>" />
	                                                    <span class="fred"><?php echo form_error('mobile_no'); ?></span>
	                                                </div>
	                                            </div>

                                                    
                                                <div class="form-actions">
                                                    <input type="submit" name="submit" class="btn btn-primary" value="Submit Data"  />
                                                    <a class="btn btn-danger" href="<?php echo $url_prefix; ?>manage_checkin">Cancel</a>
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