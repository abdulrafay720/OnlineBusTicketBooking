
<?php
include("..//conn.php");
include("adminheader.php");

$hsql = "SELECT * FROM category_tbl";
$hresult=$conn->query($hsql);

$ksql = "SELECT * FROM company";
$kresult=$conn->query($ksql);


if(isset($_POST["btn_insert"]))
{
   $file_name=$_FILES["img_file_path"]["name"];
   $file_temp=$_FILES["img_file_path"]["tmp_name"];
   
   $file_path="images/product/".$file_name;

   $name = $_POST["prdct_name"];
   $price = $_POST["prdct_price"];
   $edate = $_POST["exp_date"];
   $qty = $_POST["qty"];
   $pduct_wgt = $_POST["p_wg"];
   $unit = $_POST["p_unit"];
   $cate = $_POST["p_cate"];
   $comp = $_POST["p_comp"];

   $sql="insert into product_tbl values(0,'$name',$price,'$file_path','$edate',$qty, $pduct_wgt ,' $unit', $cate,$comp)";

   move_uploaded_file($file_temp,"..//".$file_path);

   if($conn->query($sql))
   {     
       // echo "Added";
   }
   else
   {
       die();
   }
}

?>

<div class="container-fluid py-4">
    <h5 class="font-weight-bolder mb-0">Add Product</h5>

<div class="row" style="min-height:400px">
    <div class="col-md-5">
        <form role="form" method="POST" enctype="multipart/form-data">

            <div class="input-group input-group-outline mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" required name="prdct_name">
            </div>

            <div class="input-group input-group-outline mb-3">
                <label class="form-label">Price</label>
                <input type="text" class="form-control" required name="prdct_price">
            </div>

            <div class="input-group input-group-outline  mb-5">
                <label class="form-label">Select Product Image</label>
            </div>
            <div class="input-group input-group-outline mb-3">
                <input type="file" class="form-control" required  name="img_file_path">
            </div>
            
            <div class="input-group input-group-outline  mb-5">
            <label class="form-label">Expiry</label>
            </div>
            <div class="input-group input-group-outline mb-3">
                <input type="date" class="form-control" required name="exp_date">
            </div>

            <div class="input-group input-group-outline mb-3">
                <label class="form-label">Quantity</label>
                <input type="number" class="form-control" required name="qty">
            </div>

            <div class="input-group input-group-outline mb-3">
                <label class="form-label">Product weight</label>
                <input type="text" class="form-control" required name="p_wg">
            </div>

            <div class="input-group input-group-outline mb-3">
                <select name="p_unit"  class="form-control">
                    <option value="">Select Unit</option>
                    <option value="kg">Kg</option>
                    <option value="gm">gm</option>
                    <option value="ltr">liter</option>
                    <option value="hdozen">Half dozen</option>
                    <option value="dozen">dozen</option>
                    <option value="meter">meter</option>
                    <option value="spck">single packet</option>
                </select>
            </div>

            <div class="input-group input-group-outline mb-3">
                <select name="p_cate"  class="form-control">
                    <option value="">Select Category</option>
                    <?php
                          if($hresult->num_rows > 0)
                          {
                             while($hrow=$hresult->fetch_assoc())
                             {
                                 echo '<option value="'.$hrow["cate_id"].'">'.$hrow["cate_name"].'</option>';
                             }
                          }
                    ?>
                </select>
            </div>


            <div class="input-group input-group-outline mb-3">
                <select name="p_comp"  class="form-control">
                    <option value="">Select Company</option>
                    <?php
                          if($kresult->num_rows > 0)
                          {
                             while($krow=$kresult->fetch_assoc())
                             {
                                 echo '<option value="'.$krow["com_id"].'">'.$krow["com_name"].'</option>';
                             }
                          }
                    ?>
                </select>
            </div>

            <div>
                <a href="product_tbl.php" class="btn btn-sm bg-gradient-primary">Back</a>
                <button type="submit" class="btn btn-sm bg-gradient-primary" name="btn_insert">Insert</button>

            
            </div>
        </form>
    </div>
</div>



<?php
include("adminfooter.php");
?>
