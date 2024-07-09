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
                                          <b>Average Marksheet</b>  
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
                                    <div class="muted pull-left">Average Marksheet</div>
                                </div>
                                <div class="block-content collapse in">
                                  <div class="span12">
                                    <!-- BEGIN FORM-->


                                    <!-- setup total mark for merit positing -->
                                    <?php
                                      if(isset($students)) {
                                        $merit_list = $this->db->query("SELECT sd.STUDENT_DATA_ID, sd.STUDENT_ID, sd.ROLL_NO, m.`EXAM_ID`, SUM(m.`MARK_OBTAINED`) AS TOTAL_MARK FROM student_data AS sd INNER JOIN marks AS m ON m.`STUDENT_ID`=sd.STUDENT_DATA_ID WHERE m.`CLASS_ID`='".$class_id."' AND m.`EXAM_ID` IN (".$exam_id.") AND m.`YEAR`='".$year."' GROUP BY m.`STUDENT_ID` ORDER BY TOTAL_MARK DESC")->result_array();
                                        // dd($merit_list);
                                        for($i=0; $i<count($merit_list); $i++) {
                                          array_push($merit_list[$i], $i+1);
                                        }
                                        // dd($merit_list);
                                      }


                                    ?>




                                    <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                        <input id="token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <fieldset>
                                               <table cellpadding="0" cellspacing="0" border="0" class="table table-striped">
                                                  <tr>
                                                      <th>Class Name</th>
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
                                                        <th>Student Name</th>
                                                        <th>Class Name</th>
                                                        <th>Section Name</th>
                                                        <?php foreach($subjects as $sub) : ?>
                                                          <th><?php echo $sub->SUBJECT_NAME; ?></th>
                                                        <?php endforeach; ?>
                                                        <th>Total</th>
                                                        <th>Merit List</th>
                                                      </tr>
                                                      
                                                      <?php
                                                      // dd($students);
                                                        foreach($students as $stupid) {
                                                          $res = $this->db->query("SELECT s.`SUBJECT_NAME`, m.`STUDENT_ID`, m.`SUBJECT_ID`, m.`CLASS_ID`, m.`SECTION_ID`, AVG(m.`MARK_OBTAINED`) AS MARK_OBTAINED FROM marks AS m INNER JOIN SUBJECT AS s ON s.`SUBJECT_ID`=m.`SUBJECT_ID` WHERE m.`CLASS_ID`='".$class_id."' AND m.`YEAR`='".$year."' AND m.`EXAM_ID`IN(".$exam_id.") AND m.`STUDENT_ID`='".$stupid->STUDENT_DATA_ID."' GROUP BY m.`SUBJECT_ID`, m.`STUDENT_ID`")->result();
                                                          // dd($this->db->last_query());
                                                          // dd($res);
                                                          $res_data[] = $res;
                                                          // dd($res[0]->student_id, true);
                                                          echo "<tr>";
                                                            echo "<td>". $stu_name_cls->student_name($res[0]->STUDENT_ID) ."</td>";
                                                            echo "<td>". $stu_name_cls->class_name($res[0]->CLASS_ID) ."</td>";
                                                            echo "<td>". $stu_name_cls->section_name($res[0]->SECTION_ID) ."</td>";


                                                            $x=0;
                                                            $total = array();
                                                            foreach($res as $papana) {

                                                              $total[] = $papana->MARK_OBTAINED;
                                                              if($subjects[$x]->SUBJECT_ID == $papana->SUBJECT_ID) {
                                                                // dd($this->webspice->average_class_wise_subject_highest_mark($class_id, $papana->SUBJECT_ID, $exam_id, $year), true);
                                                                if( $this->webspice->average_class_wise_subject_highest_mark($class_id, $papana->SUBJECT_ID, $exam_id, $year) == $papana->MARK_OBTAINED ) {
                                                                  echo "<td>". $papana->MARK_OBTAINED . "<img style='position:relative;top:-7px' width='20' src='". $url_prefix ."global/admin/images/star.png' /></td>";
                                                                }
                                                                else {
                                                                  echo "<td>". number_format($papana->MARK_OBTAINED, 2) . "</td>";
                                                                }
                                                              }
                                                              else {
                                                                echo "<td></td>";
                                                              }
                                                              $x++;
                                                            } // middle foreach end

                                                            $sub_total = array_sum($total)*count($all_list);
                                                            echo "<td>". $sub_total ."</td>";

                                                            foreach ($merit_list as $merit) {
                                                              if( ($stupid->STUDENT_DATA_ID==$merit['STUDENT_DATA_ID']) && ($sub_total==$merit['TOTAL_MARK']) ) {
                                                                echo "<td><span class='label label-success'>". $this->webspice->addOrdinalNumberSuffix($merit[0]) ."</span></td>";
                                                              }
                                                            }




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