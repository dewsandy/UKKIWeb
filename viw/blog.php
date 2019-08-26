<section class="page-header">
				<div class="container">
					<h1>BERITA</h1>
				</div>
</section>
<?php
  $query="SELECT tblberita.idberita,tblberita.judul,tblberita.isi,tblberita.iduser,tblberita.gambar,tblberita.kategori_id,tblberita.in_tgl,tblberita.edit_tgl,tblberita.status,tblkategori.idkategori,tblkategori.kategori,tbladmin.idadmin,tbladmin.nama FROM
tblberita INNER JOIN tblkategori ON tblkategori.idkategori=tblberita.kategori_id INNER JOIN tbladmin ON tbladmin.idadmin = tblberita.iduser
   ORDER BY tblberita.edit_tgl DESC";
  $result = mysqli_query($conn, $query);
  
  $jdata=$result -> num_rows;
  $batas=4;
  $jhal = ceil($jdata/$batas);

  if($jhal < 1)
  {
    $jhal = 1;
  }
  $pagenum = 1;
  if(isset($_GET['hal']))
  {
    $pagenum = preg_replace('#[^0-9]#','',$_GET['hal']);
  }
  if($pagenum < 1)
  {
    $pagenum = 1;
  }
  else if($pagenum > $jhal){
    $pagenum = $jhal;
  }
  $pag = '';
 
    if($jhal != 1){
      if($pagenum > 1){
        $prev = $pagenum - 1;
        $pag = '<li><a href="berita&hal='.$prev.'">&laquo;</a></li>';
        for($i = $pagenum - 4; $i<$pagenum; $i++)
        {
          if($i > 0)
          {
            $pag = '<li><a href="berita&hal='.$i.'">'.$i.'</a></li>';
          }
        }
      }
      $pag = '<li><a class="active" href="berita&hal='.$pagenum.'">'.$pagenum.'</a></li>';
      for($i= $pagenum+1; $i<= $jhal; $i++)
      {
        $pag = '<li><a href="berita&hal='.$i.'">'.$i.'</a></li>';
        if($i >= $pagenum - 4)
        {
          break;
        }
      }
      
      if($pagenum != $jhal)
      {
        $next = $pagenum + 1;
        $pag = '<li><a href="berita&hal='.$next.'">&raquo;</a></li>';
      }
    }
  $mulai = ($pagenum - 1)*$batas;
  $berita = $conn -> query("SELECT tblberita.idberita,tblberita.judul,tblberita.isi,tblberita.iduser,tblberita.gambar,tblberita.kategori_id,tblberita.in_tgl,tblberita.edit_tgl,tblberita.status,tblkategori.idkategori,tblkategori.kategori,tbladmin.idadmin,tbladmin.nama FROM
tblberita INNER JOIN tblkategori ON tblkategori.idkategori=tblberita.kategori_id INNER JOIN tbladmin ON tbladmin.idadmin = tblberita.iduser
   ORDER BY tblberita.edit_tgl ASC LIMIT $mulai,$batas");

?>
			<section>
				<div class="container">

					<div class="row">

						<!-- LEFT -->
						<div class="col-md-9 col-sm-9">
						
							<!-- TIMELINE -->
							<div class="timeline"><!-- .timeline-inverse = right position [left on RTL] -->
								<div class="timeline-hline"><!-- horizontal line --></div>

								<?php
									while($row = $berita -> fetch_assoc()){
										if(strlen($row['edit_tgl']) >= 16){
	                                    	$tgl = substr($row['edit_tgl'],0,2);
	                                    	$bulan = substr($row['edit_tgl'],4,1);
		                                   	 switch ($bulan) {
		                                            case '1':
		                                                    $dayCode = "Jan";
		                                                break;
		                                            case '2':
		                                                    $dayCode = "Feb";
		                                                break;
		                                            case '3':
		                                                    $dayCode = "Mar";
		                                                break;
		                                            case '4':
		                                                    $dayCode = "Apr";
		                                                break;
		                                            case '5':
		                                                    $dayCode = "Mei";
		                                                break;
		                                            case '6':
		                                                    $dayCode = "Jun";
		                                                break;
		                                            case '7':
		                                                    $dayCode = "Jul";
		                                                break;
		                                            case '8':
		                                                    $dayCode = "Agt";
		                                                break;
		                                            case '9':
		                                                    $dayCode = "Sep";
		                                                break;
		                                            case '10':
		                                                    $dayCode = "Okt";
		                                                break;
		                                            case '11':
		                                                    $dayCode = "Nov";
		                                                break;
		                                            case '12':
		                                                    $dayCode = "Des";
		                                                break;
		                                            default:
		                                                    echo "Hari Tidak Valid";
			                                                break;
		                                        }  
	                                	}
	                                	
								?>
								<div class="blog-post-item">

									<!-- timeline entry -->
									<div class="timeline-entry"><!-- .rounded = entry -->
										<?php
											echo $tgl;
										?>
										<span><?php
											echo $dayCode;
										?></span>
										<div class="timeline-vline"><!-- vertical line --></div>
									</div>
									<!-- /timeline entry -->

									<!-- IMAGE -->
									<figure class="margin-bottom-20">
										<img class="img-responsive" src="./gamb/<?php echo $row['gambar']?>" alt="">
									</figure>

									<h2><a href="viewberita&id=<?php echo $row['idberita'];?>"><?php echo $row['judul']?></a></h2>

									<ul class="blog-post-info list-inline">
										<li>
											<a href="viewberita&id=<?php echo $row['idberita'];?>">
												<i class="fa fa-clock-o"></i> 
												<span class="font-lato"><?php echo $row['edit_tgl']?></span>
											</a>
										</li>
										
										<li>
											<a href="viewberita&id=<?php echo $row['idberita'];?>">
												<i class="fa fa-user"></i> 
												<span class="font-lato"><?php echo $row['nama']?></span>
											</a>
										</li>
									</ul>

									<p>
										<?php 
											 if(strlen($row['isi']) > 300){
			                                    $desc = substr($row['isi'],0,300);
			                                    echo $desc;
			                                }else{
			                                    $desc = $row['isi'];
			                                    echo $desc;
			                                }
										?>
									</p>

									<a href="viewberita&id=<?php echo $row['idberita'];?>" class="btn btn-reveal btn-default">
										<i class="fa fa-plus"></i>
										<span>Read More</span>
									</a>

								</div>
								<!-- /POST ITEM -->
								<?php 
									}
								?>

								

							</div>
							<!-- /TIMELINE -->


							<!-- PAGINATION -->
							<div class="text-left">
								<!-- Pagination Default -->
								<ul class="pagination nomargin">
									<?php 
										echo $pag;
									?>
								</ul>
								<!-- /Pagination Default -->
							</div>
							<!-- /PAGINATION -->

						</div>
						<?php 
							include('./mdl/layout/sidebar.php');
						?>

					</div>


				</div>
			</section>