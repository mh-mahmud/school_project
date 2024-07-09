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
									

									<?php $i=0; foreach($messages as $msg) : ?>
                                        <li role="presentation" <?php echo ($i==0) ? "class='active'" : ""; ?>><a href="#<?php echo $msg->PERSON_ID; ?>" role="tab" data-toggle="tab"><?php echo $msg->PERSON_TYPE; ?></a></li>
                                    <?php $i++; endforeach; ?>

								</ul>

								<!-- Tab panes -->
								<div class="tab-content">
									<?php $x=0; foreach($messages as $pan_data) : ?>
										<div role="tabpanel" <?php
											if($x==0) {
												echo 'class="tab-pane active"';
											}
											else {
												echo 'class="tab-pane"';
											}
										?> id="<?php echo $pan_data->PERSON_ID; ?>">
											<div class="messages-area">
												<div class="principal-photo">
													<img src="<?php echo $this->webspice->get_path('person').$pan_data->PERSON_ID.'.jpg'; ?>" class="img-thumbnail">
													<h4><?php echo $pan_data->NAME; ?></h4>
												</div>
												<p>
													<?php echo $pan_data->DETAILS; ?>
												</p>
											</div>
										</div>
									<?php $x++; endforeach; ?>
								</div>
							</div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
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
                        <p>
                            কুমিল্লাইউসুফ হাই স্কুল একটি ঐতিহ্যবাহী শিক্ষা প্রতিষ্ঠান। পশ্চিমগাঁ নিবাসী জনাব আলী নওয়াব চৌধুরী ১৮৭৯ সালে তাঁর পিতার নামানুসারে এই বিদ্যালয়টি প্রতিষ্ঠা করেন। অত্র বিদ্যালয়ের হাজার হাজার ছাত্র দেশে ও বিদেশে জাতির কল্যাণমূলক কাজে নিয়োজিত। তাছাড়া শিক্ষাবিদ, সাহিত্যিক, শিল্পী, রাজনীতিবিদ, অফিস ও প্রশাসনিক পদে অত্র বিদ্যালয়ের অনেক ছাত্র প্রতিষ্ঠিত রয়েছেন। ১৯৭৫ সালে অত্র বিদ্যালয়ের ছাত্র মোঃ ইসরাফিল এস.এস.সি পরীক্ষায় কুমিল্লা বোর্ডে মেধা তালিকায় প্রথম স্থান অধিকার করেন।
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="home-login-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="user-login-area">
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                            <div class="login-section">
                                <img src="<?php echo $url_prefix; ?>global/assets/images/teacher-pannel.png" class="img-responsive">
                                <div class="login-text">
                                    <h2><a target="_blank" href="<?php echo $url_prefix; ?>admin">Teacher's Pannel</a></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                            <div class="login-section">
                                <img src="<?php echo $url_prefix; ?>global/assets/images/parent-pannel.png" class="img-responsive">
                                <div class="login-text">
                                    <h2><a  target="_blank" href="<?php echo $url_prefix; ?>admin">Parent's Pannel</a></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                            <div class="login-section">
                                <img src="<?php echo $url_prefix; ?>global/assets/images/student-pannel.png" class="img-responsive">
                                <div class="login-text">
                                    <h2><a target="_blank" href="<?php echo $url_prefix; ?>admin">Student's Pannel</a></h2>
                                </div>
                            </div>
                        </div>
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
                    <?php foreach ($video as $v):?>
                        <div class="video-section">
                            <iframe width="420" height="315" src="<?php echo $v->EMBED_CODE; ?>" frameborder="0" allowfullscreen></iframe>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="home-our-achievement">
                        <h3>Our Achievement</h3>
                        <?php foreach($achievement as $v): ?>
                            <div class="home-our-achievement-img">
                                <?php if( file_exists($this->webspice->get_path('achievement_full').$v->ACHIEVEMENT_ID.'.jpg') ): ?>
                                  <img src="<?php echo $this->webspice->get_path('achievement').$v->ACHIEVEMENT_ID.'.jpg'; ?>"  alt="" class="img-responsive img-thumbnail" width="100%;"/>
                                <?php endif;  ?>
                                <h4><?php echo $v->TITLE; ?></h4>
                                <p><?php echo $v->DETAILS; ?><a href="<?php echo $url_prefix; ?>education/single_achievement/<?php echo $v->ACHIEVEMENT_ID; ?>">Read More <i aria-hidden="true" class="fa fa-chevron-right example-imag"></i><i aria-hidden="true" class="fa fa-chevron-right example-imag"></i></a></p>
                            </div>
                        <?php endforeach; ?>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Container area -->
<?php include(APPPATH."views/web_footer.php"); ?>