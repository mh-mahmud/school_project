<?php $url_prefix = $this->webspice->settings()->site_url_prefix; ?>
<?php include(APPPATH."views/web_header.php"); ?>
<!-- Start Container area -->
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="container-section">
                    <div class="col-md-8 col-lg-8 col-sm-8 col-xs-12">
                        <div class="routine-area">
                            <h3>Routine Class <?php echo $class_name; ?> (<?php echo $section_name; ?>)</h3>
                            <p>CLASS ROUTINE-2016</p>
                            <h5>Class <?php echo $class_name; ?> (<?php echo $section_name; ?>)</h5>

                              <!-- TABLE LISTING STARTS -->
                            <div class="tab-pane active" id="list">
                                  <div class="panel-group joined" id="accordion-test-2">
                                  <?php 
                                  //$toggle = true;
                                  //$classes = $this->db->get('class')->result_array();
                                  //foreach($classes as $row):
                                  ?>


                                  <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapse<?php //echo $row['class_id'];?>">
                                            <i class="entypo-rss"></i> Class <?php echo $class_name; ?> (<?php echo $section_name; ?>)
                                        </a>
                                        </h4>
                                    </div>

                                    <div id="collapse<?php //echo $row['class_id'];?>" class="panel-collapse  <?php //if($toggle){echo 'in';$toggle=false;}?>">
                                        <div class="panel-body">
                                            <table cellpadding="0" cellspacing="0" border="0"  class="table table-bordered">
                                                <tbody>
                                                  <?php
                                                  // $ROUTINE = new Student_controller();
                                                  for($d=1;$d<=7;$d++):

                                                    if($d==1)$day='Sunday';
                                                    else if($d==2)$day='Monday';
                                                    else if($d==3)$day='Tuesday';
                                                    else if($d==4)$day='Wednesday';
                                                    else if($d==5)$day='Thursday';
                                                    else if($d==6)$day='Friday';
                                                    else if($d==7)$day='Saturday';
                                                    ?>
                                                    <tr class="gradeA">
                                                      <td width="100"><?php echo strtoupper($day);?></td>
                                                      <td>
                                                        <?php
                                                        // $this->db->order_by("ROUTINE_ID", "ASC");
                                                        $this->db->order_by("TIME_FROM", "DESC");
                                                        $this->db->where('DAY' , $day);
                                                        $this->db->where('SECTION_ID' , $section_id);
                                                        $routines = $this->db->get('class_routine')->result_array();
                                                        // dd($routines, true);
                                                        foreach($routines as $row2):
                                                        ?>
                                                          <div class="btn-group">
                                                            <button class="btn-danger" data-toggle="dropdown">
                                                              <?php echo $this->webspice    ->subject_name($row2['SUBJECT_ID']);?>
                                                              <?php echo '('.$row2['TIME_FROM'].'-'.$row2['TIME_TO'].')';?>
                                                              <br />
                                                              <?php
                                                                $teacher = $this->db->query("SELECT TEACHER_NAME FROM teacher WHERE TEACHER_ID=".$row2['TEACHER_ID'])->row()->TEACHER_NAME;
                                                                echo $teacher;
                                                              ?>
                                                             
                                                            </button>
                                                            
                                                          </div>
                                                        <?php endforeach;?>

                                                      </td>
                                                    </tr>
                                                  <?php endfor;?>
                                                    
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                    </div>
                                  </div>
                                  <?php
                                  //endforeach;
                                  ?>
                        </div>    <!-- TABLE LISTING ENDS -->
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

                        <div class="exam-list right-exam-list">
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