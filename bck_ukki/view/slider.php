<div class="col-md-12 graphs">
     <div class="xs">
     <h3>Slide</h3>
  <?php
  if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $w = "WHERE deskripsi LIKE '%$cari%'";
  }
  else{
    $cari = "";
    $w = "";
  }
  $query="SELECT * FROM tblslide $w";
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
        $pag = '<a  class="page" href="slide&cari='.$_GET['cari'].'&hal='.$prev.'">Previous</a>';
        for($i = $pagenum - 4; $i<$pagenum; $i++)
        {
          if($i > 0)
          {
            $pag = '<a class="page" href="slide&cari='.$_GET['cari'].'&hal='.$i.'">'.$i.'</a>';
          }
        }
      }
      $pag = '<a class="page active" href="slide&cari='.$_GET['cari'].'&hal='.$pagenum.'">'.$pagenum.'</a>';
      for($i= $pagenum+1; $i<= $jhal; $i++)
      {
        $pag = '<a class="page" href="slide&cari='.$_GET['cari'].'&hal='.$i.'">'.$i.'</a>';
        if($i >= $pagenum - 4)
        {
          break;
        }
      }
      
      if($pagenum != $jhal)
      {
        $next = $pagenum + 1;
        $pag = '<a class="page" href=slide&cari='.$_GET['cari'].'&hal='.$next.'">next</a>';
      }
    }
  }
  else
  {
    if($jhal != 1){
      if($pagenum > 1){
        $prev = $pagenum - 1;
        $pag = '<a  class="page" href="slide&hal='.$prev.'">Previous</a>';
        for($i = $pagenum - 4; $i<$pagenum; $i++)
        {
          if($i > 0)
          {
            $pag = '<a class="page" href="slide&hal='.$i.'">'.$i.'</a>';
          }
        }
      }
      $pag = '<a class="page active" href="slide&hal='.$pagenum.'">'.$pagenum.'</a>';
      for($i= $pagenum+1; $i<= $jhal; $i++)
      {
        $pag = '<a class="page" href="slide&hal='.$i.'">'.$i.'</a>';
        if($i >= $pagenum - 4)
        {
          break;
        }
      }
      
      if($pagenum != $jhal)
      {
        $next = $pagenum + 1;
        $pag = '<a class="page" href=slide&hal='.$next.'">next</a>';
      }
    }
  }
  $mulai = ($pagenum - 1)*$batas;
  $slide = $conn -> query("SELECT * FROM tblslide LIMIT $mulai,$batas");
 
    
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
  <a type='button' href="inslide" class='btn btn-warning'>Tambah Data</a> 
  <?php
   if($jdata!==0){
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
            <th>Gambar</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
         <?php
            $no = 0;
            while($rb = $slide -> fetch_assoc()){
              $no++;
             $idslide =$rb['idslide'];
              echo "
               <tr>
                  <th scope='row'>
                   <input type='checkbox' name='' value=''/> <b>".$no."</b>
                  </th>
                   <td><img class='img-responsive' style='width:30%; height:10%;' src='./model/slide/".$rb['slide']."'></td>
                  <td>".nl2br(htmlentities($rb['deskripsi']))."</td>
                  
                  <td>
                    <button type='button' onclick=\"window.location.href='uslide&id=$idslide';\" class='btn btn-warning'>Ubah</button> 
                    <button type='button' class='btn btn-danger hapusslide' id='$idslide'>Hapus</button>&nbsp;
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
      $('.hapusslide').click(function()
      {
        var url = "./model/proses.php";
        idslide = this.id;
        var answer = confirm("Apakah Anda ingin menghapus data ini?");
        if(answer)
        {
          $.post(url, {hapusslide: idslide}, function(){
               location.reload(true);
          });
        }
    });
  });
  setTimeout('$("#alert").fadeOut(1000)',500)
</script>