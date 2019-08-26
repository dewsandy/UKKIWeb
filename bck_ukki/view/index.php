<div class="graphs">
	     <div class="widget_head">Dashboard</div>
		<div class="alert alert-info" role="alert">
        <strong>Hello !</strong> <?php echo $_SESSION['nama_admin']?>
       </div>
		   <div class="widget_2">
		   	  <div class="col-sm-3 widget_1_box">
		   	  	<div class="wid-social facebook">
                    <div class="social-icon">
                        <i class="fa fa-gamepad text-light icon-xlg pull-right"></i>
                    </div>
                    <div class="social-info">
                        <h3 class="number_counter bold count text-light start_timer counted">
                        	<?php
                        		$kat = $conn -> query("SELECT * FROM tblupcomingevent");
                        		$skat = $kat -> num_rows;
                        		echo $skat;
                        	?>
                        </h3>
                        <h4 class="counttype text-light">Event</h4>
                        <span class="percent">2% increase from last week</span>
                    </div>
                </div>
              </div>
              <div class="col-sm-3 widget_1_box">
                <div class="wid-social twitter">
                    <div class="social-icon">
                        <i class="fa fa-video-camera text-light icon-xlg pull-right"></i>
                    </div>
                    <div class="social-info">
                        <h3 class="number_counter bold count text-light start_timer counted">
                        	<?php
                        		$be = $conn -> query("SELECT * FROM tblberita");
                        		$sber = $be -> num_rows;
                        		echo $sber;
                        	?>
                        </h3>
                        <h4 class="counttype text-light">Berita</h4>
                        <span class="percent">2% increase from last week</span>
                    </div>
                </div>
			  </div>
              <div class="col-sm-3 widget_1_box">
              	<div class="wid-social google-plus">
                    <div class="social-icon">
                        <i class="fa fa-info text-light icon-xlg pull-right"></i>
                    </div>
                    <div class="social-info">
                        <h3 class="number_counter bold count text-light start_timer counted">
                        	<?php
                        		$be = $conn -> query("SELECT * FROM tblinfo");
                        		$sber = $be -> num_rows;
                        		echo $sber;
                        	?>
                        </h3>
                        <h4 class="counttype text-light">Info</h4>
                        <span class="percent">2% increase from last week</span>
                    </div>
                </div>
			  </div>
              <div class="col-sm-3 widget_1_box">
                <div class="wid-social dribbble">
                    <div class="social-icon">
                        <i class="fa fa-picture-o text-light icon-xlg pull-right"></i>
                    </div>
                    <div class="social-info">
                        <h3 class="number_counter bold count text-light start_timer counted">
                        	<?php
                        		$be = $conn -> query("SELECT * FROM tblslide");
                        		$sber = $be -> num_rows;
                        		echo $sber;
                        	?>
                       	</h3>
                        <h4 class="counttype text-light">Slider On Frontpage</h4>
                        <span class="percent">7% increase from last week</span>
                    </div>
                </div>
			  </div>
              <div class="clearfix"> </div>
		   </div>
		   <div class="widget_3">
		   	  <div class="col-sm-3 widget_1_box">
                <div class="wid-social linkedin">
                    <div class="social-icon">
                        <i class="fa fa-linkedin text-light icon-xlg pull-right"></i>
                    </div>
                    <div class="social-info">
                        <h3 class="number_counter bold count text-light start_timer counted">2525</h3>
                        <h4 class="counttype text-light">Connections</h4>
                        <span class="percent">7% increase from last week</span>
                    </div>
                </div>
			   </div>
               <div class="col-sm-3 widget_1_box">
               	<div class="wid-social youtube">
                    <div class="social-icon">
                        <i class="fa fa-youtube text-light icon-xlg pull-right"></i>
                    </div>
                    <div class="social-info">
                        <h3 class="number_counter bold count text-light start_timer counted">1523</h3>
                        <h4 class="counttype text-light">Subscribers</h4>
                        <span class="percent">7% increase from last week</span>
                    </div>
                </div>
			  </div>
              <div class="col-sm-3 widget_1_box">
                <div class="wid-social skype">
                    <div class="social-icon">
                        <i class="fa fa-skype text-light icon-xlg pull-right"></i>
                    </div>
                    <div class="social-info">
                        <h3 class="number_counter bold count text-light start_timer counted">2721</h3>
                        <h4 class="counttype text-light">Contacts</h4>
                        <span class="percent">7% increase from last week</span>
                    </div>
                </div>
			  </div>
              <div class="col-sm-3 widget_1_box">
                 <div class="wid-social flickr">
                    <div class="social-icon">
                        <i class="fa fa-flickr text-light icon-xlg pull-right"></i>
                    </div>
                    <div class="social-info">
                        <h3 class="number_counter bold count text-light start_timer counted">1221</h3>
                        <h4 class="counttype text-light">Media</h4>
                        <span class="percent">7% increase from last week</span>
                    </div>
                </div>
               </div>
               <div class="clearfix"> </div>
		   </div>
		 
		   <div class="copy_layout">
            <p>Copyright © <?php echo date("Y");?> UKKI PENS</p>
           </div>
	  </div>