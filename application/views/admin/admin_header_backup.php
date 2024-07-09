<!DOCTYPE html>
<html class="no-js">
    <!-- global declaration -->
    <?php $url_prefix = $this->webspice->settings()->site_url_prefix; ?>
    <head>
        <title>Base4 School Management</title>
        <!-- Bootstrap -->
        <link href="<?php echo $url_prefix; ?>global/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $url_prefix; ?>global/admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo $url_prefix; ?>global/admin/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="<?php echo $url_prefix; ?>global/admin/assets/styles.css" rel="stylesheet" media="screen">
        <link href="<?php echo $url_prefix; ?>global/admin/assets/DT_bootstrap.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="<?php echo $url_prefix; ?>global/admin/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>

    <body>


        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Admin Panel</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> Admin <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="<?php echo $url_prefix; ?>logout">Logout</a>
                                        <a tabindex="-1" href="<?php echo $url_prefix; ?>change_pass">Change Password</a>
                                    </li>
                                    <!-- <li>
                                        <a tabindex="-1" href="#">Change Password</a>
                                    </li> -->
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="active">
                                <a href="<?php echo $url_prefix; ?>admin">Dashboard</a>
                            </li>

                            <?php $sql = $this->db->query("SELECT GROUP_NAME FROM permission GROUP BY GROUP_NAME")->result(); ?>
                            <?php foreach($sql as $data) { ?>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo ucfirst(str_replace("_", " ", $data->GROUP_NAME)) ?> <b class="caret"></b>

                                </a>
                                <ul class="dropdown-menu" id="menu1">
                                    <?php $sql2 = $this->db->query("SELECT * FROM permission WHERE GROUP_NAME='".$data->GROUP_NAME."'")->result(); ?>
                                    <?php foreach($sql2 as $data2) { ?>
                                    <li>
                                        <a href="<?php echo $url_prefix . $data2->ROUTE_NAME; ?>"><?php echo ucfirst(str_replace("_", " ", $data2->MENU_NAME)) ?></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>




        </div>
        <!-- <div class="overloaded"></div> -->

        <div class="container">
            <div class="row-fluid">
                        <!-- here will goes alert message -->
                        <?php if( $this->webspice->message_board(null, 'get') ): ?>
                        <div id="message_board" class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <!-- <h4>Success</h4> -->
                            <?php echo $this->webspice->message_board(null,'get_and_destroy'); ?>
                        </div>
                        <?php endif; ?>
                        <!-- alert message end -->
            </div>
        </div>