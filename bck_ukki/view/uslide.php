<?php
  $s = $conn -> query("SELECT * FROM tblslide WHERE idslide=".$_GET['id']."");
  $srow = $s -> fetch_assoc();
  if($s -> num_rows != 0){
?>

<div class="col-md-12 graphs">
	   <div class="xs">
  	    <h3>Ubah Slide</h3>
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
                  <label>File input</label>
                  <textarea  style='min-height:200px;' class='form-control1'
                  name='deskripsi' required=''><?php
                  echo $srow['deskripsi'];
                  ?>'</textarea>
            </div>
            <div class="form-group">
                  <label>File input</label>
                  <img class='img-responsive' style="width:10%; height:10%;" src='./model/slide/<?php echo $srow['slide'];?>'>
                  <input type="file" name="gambar" accept="image/*">
                  <p class="help-block">Upload Gambar.</p>
            </div>
            <input type='hidden' name='idslide' value='<?php echo $srow['idslide']; ?>'/>
            <div class="form-group">
              <button type="submit" name="uslide" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-default">Reset</button>
              <button type="submit" name="cancel_slide" class="btn btn-danger">Cancel</button>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
    <div class="copy_layout">
       <p>Copyright © <?php echo date("Y"); ?> UKKI PENS</p>
   </div>
   </div>
<?php } ?>