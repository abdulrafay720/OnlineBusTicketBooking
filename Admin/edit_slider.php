
<?php
include("..//conn.php");
include("adminheader.php");

$result="";

if(isset($_GET["id"]))
{
    $id=$_GET["id"];
    $sql="SELECT * FROM my_slider where id=$id";
    $result=$conn->query($sql);    
}


if(isset($_POST["btn_edit"]))
{
    $file_name=$_FILES["img_path"]["name"];
    $file_temp=$_FILES["img_path"]["tmp_name"];
    
    $file_path="images/".$file_name;
    $title=$_POST["img_title"];

    $sql_q="UPDATE my_slider SET image_path='$file_path' , image_title='$title' WHERE id=$id";
    if($conn->query($sql_q))
    {
        move_uploaded_file($file_temp,"..//".$file_path);
    }

}


?>

<div class="container-fluid py-4">
    <h5 class="font-weight-bolder mb-0">Edit Slider</h5>

<div class="row" style="min-height:400px">
    <div class="col-md-5">
        <?php
           if($result->num_rows > 0)
           {
                $row=$result->fetch_assoc();
               ?>

                <form role="form" method="post" enctype="multipart/form-data">
                    <div class="input-group input-group-outline  mb-3">
                    <label class="form-control"> <?php echo $row["id"]; ?></label>
                    </div>
                    <div class="input-group input-group-outline  mb-5">
                        <img src="..//<?php echo $row["image_path"];?>" style="width: 70%;height:120px;"/>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <input type="file" class="form-control" required name="img_path" value="<?php echo $row["image_path"];?>">
                    </div>
                    
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Image Title</label>
                        <input type="text" class="form-control" required name="img_title" value="<?php echo $row["image_title"];?>"> 
                    </div>

                    <div>
                        <a href="slider_tbl.php" class="btn btn-sm bg-gradient-primary">Back</a>
                        <button type="submit" class="btn btn-sm bg-gradient-primary" name="btn_edit">Edit</button>
                    </div>
                </form>

               <?php
           }
        ?>
      
    </div>
</div>



<?php
include("adminfooter.php");
?>
