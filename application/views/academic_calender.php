<?php $url_prefix = $this->webspice->settings()->site_url_prefix; ?>
<?php include(APPPATH."views/web_header.php"); ?>
<!-- Start Container area -->
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="container-section">
                    <div class="col-md-8 col-lg-8 col-sm-8 col-xs-12">
			            <div class="col-md-12 col-lg-12">
			            	<h3>Academic Calender</h3>
							<style type="text/css">
							  .calendar {
							    font-family: Arial;
							    font-size: 12px;
							  }
							  table.calendar {
							    margin: auto;
							    border-collapse: collapse;
							  }

							  .calendar .trmonth{
							  	text-align: center;
							  	height: 40px;
							  }

							  .trmonth .monthnm{
							  	text-align: center;
							  }

							  .trmonth .monnxt{
							  	float: right;
							  }

							  .calendar .trheader{
							  	background-color: #2D8686 !important;
							  	text-align: center;
							  	height: 40px;
							  	border: 1px solid #000;
							  	color: #fff;
							  }

							  .calendar .trheader td{
							  	border-left: 1px solid #000;
							  }

							  .calendar .days td {
							    width: 80px;
							    height: 80px;
							    padding: 4px;
							    border: 1px solid #999;
							    vertical-align: top;
							    background-color: #f2f2f2;
							  }
							  .calendar .highlight {
							    font-weight: bold;
							    color: #00f;
							  }
							  .calendar .days td:hover {
							    background-color: #FFF;
							  }
							</style>

				            <div id="page_my_calendar" class="row-fluid page_identifier">
				                <div class="span12" id="content">

				                         <!-- validation -->
				                        <div class="row-fluid">
				                             <!-- block -->
				                            <div class="block">
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