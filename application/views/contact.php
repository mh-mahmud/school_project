<?php $url_prefix = $this->webspice->settings()->site_url_prefix; ?>
<?php include(APPPATH."views/web_header.php"); ?>
<!-- Start Container area -->
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="container-section">
                    <div class="col-md-8 col-lg-8 col-sm-8 col-xs-12">
                        <div class="contact-form">
                            <?php 
                                $msg = $this->session->flashdata('msg');
                                if($msg != NULL){
                                    echo "<h3 style='text-align:center; color: #CB2430;'>". $msg ."</h3>";
                                }
                            ?>
                            <h3>Send A Message</h3>
                            <form action="<?php echo $url_prefix;?>education/insert" method="post">
                                 <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><i class="fa fa-user" aria-hidden="true"></i>Name</label>
                                        <input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>" aria-describedby="textHelp">
                                        <?php  echo form_error('name'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><i class="fa fa-envelope" aria-hidden="true"></i>Email</label>
                                        <input type="email" name="email" class="form-control" value="<?php echo set_value('email'); ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        <?php  echo form_error('email'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Subject</label>
                                        <input type="text" name="subject" value="<?php echo set_value('subject'); ?>" class="form-control" id="exampleInputText1" aria-describedby="textHelp">
                                        <?php  echo form_error('subject'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><i class="fa fa-weixin" aria-hidden="true"></i>Comments</label>
                                        <textarea name="comments" class="form-control" id="exampleTextarea" rows="6"></textarea>
                                         <?php  echo form_error('comments'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                    <button type="submit" class="btn">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="contact-map">
                            <div class="iframe-container">
                                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6676.846066883114!2d89.97500838330475!3d24.223463679718694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fdff394766bcef%3A0xe93ff817ee624f8a!2sKorotia+Bazar%2C+Korotia+Rd%2C+Karatia%2C+Bangladesh!5e0!3m2!1sen!2s!4v1473049816795" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3659.8963410508013!2d91.18351721433258!3d23.464203305567207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37547f30a32a2381%3A0x4211be6566568a0b!2sComilla+Yusuf+Multi-Technical+High+School!5e0!3m2!1sen!2sbd!4v1482529817486" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                        <div class="contact-address-area">
                            <div class="contact-campus-img">
                                <div class="cnt-img">
                                    <img src="<?php echo $url_prefix;?>global/assets/images/campus.jpg" class="img-responsive" alt="house image">
                                </div>
                                <div class="cnt-address">
                                    <p><strong>Comilla Yusuf High School</strong><br>
                                    Bozropur, Comilla Adarsa Sadar, Conilla</p>
                                    <p>
                                        Cell: +88 01712 196729<br>
                                        Email: yusuf_school@yahoo.com
                                    </p>
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

                            <!-- <div class="our-gallery-right">
                                <h3>Our Gallery</h3>
                                <div class="gallery-img-right">
                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                        <img src="assets/images/achivement.jpg" alt="">
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                        <img src="assets/images/achivement.jpg" alt="">
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                        <img src="assets/images/achivement.jpg" alt="">
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                        <img src="assets/images/achivement.jpg" alt="">
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Container area -->
<?php include(APPPATH."views/web_footer.php"); ?>