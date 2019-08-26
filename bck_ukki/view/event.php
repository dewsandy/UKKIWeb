<div class="col-md-12 graphs">
     <div class="xs">
     <h3>Upcoming Event</h3>
  <?php
  if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $w = "WHERE event LIKE '%$cari%'";
  }
  else{
    $cari = "";
    $w = "";
  }
  $query="SELECT * FROM tblupcomingevent $w";
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
  if(isset($_GET['cari'])){
    if($jhal != 1){
      if($pagenum > 1){
        $prev = $pagenum - 1;
        $pag = '<a  class="page" href="event&cari='.$_GET['cari'].'&hal='.$prev.'">Previous</a>';
        for($i = $pagenum - 4; $i<$pagenum; $i++)
        {
          if($i > 0)
          {
            $pag = '<a class="page" href="event&cari='.$_GET['cari'].'&hal='.$i.'">'.$i.'</a>';
          }
        }
      }
      $pag = '<a class="page active" href="event&cari='.$_GET['cari'].'&hal='.$pagenum.'">'.$pagenum.'</a>';
      for($i= $pagenum+1; $i<= $jhal; $i++)
      {
        $pag = '<a class="page" href="event&cari='.$_GET['cari'].'&hal='.$i.'">'.$i.'</a>';
        if($i >= $pagenum - 4)
        {
          break;
        }
      }
      
      if($pagenum != $jhal)
      {
        $next = $pagenum + 1;
        $pag = '<a class="page" href=event&cari='.$_GET['cari'].'&hal='.$next.'">next</a>';
      }
    }
  }
  else
  {
    if($jhal != 1){
      if($pagenum > 1){
        $prev = $pagenum - 1;
        $pag = '<a  class="page" href="event&hal='.$prev.'">Previous</a>';
        for($i = $pagenum - 4; $i<$pagenum; $i++)
        {
          if($i > 0)
          {
            $pag = '<a class="page" href="event&hal='.$i.'">'.$i.'</a>';
          }
        }
      }
      $pag = '<a class="page active" href="event&hal='.$pagenum.'">'.$pagenum.'</a>';
      for($i= $pagenum+1; $i<= $jhal; $i++)
      {
        $pag = '<a class="page" href="event&hal='.$i.'">'.$i.'</a>';
        if($i >= $pagenum - 4)
        {
          break;
        }
      }
      
      if($pagenum != $jhal)
      {
        $next = $pagenum + 1;
        $pag = '<a class="page" href=event&hal='.$next.'">next</a>';
      }
    }
  }
  $mulai = ($pagenum - 1)*$batas;
  $result = $conn -> query("SELECT tblupcomingevent.idevent,tblupcomingevent.event,tblupcomingevent.deskripsi,tblupcomingevent.id_kategori
    ,tblupcomingevent.tgl,tblkategori.idkategori,tblkategori.kategori
   FROM tblupcomingevent INNER JOIN tblkategori ON tblkategori.idkategori=tblupcomingevent.id_kategori LIMIT $mulai,$batas");
  if($jdata!==0){
    
  ?>
  <div class="bs-example4" data-example-id="simple-responsive-table">
  <?php
   if (isset($_GET['ab'])) {
      if ($_GET['ab']==1) {
        echo "<div class='alert alert-warning' id='alert'><strong>Data Berhasil diubah.</strong></div>";
      } elseif($_GET['ab']==2) {
        echo "<div class='alert alert-danger' id='alert'><strong>Gagal, Silahkan Coba Kembali!</strong></div>";
      } 
      elseif($_GET['ab']==3) {
        echo "<div class='alert alert-danger' id='alert'><strong>Batal Mengubah</strong></div>";
      } 
      elseif($_GET['ab']==4) {
        echo "<div class='alert alert-danger' id='alert'><strong>Data berhasil dihapus</strong></div>";
      } 
    } 
  ?>
  <a type='button' href="tevent" class='btn btn-warning'>Tambah Data</a> 
    <form method='post' action='./model/proses.php'>";
    <tr><th colspan='6'>Yang ditandai :
         
          <button type='submit' class='btn btn-danger' name='hapusevent'/>Hapus</button>
           </th>
          
    </tr>
  
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Event</th>
            <th>Deskripsi</th>
            <th>Kategori</th>
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
         <?php
            $no = 0;
            while($row = $result -> fetch_assoc()){
              $no++;
             $idevent =$row['idevent'];
              echo "
               <tr>
                  <th scope='row'>
                   <input type='checkbox' name='' value=''/> <b>".$no."</b>
                  </th>
                  <td>".$row['event']."</td>
                   <td>".nl2br(htmlentities($row['deskripsi']))."</td>
                   <td>".$row['kategori']."</td>
                   <td>".$row['tgl']."</td>
                  <td>
                    <button type='button' onclick=\"window.location.href='uevent&id=$idevent';\" class='btn btn-warning'>Ubah</button> 
                    <button type='button' class='btn btn-danger hapusevent' id='$idevent'>Hapus</button>&nbsp;
                  </td> 
                </tr>
              ";

            }
         ?>
         </form>
        </tbody>
      </table>
    </div><!-- /.table-responsive -->
      <div >
    <?php
      echo $pag;
    ?>
          <span>Total data :<?php echo $jdata;?></span></br>
          <span><?php 
            $textline2 = "Page <b>$pagenum</b> of <b>$jhal</b>";
            echo $textline2;
          ?></span>
        </div>
  </div>
<?php 
  } else {
        echo "<div class='alert alert-danger'><strong>Tidak ada data.</strong></div>";
    }
?>

  </div>
  <div class="copy_layout">
      <p>Copyright © <?php echo date("Y"); ?> UKKI PENS</p>
  </div>
   </div>
<script language="javascript">
    $(document).ready(function()
  {
      $('.hapusevent').click(function()
      {
        var url = "./model/proses.php";
        idevent = this.id;
        var answer = confirm("Apakah Anda ingin menghapus data ini?");
        if(answer)
        {
          $.post(url, {hapusevent: idevent}, function(){
             location.reload(true);
          });
        }
    });
  });
  setTimeout('$("#alert").fadeOut(1000)',500)
</script>