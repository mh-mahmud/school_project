<?php include(APPPATH."views/admin/admin_header.php"); ?>
<style type="text/css">
  .calendar {
    font-family: Arial;
    font-size: 12px;
  }
  table.calendar {
    margin: auto;
    border-collapse: collapse;
  }
  .calendar .days td {
    width: 80px;
    height: 80px;
    padding: 4px;
    border: 1px solid #999;
    vertical-align: top;
    background-color: #DEF;
  }
  .calendar .highlight {
    font-weight: bold;
    color: #00f;
  }
  .calendar .days td:hover {
    background-color: #FFF;
  }
</style>

        <div class="container" id="wrapper">
            <div id="page_my_calendar" class="row-fluid page_identifier">
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
                                          <b>Event Calendar</b>  
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
                                    <div class="muted pull-left">Event Calendar</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                      <div class="calendar_style">
                                        <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                            <input id="token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                                            <?php echo $calendar; ?>

                                        </form>
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
<script type="text/javascript">
  $(document).ready(function() {

  });
</script>