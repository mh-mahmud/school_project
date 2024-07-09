<?php $url_prefix = $this->webspice->settings()->site_url_prefix; ?>
<?php include(APPPATH."views/web_header.php"); ?>
<!-- Start Container area -->
<div class="main-container">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<div class="container-section">
					<div class="col-md-8 col-lg-8 col-sm-8 col-xs-12">
						<div class="single-teacher-area">
							<div class="row">
								<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">&nbsp;</div>
								<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
									<div class="single-teacher-img">
										<img src="<?php echo $this->webspice->get_path('teacher').$teacher['TEACHER_ID'].'.jpg'; ?>" class="img-responsive img-thumbnail">
									</div>
									<div class="teacher-info">
											<h3><?php echo $teacher['TEACHER_NAME']; ?></h3>											
											<p>(<?php $desig = $this->db->get_where("designation", array("DESIGNATION_ID"=>$teacher['DESIGNATION_ID']))->row();echo $desig->DESIGNATION_NAME; ?>)</p>
									</div>
								</div>
								<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">&nbsp;</div>
							</div>
							<div class="row">
								<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
									<div class="single-teacher-info-table">
										<table>
											<tr>
												<td><b>Name </b></td>
												<td><?php echo $teacher['TEACHER_NAME']; ?></td>
											</tr>
											<tr>
												<td> <b>Post</b> </td>
												<td><?php $desig = $this->db->get_where("designation", array("DESIGNATION_ID"=>$teacher['DESIGNATION_ID']))->row();echo $desig->DESIGNATION_NAME; ?></td>
											</tr>
											<tr>
												<td><b>Gender</b> </td>
												<td><?php echo $teacher['GENDER']; ?></td>
											</tr>
											<tr>
												<td><b>Bload Group </b> </td>
												<td>O+</td>
											</tr>
											<tr>
												<td><b>Religion</b> </td>
												<td><?php echo $teacher['RELIGION']; ?></td>
											</tr>
											<tr>
												<td><b>Qualification</b> </td>
												<td><?php echo $teacher['EDUCATIONAL_BACK']; ?></td>
											</tr>
											<tr>
												<td><b>Mobile </b> </td>
												<td><?php echo $teacher['PHONE']; ?></td>
											</tr>
											<tr>
												<td><b>Email </b> </td>
												<td><?php echo $teacher['EMAIL']; ?></td>
											</tr>
										</table>
									</div>
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