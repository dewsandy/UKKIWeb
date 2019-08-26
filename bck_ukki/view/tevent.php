<?php
    $selkat = $conn -> query("SELECT * FROM tblkategori");
    if($selkat -> num_rows != 0){
    
?>
<div class="col-md-12 graphs">
     <div class="xs">
        <h3>Tambah Info Event</h3>
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
              <select name="kat" class="form-control1">

                    <?php
                      while($qrow = $selkat -> fetch_assoc()){
                        if(($qrow['kategori'] == 'Info Internal') OR ($qrow['kategori']== 'Info Eksternal')){
                        echo "
                          <option value=".$qrow['idkategori'].">".$qrow['kategori']."</option>
                        ";
                        }
                      }
                    ?>
          
              </select>
            </div>
             <div class="form-group">
              <label class="control-label">Nama Event</label>
      
                <input type="text" name="event" class="form-control1" required="">
            
            </div>
            <div class="form-group">
              <label class="control-label">Deskripsi Event</label>
      
                <textarea name="desc" style="min-height:200px;" id="isi" class="form-control1" required=""></textarea>
            </div>
            <div class="form-group">
              <label class="control-label">Tanggal Event</label>
                <input type="date" name="harih" class="form-control1" required="">
            </div>
            <div class="form-group">
              <button type="submit" name="tambahevent" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-default">Reset</button>
              <button type="submit" name="cancel_event" class="btn btn-danger">Cancel</button>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
    <div class="copy_layout">
       <p>Copyright © <?php echo date("Y"); ?> UKKI PENS</p>
   </div>
   </div>
   <script type="text/javascript"></script>
<?php } ?>
