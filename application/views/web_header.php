<?php $url_prefix = $this->webspice->settings()->site_url_prefix; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $siteTitle; ?></title>
    	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
        <!-- Bootstrap_CSS -->
        <link href="<?php echo $url_prefix; ?>global/assets/css/bootstrap.min.css" rel="stylesheet">
        
        <!--Start Font Awesome -->
		<link rel="stylesheet" href="<?php echo $url_prefix; ?>global/assets/css/font-awesome.min.css" />
        
        <!-- Sustom_CSS -->
		<link href="<?php echo $url_prefix; ?>global/assets/css/style.css" rel="stylesheet">
        
        <!-- Responsive_CSS -->
        <link href="<?php echo $url_prefix; ?>global/assets/css/responsive.css" rel="stylesheet">

        <!-- Light box image gallery -->
        <link rel="stylesheet" href="<?php echo $url_prefix; ?>global/assets/css/lightbox.min.css">   
  </head>
  <body>
  		<div class="top_header_section"><!--Top_Header_Section-->
            <div class="container">
            	<div class="row">
                	<div class="col-md-12">
                        <div class="top_header_inner_section">
                            <a href="<?php echo $url_prefix; ?>"><img src="<?php echo $url_prefix; ?>global/assets/images/logo.png" alt="#" class="img-responsive"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--End_Top_Header_Section-->
        
        <div class="menu-area"><!--Top_Menu_Section-->
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
						<div class="menu">
							<nav class="navbar navbar-inverse navbar-custom">
							<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
								  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								  </button>
								</div>

								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								  <ul class="nav navbar-nav">
									<li  <?php if (isset($sitemenu) && $sitemenu == "home") { echo 'class="current"'; }?>><a href="<?php echo $url_prefix; ?>">Home</a></li>
									<li <?php if (isset($sitemenu) && $sitemenu == "admission") { echo 'class="current"'; }?> ><a href="<?php echo $url_prefix; ?>admission">Admission</a></li>
									<li <?php if (isset($sitemenu) && $sitemenu == "forms") { echo 'class="current"'; }?> ><a href="<?php echo $url_prefix; ?>forms">Forms &amp; Downloads</a></li>
									<li <?php if (isset($sitemenu) && $sitemenu == "notice") { echo 'class="current"'; }?> ><a href="<?php echo $url_prefix; ?>front_notice">News</a></li>
									<li <?php if (isset($sitemenu) && $sitemenu == "gallery") { echo 'class="current"'; }?>><a href="<?php echo $url_prefix; ?>gallery">Photo Gallery</a></li>
									<li <?php if (isset($sitemenu) && $sitemenu == "career") { echo 'class="current"'; }?>><a href="#">Career</a></li>
									<li <?php if (isset($sitemenu) && $sitemenu == "contact") { echo 'class="current"'; }?>><a href="<?php echo $url_prefix; ?>contact">Contact Us</a></li>
									<li <?php if (isset($sitemenu) && $sitemenu == "elibrary") { echo 'class="current"'; }?>><a href="#">e-Library</a></li>
									<li <?php if (isset($sitemenu) && $sitemenu == "team") { echo 'class="current"'; }?>><a href="#">Board Members</a></li>


									


									<!-- <li <?php //if (isset($sitemenu) && $sitemenu == "about") { echo 'class="current"'; }?> ><a href="<?php //echo $url_prefix; ?>about">About us <?php //echo $sitemenu ?></a></li>
									<li <?php //if (isset($sitemenu) && $sitemenu == "teacher") { echo 'class="current"'; }?> class="dropdown">
									  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Teacher Info<i class="fa fa-angle-down" aria-hidden="true"></i></a>
									  	<ul class="dropdown-menu">
											<li class="dropdown-submenu"><a class="test" tabindex="-1" href="<?php //echo $url_prefix; ?>teacher">Teacher List</a></li>
									  	</ul>
									</li>
									<li <?php //if (isset($sitemenu) && $sitemenu == "syllabus") { echo 'class="current"'; }?>><a href="<?php //echo $url_prefix; ?>syllabus">Syllabus</a></li>
									<li <?php //if (isset($sitemenu) && $sitemenu == "calender") { echo 'class="current"'; }?>><a href="<?php //echo $url_prefix; ?>education/display">Event Calender</a></li>
									<li <?php //if (isset($sitemenu) && $sitemenu == "routine") { echo 'class="current"'; }?>><a href="<?php //echo $url_prefix; ?>routine">Routine</a></li>
									
									<li <?php //if (isset($sitemenu) && $sitemenu == "video") { echo 'class="current"'; }?>><a href="<?php //echo $url_prefix; ?>video">Video</a></li>
									<li class="dropdown"   >
									  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Others<i class="fa fa-angle-down" aria-hidden="true"></i></a>
									  	<ul class="dropdown-menu">
											<li <?php //if (isset($sitemenu) && $sitemenu == "notice") { echo 'class="current"'; }?>  ><a class="test" tabindex="-1" href="<?php //echo $url_prefix; ?>education/notice">Notice</a></li>
											<li><a class="test" tabindex="-1" href="<?php //echo $url_prefix; ?>cultural_activity">cultural activities</a></li>
											<li><a class="test" tabindex="-1" href="<?php //echo $url_prefix; ?>achievement">our achievement</a></li>
									  	</ul>
									</li> -->

								  </ul>
								</div><!-- /.navbar-collapse -->
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div><!--End_Menu_Section-->
