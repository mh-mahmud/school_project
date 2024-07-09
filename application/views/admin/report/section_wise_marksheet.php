<?php include(APPPATH."views/admin/admin_header.php"); ?>

        <div class="container" id="wrapper">
            <div id="page_student_marksheet" class="row-fluid page_identifier">
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
                                          <b>Section Wise Marksheet</b>  
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
                                    <div class="muted pull-left">Section Wise Marksheet</div>
                                </div>
                                <div class="block-content collapse in">
                                  <div class="span12">
                                    <!-- BEGIN FORM-->
                                    <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                        <input id="token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <fieldset>
                                               <table cellpadding="0" cellspacing="0" border="0" class="table table-striped">
                                                  <tr>
                                                      <th>Class Name</th>
                                                      <th>Section Name</th>
                                                      <th>Exam Name</th>
                                                      <th>Year</th>
                                                      <th>Action</th>
                                                  </tr>
                                                  <tr>
                                                      <td>
                                                        <select id="class_list" class="span12 m-wrap" name="class_id" required>
                                                          <option value="">Select...</option>
                                                          <?php
                                                            $options = $this->db->query("SELECT CLASS_ID, CLASS_NAME FROM class WHERE STATUS = 7")->result();
                                                          ?>
                                                          <?php foreach($options as $option) : ?>
                                                            <option value="<?php echo $option->CLASS_ID?>" <?php echo (isset($edit['CLASS_ID']) && $edit['CLASS_ID'] == $option->CLASS_ID) ? "selected" : ""; ?> ><?php echo $option->CLASS_NAME ?></option>
                                                          <?php endforeach; ?>
                                                        </select>
                                                      </td>
                                                      <td>
                                                          <select id="section_list" class="span12 m-wrap" name="section_id">
                                                            <option value="">Select...</option>
                                                            <?php
                                                            if(isset($edit['SECTION_ID'])) :
                                                              $options = $this->db->query("SELECT s.SECTION_ID, s.SECTION_NAME, c.CLASS_NAME FROM section AS s INNER JOIN class AS c ON s.CLASS_ID = c.CLASS_ID WHERE s.STATUS = 7")->result();

                                                            ?>
                                                            <?php foreach($options as $option) : ?>
                                                              <option value="<?php echo $option->SECTION_ID?>" <?php echo (isset($edit['SECTION_ID']) && $edit['SECTION_ID'] == $option->SECTION_ID) ? "selected" : ""; ?> ><?php echo $option->CLASS_NAME . ": " . $option->SECTION_NAME; ?></option>
                                                            <?php endforeach; endif; ?>
                                                          </select>
                                                      </td>
                                                      <td>
                                                        <div class="control-group">
                                                          <!-- <div class="controls"> -->
                                                            <select required class="span12 m-wrap" name="exam_id">
                                                              <option value="">Select...</option>
                                                              <?php
                                                                $options = $this->db->query("SELECT * FROM exam WHERE STATUS =7")->result();
                                                              ?>
                                                              <?php foreach($options as $option) : ?>
                                                                <option value="<?php echo $option->EXAM_ID;?>"><?php echo $option->EXAM_NAME; ?></option>
                                                              <?php endforeach; ?>
                                                            </select>
                                                            <span class="fred"><?php //echo form_error('exam_id'); ?></span>
                                                          <!-- </div> -->
                                                        </div>
                                                      </td>

                                                      <td>
                                                        <select name="year" class="form-control">
                                                          <?php
                                                              $year = date("Y");
                                                           for($i=2015;$i<=2020;$i++):?>
                                                              <option value="<?php echo $i;?>"
                                                                  <?php if(isset($year) && $year==$i)echo 'selected="selected"';?>>
                                                                      <?php echo $i;?>
                                                              </option>
                                                            <?php endfor;?>
                                                        </select>
                                                      </td>
                                                      <td>
                                                          <input type="submit" name="filter" class="btn btn-primary" value="Submit Data"  />
                                                      </td>
                                                  </tr>
                                                </table>

                                                    <div style="margin-top: 100px;"></div>

                                                  <!-- here will goes alert message -->
                                                  <?php if(isset($has_data_err)) : ?>
                                                    <div class="alert alert-danger">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <h4>Failed</h4>
                                                        <?php echo $has_data_err; ?>
                                                    </div>
                                                  <?php endif; ?>
                                                  <!-- alert message end -->

                                                  <?php $stu_name_cls = new Settings_controller(); if(isset($subjects)) : ?>

                                                    <div style="margin-top: 20px;"></div>

                                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                                      <tr>
                                                        <th style='min-width:100px'>Student Name</th>
                                                        <th style='min-width:80px'>Class Name</th>
                                                        <th style='min-width:100px'>Section Name</th>
                                                        <?php foreach($subjects as $sub) : ?>
                                                          <th style='min-width:140px;text-align:center'><?php echo $sub->SUBJECT_NAME; ?></th>
                                                        <?php endforeach; ?>
                                                        <th>Total</th>
                                                      </tr>
                                                      
                                                      <?php

                                                        foreach($students as $stupid) {
                                                          $res = $this->db->query("SELECT s.SUBJECT_NAME, m.CLASS_ID, m.EXAM_ID, m.SECTION_ID, m.MARK_OBTAINED, m.STUDENT_ID, m.SUBJECT_ID FROM subject AS s LEFT JOIN marks AS m ON s.SUBJECT_ID = m.SUBJECT_ID WHERE m.STUDENT_ID='".$stupid->STUDENT_DATA_ID."' AND m.EXAM_ID='".$exam_id."' AND m.CLASS_ID='".$class_id."' ORDER BY m.SUBJECT_ID")->result();
                                                          $res_data[] = $res;
                                                          // dd($res, true);
                                                          echo "<tr>";
                                                            echo "<td>". $stu_name_cls->student_name($res[0]->STUDENT_ID) ."</td>";
                                                            echo "<td>". $stu_name_cls->class_name($res[0]->CLASS_ID) ."</td>";
                                                            echo "<td>". $stu_name_cls->section_name($res[0]->SECTION_ID) ."</td>";


                                                            $x=0;
                                                            $total = array();
                                                            foreach($res as $papana) {

                                                              $total[] = $papana->MARK_OBTAINED;
                                                              if($subjects[$x]->SUBJECT_ID == $papana->SUBJECT_ID) {
                                                                if( $this->webspice->section_wise_subject_height_mark($class_id, $section_id, $papana->SUBJECT_ID, $exam_id, $year) == $papana->MARK_OBTAINED ) {
                                                                  echo "<td>". $papana->MARK_OBTAINED . "<img style='position:relative;top:-7px' width='20' src='". $url_prefix ."global/admin/images/star.png' /></td>";
                                                                }
                                                                else {
                                                                  echo "<td>". $papana->MARK_OBTAINED . "</td>";
                                                                }
                                                              }
                                                              else {
                                                                echo "<td></td>";
                                                              }
                                                              $x++;
                                                            }
                                                            echo "<td>". array_sum($total) ."</td>";
                                                          echo "</tr>";

                                                        }

                                                      ?>


                                                    </table>
                                                 <?php else: ?>
                                                  <!-- data nai vai -->
                                                <?php endif; ?>
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