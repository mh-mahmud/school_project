<?php $url_prefix = $this->webspice->settings()->site_url_prefix; ?>
<?php include(APPPATH."views/web_header.php"); ?>
<!-- Start Container area -->
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="container-section">
                    <div class="col-md-8 col-lg-8 col-sm-8 col-xs-12">
                        <div class="about-us-area">
                            <div class="about-us">
                                <h3>About Us</h3>
                                <div class="home-about-img">
                                    <img src="<?php echo $url_prefix; ?>global/assets/images/about.jpg" alt="about.jpg" class="img-responsive img-thumbnail">
                                </div>
                                <p>Shahid Cadet Academy" is one of the best Cadet Coatchig academy in Bangladesh. We proides a specialiest and high quality comprehensive education as preparation for study cadet colleges, and reputed school/colleges in Bangladesh.</p>
                            </div>
                            <div class="why-us">
                                <h3>Why Us?</h3>
                                <p>Shahid Cadet Academy is one of the top Cadet Coatching Academy in Bangladesh.</p>

                                    <ul>
                                        <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> Shahid Catet Academy is conducted by the retired principal and teachers of cadet college.</li>
                                        <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> We have branches in all districts of Bangladesh.</li>
                                        <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> We have liability in education system.</li>
                                        <li> <i class="fa fa-hand-o-right" aria-hidden="true"></i> There is no traditional commercial education system rather through ideal     education to enlight the students is our goal.</li>
                                        <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> It is only the institute from where every year maxum/highest students get chance in different cadet colleges.</li>
                                        <li> <i class="fa fa-hand-o-right" aria-hidden="true"></i> We have modern and hygienic residential system that is essential for the students.</li>
                                        <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> Here meal item and system is very nice.</li>
                                        <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> For heath care, There is M.B.BS Doctor.</li>
                                        <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> Caram, Chess, Ludu, are available for indoor game here.</li>
                                        <li> <i class="fa fa-hand-o-right" aria-hidden="true"></i> Students get chance to go outside with their teachers once in a weak.</li>
                                        <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> N:B: Those who are interested to get admitted into cadet college, contact us after the PSC examination.</li>                              
                                        <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> Functions: (Play-Twelve) class, Bengali & English version curriculum
                                        There is fair system for PSC, JSC, SSC & HSC Examination.</li>
                                    </ul>
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