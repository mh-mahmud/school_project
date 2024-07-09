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
                                          <b>Monthly Payment</b>
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
                                  <div class="muted pull-left">Monthly Payment</div>
                              </div>
                              <div class="block-content collapse in" style="overflow: hidden !important;">
                                <div class="span6">
                                  <!-- BEGIN FORM-->
                                  <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">
                                    <input id="token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <fieldset>
                                    <p><b>Monthly Fees</b></p>
                                    <table class="table">
                                      <tr>
                                        <th>No</th>
                                        <th>Fee Type</th>
                                        <th>Amount</th>
                                      </tr>
                                      <?php
                                      $i=1;
                                      $tot = array();
                                      foreach($services as $service) :
                                        $tot[] = $service->AMOUNT;
                                      ?>
                                        <tr>
                                          <td><?php echo $i; ?></td>
                                          <td><?php echo $this->webspice->category_val($service->CAT_LIST_ID)->CATEGORY_NAME; ?></td>
                                          <td><?php echo $service->AMOUNT; ?> /-</td>
                                        </tr>
                                      <?php $i++; endforeach; ?>
                                        <tr>
                                          <td></td>
                                          <td><b>Total</b></td>
                                          <td><b><?php echo array_sum($tot); ?> /-</b></td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td>Less Amount / Scholarship</td>
                                          <td>
                                            <input type="text" name="discount">
                                            <span class="fred"><?php echo form_error('discount'); ?></span>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                    </table>
                                    <br /><br /><br />
                                    <p><b>Month Name</b><span> (select months) </span></p>
                                    <table class="table">
                                      <tr>
                                        <th>No</th>
                                        <th>Check Box</th>
                                        <th>Month Name</th>
                                      </tr>
                                      <?php
                                        $months = array(
                                          'january'   => 'January',
                                          'february'  => 'February',
                                          'march'     => 'March',
                                          'april'     => 'April',
                                          'may'       => 'May',
                                          'june'      => 'June',
                                          'july'      => 'July',
                                          'august'    => 'August',
                                          'september' => 'September',
                                          'october'   => 'October',
                                          'november'  => 'November',
                                          'december'  => 'December'
                                        );
                                        $x=1;
                                        foreach($months as $k=>$v) :
                                          if(!in_array($k, $paid_months)) :
                                      ?>
                                        <tr>
                                          <td><?php echo $x; ?></td>
                                          <td>
                                            <input type="checkbox" name="month[]" id="<?php //echo $k; ?>" value="<?php echo $k; ?>">
                                          </td>
                                          <td><?php echo $v; ?></td>
                                        </tr>
                                      <?php $x++; endif; endforeach; ?>
                                    </table>
                                    <span class="fred"><?php echo form_error('month'); ?></span>
                                        
                                      <div class="form-actions">
                                          <input type="submit" name="submit" class="btn btn-primary" value="Submit Data"  />
                                          <button type="button" class="btn">Cancel</button>
                                      </div>
                                    </fieldset>
                                  </form>
                                  <!-- END FORM-->
                                </div>

                                <div class="span6">
                                    <!-- <fieldset> -->

                                      
                                          
                                      <div class=" pull-left">
                                        <?php if( file_exists($this->webspice->get_path('student_full').$student_id.'.jpg') ): ?>
                                            <img src="<?php echo $this->webspice->get_path('student').$student_id.'.jpg'; ?>"  alt="" class="img-responsive" width="150px;"/>
                                        <?php endif;  ?>
                                      </div>

                                      <div class="pull-left" style="margin-left: 30px">
                                        <table class="table table-bordered ">
                                        <?php foreach($student_data as $key=>$val) : ?>
                                          <tr>
                                            <td width="150">
                                              <?php
                                                $str = str_replace("_", " ", ucwords(strtolower($key)));
                                                echo $str;
                                              ?>
                                            </td>
                                            <td width="150"><?php echo $val; ?></td>
                                          </tr>
                                        <?php endforeach; ?>
                                        </table>
                                      </div>

                                    <!-- </fieldset> -->
                                </div>
                              </div>
                            </div>
                            <!-- /block -->
                        </div>
                         <!-- /validation -->
                    
                    
                    
                </div>
        
            </div>
            
<?php include(APPPATH."views/admin/admin_footer.php"); ?>