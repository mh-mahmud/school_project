<?php include(APPPATH."views/admin/admin_header.php"); ?>

        <div class="container" id="wrapper">
            <div id="page_create_salary_payment" class="row-fluid page_identifier">
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
                                          <b>Monthly Salary</b>  
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
                                    <div class="muted pull-left">Monthly Salary</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                        <!-- BEGIN FORM-->
                                        <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                            <input id="token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                            <input type="hidden" name="monthly_salary_id" value="<?php if( isset($edit['MONTHLY_SALARY_ID']) && $edit['MONTHLY_SALARY_ID'] ){echo $this->webspice->encrypt_decrypt($edit['MONTHLY_SALARY_ID'], 'encrypt');} ?>" />
                                            <fieldset>

                                                <div class="control-group">
                                                    <label class="control-label">Teacher Name<span class="required">*</span></label>
                                                    <div class="controls">
                                                      <select id="teacher_list" class="span6 m-wrap" name="teacher_id">
                                                        <option value="">Select...</option>
                                                        <?php
                                                          $options = $this->db->query("SELECT t.TEACHER_ID, t.TEACHER_NAME, st.TEACHER_ID FROM salary_settings AS st INNER JOIN teacher AS t ON st.TEACHER_ID = t.TEACHER_ID WHERE st.YEAR =".date("Y"))->result();

                                                        ?>
                                                        <?php foreach($options as $option) : ?>
                                                          <option value="<?php echo $option->TEACHER_ID?>" <?php echo (isset($edit['TEACHER_ID']) && $edit['TEACHER_ID'] == $option->TEACHER_ID) ? "selected" : ""; ?> ><?php echo $option->TEACHER_NAME; ?></option>
                                                        <?php endforeach; ?>
                                                      </select>
                                                      <span class="fred"><?php echo form_error('teacher_id'); ?></span>
                                                    </div>
                                                </div>

                        												<div class="control-group">
                        													<label class="control-label">Salary<span class="required">*</span></label>
                        													<div class="controls">
                        													  <select id="salary" class="span6 m-wrap" name="salary">
                        													    <option value="">Select...</option>
                        													    <?php
                        													     if(isset($edit['SALARY'])) {
                        													      $options = $this->db->query("SELECT SALARY FROM salary_settings WHERE STATUS = 7")->result();
                        													     
                        													    ?>
                        													    <?php  foreach($options as $option) :?>
                        													      <option value="<?php echo $option->SALARY?>" <?php echo (isset($edit['SALARY']) && $edit['SALARY'] == $option->SALARY) ? "selected" : ""; ?> ><?php echo $option->SALARY; ?></option>
                        													    <?php endforeach;} ?>
                        													  </select>
                        													  <span class="fred"><?php echo form_error('salary'); ?></span>
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
                                                    <label class="control-label">Payment Type<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <textarea name="payment_type" data-required="1" class="span6 m-wrap" ><?php echo set_value('payment_type',$edit['PAYMENT_TYPE']); ?></textarea>
                                                        <span class="fred"><?php echo form_error('payment_type'); ?></span>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label">Pay Date<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input type="text" name="pay_date" data-required="1" class="span6 m-wrap datepicker" value="<?php echo set_value('pay_date',$edit['PAY_DATE']); ?>" />
                                                    </div>
                                                    <span class="fred"><?php echo form_error('pay_date'); ?></span>
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
                                                    <a class="btn btn-danger" href="<?php echo $url_prefix; ?>manage_salary">Cancel</a>
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