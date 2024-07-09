<?php include(APPPATH."views/admin/admin_header.php"); ?>

        <div class="container" id="wrapper">
            <div id="page_create_payment" class="row-fluid page_identifier">
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
                                          <b>Create Payment</b>  
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
                                  <div class="muted pull-left">Create Payment</div>
                              </div>
                              <div class="block-content collapse in">
                                <div class="span12">
                                  <?php
                                    //dd($edit);
                                  ?>
                                  <!-- BEGIN FORM-->
                                  <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                      <input id="token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                      <input type="hidden" name="payment_id" value="<?php if( isset($edit['PAYMENT_ID']) && $edit['PAYMENT_ID'] ){echo $this->webspice->encrypt_decrypt($edit['PAYMENT_ID'], 'encrypt');} ?>" />
                                      <fieldset>

                                            <div class="control-group">
                                              <label class="control-label">Class Name<span class="required">*</span></label>
                                              <div class="controls">
                                                <select id="class_list" class="span6 m-wrap" name="class_id">
                                                  <option value="">Select...</option>
                                                  <?php
                                                    $options = $this->db->query("SELECT CLASS_ID, CLASS_NAME FROM class WHERE STATUS = 7")->result();
                                                  ?>
                                                  <?php foreach($options as $option) : ?>
                                                    <option value="<?php echo $option->CLASS_ID?>" <?php echo (isset($edit['CLASS_ID']) && $edit['CLASS_ID'] == $option->CLASS_ID) ? "selected" : ""; ?> ><?php echo $option->CLASS_NAME ?></option>
                                                  <?php endforeach; ?>
                                                </select>
                                                <span class="fred"><?php echo form_error('class_id'); ?></span>
                                              </div>
                                            </div>

                                             <div class="control-group">
                                              <label class="control-label">Section Name<span class="required">*</span></label>
                                              <div class="controls">
                                                <select id="section_list" class="span6 m-wrap" name="section_id">
                                                  <option value="">Select...</option>
                                                  <?php
                                                  if(isset($edit['SECTION_ID'])) {
                                                    $options = $this->db->query("SELECT s.SECTION_ID, s.SECTION_NAME, c.CLASS_NAME FROM section AS s INNER JOIN class AS c ON s.CLASS_ID = c.CLASS_ID WHERE s.STATUS = 7")->result();

                                                  ?>
                                                  <?php foreach($options as $option) : ?>
                                                    <option value="<?php echo $option->SECTION_ID?>" <?php echo (isset($edit['SECTION_ID']) && $edit['SECTION_ID'] == $option->SECTION_ID) ? "selected" : ""; ?> ><?php echo $option->CLASS_NAME . ": " . $option->SECTION_NAME; ?></option>
                                                  <?php endforeach; } ?>
                                                </select>
                                                <span class="fred"><?php echo form_error('section_id'); ?></span>
                                              </div>
                                            </div>

                                            <div class="control-group">
                                              <label class="control-label">Student Name<span class="required">*</span></label>
                                              <div class="controls">
                                                <select id="student_list" class="span6 m-wrap" name="student_id">
                                                  <option value="">Select...</option>
                                                  <?php
                                                  if(isset($edit['STUDENT_ID'])) {
                                                    $options = $this->db->query("SELECT sd.STUDENT_DATA_ID AS STUDENT_ID, si.NAME FROM student_data AS sd INNER JOIN student_info AS si ON si.STUDENT_ID = sd.STUDENT_ID WHERE sd.STATUS = 7")->result();
                                                   
                                                  ?>
                                                  <?php  foreach($options as $option) :?>
                                                    <option value="<?php echo $option->STUDENT_ID?>" <?php echo (isset($edit['STUDENT_ID']) && $edit['STUDENT_ID'] == $option->STUDENT_ID) ? "selected" : ""; ?> ><?php echo $option->NAME ?></option>
                                                  <?php endforeach; } ?>
                                                </select>
                                                <span class="fred"><?php echo form_error('student_id'); ?></span>
                                              </div>
                                            </div>


                                            <div class="control-group">
                                              <label class="control-label">Payment Type<span class="required">*</span></label>
                                              <div class="controls">
                                                <select id="payment_list" class="span6 m-wrap" name="payment_cat_id">
                                                  <option value="">Select...</option>
                                                  <?php
                                                  if(isset($edit['PAYMENT_CAT_ID'])) {
                                                    $options = $this->db->query("SELECT p.PAYMENT_CAT_ID, p.CATEGORY_NAME, c.CLASS_NAME FROM payment_category AS p INNER JOIN class AS c ON p.CLASS_ID = c.CLASS_ID WHERE p.STATUS = 7")->result();

                                                  ?>
                                                  <?php foreach($options as $option) : ?>
                                                    <option value="<?php echo $option->PAYMENT_CAT_ID?>" <?php echo (isset($edit['PAYMENT_CAT_ID']) && $edit['PAYMENT_CAT_ID'] == $option->PAYMENT_CAT_ID) ? "selected" : ""; ?> ><?php echo $option->CLASS_NAME . ": " . $option->CATEGORY_NAME; ?></option>
                                                  <?php endforeach; } ?>
                                                </select>
                                                <span class="fred"><?php echo form_error('payment_cat_id'); ?></span>
                                              </div>
                                            </div>

                                            <div class="control-group">
                                              <label class="control-label">Month<span class="required">*</span></label>
                                              <div class="controls">         
                                                    <select name="month" class="span6 m-wrap">
                                                      <option value="0">Select...</option>
                                                        <option value="january" <?php echo (isset($edit['MONTH']) && set_value('month',$edit['MONTH'])  == "january") ? "selected" : ""; ?> >January</option>
                                                        <option value="february" <?php echo (isset($edit['MONTH']) && set_value('month',$edit['MONTH'])  == "february") ? "selected" : ""; ?> >February</option>
                                                        <option value="march" <?php echo (isset($edit['MONTH']) && set_value('month',$edit['MONTH'])  == "march") ? "selected" : ""; ?> >March</option>
                                                        <option value="april" <?php echo (isset($edit['MONTH']) && set_value('month',$edit['MONTH'])  == "april") ? "selected" : ""; ?> >April</option>
                                                        <option value="may" <?php echo (isset($edit['MONTH']) && set_value('month',$edit['MONTH'])  == "may") ? "selected" : ""; ?> >May</option>
                                                        <option value="june" <?php echo (isset($edit['MONTH']) && set_value('month',$edit['MONTH'])  == "june") ? "selected" : ""; ?> >June</option>
                                                        <option value="july" <?php echo (isset($edit['MONTH']) && set_value('month',$edit['MONTH'])  == "july") ? "selected" : ""; ?> >July</option>
                                                        <option value="august" <?php echo (isset($edit['MONTH']) && set_value('month',$edit['MONTH'])  == "august") ? "selected" : ""; ?> >August</option>
                                                        <option value="september" <?php echo (isset($edit['MONTH']) && set_value('month',$edit['MONTH'])  == "september") ? "selected" : ""; ?> >September</option>
                                                        <option value="october" <?php echo (isset($edit['MONTH']) && set_value('month',$edit['MONTH'])  == "october") ? "selected" : ""; ?> >October</option>
                                                         <option value="november" <?php echo (isset($edit['MONTH']) && set_value('month',$edit['MONTH'])  == "november") ? "selected" : ""; ?> >November</option>
                                                         <option value="december" <?php echo (isset($edit['MONTH']) && set_value('month',$edit['MONTH'])  == "december") ? "selected" : ""; ?>>December</option>
                                                    </select>
                                                <span class="fred"><?php echo form_error('month'); ?></span>
                                              </div>
                                            </div>

                                            <div class="control-group">
                                                  <label class="control-label">Amount<span class="required">*</span></label>
                                                  <div class="controls">
                                                  	<?php 
                                                  		//$options = $this->db->query("SELECT CLASS_ID, AMOUNT FROM payment_category WHERE STATUS = 7 LIMIT 1")->result(); 
                                                  		//foreach ($options as $v) {	
                                                  	?>
                                                      <input id="payment_amount" type="number" name="amount" data-required="1" class="span6 m-wrap" value="<?php  echo set_value('amount',$edit['AMOUNT']); ?>" />
                                                      <?php 
                                                  		//} ?>
                                                  <span class="fred"><?php echo form_error('amount'); ?></span>
                                                  </div>
                                           </div>


                                              <div class="control-group">
                                                  <label class="control-label">Year<span class="required">*</span></label>
                                                  <div class="controls">
                                                    <input disabled type="text" name="year" data-required="1" class="span6 m-wrap" value="<?php echo date("Y") ?>" />
                                                    <span class="fred"><?php echo form_error('year'); ?></span>
                                                  </div>
                                              </div>
                                              
                                              <div class="form-actions">
                                                  <input type="submit" name="submit" class="btn btn-primary" value="Submit Data"  />
                                                  <a class="btn btn-danger" href="<?php echo $url_prefix; ?>manage_payment">Cancel</a>
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