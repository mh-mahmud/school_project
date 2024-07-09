<?php include(APPPATH."views/admin/admin_header.php"); ?>

        <div class="container" id="wrapper">
            <div id="page_daily_attendance" class="row-fluid page_identifier">
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
                                          <b>Download CSV File</b>
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
                            <div class="muted pull-left">Download CSV File</div>
                          </div>
                          <div class="block-content collapse in" style="overflow:hidden !important;margin-top:50px;margin-bottom:50px">
                            <div class="span12">

                              <div class="text-center">
                                <a class="btn btn-success" href="<?php echo $url_prefix ?>global/csv_demo/main.csv">Download</a>
                                <a class="btn btn-info" href="<?php echo $url_prefix ?>global/csv_demo/demo.csv">Demo File</a>
                              </div>

                            </div>
                          </div>
                        </div>
                        <!-- /block -->
                      </div>
                      <!-- /validation -->
                    
                    
                    
                </div>
        
            </div>
            
<?php include(APPPATH."views/admin/admin_footer.php"); ?>