<?php
    $selkat = $conn -> query("SELECT * FROM tblkategori WHERE kategori='Berita'");
    if($selkat -> num_rows != 0){
    
?>
<div class="col-md-12 graphs">
	   <div class="xs">
  	    <h3>Tambah Berita</h3>
  	    <div class="well1 white">
         <?php
           if (isset($_GET['ab'])) {
              if($_GET['ab']==4) {
                echo "<div class='alert alert-danger' id='alert'><strong>File Foto terlalu besar</strong></div>";
              } 
               if($_GET['ab']==5) {
                echo "<div class='alert alert-danger' id='alert'><strong>File Foto harus dengan tipe PNG ,JPG atau JPEG</strong></div>";
                } 
            } 
          ?>
        <form method="post" enctype="multipart/form-data" action="./model/proses.php" name="form1" id="form1" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern">
          <fieldset>
            <div class="form-group">
              <label class="control-label">Kategori</label>
             
                    <?php
                  $qrow = $selkat -> fetch_assoc();
                        echo "
                          <input class='form-control1' name='kategori' value=".$qrow['kategori']." readonly>
                        ";
                      
                    ?>
          
             
            </div>
             <div class="form-group">
              <label class="control-label">Judul</label>
      
                <input type="text" name="judul" class="form-control1" required="">
            
            </div>
            <div class="form-group">
              <label class="control-label">Isi</label>
      
                <textarea name="isi" style="min-height:200px;" id="isi" class="form-control1" required=""></textarea>
            </div>
            <div class="form-group">
                  <label>File input</label>
                  <input type="file" name="gambar" accept="image/*">
                  <p class="help-block">Upload Gambar.</p>
                </div>
            <div class="form-group">
              <button type="submit" name="tambahberita" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-default">Reset</button>
              <button type="submit" name="cancel_berita" class="btn btn-danger">Cancel</button>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
    <div class="copy_layout">
       <p>Copyright © <?php echo date("Y"); ?> UKKI PENS</p>
   </div>
   </div>
   <script type="text/javascript">

            if(form1.isi.value==""){
                        alert("Isi tidak boleh kosong");
                        form1.isi.focus();
                        return false;
            } 
             return true; 
</script>
<?php } ?>
