
<?php
include("..//conn.php");
include("adminheader.php");

if(isset($_POST["btn_insert"]))
{
 
   $name=$_POST["comp_name"];
   $yrs=$_POST["sin_yrs"];


   $sql="insert into company values(0,'$name','$yrs')";
   $conn->query($sql);


}

?>

<div class="container-fluid py-4">
    <h5 class="font-weight-bolder mb-0">Add Company</h5>

<div class="row" style="min-height:400px">
    <div class="col-md-5">
        <form role="form" method="POST">

           
            <div class="input-group input-group-outline mb-3">
                <label class="form-label">Company Name</label>
                <input type="text" class="form-control" required name="comp_name">
            </div>
            
            <div class="input-group input-group-outline mb-3">
                <label class="form-label">Since Year</label>
                <input type="text" class="form-control" required name="sin_yrs">
            </div>


            <div>
                <a href="company_tbl.php" class="btn btn-sm bg-gradient-primary">Back</a>
                <button type="submit" class="btn btn-sm bg-gradient-primary" name="btn_insert">Insert</button>

            
            </div>
        </form>
    </div>
</div>



<?php
include("adminfooter.php");
?>
