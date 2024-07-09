<?php $url_prefix = $this->webspice->settings()->site_url_prefix; ?>
<?php include(APPPATH."views/web_header.php"); ?>
<!-- Start Container area -->
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="container-section">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="about-us-area">
                            <div class="about-us">
                                <h3>Forms &amp; Downloads</h3>
                                <div class="button-area">
                                    <a class="btn btn-primary" href="<?php echo $url_prefix; ?>global/assets/images/admission_form.png" download>Download Form</a>
                                    <a target="_blank" class="btn btn-success" href="<?php echo $url_prefix; ?>print_form">Print Form</a>
                                    <a class="btn btn-danger" href="<?php echo $url_prefix; ?>online_application">Online Application</a>
                                </div>
                                <div class="home-about-img" style="width: 90%">
                                    <img src="<?php echo $url_prefix; ?>global/assets/images/admission_form.png" alt="Admission Form" class="img-responsive img-thumbnail">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Container area -->
<?php include(APPPATH."views/web_footer.php"); ?>