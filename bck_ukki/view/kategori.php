<div class="col-md-12 graphs">
     <div class="xs">
     <h3>Kategori</h3>
  <?php

  $query = $conn -> query("SELECT * FROM tblkategori");
  if($query->num_rows!==0){
    
  ?>
  <div class="bs-example4" data-example-id="simple-responsive-table">
  <?php
   if (isset($_GET['ab'])) {
      if ($_GET['ab']==1) {
        echo "<div class='alert alert-warning' id='alert'><strong>Kategori berhasil diubah.</strong></div>";
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
  <a  class='btn btn-warning' type="button" href="#kotakdialog" data-toggle="modal"><i class="icon-plus"></i> Tambah Data</a>
    <form method='post' action='./model/proses.php'>";
    <tr><th colspan='6'>Yang ditandai :
         
          <button type='submit' class='btn btn-danger' name='hapuskat'/>Hapus</button>
           </th>
          
    </tr>
  
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Kategori</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
         <?php
            $no = 0;
            while($row = $query -> fetch_assoc()){
              $no++;
              $idkategori = $row['idkategori'];
              echo "
               <tr>
                  <th scope='row'>
                   <input type='checkbox' name='idkategori[]' value='$idkategori'/> <b>".$no."</b>
                  </th>
                  <td>".$row['kategori']."</td>
                  <td>
                    <button type='button' onclick=\"window.location.href='ubahkategori&idkat=$idkategori';\" class='btn btn-warning'>Ubah</button> 
                    <button type='button' class='btn btn-danger hapus' id='$idkategori'>Hapus</button>&nbsp;
                  </td> 
                </tr>
              ";

            }
         ?>
         </form>
        </tbody>
      </table>
    </div><!-- /.table-responsive -->
  
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
      $('.hapus').click(function()
      {
        var url = "./model/proses.php";
        idkategori = this.id;
       
        var answer = confirm("Apakah Anda ingin menghapus data ini?");
        if(answer)
        {
          $.post(url, {hapuskategori: idkategori}, function(){
               location.reload(true);
          });
        }
    });
  });
  setTimeout('$("#alert").fadeOut(1000)',500)
</script>
 <div class="modal fade" id="kotakdialog">
<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="modal-title">Modal title</h2>
        </div>
        <div class="modal-body">
          <p>One fine body…</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>