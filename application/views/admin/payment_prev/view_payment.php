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
                                          <b>Admission Payment</b>
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
                                  <div class="muted pull-left">Admission Payment</div>
                              </div>
                              <div class="block-content collapse in" style="overflow: hidden !important;">
                                <div class="span6">
                                  <!-- BEGIN FORM-->
                                  <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">
                                    <input id="token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <fieldset>
                                    <p><b>Admission Fees</b></p>
                                    <table class="table">
                                      <tr>
                                        <th>No</th>
                                        <th>Fee Type</th>
                                        <th>Amount</th>
                                      </tr>
                                      <?php
                                      $i=1;
                                      $tot = array();
                                      foreach($trans_data as $service) :
                                        $tot[] = $service->AMOUNT;
                                      ?>
                                        <tr>
                                          <td><?php echo $i; ?></td>
                                          <td>
                                            <?php
                                              $cat_name = $this->db->query("SELECT c.CATEGORY_NAME FROM category_list AS c INNER JOIN ie_payment AS ip ON ip.CAT_LIST_ID=c.LIST_ID WHERE ip.IE_CAT_ID='".$service->IE_CAT_ID."'")->row();
                                              echo $cat_name->CATEGORY_NAME;
                                            ?>
                                          </td>
                                          <td><?php echo $service->AMOUNT; ?></td>
                                        </tr>
                                      <?php $i++; endforeach; ?>
                                        <tr>
                                          <td></td>
                                          <td><b>Total</b></td>
                                          <td><b><?php echo array_sum($tot); ?></b></td>
                                        </tr>
                                    </table>
                                    <br />
                                    <!-- <p><b>Monthly Fees</b></p>
                                    <table class="table">
                                      <tr>
                                        <th>No</th>
                                        <th></th>
                                        <th>Month Name</th>
                                      </tr>
                                      <?php
                                        /*$months = array(
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
                                        foreach($months as $k=>$v) :*/
                                          
                                      ?>
                                        <tr>
                                          <td><?php //echo $x; ?></td>
                                          <td>
                                            <input type="checkbox" name="month[]" id="<?php //echo $k; ?>" value="<?php //echo $k; ?>">
                                          </td>
                                          <td><?php //echo $v; ?></td>
                                        </tr>
                                      <?php //$x++; endforeach; ?>
                                    </table>
                                    <span class="fred"><?php //echo form_error('month'); ?></span> -->
                                        
                                      <div class="form-actions">
                                          <a target="_blank" class="btn btn-info" href="<?php echo $url_prefix; ?>manage_admission_payment/money_recipt/<?php echo $this->webspice->encrypt_decrypt($trans_data[0]->TRANS_ID, 'encrypt'); ?>">Print Money Recipt</a>

                                          <a class="btn btn-danger" href="<?php echo $url_prefix; ?>manage_admission_payment">Back</a>
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