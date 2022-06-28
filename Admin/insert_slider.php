
<?php
include("..//conn.php");
include("adminheader.php");

if(isset($_POST["btn_insert"]))
{
   $file_name=$_FILES["img_file_path"]["name"];
   $file_temp=$_FILES["img_file_path"]["tmp_name"];
   
   $file_path="images/".$file_name;
   $title=$_POST["img_tilte"];

   $sql="insert into my_slider values(0,'$file_path','$title')";


   move_uploaded_file($file_temp,"..//".$file_path);

   if($conn->query($sql))
   {
      
       // echo "Added";
   }


}

?>

<div class="container-fluid py-4">
    <h5 class="font-weight-bolder mb-0">Add Slider</h5>

<div class="row" style="min-height:400px">
    <div class="col-md-5">
        <form role="form" method="POST" enctype="multipart/form-data">

            <div class="input-group input-group-outline  mb-5">
                <label class="form-label">Select Image</label>
            </div>
            <div class="input-group input-group-outline mb-3">
                <input type="file" class="form-control" required  name="img_file_path">
            </div>
            
            <div class="input-group input-group-outline mb-3">
                <label class="form-label">Image Title</label>
                <input type="text" class="form-control" required name="img_tilte">
            </div>


            <div>
                <a href="slider_tbl.php" class="btn btn-sm bg-gradient-primary">Back</a>
                <button type="submit" class="btn btn-sm bg-gradient-primary" name="btn_insert">Insert</button>

            
            </div>
        </form>
    </div>
</div>



<?php
include("adminfooter.php");
?>
