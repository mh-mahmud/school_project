<?php $url_prefix = $this->webspice->settings()->site_url_prefix; ?>
<div class="slider">
	<div class="container-fluid">
		<div class="row">
			<div id="carousel-example" class="carousel slide" data-ride="carousel">
                <!-- Carousel Indicators -->
                <ol class="carousel-indicators">
                        <?php
                            $i = 1; //Counter
                            foreach ($slider as $v): //Foreach
                            $ol_class = ($i == 1) ? 'active' : ''; 
                        ?>
                        <li data-target="#carousel-example" data-slide-to="<?php echo $i; ?>"  class="<?php echo $ol_class; ?>"></li>
                        <?php $i++;?>
                        <?php endforeach; ?> 
                </ol>
                <div class="carousel-inner">
                    <?php
                         $i = 1; 
                        foreach ($slider as $v): 
                        $item_class = ($i == 1) ? 'item active' : 'item'; 
                    ?>              
                    <div class="<?php echo $item_class; ?>">
                    <?php if( file_exists($this->webspice->get_path('slider_full').$v->SLIDER_ID.'.jpg') ): ?> 
                        <img src="<?php echo $this->webspice->get_path('slider').$v->SLIDER_ID.'.jpg'; ?>" width="100%" masx-height="360" >
                    <?php endif; ?>
                    </div>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </div>
                <!-- End Carousel Images -->
            </div>
	    </div>
	</div>
</div>
<!-- End Slider -->