<?php $url_prefix = $this->webspice->settings()->site_url_prefix; ?>
<link rel="stylesheet" type="text/css" href="<?php echo $url_prefix; ?>global/assets/css/papana.css">
<?php include(APPPATH."views/web_header.php"); ?>
<link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet">
<!-- Start Container area -->
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="container-section">
                    <div class="col-md-8 col-lg-8 col-sm-8 col-xs-12">
                        <div class="about-us-area">
                            <div class="about-us">
                                <h3 style="font-family: 'Lobster Two', cursive;font-size: 30px">Online Admission Request</h3>
                                


                                <!-- here will goes alert message -->
                                <?php if( $this->webspice->message_board(null, 'get') ): ?>
                                <div id="message_board" class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <!-- <h4>Success</h4> -->
                                    <?php echo $this->webspice->message_board(null,'get_and_destroy'); ?>
                                </div>
                                <?php endif; ?>
                                <!-- alert message end -->



                         <!-- validation -->
                        <div class="row-fluid" style="border:1px solid #00CCC7;padding: 10px;padding-top: 50px;border-radius: 5px">
                             <!-- block -->
                            <!-- <div class="block"> -->
                                <!-- <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Add Student</div>
                                </div> -->
                                <div class="block-content collapse in">
                                    <div class="span12">

                                        <!-- BEGIN FORM-->
                                        <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                            <input type="hidden" name="student_id" value="<?php if( isset($edit['STUDENT_ID']) && $edit['STUDENT_ID'] ){echo $this->webspice->encrypt_decrypt($edit['STUDENT_ID'], 'encrypt');} ?>" />
                                            <fieldset>

                                            <div class="control-group">
                                              <label class="control-label">Class Name<span class="required">*</span></label>
                                              <div class="controls">
                                                <select class="span9 m-wrap" name="class_id">
                                                  <option value="">Select...</option>
                                                  <?php
                                                    $options = $this->db->query("SELECT * FROM class WHERE STATUS = 7")->result();
                                                  ?>
                                                  <?php foreach($options as $option) : ?>
                                                    <option value="<?php echo $option->CLASS_ID; ?>" <?php echo (isset($edit['CLASS_ID']) && $edit['CLASS_ID'] == $option->CLASS_ID) ? "selected" : ""; ?> ><?php echo $option->CLASS_NAME ?></option>
                                                  <?php endforeach; ?>
                                                </select>
                                                <span class="fred"><?php echo form_error('class_id'); ?></span>
                                              </div>
                                            </div>
                                                
                                                <div class="control-group">
                                                    <label class="control-label">Student Name<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input type="text" name="name" data-required="1" class="span9 m-wrap" value="<?php echo set_value('name',$edit['NAME']); ?>" />
                                                    <span class="fred"><?php echo form_error('name'); ?></span>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label">Birth Day</label>
                                                    <div class="controls">
                                                        <input type="text" name="birthday" data-required="1" class="span9 m-wrap datepicker" value="<?php echo set_value('birthday',$edit['BIRTHDAY']); ?>" />
                                                    <span class="fred"><?php echo form_error('birthday'); ?></span>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                  <label class="control-label">Gender<span class="required">*</span></label>
                                                  <div class="controls">
                                                    <select class="span9 m-wrap" name="gender">
                                                      <option value="">Select...</option>
                                                        <option value="Female" <?php echo (set_value('gender', $edit['GENDER']) == "Female") ? "selected" : "" ?> >Female</option>
                                                        <option value="Male" <?php echo (set_value('gender', $edit['GENDER']) == "Male") ? "selected" : "" ?> >Male</option>
                                                    </select>
                                                    <span class="fred"><?php echo form_error('gender'); ?></span>
                                                  </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label">Religion<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input type="text" name="religion" data-required="1" class="span9 m-wrap" value="<?php echo set_value('religion',$edit['RELIGION']); ?>" />
                                                    <span class="fred"><?php echo form_error('religion'); ?></span>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label">Blood Group</label>
                                                    <div class="controls">
                                                        <input type="text" name="blood_group" data-required="1" class="span9 m-wrap" value="<?php echo set_value('blood_group',$edit['BLOOD_GROUP']); ?>" />
                                                    <span class="fred"><?php echo form_error('blood_group'); ?></span>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label">Student Age<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input type="text" name="age" data-required="1" class="span9 m-wrap" value="<?php echo set_value('age',$edit['AGE']); ?>" />
                                                    <span class="fred"><?php echo form_error('age'); ?></span>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label">Address<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <textarea rows="10" cols="50" name="address" data-required="1" class="span9 m-wrap" ><?php echo set_value('address',$edit['ADDRESS']); ?></textarea>
                                                    <span class="fred"><?php echo form_error('address'); ?></span>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label">Phone<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input type="text" name="phone" data-required="1" class="span9 m-wrap" value="<?php echo set_value('phone',$edit['PHONE']); ?>" />
                                                    <span class="fred"><?php echo form_error('phone'); ?></span>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label">Student Email<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input type="text" name="email" data-required="1" class="span9 m-wrap" value="<?php echo set_value('email',$edit['EMAIL']); ?>" />
                                                    <span class="fred"><?php echo form_error('email'); ?></span>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label">Father Name<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input type="text" name="father_name" data-required="1" class="span9 m-wrap" value="<?php echo set_value('father_name',$edit['FATHER_NAME']); ?>" />
                                                    <span class="fred"><?php echo form_error('father_name'); ?></span>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label">Mother Name<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input type="text" name="mother_name" data-required="1" class="span9 m-wrap" value="<?php echo set_value('mother_name',$edit['MOTHER_NAME']); ?>" />
                                                    <span class="fred"><?php echo form_error('mother_name'); ?></span>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                  <label class="control-label" for="images">Student Image<span class="required">*</span></label>
                                                  <div class="controls">
                                                    <input type="file" name="images" class="input-file uniform_on" id="images" <?php if(set_value('student_id',$edit['STUDENT_ID']))echo '';else echo 'required';?>>
                                                  </div>
                                                  <span class="fred"><?php echo form_error('images'); ?></span>
                                                </div>
                                                <?php if( file_exists($this->webspice->get_path('student_full').$edit['STUDENT_ID'].'.jpg') ): ?>
                                                  <div class="personnel-thm-img" style="padding-top:20px;margin-left:180px;"> 
                                                    <img src="<?php echo $this->webspice->get_path('student').$edit['STUDENT_ID'].'.jpg'; ?>"  alt="" class="img-responsive" width="100"/> 
                                                  </div> 
                                                <?php endif;  ?>
                                                
                                                <div class="form-actions">
                                                    <input type="submit" name="submit" class="btn btn-primary" value="Submit Data"  />
                                                </div>
                                            </fieldset>
                                        </form>
                                        <!-- END FORM-->
                                    </div>
                                </div>
                            <!-- </div> -->
                              <!-- /block -->
                        </div>
                         <!-- /validation -->












                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                        <div class="shahid-message">
                            <h3>Message of Chairman</h3>
                            <?php foreach($msg as $v): ?>
                                <div class="right-principals-msg">
                                    <img width="100%" src="<?php echo $this->webspice->get_path('person').$v->PERSON_ID.'.jpg'; ?>" class="img-responsive img-thumbnail" alt="cultural.jpg">
                                 <p><?php echo $v->DETAILS; ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="exam-list">
                            <div class="home-exam">
                                <table>
                                    <tr>
                                        <th>Exam Name</th>
                                        <th>Date</th>
                                    </tr>
                                    <?php foreach ($exam as $v): ?>
                                    <tr>
                                        <td><?php echo $v->EXAM_NAME; ?></td>
                                        <td><?php $date = $v->EXAM_DATE;
                                        $month_name = ucfirst(strftime("%d %B", strtotime($date)));
                                        echo $month_name;
                                       ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </table>
                            </div>
                        </div>

                        <div class="contact-notice">
                            <h3>Notice Board</h3>
                            <ul>
                                <?php foreach ($fnotice as $v):?>
                                <li><a href="<?php echo $url_prefix; ?>education/single_notice/<?php echo $v->NOTICE_ID; ?>"><?php echo $v->NOTICE_TITLE; ?></a></li>
                            <?php endforeach; ?>
                                <li class="notice-read-more"><i class="fa fa-chevron-right" aria-hidden="true"></i><i class="fa fa-chevron-right" aria-hidden="true"></i><a href="<?php echo $url_prefix; ?>notice">Read More</a></li>
                            </ul>
                        </div>

                        <div class="home-cultural-activity">
                            <h3>Cultural Activity</h3>
                            <?php foreach($activities as $v): ?>
                                <div class="home-cultural-img">
                                    <?php if( file_exists($this->webspice->get_path('cultural_full').$v->CULTURAL_ACTIVITIES_ID.'.jpg') ): ?>
                                        <img src="<?php echo $this->webspice->get_path('cultural').$v->CULTURAL_ACTIVITIES_ID.'.jpg'; ?>" class="img-responsive img-thumbnail" alt="cultural.jpg">
                                    <?php endif;  ?>
                                    <h4><?php echo $v->TITLE; ?></h4>
                                    <p><?php echo substr($v->DETAILS, 0 , 70); ?> <a href="<?php echo $url_prefix; ?>education/single_activities/<?php echo $v->CULTURAL_ACTIVITIES_ID; ?>">Read More</a></p>

                                    <p class="home-cultural-p"><a href="<?php echo $url_prefix; ?>cultural_activity">View All Activity <i class="fa fa-chevron-right example-imag" aria-hidden="true"></i><i class="fa fa-chevron-right example-imag" aria-hidden="true"></i></a></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Container area -->
<?php include(APPPATH."views/web_footer.php"); ?>