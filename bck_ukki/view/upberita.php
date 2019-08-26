<?php
	$upberita = $conn -> query("SELECT * FROM tblberita WHERE idberita=".$_GET['id']."");
	//var_dump($upberita);
	$selkat = $conn -> query("SELECT * FROM tblkategori WHERE kategori='Berita'");
	if($upberita -> num_rows != 0){
		$qberita = $upberita -> fetch_assoc();

?>
<div class="col-md-12 graphs">
	   <div class="xs">
  	    <h3>Update Berita</h3>
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
      
                <input type="text" name="judul" value="<?php echo $qberita['judul'];?>"class="form-control1" required="">
            
            </div>
            <div class="form-group">
              <label class="control-label">Isi</label>
      
                <textarea name="isi" style="min-height:200px;" id="isi" class="form-control1" required=""><?php echo $qberita['isi'];?></textarea>
            </div>
            <div class="form-group">
                  <label>Gambar</label>
                  <img class='img-responsive' style="width:10%; height:10%;" src='././gamb/<?php echo $qberita['gambar'];?>'>
                  <input type="file" name="gambar" accept="image/*">
                  <p class="help-block">Upload Gambar.</p>
                </div>
              <input type="hidden" value="<?php echo $qberita['idberita']?>" name="idberita"/>
            <div class="form-group">
              <button type="submit" name="updateberita" class="btn btn-primary">Submit</button>
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
<?php	
}
?>