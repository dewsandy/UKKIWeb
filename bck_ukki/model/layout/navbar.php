 <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">UKKI PENS</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-nav navbar-right">

			    <li class="dropdown">
	        		<a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="./lib/images/1.png"><span class="badge">9</span></a>
	        		<ul class="dropdown-menu">
						<li class="dropdown-menu-header text-center">
							<strong>Account</strong>
						</li>
						<li class="m_2"><a href="#"><i class="fa fa-tasks"></i> Tasks <span class="label label-danger">42</span></a></li>
						<li><a href="#"><i class="fa fa-comments"></i> Comments <span class="label label-warning">42</span></a></li>
						<li class="dropdown-menu-header text-center">
							<strong>Settings</strong>
						</li>
						<li class="m_2"><a href="#"><i class="fa fa-user"></i> Profile</a></li>
						<li class="m_2"><a href="#"><i class="fa fa-wrench"></i> Settings</a></li>
						
						<li class="divider"></li>
						<li class="m_2"><a href="#"><i class="fa fa-shield"></i> Lock Profile</a></li>
						<li class="m_2"><a href="#"><i class="fa fa-lock"></i> Logout</a></li>	
	        		</ul>
	      		</li>
			</ul>
			<form class="navbar-form navbar-right">
              <input type="text" class="form-control" value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
            </form>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="home"><i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
                        </li>
                      
                        <li>
                            <a href="#"><i class="fa fa-indent nav_icon"></i>Blog<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php
                                     if (isset($_SESSION['idadmin'])) {
                                        $blog=array("","kategori","berita","info","slider");
                                        $nBlog=array("","Kategori","Berita","Info","Slider");

                                        for ($i=1; $i <= count($blog)-1 ; $i++) {
                                                echo "<li><a href='$blog[$i]'>$nBlog[$i]</a></li>";
                                            }
                                    } 
                                ?>
                               <!-- <li>
                                    <a href="#">Kategori</a>
                                </li>
                                <li>
                                    <a href="#">Berita</a>
                                </li>
								<li>
                                    <a href="#">Repository</a>
                                </li>
								<li>
                                    <a href="#">Slider</a>
                                </li>-->
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-thumbs-up nav_icon"></i>Event<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php
                                     if (isset($_SESSION['idadmin'])) {
                                        $event=array("","event");
                                        $nEvent=array("","Upcoming Event");

                                        for ($i=1; $i <= count($event)-1 ; $i++) {
                                                echo "<li><a href='$event[$i]'>$nEvent[$i]</a></li>";
                                            }
                                    } 
                                ?>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                       
                         <li>
                            <a href="#"><i class="fa fa-users nav_icon"></i>Tentang UKKI PENS<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php
                                     if (isset($_SESSION['idadmin'])) {
                                        $ukki=array("","sejarah","kabinet","departemenbso","infoukki");
                                        $nUkki=array("","Sejarah","Kabinet","Departemen & BSO","Profil UKKI");

                                        for ($i=1; $i <= count($ukki)-1 ; $i++) {
                                                echo "<li><a href='$ukki[$i]'>$nUkki[$i]</a></li>";
                                            }
                                    } 
                                ?>
                               <!-- <li>
                                    <a href="#">Sejarah</a>
                                </li>
                                <li>
                                    <a href="#">Departemen</a>
                                </li>-->
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench nav_icon"></i>Pengaturan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php
                                     if (isset($_SESSION['idadmin'])) {
                                        $pengaturan=array("","daftaradmin","gantipass&id=$_SESSION[idadmin]","keluar");
                                        $nPengaturan=array("","Daftar Admin","Ganti Password","Keluar");

                                        for ($i=1; $i <= count($pengaturan)-1 ; $i++) {
                                                echo "<li><a href='$pengaturan[$i]'>$nPengaturan[$i]</a></li>";
                                        }
                                    } 
                                ?>
                                <!--<li>
                                    <a href="#">Profil</a>
                                </li>
								<li>
                                    <a href="#">Daftar Admin</a>
                                </li>
								<li>
                                    <a href="#">Ganti Password</a>
                                </li>
								<li>
                                    <a href="#">Keluar</a>
                                </li>-->
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>