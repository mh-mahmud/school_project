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
                                          <b>Add Book</b>  
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
                                    <div class="muted pull-left">Add Book</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                                <!-- BEGIN FORM-->
                                                <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                    <input type="hidden" name="book_id" value="<?php if( isset($edit['BOOK_ID']) && $edit['BOOK_ID'] ){echo $this->webspice->encrypt_decrypt($edit['BOOK_ID'], 'encrypt');} ?>" />
                                                    <fieldset>
                                                          <div class="control-group">
                                                            <label class="control-label">Book Category Name<span class="required">*</span></label>
                                                            <div class="controls">
                                                              <select class="span6 m-wrap" name="book_category_id">
                                                                <option value="">Select...</option>
                                                                <?php
                                                                  $options = $this->db->query("SELECT * FROM book_category WHERE STATUS = 7")->result();
                                                                ?>
                                                                <?php foreach($options as $option) : ?>
                                                                  <option value="<?php echo $option->BOOK_CATEGORY_ID ?>" <?php echo (isset($edit['BOOK_CATEGORY_ID']) && $edit['BOOK_CATEGORY_ID'] == $option->BOOK_CATEGORY_ID) ? "selected" : ""; ?> ><?php echo $option->CATEGORY_NAME; ?></option>
                                                                <?php endforeach; ?>
                                                              </select>
                                                              <span class="fred"><?php echo form_error('book_category_id'); ?></span>
                                                            </div>
                                                          </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Writer Name<span class="required">*</span></label>
                                                                <div class="controls">
	                                                              <select class="span6 m-wrap" name="writer_id">
	                                                                <option value="">Select...</option>
	                                                                <?php
	                                                                  $options = $this->db->query("SELECT * FROM book_writer WHERE STATUS = 7")->result();
	                                                                ?>
	                                                                <?php foreach($options as $option) : ?>
	                                                                  <option value="<?php echo $option->WRITER_ID ?>" <?php echo (isset($edit['WRITER_ID']) && $edit['WRITER_ID'] == $option->WRITER_ID) ? "selected" : ""; ?> ><?php echo $option->WRITER_NAME; ?></option>
	                                                                <?php endforeach; ?>
	                                                              </select>
	                                                              <span class="fred"><?php echo form_error('writer_id'); ?></span>
	                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Book Name<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="book_name" data-required="1" class="span6 m-wrap" value="<?php echo set_value('book_name',$edit['BOOK_NAME']); ?>" />
                                                                <span class="fred"><?php echo form_error('book_name'); ?></span>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Book Description<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <textarea name="book_description" data-required="1" class="span6 m-wrap" ><?php echo set_value('book_description',$edit['BOOK_DESCRIPTION']); ?></textarea>
                                                                    <span class="fred"><?php echo form_error('book_description'); ?></span>
                                                                </div>
                                                                
                                                            </div>


                                                            <div class="control-group">
                                                                <label class="control-label">Book Code<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="book_code" data-required="1" class="span6 m-wrap" value="<?php echo set_value('book_code',$edit['BOOK_CODE']); ?>" />
                                                                <span class="fred"><?php echo form_error('book_code'); ?></span>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">ISBN NO.<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="isbn_no" data-required="1" class="span6 m-wrap" value="<?php echo set_value('isbn_no',$edit['ISBN_NO']); ?>" />
                                                                <span class="fred"><?php echo form_error('isbn_no'); ?></span>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Number of Copies<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="number_of_copies" data-required="1" class="span6 m-wrap" value="<?php echo set_value('number_of_copies',$edit['NUMBER_OF_COPIES']); ?>" />
                                                                <span class="fred"><?php echo form_error('number_of_copies'); ?></span>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Book Location<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <textarea name="book_location" data-required="1" class="span6 m-wrap" ><?php echo set_value('book_location',$edit['BOOK_LOCATION']); ?></textarea>
                                                                    <span class="fred"><?php echo form_error('book_location'); ?></span>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Edition No<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="edition_no" data-required="1" class="span6 m-wrap" value="<?php echo set_value('edition_no',$edit['EDITION_NO']); ?>" />
                                                                <span class="fred"><?php echo form_error('edition_no'); ?></span>
                                                                </div>
                                                            </div>

                                                             <div class="control-group">
                                                                <label class="control-label">Edition Year<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="edition_year" data-required="1" class="span6 m-wrap datepicker" value="<?php echo set_value('edition_year',$edit['EDITION_YEAR']); ?>" />
                                                                </div>
                                                                <span class="fred"><?php echo form_error('edition_year'); ?></span>
                                                            </div>

                                                            <div class="control-group">
                                                              <label class="control-label" for="images">Book Cover Photo</label>
                                                              <div class="controls">
                                                                <input type="file" name="images" class="input-file uniform_on" id="images" <?php if(set_value('writer_id',$edit['BOOK_ID']))echo '';else echo 'required';?>>
                                                              </div>
                                                              <span class="fred"><?php echo form_error('images'); ?></span>
                                                            </div>
                                                            <?php if( file_exists($this->webspice->get_path('book_full').$edit['BOOK_ID'].'.jpg') ): ?>
                                                              <div class="personnel-thm-img" style="padding-top:20px;margin-left:180px;"> 
                                                                <img src="<?php echo $this->webspice->get_path('books').$edit['BOOK_ID'].'.jpg'; ?>"  alt="" class="img-responsive" width="100"/> 
                                                              </div> 
                                                            <?php endif;  ?>

                                                            <div class="form-actions">
                                                                <input type="submit" name="submit" class="btn btn-success" value="Submit Data"  />
                                                                <a class="btn btn-danger" href="<?php echo $url_prefix; ?>manage_book">Cancel</a>
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