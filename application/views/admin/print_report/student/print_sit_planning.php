<?php
$url_prefix = $this->webspice->settings()->site_url_prefix;
$site_url = $this->webspice->settings()->site_url;
$domain_name = $this->webspice->settings()->domain_name;
$total_column = 16;
$report_name = 'Student Information';


# don't edit the below area (csv)
if( $this->uri->segment(2)=='csv' ){
    $file_name = strtolower(str_replace(array('_',' '),'',$report_name)).'_'.date('Y_m_d_h_i').'.xls';
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=".$file_name);
    header("Pragma: no-cache");
    header("Expires: 0");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $report_name; ?></title>

    <style type="text/css">
        #printArea { width:1024px; margin:auto; }
        body, table {font-family:tahoma; font-size:13px;}
        table td { padding:8px; }

        .site_planne_area{
		  width: 500px;
		  height: auto;
		  float: left;
		}

		.site_pln{
		  width: 90%;
		  height: 220px;
		  border: 1px solid #999;
		  margin: 15px auto;
		}

		.site_pln .row-fluid [class*="span"] {
		  box-sizing: border-box;
		  display: block;
		  float: left;
		  margin-left: 0% img;
		  min-height: 30px;
		  width: 100%;
		}

		.site_pln_title{
		  width: 100%;
		  height: 50px;
		  text-align: center;
		  border-bottom: 1px solid #999;
		}

		.site_pln_title h4{
		  color: inherit;
		  font-family: inherit;
		  font-weight: bold;
		  line-height: 15px;
		  margin: 7px 0 3px;
		  text-rendering: optimizelegibility;
		  text-transform: uppercase;
		}

		.site_pln_title p{
		  margin-top: 5px !important; 
		  font-size: 16px;
		}

		.site_pln_info_area{
		  width: 100%;
		  height: 170px;
		}

		.site_pln_img{
		  width: 30%;
		  float: left;
		  height: 
		}

		.site_pln_img img{
		  width: 110px;
		  margin-top: 5px;
		  margin-left: 10px;
		}

		.site_pln_info {
		  float: left;
		  height: 170px;
		  padding-left: 10px;
		  padding-top: 10px;
		  width: 65%;
		}

		.site_pln_info img{
			height: 45px;
		}

		.site_pln_info h5{
			margin-top: 7px !important;
			margin-bottom: 0px !important;
			font-size: 17px;
		}

		.site_pln_info .section{
		  padding-left: 17px;
		}


		.site_pln_info p em{
		  text-decoration: underline;
		  text-decoration-style:dotted;
		}

    </style>

    <?php if( $this->uri->segment(1)=='print_sit_planning'): ?>
        <script type="text/javascript" src="<?php echo $url_prefix; ?>global/js/jquery-1.9.1.js"></script>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo $url_prefix; ?>global/bootstrap_3_2/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?php echo $url_prefix; ?>global/admin/assets/styles.css"> 
    

        <!-- print plugin -->
        <script src="<?php echo $url_prefix; ?>global/js/jquery.jqprint.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#printArea').jqprint();
                $('#print_icon').click(function(){
                    $('#printArea').jqprint();
                });
            });
        </script>
    <?php endif; ?>
</head>

<body>
	
<!--<a id="print_icon" href="#">Print</a>-->

<div id="printArea">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center" colspan="<?php echo $total_column; ?>">
                <div style="font-size:150%;"><?php echo $domain_name; ?></div>
            </td>
        </tr>
    </table>
    <?php foreach($get_record as $v): ?>
	    <div class="col-md-6 site_planne_area">
			<div class="site_pln">
				<div class="site_pln_title">
					<h4>Comilla Yusuf High School</h4>
					<p>Sit Planning</p>
				</div>
				<div class="site_pln_info_area">
					<div class="site_pln_img">
						<img src="<?php echo $url_prefix; ?>global/custom_files/student/<?php echo $v->STUDENT_ID; ?>.jpg">
					</div>
					<div class="site_pln_info">
						<img src="<?php echo $url_prefix; ?>global/assets/images/hqdefault.jpg">
						<h5><?php echo $v->NAME; ?></h5>
						<p><span>Class: <em><?php echo $v->CLASS_NAME; ?></em></span><span class="section">Section: <em><?php echo $v->SECTION_NAME; ?></em></span></p>
						<p>Roll No: <em><?php echo $v->ROLL_NO; ?></em></p>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
</body>
</html>