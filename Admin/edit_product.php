
<?php
include("..//conn.php");
include("adminheader.php");


$hsql = "SELECT * FROM category_tbl";
$hresult=$conn->query($hsql);

$ksql = "SELECT * FROM company";
$kresult=$conn->query($ksql);

if(isset($_GET["id"]))
{
    $id = $_GET["id"];
    $sql = "SELECT * FROM product_tbl where prdct_id ='$id'";
    $result=$conn->query($sql);
}

if(isset($_POST["btn_update"]))
{
    $file_path="";

    if($_FILES["img_file_path"]["name"]!=null)
    {
        $file_name=$_FILES["img_file_path"]["name"];
        $file_temp=$_FILES["img_file_path"]["tmp_name"];
    
        $file_path="images/product/".$file_name;
    }
    else
    {
        $file_path = $_POST["p_img"];
    }

    $name = $_POST["prdct_name"];
    $price = $_POST["prdct_price"];
    $edate = $_POST["exp_date"];
    $qty = $_POST["qty"];
    $pduct_wgt = $_POST["p_wg"];
    $unit = $_POST["p_unit"];
    $cate = $_POST["p_cate"];
    $comp = $_POST["p_comp"];

    $sql="update product_tbl set prdct_name='$name',prdct_price=$price,prdct_img='$file_path',prdct_exp_date='$edate',prdct_qty=$qty, prdct_wet_per_qty=$pduct_wgt ,prdct_unit='$unit', cate_id=$cate,com_id=$comp where prdct_id ='$id'";
    $conn->query($sql);
    move_uploaded_file($file_temp,"..//".$file_path);
}

?>


<div class="container-fluid py-4">
    <h5 class="font-weight-bolder mb-0">Edit Product</h5>

<div class="row" style="min-height:400px">
    <div class="col-md-5">
        <form role="form" method="POST" enctype="multipart/form-data">
        <?php
                 if($result->num_rows > 0)
                 {
                     $row=$result->fetch_assoc();
                 }
            ?>
            <div class="input-group input-group-outline  mb-5">
            <label class="form-label text-dark">Name</label>
            </div>
            <div class="input-group input-group-outline mb-3">
                <input type="text" class="form-control" required name="prdct_name" value="<?php echo $row["prdct_name"];?>">
            </div>

            <div class="input-group input-group-outline  mb-5">
            <label class="form-label text-dark">Price</label>
            </div>
            <div class="input-group input-group-outline mb-3">
                <input type="text" class="form-control" required name="prdct_price" value="<?php echo $row["prdct_price"];?>">
            </div>

            <div class="input-group input-group-outline  mb-5">
                <label class="form-label">Product Image</label>
            </div>
            <div>
                <img src="..//<?php echo $row["prdct_img"];?>" alt="" style="width:100px;height:100px;" id="product_img"/>  
                <input type="hidden" name="p_img" value="<?php echo $row["prdct_img"];?>">
            </div>
            <div class="input-group input-group-outline mb-3">
                <input type="file" class="form-control"   name="img_file_path" onchange="loadfile();" accept="image/jpg">
            </div>
            
            <div class="input-group input-group-outline  mb-5">
            <label class="form-label">Expiry</label>
            </div>
            <div class="input-group input-group-outline mb-3">
                <input type="date" class="form-control" required name="exp_date" value="<?php echo $row["prdct_exp_date"];?>">
            </div>

            <div class="input-group input-group-outline  mb-5">
                <label class="form-label text-dark">Quantity</label>
            </div>
            <div class="input-group input-group-outline mb-3">
                <input type="number" class="form-control" required name="qty" value="<?php echo $row["prdct_qty"];?>">
            </div>

            <div class="input-group input-group-outline  mb-5">
                <label class="form-label text-dark">Product weight</label>
            </div>
            <div class="input-group input-group-outline mb-3">
                <input type="text" class="form-control" required name="p_wg" value="<?php echo $row["prdct_wet_per_qty"];?>">
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
                <button type="submit" class="btn btn-sm bg-gradient-primary" name="btn_update">Update</button>

            
            </div>
        </form>
    </div>
</div>

<script>
    function loadfile()
    {
        var img=document.getElementById("product_img");
        img.src=URL.createObjectURL(event.target.files[0]);
    }
</script>


<?php
include("adminfooter.php");
?>
