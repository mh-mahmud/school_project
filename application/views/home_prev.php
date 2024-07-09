<?php include(APPPATH."views/web_header.php"); ?>

<?php $url_prefix = $this->webspice->settings()->site_url_prefix; ?>
<?php include(APPPATH."views/slider.php"); ?>

<!-- Start Container area -->
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="container-section">
                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                        <div class="message-form-school">
                            <div>
                                <ul class="nav nav-pills" role="tablist">
                                <?php 
                                $current_tab = $messages[0]['PERSON_TYPE'];
                                //dd($current_tab);
                                foreach ($messages as $v): 
                                $tab_class = ($v['PERSON_TYPE']==$current_tab) ? 'active' : '' ;
                                ?>
                                    <li role="presentation" class="<?php echo $tab_class; ?>"><a href="#<?php echo $v['PERSON_TYPE']; ?>" aria-controls="home" role="tab" data-toggle="tab"><?php echo $v['PERSON_TYPE']; ?></a></li>
                                <?php endforeach; ?>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <?php foreach ($messages as $row2): 
                                         $tab = $row2['PERSON_TYPE'];
                                          $content_class = ($tab==$current_tab) ? 'active' : '' ;
                                    ?>
                                        <div role="tabpanel" class="tab-pane <?php echo $content_class;?>" id="<?php echo $tab;?>">
                                            <?php foreach($messages as $item): 
                                                if($item['PERSON_TYPE'] == $tab){
                                            ?>
                                                <div class="messages-area">
                                                    <div class="principal-photo">
                                                        <img src="<?php echo $url_prefix;?>global/assets/images/principal.jpg" class="img-thumbnail">
                                                        <h4><?php echo $item['NAME']; ?></h4>
                                                    </div>
                                                    <p><?php echo $item['DETAILS']; ?></p>
                                                </div>
                                            <?php } endforeach; ?>
                                        </div>
                                    <?php endforeach; ?>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                        <div class="home-cultural-activity">
                            <h3>Cultural Activity</h3>
                            <div class="home-cultural-img">
                                <img src="<?php echo $url_prefix; ?>global/assets/images/cultural.jpg" class="img-responsive img-thumbnail" alt="cultural.jpg">
                                <p>Gone are the days when only academic programs were the only activities <a href="">Read More</a></p>

                                <p class="home-cultural-p"><a href="<?php echo $url_prefix; ?>cultural_activity">View All Activity <i class="fa fa-chevron-right example-imag" aria-hidden="true"></i><i class="fa fa-chevron-right example-imag" aria-hidden="true"></i></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="home-gallery-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8 col-sm-8 col-xs-12">
                    <div class="home-gallery-section">
                        <h3>Our Gallery</h3>
                         <?php foreach ($gallery as $v): ?>
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="h-gallery-img">
                                <a class="example-image-link" href="<?php echo $this->webspice->get_path('gallery').$v->IMAGE_ID.'.jpg'; ?>" data-lightbox="example-1">
                                    <img src="<?php echo $this->webspice->get_path('gallery').$v->IMAGE_ID.'.jpg'; ?>" class="img-responsive example-imag" height= alt="gallery-image">
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                        <p><a href="<?php echo $url_prefix; ?>gallery">View All Photo <i class="fa fa-chevron-right example-imag" aria-hidden="true"></i></a></p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                    <div class="home-about-us">
                        <h3>About Us</h3>
                        <div class="home-about-img">
                            <img src="<?php echo $url_prefix; ?>global/assets/images/about.jpg" alt="about.jpg" class="img-responsive img-thumbnail">
                        </div>
                        <p>Shahid Cadet Academy" is one of the best Cadet Coatchig academy in Bangladesh. We proides a specialiest and high quality comprehensive education as preparation for study cadet colleges, and reputed school/colleges in Bangladesh.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="home-student-info">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8 col-sm-8 col-xs-12">
                    <h3>Student Info</h3>
                    <div class="student-info-table">
                        <table>
                            <tr>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Total Student</th>
                            </tr>
                            <?php foreach ($class as $v): ?>
                            <tr>
                                <td><?php echo $v->CLASS_NAME; ?></td>
                                <td><?php $section = $this->db->get_where("section", array("CLASS_ID"=>$v->CLASS_ID))->result();
                                        echo count($section);
                                    ?></td>
                                <td><?php $student = $this->db->get_where("student_data", array("CLASS_ID"=>$v->CLASS_ID))->result();
                                        echo count($student);
                                    ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </table>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                    <div class="exam-list">
                        <h3>Exam</h3>
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
                </div>
            </div>
        </div>
    </div>
    <div class="home-student-info">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8 col-sm-6 col-xs-12">
                        <h3>Our Activities on Video</h3>
                    <div class="video-section">
                        <iframe width="420" height="315" src="https://www.youtube.com/embed/L82KFk8Ng1I" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="home-our-achievement">
                        <h3>Our Achievement</h3>
                        <div class="home-our-achievement-img">
                            <img src="<?php echo $url_prefix; ?>global/assets/images/achievement.jpg" class="img-responsive img-thumbnail" alt="cultural.jpg">
                            <p>In 2012, The Office of the Dean of the Faculty of UGSM-Monarch Business School Switzerland created the Monarch Honor Medals For Achievement within the Doctoral programs. Three levels have been distinguished as: Bronze, Silver and Gold and the Monarch Honor<a href="our-achievement.html">Read More <i aria-hidden="true" class="fa fa-chevron-right example-imag"></i><i aria-hidden="true" class="fa fa-chevron-right example-imag"></i></a></p>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Container area -->
<?php include(APPPATH."views/web_footer.php"); ?>