<?php $url_prefix = $this->webspice->settings()->site_url_prefix; ?>			
		<div class="top-footer"><!--Top footer Section-->
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
						<div class="top-footer-area">
							<div class="col-md-3  col-lg-3 col-sm-6 col-xs-12">
								<h3>Cadet Colleges</h3>
								<div class="footer-list-item">
									<ul>
										<li><a target="_blank" href="https://fcc.army.mil.bd/">Faujdarhat Cadet College</a></li>
										<li><a target="_blank" href="http://www.jcc.army.mil.bd/#/">Jhenidah Cadet College</a></li>
										<li><a target="_blank" href="http://www.scc.army.mil.bd/#/">Sylhet Cadet College</a></li>
										<li><a target="_blank" href="http://www.mgcc.army.mil.bd/#/">Mymensingh Girls’ Cadet College</a></li>
										<li><a target="_blank" href="http://www.ccc.army.mil.bd/">Comilla Cadet College</a></li>
										<li><a target="_blank" href="http://www.mcc.army.mil.bd/">Mirzapur Cadet College</a></li>
										<li><a target="_blank" href="http://www.jgcc.army.mil.bd/">Joypurhat Girls Cadet College</a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-3  col-lg-3 col-sm-6 col-xs-12">
								<h3>Important Links:</h3>
								<div class="footer-list-item">
									<ul>
										<li><a target="_blank" href="http://www.educationboard.gov.bd/">Education Board Web</a></li>
										<li><a target="_blank" href="http://www.moedu.gov.bd/">Ministry Of Education</a></li>
										<li><a target="_blank" href="https://www.teachers.gov.bd/">Shikkhok Batayon</a></li>
										<li><a target="_blank" href="http://www.ebook.gov.bd/">National Ebook Portal</a></li>
										<li><a target="_blank" href="http://www.ictd.gov.bd/">ICT Division</a></li>
										<li><a target="_blank" href="http://www.dshe.gov.bd/">DSHE</a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-3  col-lg-3 col-sm-6 col-xs-12">
								<h3>Notice</h3>
								<div class="footer-list-item">
									<div class="list-wrpaaer" >
							            <ul class="list-aggregate" id="marquee-vertical">
							            	<?php foreach ($fnotice as $v): ?>
							               <li> <a href="<?php echo $url_prefix; ?>education/single_notice/<?php echo $v->NOTICE_ID; ?>"><?php echo $v->NOTICE_TITLE; ?></a></li>
							           <?php endforeach; ?>
							            </ul>
							        </div>
								</div>
							</div>
							<div class="col-md-3  col-lg-3 col-sm-6 col-xs-12">
								<h3>keep in touch</h3>
								<div class="footer-list-item">
									<p><strong>Comilla Yusuf High School</strong><br>
									Bozro pur, Adarsha Sadar, <br />Comilla, Bangladesh.</p>
									<p>Cell: +88 01712196729<br>
                                    </p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="last-footer"><!--last footer Section-->
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
						<div class="last-footer-area">
							<p style="float: left">&copy; Yusuf High School <?php echo date("Y"); ?></p>
							<p style="float: right">Developed By <a target="_blank" href="http://www.foxtechnologies.net/"> Fox Technologies</a> </p>
						</div>
					</div>
				</div>
			</div>
		</div>


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?php echo $url_prefix; ?>global/assets/js/jquery.min.1.12.4.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo $url_prefix; ?>global/assets/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- Light box image gallery -->
       <script src="<?php echo $url_prefix; ?>global/assets/js/lightbox/lightbox-plus-jquery.min.js"></script>

        <!-- Custom_Script -->
        <script src="<?php echo $url_prefix; ?>global/assets/js/custom_script.js" type="text/javascript"></script>

        <!-- Slider css -->
		
		<script src="<?php echo $url_prefix; ?>global/assets/js/flux.min.js" type="text/javascript" charset="utf-8"></script>
        <!-- end linking -->

        <!-- Marquee -->
        <script type="text/javascript" src="<?php echo $url_prefix; ?>global/assets/js/marquee/jquery.marquee.js"></script>

        <!-- Category Wise Gallery Link -->
        <script src="<?php echo $url_prefix; ?>global/assets/js/isotope.min.js"></script>
		<script src="<?php echo $url_prefix; ?>global/assets/js/isotope.function.js"></script>
        
  </body>
</html>