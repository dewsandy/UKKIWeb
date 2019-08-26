<div class="col-md-12 graphs">
     <div class="xs">
     <h3>Info Internal Dan Eksternal  </h3>
  <?php
  if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $w = "WHERE judul LIKE '%$cari%'";
  }
  else{
    $cari = "";
    $w = "";
  }
  $query="SELECT * FROM tblinfo $w";
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
        $pag = '<a  class="page" href="info&cari='.$_GET['cari'].'&hal='.$prev.'">Previous</a>';
        for($i = $pagenum - 4; $i<$pagenum; $i++)
        {
          if($i > 0)
          {
            $pag = '<a class="page" href="info&cari='.$_GET['cari'].'&hal='.$i.'">'.$i.'</a>';
          }
        }
      }
      $pag = '<a class="page active" href="info&cari='.$_GET['cari'].'&hal='.$pagenum.'">'.$pagenum.'</a>';
      for($i= $pagenum+1; $i<= $jhal; $i++)
      {
        $pag = '<a class="page" href="info&cari='.$_GET['cari'].'&hal='.$i.'">'.$i.'</a>';
        if($i >= $pagenum - 4)
        {
          break;
        }
      }
      
      if($pagenum != $jhal)
      {
        $next = $pagenum + 1;
        $pag = '<a class="page" href=info&cari='.$_GET['cari'].'&hal='.$next.'">next</a>';
      }
    }
  }
  else
  {
    if($jhal != 1){
      if($pagenum > 1){
        $prev = $pagenum - 1;
        $pag = '<a  class="page" href="info&hal='.$prev.'">Previous</a>';
        for($i = $pagenum - 4; $i<$pagenum; $i++)
        {
          if($i > 0)
          {
            $pag = '<a class="page" href="info&hal='.$i.'">'.$i.'</a>';
          }
        }
      }
      $pag = '<a class="page active" href="info&hal='.$pagenum.'">'.$pagenum.'</a>';
      for($i= $pagenum+1; $i<= $jhal; $i++)
      {
        $pag = '<a class="page" href="info&hal='.$i.'">'.$i.'</a>';
        if($i >= $pagenum - 4)
        {
          break;
        }
      }
      
      if($pagenum != $jhal)
      {
        $next = $pagenum + 1;
        $pag = '<a class="page" href=info&hal='.$next.'">next</a>';
      }
    }
  }
  $mulai = ($pagenum - 1)*$batas;
  $info = $conn -> query("SELECT tblinfo.idinfo,tblinfo.judul,tblinfo.isi,tblinfo.iduser,tblinfo.gambar,tblinfo.kategori_id,tblinfo.in_tgl,tblinfo.edit_tgl,tblinfo.status,tblkategori.idkategori,tblkategori.kategori,tbladmin.idadmin,tbladmin.nama FROM
tblinfo INNER JOIN tblkategori ON tblkategori.idkategori=tblinfo.kategori_id INNER JOIN tbladmin ON tbladmin.idadmin = tblinfo.iduser
   ORDER BY tblinfo.edit_tgl ASC LIMIT $mulai,$batas");

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
      elseif($_GET['ab']==5) {
        echo "<div class='alert alert-danger' id='alert'><strong>Data Telah Ditambahkan</strong></div>";
      } 
    } 
  ?>
  <a type='button' href="ininfo" class='btn btn-warning'>Tambah Data</a> 
<?php
    if($info -> num_rows !==0){
    
?>
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
            <th>Kategori</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Gambar</th>
            <th>User</th>
            <th>Tanggal</th>
            <th>Update Tanggal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
         <?php
            $no = 0;
            while($rb = $info -> fetch_assoc()){
              $no++;
        
                $idinfo =$rb['idinfo'];
                if(strlen($rb['isi']) >= 100){
                  $w = substr($rb['isi'],0,100);
                }else{
                  $w = $rb['isi'];
                }
                echo "
                 <tr>
                    <th scope='row'>
                     <input type='checkbox' name='' value=''/> <b>".$no."</b>
                    </th>
                    <td>".$rb['kategori']."</td>
                     <td>".nl2br(htmlentities($rb['judul']))."</td>
                      <td>".$w."</td>
                     <td><img class='img-responsive' style='width:30%; height:10%;' src='./model/gambar/".$rb['gambar']."'></td>
                     <td>".$rb['nama']."</td>
                      <td>".$rb['in_tgl']."</td>
                       <td>".$rb['edit_tgl']."</td>
                    <td>
                      <button type='button' onclick=\"window.location.href='upinfo&id=$idinfo';\" class='btn btn-warning'>Ubah</button> 
                      <button type='button' class='btn btn-danger hapusinfo' id='$idinfo'>Hapus</button>&nbsp;
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
         </br>
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
      $('.hapusinfo').click(function()
      {
        var url = "./model/proses.php";
        idinfo = this.id;
        var answer = confirm("Apakah Anda ingin menghapus data ini?");
        if(answer)
        {
          $.post(url, {hapusinfo: idinfo}, function(){
              location.reload(true);
          });
        }
    });
  });
  setTimeout('$("#alert").fadeOut(1000)',500)
</script>