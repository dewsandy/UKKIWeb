<div class="col-md-12 graphs">
     <div class="xs">
     <h3>Kabinet</h3>
  <?php
  $kabinet = $conn -> query("SELECT * FROM tblkabinet");

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
  
<?php
    if($kabinet -> num_rows !==0){
    
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
            <th>Kabinet</th>
            <th>Ketua</th>
            <th>Visi</th>
            <th>Gambar</th>
            <th>Misi</th>
            <th>Sambutan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
         <?php
            $no = 0;
            while($rb = $kabinet -> fetch_assoc()){
              $no++;
           
                $idkabinet =$rb['idkabinet'];
                 if(strlen($rb['visi']) >= 100){
                             $isi = substr($rb['visi'],0,100);
                           
                        }else{
                          $isi = $rb['visi'];
                        }
                echo "
                 <tr>
                    <th scope='row'>
                     <input type='checkbox' name='' value=''/> <b>".$no."</b>
                    </th>
                    <td>".$rb['kabinet']."</td>
                     <td>".nl2br(htmlentities($rb['ketua']))."</td>
                      <td>".
                         $isi
                      ."</td>
                     <td><img class='img-responsive' style='width:30%; height:10%;' src='./gamb/".$rb['gambar']."'></td>
                     <td>".$rb['misi']."</td>
                      <td>".$rb['sambutan']."</td>
                    
                    <td>
                      <button type='button' onclick=\"window.location.href='upkabinet&id=$idkabinet';\" class='btn btn-warning'>Ubah</button> 
                      <button type='button' class='btn btn-danger hapuskabinet' id='$idkabinet'>Hapus</button>&nbsp;
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
    
         </br>
         
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
      $('.hapuskabinet').click(function()
      {
        var url = "./model/proses.php";
        idkabinet = this.id;
       
        var answer = confirm("Apakah Anda ingin menghapus data ini?");
        if(answer)
        {
          $.post(url, {hapuskabinet: idkabinet}, function(){
               location.reload(true);
          });
        }
    });
  });
  setTimeout('$("#alert").fadeOut(1000)',500)
</script>