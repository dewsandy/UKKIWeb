<?php
  if(isset($_GET['idkat'])){

    $selkat = $conn -> query("SELECT * FROM tblkategori WHERE idkategori = ".$_GET['idkat']."");
    if($selkat -> num_rows != 0){
      $qrow = $selkat -> fetch_assoc();
?>

<div class="col-md-12 graphs">
	   <div class="xs">
  	    <h3>Ubah Kategori</h3>
  	    <div class="well1 white">
        <form method="post" enctype="multipart/form-data"  action="./model/proses.php" name="form1" id="form1" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern">
          <fieldset>
            <div class="form-group">
              <label class="control-label">Kategori</label>
              <input type="text" name="kategori" value="<?php echo $qrow['kategori'];?>" id="kategori" onSubmit="return valregister()" class="form-control1 ng-invalid ng-invalid-required ng-touched" required="" ng-model="model.name" required="">
              <input type="hidden" name="idkategori"  value="<?php echo $qrow['idkategori'];?>">
            </div>
            <div class="form-group">
              <button type="submit" name="skategori" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-default">Reset</button>
              <button type="submit" name="cancel_kategori" class="btn btn-danger">Cancel</button>
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
function valregister(){
            if(form1.kategori.value==""){
                        alert("Isi tidak boleh kosong");
                        form1.kategori.focus();
                        return false;
            } 
             return true; 
}
</script>
<?php }

} ?>