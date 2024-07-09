<?php include(APPPATH."views/admin/admin_header.php"); ?>

        <div class="container" id="wrapper">
            <div id="page_payment_report" class="row-fluid page_identifier">
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
                                          <b>Payment Report</b>
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
                                    <div class="muted pull-left">Payment Report</div>
                                </div>
                                <div class="block-content collapse in" style="overflow: hidden;">
                                  <div class="span12">
                                    <!-- BEGIN FORM-->
                                    <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                      <input id="token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                      <fieldset>
                                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped">
                                          <tr>
                                            <th>Class Name</th>
                                            <!-- <th>Section Name</th> -->
                                            <th>Year</th>
                                            <th>Action</th>
                                          </tr>
                                          <tr>
                                            <td>
                                              <select id="class_list" class="span12 m-wrap" name="class_id">
                                                <option value="">Select...</option>
                                                <?php
                                                  $options = $this->db->query("SELECT CLASS_ID, CLASS_NAME FROM class WHERE STATUS = 7")->result();
                                                ?>
                                                <?php foreach($options as $option) : ?>
                                                  <option value="<?php echo $option->CLASS_ID?>" <?php echo (isset($edit['CLASS_ID']) && $edit['CLASS_ID'] == $option->CLASS_ID) ? "selected" : ""; ?> ><?php echo $option->CLASS_NAME ?></option>
                                                <?php endforeach; ?>
                                              </select>
                                            </td>
                                            <!-- <td>
                                                <select id="section_list" class="span12 m-wrap" name="section_id">
                                                  <option value="">Select...</option>
                                                  <?php
                                                  /*if(isset($edit['SECTION_ID'])) :
                                                    $options = $this->db->query("SELECT s.SECTION_ID, s.SECTION_NAME, c.CLASS_NAME FROM section AS s INNER JOIN class AS c ON s.CLASS_ID = c.CLASS_ID WHERE s.STATUS = 7")->result();*/
                                                  ?>
                                                  <?php //foreach($options as $option) : ?>
                                                    <option value="<?php //echo $option->SECTION_ID?>" <?php //echo (isset($edit['SECTION_ID']) && $edit['SECTION_ID'] == $option->SECTION_ID) ? "selected" : ""; ?> ><?php //echo $option->CLASS_NAME . ": " . $option->SECTION_NAME; ?></option>
                                                  <?php //endforeach; endif; ?>
                                                </select>
                                            </td> -->
                                            
                                            <td>
                                              <select name="year" class="span12 m-wrap">
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

                                                <div class="btn-group">
                                                   <a href="<?php echo $url_prefix . 'payment_report' ?>"><button class="btn btn-success">Refresh</button></a>
                                                </div>
                                            </td>
                                          </tr>
                                        </table>

                                            <div style="margin-top: 100px;"></div>

                                          <?php if(isset($students)) : ?>

                                            <table>
                                                <tr>
                                                  <td><p>Fee Type :</p></td>
                                                  <td><p>Admission</p></td>
                                                </tr>
                                                <tr>
                                                    <td><p>Class Name : </p></td>
                                                  <td><p><?php echo $class_name; ?></p></td>
                                                </tr>
                                            </table>

                                            <div style="margin-top: 20px;"></div>

                                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                              <tr>
                                                <th>Roll</th>
                                                <th>Receipt No</th>
                                                <?php
                                                  $col_list = array();
                                                  foreach($columns as $col) :
                                                    $col_list[] = str_replace(" ", "_", strtolower($col->CATEGORY_NAME));
                                                ?>
                                                  <th><?php echo $col->CATEGORY_NAME ?></th>
                                                <?php endforeach; ?>
                                                <th>Total</th>
                                              </tr>

                                              <?php
                                                // dd($col_list);
                                                $i=0;
                                                $col_total = array();
                                                $full_total = array();
                                                foreach($students as $val) :
                                                  // (array)$col_list[$i] = $val->AMOUNT;
                                                  $col_total[] = $val->AMOUNT;
                                              ?>
                                                <tr>
                                                  <td><?php echo $val->STUDENT_ID ?></td>
                                                  <td><?php echo $val->TRANS_ID; ?></td>
                                                  <?php
                                                    $total = array();
                                                    
                                                    foreach($columns as $c) :
                                                      $total[] = $c->AMOUNT;
                                                  ?>
                                                    <td><?php echo $c->AMOUNT; ?></td>
                                                  <?php endforeach; ?>
                                                  <td>
                                                    <?php
                                                      $all_total = array_sum($total);
                                                      $full_total[] = $all_total;
                                                      echo $all_total;
                                                    ?>
                                                  </td>
                                                </tr>
                                              <?php $i++; endforeach; ?>
                                                <tr>
                                                  <td></td>
                                                  <td><b>Total</b></td>
                                                  <?php foreach($fees as $fee) : ?>
                                                    <td><b><?php echo $fee->AMOUNT; ?></b></td>
                                                  <?php endforeach; ?>
                                                    <td><b><?php echo array_sum($full_total); ?></b></td>
                                                </tr>
                                              

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