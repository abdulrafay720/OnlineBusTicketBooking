
<?php
include("..//conn.php");
include("adminheader.php");

if(isset($_POST["btn_insert"]))
{
 
   $name=$_POST["cate_name"];
   $des=$_POST["cate_desc"];


   $sql="insert into category_tbl values(0,'$name','$des')";
   $conn->query($sql);


}

?>

<div class="container-fluid py-4">
    <h5 class="font-weight-bolder mb-0">Add Category</h5>

<div class="row" style="min-height:400px">
    <div class="col-md-5">
        <form role="form" method="POST">

           
            <div class="input-group input-group-outline mb-3">
                <label class="form-label">Category Name</label>
                <input type="text" class="form-control" required name="cate_name">
            </div>
            
            <div class="input-group input-group-outline mb-3">
                <label class="form-label">Description</label>
                <input type="text" class="form-control" required name="cate_desc">
            </div>


            <div>
                <a href="category_tbl.php" class="btn btn-sm bg-gradient-primary">Back</a>
                <button type="submit" class="btn btn-sm bg-gradient-primary" name="btn_insert">Insert</button>

            
            </div>
        </form>
    </div>
</div>



<?php
include("adminfooter.php");
?>
